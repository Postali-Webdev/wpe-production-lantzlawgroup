<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$args = array (
	'post_type' => 'whitepapers',
	'post_per_page' => '3',
	'post_status' => 'publish',
	'order' => 'ASC',
);
$the_query = new WP_Query($args);

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>



<div class="body-container">

    <section class="banner wide">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1><?php the_title(); ?></h1>
                    <div class="spacer-15"></div>
                    <div class="green-tick"></div>

                    <?php
                        $featured_post = get_field('blog_author');
                        if( $featured_post ): ?>
                    <div class="author-box">
                        <div class="headshot">
                        <?php $headshot = get_field( 'attorney_headshot', $featured_post->ID ); ?>
                        <?php if( !empty( $headshot ) ): ?>
                            <img src="<?php echo esc_url($headshot['url']); ?>" alt="<?php echo esc_attr($headshot['alt']); ?>" />
                        <?php endif; ?>
                        </div>
                        <div class="author">
                            <p>Written By: <?php echo esc_html( $featured_post->post_title ); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                </div>
                <div class="column-33 banner-img">
                    <div class="banner-cta-box reversed">
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

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="article-single-featured-image">
                        <div class="spacer-30"></div>
                        <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <img src="<?php echo $featImg[0]; ?>" class="article-featured-image"  />
                            <div class="spacer-60"></div>
                        <?php } ?>
                    </div>
                    <?php the_content(); ?>
                    <div class="spacer-30"></div>
                    <p class="sidebar-more"><a href="/white-papers/" class="btn" title="Read more results">All White Papers</a></p>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php if($the_query->have_posts()) : ?>
                    <div class="sidebar-menu">
                        <div class="sidebar-header">White Papers</div>
                        <div class="sidebar-menu">
                            <ul class="menu" id="menu-practice-areas-menu">
                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </ul>
                            <div class="spacer-30"></div>
                            <p class="sidebar-more"><a href="/white-papers/" title="Read more results">All White Papers</a> <span class="icon-tick-down"></span></p>
                        </div>
                    </div>

                    <div class="spacer-30"></div>
                    <?php endif; ?>

                    <div class="sidebar-menu">
                    <?php if(get_field('add_practice_area_menu','options')) { 
                        $location_pa_menu = get_field('practice_area_menu','options'); 
                        $all_pa_link = '/practice-areas/';    
                    ?>
                        <div class="sidebar-header">Our Practice Areas</div>
                        <div class="sidebar-menu">
                            <?php echo $location_pa_menu; ?>	
                            <div class="spacer-30"></div>
                            <p class="sidebar-more"><a href="<?php echo esc_html($all_pa_link); ?>" title="Read more results">view all practice areas</a> <span class="icon-tick-down"></span></p>
                        </div>
                    <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer();?>