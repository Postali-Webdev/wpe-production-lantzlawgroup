<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

$args = array (
	'post_type' => 'reviews',
	'post_per_page' => '10',
	'post_status' => 'publish',
	'order' => 'DESC',
    'paged' => $paged
);
$the_query = new WP_Query($args);

get_header(); ?>

<div class="body-container">

    <section class="testimonials-block">
        <div class="container">
            <div class="columns">
                <div class="column-50 image">
                    <div class="box-header">
                        <p class="sm green">testimonials</p>
                        <h1>What Our Clients Are Saying</h1>
                    </div>
                    <div class="box-footer">
                        <span>100+</span>Business Clients Served
                    </div>
                <?php 
                $image = get_field('reivews_bg_image','options');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="column-50 scroll">
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <article>
                        <div class="stars"></div>
                        <div class="quote"><?php the_content(); ?></div>
                        <p class="author"><?php the_title(); ?></p>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <a class="contact" href="/contact-us">
                <p class="large">Contact Lantz Law Group Today!</p>
            </a>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>