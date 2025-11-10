<?php
/**
 * Template Name: Contact
 * @package Postali Child
 * @author Postali LLC
**/
get_header();


$address = get_field('address', 'options');
$map_url = get_field('map_embed','options');
$directions_url = get_field('driving_directions','options');
?>

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
                    <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                </div>
                <?php if (has_post_thumbnail( $post->ID ) ) { ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div class="column-50 banner-img" style="background-image: url('<?php echo $image[0]; ?>')">
                <?php } else { ?>
                    <?php $image = get_field('default_background_image','options'); ?>
                    <div class="column-50 banner-img" style="background-image: url('<?php echo $image; ?>')">
                <?php } ?>
                </div>            
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h3>Online Form</h3>
                    <?php the_content(); ?>
                </div>
                <div class="column-50 sidebar-block block">
                    <h3>Our Office</h3>
                    <p><?php echo $address; ?></p>
                    <p class="sidebar-more"><a href="<?php echo $directions_url; ?>" title="Get Directions" target="blank">Directions</a></p>
                    <iframe src="<?php echo $map_url; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <?php 
                    $image = get_field('additional_sidebar_image');
                    if( !empty( $image ) ): ?>
                        <div class="spacer-30"></div>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div><!-- #front-page -->

<?php get_footer();?>