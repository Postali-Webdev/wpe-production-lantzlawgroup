<?php
/**
 * Template Name: Attorney Bio
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section class="banner">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-50 block attorney-img">                  
                    <?php 
                    $image = get_field('attorney_headshot');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="attorney-img" />
                    <?php endif; ?>
                </div>
                <div class="column-50" >
                    <h1><?php the_title(); ?></h1>
                    <div class="spacer-15"></div>
                    <p class="attorney-title"><?php the_field('banner_value_proposition'); ?></p>
                    <?php if(get_field('attorney_email')) { ?><p class="email-address"><span class="icon-email-icon"></span> <a href="mailto:<?php the_field('attorney_email'); ?>"> <?php the_field('attorney_email'); ?></a></p><?php } ?>
                    <?php if(get_field('attorney_linkedin')) { ?><p class="linkedin"><span class="icon-social-linkedin"></span> <a href="<?php the_field('attorney_linkedin'); ?>" target="blank"> LinkedIn</a></p><?php } ?>

                    <div class="green-tick"></div>
                    <?php the_field('banner_copy'); ?>
                </div>            
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns copy">
            <?php if( have_rows('copy_blocks') ): ?>
            <?php while( have_rows('copy_blocks') ): the_row(); ?>  
                <div class="column-50 headline">
                    <h2><?php the_sub_field('block_title'); ?></h2>
                </div>
                <div class="column-50 body-copy">
                    <?php the_sub_field('block_copy'); ?>
                </div>
                <div class="spacer-60"></div>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>

            <div class="spacer-60"></div>
            
            <?php if( have_rows('highlight_callouts') ): ?>
            <?php while( have_rows('highlight_callouts') ): the_row(); ?>  
            <div class="columns highlights">
                <div class="column-33">
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>
                <div class="column-66">
                    <?php if( have_rows('highlights') ): ?>
                    <ul>
                    <?php while( have_rows('highlights') ): the_row(); ?>  
                        <li><img src="/wp-content/uploads/2025/01/scales.png" alt=""> <?php the_sub_field('highlight'); ?></li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?> 
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?> 

            <div class="columns copy">
            <?php if( have_rows('copy_blocks_bottom') ): ?>
            <?php while( have_rows('copy_blocks_bottom') ): the_row(); ?>  
                <div class="column-50 headline">
                    <h2><?php the_sub_field('block_title'); ?></h2>
                </div>
                <div class="column-50 body-copy">
                    <?php the_sub_field('block_copy'); ?>
                </div>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>

        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

    <?php get_template_part('block','contact-us'); ?>

</div><!-- #front-page -->

<?php get_footer();?>