<?php
/**
 * Template Name: Attorney Navigational
 * @package Postali Child
 * @author Postali LLC
**/

$args = array (
	'post_type' => 'attorneys',
	'post_per_page' => '-1',
	'post_status' => 'publish',
	'order' => 'ASC',
);
$the_query = new WP_Query($args);

get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                    $img = get_field('attorney_headshot'); ?>  
                        <article>
                            <div class="image-holder">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['url']; ?>">
                            </div>
                            <div class="copy-holder">
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_excerpt(); ?></p>
                                <a class="btn" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Learn More about <?php the_title();  ?></a>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <div class="spacer-60"></div>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>