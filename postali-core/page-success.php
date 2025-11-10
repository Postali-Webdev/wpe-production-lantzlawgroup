<?php
/**
 * Template Name: Form Success
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
                        <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                        <div class="spacer-30"></div>
                        <p class="small">or use our <a href="/contact-us/">online form</a></p>
                    </div>
                </div>            
            </div>
        </div>
    </section>

</div><!-- #front-page -->

<?php get_footer();?>