<?php
/**
 * Template Name: Interior
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

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php the_content(); ?>
                </div>
                <div class="column-33 sidebar-block block">
                <?php if(get_field('add_testimonial','options')) { ?>
                    <div class="testimonial-block">
                        <p class="testimonial"><?php the_field('sidebar_testimonial','options'); ?></p>
                        <p><strong><?php the_field('sidebar_testimonial_author','options'); ?></strong></p>
                    </div>
                    <div class="spacer-30"></div>
                    <p class="sidebar-more"><a href="/testimonials/" title="Read more testimonials">Read More Testimonials</a> <span class="icon-tick-down"></span></p>
                    <div class="sidebar-spacer"></div>
                <?php } ?>

                <?php if(get_field('add_result','options')) { ?>
                    <div class="sidebar-header">NOTABLE RESULT</div>
                    <div class="result-block">
                        <p class="large"><strong><?php the_field('sidebar_result_headline','options'); ?></strong></p>
                        <p class="result"><?php the_field('sidebar_result','options'); ?></p>
                    </div>
                    <div class="spacer-30"></div>
                    <p class="sidebar-more"><a href="/results/" title="Read more results">Read More Results</a> <span class="icon-tick-down"></span></p>
                    <div class="sidebar-spacer"></div>
                <?php } ?>
                <?php
                    if ( is_page() ) :
                        if( $post->post_parent ) {
                            $children = wp_list_pages( 
                                array(
                                    'title_li'      => '',
                                    'child_of'      => $post->post_parent,
                                    'echo'          => '0',
                                    'meta_key'      => 'page_title_h1',
                                    'orderby'       => 'meta_value',
                                    'order'         => 'DESC'
                                ) 
                            );
                        } else {
                            $children = wp_list_pages( 
                                array(
                                    'title_li'      => '',
                                    'child_of'      => $post->ID,
                                    'echo'          => '0',
                                    'meta_key'      => 'page_title_h1',
                                    'orderby'       => 'meta_value',
                                    'order'         => 'DESC'
                                ) 
                            );
                        }

                        if ($children) { ?>
                        <?php global $post;
                        $pageid = $post->post_parent;
                        ?>
                            <div class="sidebar-header">
                                <?php the_field('sidebar_menu_title', $pageid); ?>
                            </div>
                            <div class="sidebar-menu">
                                <ul class="menu" id="menu-practice-areas-menu">
                                    <?php echo $children; ?>
                                </ul>
                            </div>

                        <?php } else { 
                                $location_pa_menu = get_field('practice_area_menu','options'); 
                                $all_pa_link = '/practice-areas/';
                            ?>
                            <div class="sidebar-header">Our Practice Areas</div>
                            <div class="sidebar-menu">
                                <?php echo $location_pa_menu; ?>	
                                <div class="spacer-30"></div>
                                <p class="sidebar-more"><a href="<?php echo $all_pa_link; ?>" title="Read more results">All Practice Areas</a> <span class="icon-tick-down"></span></p>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer();?>