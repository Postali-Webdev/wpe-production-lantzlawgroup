<?php
/**
 * Template Name: About
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section class="banner wide">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1><?php the_title(); ?></h1>
                    <div class="spacer-15"></div>
                    <div class="green-tick"></div>
                    <p><?php the_field('banner_value_proposition'); ?></p>
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
                        <a href="#" class="btn"><?php the_field('phone_number','options'); ?></a>
                        <div class="spacer-30"></div>
                        <p class="small">or use our <a href="/contact-us/">online form</a></p>
                    </div>
                </div>            
            </div>
        </div>
    </section>

   <section>
        <div class="container">
            <div class="columns">
                <div class="column-66 center block">
                    <?php the_content(); ?>

                    <?php if( have_rows('our_values') ): ?>
                    <h3>Our Values</h3>
                    <?php while( have_rows('our_values') ): the_row(); ?>  
                        
                        <div class="value">
                            <div class="value-image">
                                <?php 
                                $image = get_sub_field('value_icon');
                                if( !empty( $image ) ): ?>
                                    <img class="ignore-lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="value-copy">
                                <p>
                                    <span class="value-title"><?php the_sub_field('value_title'); ?></span>
                                    <?php the_sub_field('value_copy'); ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 

                </div>
            </div>
        </div>
   </section>

    <section class="our-team" id="team">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <h2><?php the_field('meet_the_team_headline'); ?></h2>
                </div>
                <div class="column-50">
                    <p><?php the_field('meet_the_team_intro_copy'); ?></p>
                </div>
            </div>
            <div class="spacer-60"></div>
            <div class="columns attorneys">
            <?php if( have_rows('team_members') ): ?>
            <?php while( have_rows('team_members') ): the_row(); ?>
                <?php $post_object = get_sub_field('team_member'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    <div class="column-33 attorney<?php if (get_sub_field('include_button')) { ?> button<?php } ?>">
                        <div class="headshot">
                        <?php 
                        $image = get_field('attorney_headshot');
                        if( !empty( $image ) ): ?>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                        <?php endif; ?>
                        </div>
                        <div class="copy">
                            <h3><?php the_title(); ?></h3>
                            <p class="title"><?php the_field('banner_value_proposition'); ?></p>
                            <p><?php the_sub_field('team_member_bio_intro'); ?></p>
                            <?php
                            $name = get_the_title();
                            $arr = explode(' ',trim($name));
                            ?>
                        </div>
                        <?php if (get_sub_field('include_button')) { ?>
                        <a href="<?php the_permalink(); ?>" class="btn">More About <?php echo $arr[0]; ?></a>
                        <?php } ?>
                    </div>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="main-content about-top">
        <div class="container">
            <div class="columns">
                <div class="column-33 block">
                
                <?php if( have_rows('logos_block') ): ?>
                <div class="logos-block">
                <?php while( have_rows('logos_block') ): the_row(); ?>  
                    <?php 
                    $image = get_sub_field('logo');
                    if( !empty( $image ) ): ?>                    
                    <a href="<?php the_sub_field('link'); ?>" target="blank"> <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
                <?php endif; ?> 

                </div>
                <div class="column-66 block">
                    <?php the_field('community_involvement'); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer();?>