<?php
/**
 * Template Name: Navigational
 * @package Postali Child
 * @author Postali LLC
**/

get_header(); ?>

<div class="body-container">

    <section class="banner wide">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1><?php the_title(); ?></h1>
                    <div class="spacer-15"></div>
                    <div class="green-tick"></div>
                    <p><?php the_field('value_proposition'); ?></p>
                </div>
                <?php if (has_post_thumbnail( $post->ID ) ) { ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div class="column-50 banner-img" style="background-image: url('<?php echo $image[0]; ?>')">
                <?php } else { ?>
                    <?php $image = get_field('default_background_image','options'); ?>
                    <div class="column-50 banner-img" style="background-image: url('<?php echo $image; ?>')">
                <?php } ?>
                    <div class="banner-cta-box">
                        <p><em><strong>Contact Us Today!</strong></em></p>
                        <div class="spacer-30"></div>
                        <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                        <div class="spacer-30"></div>
                        <p class="small">or use our <a href="/contact-us/">online form</a></p>
                    </div>
                </div>            
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                <?php if( have_rows('practice_areas', 4561) ): ?>
                <?php $i = 1; ?>
                <?php while( have_rows('practice_areas', 4561) ): the_row(); ?>  
                    <a class="pa-box" id="pa_box_<?php echo $i; ?>" style="background-image:url('<?php the_sub_field('practice_area_image'); ?>');" href="<?php the_sub_field('practice_area_link'); ?>">
                        <?php the_sub_field('practice_area_title'); ?>
                    </a>
                <?php $i++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                    <div class="spacer-60"></div>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>