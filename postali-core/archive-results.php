<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */


get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    
                <?php
                $taxonomy = 'result_category';
                $tax_terms = get_terms( 
                    array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => true, 
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'fields' => 'names',
                    )
                ); ?>

                <?php foreach($tax_terms as $tax_term) { ?>
                <h2><?php echo $tax_term; ?></h2>
                
                <?php $term_posts = get_posts( // find posts with the correct term
                    array(
                        'no_found_rows' => true, // for performance
                        'ignore_sticky_posts' => true, // for performance
                        'post_type' => 'results',
                        'posts_per_page' => -1, // return all results
                        'tax_query' => array( // https://developer.wordpress.org/reference/classes/wp_tax_query/
                            array(
                                'taxonomy' => $taxonomy,
                                'field'    => 'name',
                                'terms'    => array( $tax_term )
                            )
                        ),
                    'fields' =>  'ids', // return the post IDs only
                    )
                );
                
                foreach($term_posts as $term_post_id) { // loop through posts
                    $post_title = get_the_title($term_post_id); // get post title
                    $post_content = get_post_field('post_content', $term_post_id);
                ?>
                    <div class="landing-box-container">
                        <div class="landing-box">
                            <h3><?php echo $post_title; ?></h3>
                        </div>
                        <?php if ( !empty( $post_content ) ){ ?>
                        <div class="accordions">
                            <div class="accordions_title"><p>View Details <span></span></p></div>
                            <div class="accordions_content"><p><?php echo $post_content; ?></p></div>
                        </div>
                    <?php } ?>
                    </div>
                    
                <?php }
                }
                ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>