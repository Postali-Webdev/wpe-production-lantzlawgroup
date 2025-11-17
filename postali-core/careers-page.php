<?php
/**
 * Template Name: Careers
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
                
                    <?php $image = get_field('banner_background_image'); ?>
                    <div class="column-50 banner-img" style="background-image: url('<?php echo $image; ?>')">
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
                <div class="column-full block">
                    <?php the_content(); ?>
                    <?php if( have_rows('job_listings') ) : ?>
                        <h2>Open Positions</h2>
                        <div class="job-listings">
                            <?php while(have_rows('job_listings') ) : the_row(); ?>
                            <div class="accordions">
                                <div class="accordions_title"><p><?php echo get_sub_field('title'); ?><span></span></p></div>
                                <div class="accordions_content"><p><?php echo get_sub_field('description'); ?></p></div>
                            </div>
                            <?php endwhile; ?>
                        </div>
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