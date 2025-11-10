<?php
/**
 * Template Name: Practice Parent
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

    <section id="section-1">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php the_field('top_copy_block'); ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php
                    $children = wp_list_pages( 
                        array(
                            'title_li'      => '',
                            'child_of'      => $post->ID,
                            'echo'          => '0',
                            'meta_key'      => 'page_title_h1',
                            'orderby'       => 'meta_value',
                            'order'         => 'DESC'
                            ) 
                    ); ?>

                        <div class="spacer-15"></div>
                        
                        <div class="sidebar-menu">
                            
                        
                            <?php if ($children) { ?>
                            <?php global $post;
                            $pageid = $post->post_parent;
                            ?>
                            <div class="sidebar-header"><?php the_field('sidebar_menu_title'); ?></div>
                            
                            <div class="sidebar-menu">
                                <ul class="menu" id="menu-practice-areas-menu">
                                    <?php echo $children; ?>
                                </ul>
                            </div>
                        
                            <div class="spacer-30"></div>
                            <p class="sidebar-more"><a href="/practice-areas/" title="Read more results">view all practice areas</a></p>
                        </div>

                        <?php } else { 
                                $location_pa_menu = get_field('practice_area_menu','options'); 
                                $all_pa_link = '/practice-areas/';    
                        ?>
                        <div class="sidebar-header">Our Practice Areas</div>
                        <div class="sidebar-menu">
                            <?php echo $location_pa_menu; ?>	
                            <div class="spacer-30"></div>
                            <p class="sidebar-more"><a href="<?php echo $all_pa_link; ?>" title="Read more results">view all practice areas</a></p>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

    <section id="section-2">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php the_field('section_2_copy_block'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial">
        <div class="container">
            <div class="columns">
                <div class="column-left block img-fit">
                <?php 
                $image = get_field('testimonial_image','options');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="column-right block">
                    <div class="quote">
                        <div class="top">
                            <div class="stars"></div>
                            <div class="logo"><img src="/wp-content/uploads/2025/01/google-review-blk.svg"></div>
                        </div>
                        
                        <p class="large"><?php the_field('full_testimonial','options'); ?></p>
                        <div class="author">
                            <p><?php the_field('testimonial_author','options'); ?></p>
                        </div>
                    </div>
                    <a class="contact" href="/contact-us">
                        <p class="large">Contact Lantz Law Group Today!</p>
                    </a>
                    
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php the_field('section_3_copy_block'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','pre-footer'); ?>

</div>

<?php get_footer();?>