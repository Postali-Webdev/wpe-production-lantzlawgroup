<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

$banner_img = get_field('banner_background_image');
$phone_number = get_field('phone_number','options');
?>

<div class="body-container">

    <section class="banner" id="hp-banner">
        <div class="container wide">
            <div class="columns">
                <div class="column-left">
                    <h1><?php the_title(); ?></h1>
                    <div class="banner-headline"><?php the_field('banner_headline'); ?></div>
                    <div class="banner-cta">
                        <div class="banner-left">
                            <p class="small green"><?php the_field('banner_cta_headline'); ?></p>
                            <p><?php the_field('banner_cta_copy'); ?></p>
                        </div>
                        <div class="banner-right">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                            <p>or use our <a href="/contact-us/">online form</a></p>
                        </div>
                    </div>
                </div>

                <?php $image = get_field('banner_image'); ?>
                <div class="column-right" style="background-image:url('<?php echo esc_url($image['url']); ?>');">
                </div>
            </div>
        </div>
    </section>

    <section class="practice-areas">
        <div class="container">
            <h3><?php the_field('pa_section_headline'); ?></h3>
            <div class="columns" id="practice">
            <?php if( have_rows('practice_areas') ): ?>
            <?php $i = 1; ?>
            <?php while( have_rows('practice_areas') ): the_row(); ?>  
                <a class="pa-box" id="pa_box_<?php echo $i; ?>" style="background-image:url('<?php the_sub_field('practice_area_image'); ?>');" href="<?php the_sub_field('practice_area_link'); ?>">
                    <?php the_sub_field('practice_area_title'); ?>
                </a>
            <?php $i++; ?>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>
            <p class="mobile-show-more"><a href="/practice-areas/">view more practice areas</a></p>
        </div>
    </section>

    <section class="our-team">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <p class="pre-headline">about us</p>
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
                    <div class="column-50 attorney<?php if (get_sub_field('include_button')) { ?> button<?php } ?>">
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

    <section class="testimonials-block">
        <div class="container">
            <div class="columns">
                <div class="column-50 image">
                    <div class="box-header">
                        <p class="pre-headline">testimonials</p>
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

                <?php
                $args = array (
                    'post_type' => 'reviews',
                    'post_per_page' => '10',
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'paged' => $paged
                );
                $the_query = new WP_Query($args);
                ?>

                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <article>
                        <div class="stars"></div>
                        <div class="quote"><?php the_content(); ?></div>
                        <p class="author"><?php the_field('testimonial_author'); ?> <?php if(get_field('testimonial_source')) { ?>  |  <a href="<?php the_field('testimonial_source'); ?>" target="blank">Read Full Review</a>  <?php } ?></p>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <a class="contact" href="/contact-us">
                <p class="large">Contact Lantz Law Group Today!</p>
            </a>
        </div>
    </section>

    <section id="faqs">
        <div class="container">
            <div class="columns">
                <div class="column-66 centered center">
                    <p class="pre-headline"><?php the_field('faq_section_pre_headline'); ?></p>
                    <h2><?php the_field('faq_section_headline'); ?></h2>
                    <div class="spacer-30"></div>
                    <?php get_search_form(); ?>
                </div>
            </div>

            <div class="spacer-60"></div>

            <div class="columns">
                <div class="column-50">
                <?php if( have_rows('faqs') ): ?>
                <?php $count = count(get_field('faqs')); ?>
                <?php $n=1; ?>    
                <?php while( have_rows('faqs') ): the_row(); ?>  
                    <div class="accordions" id="accordion_<?php echo $n; ?>">
                        <div class="accordions_title"><h3><?php the_sub_field('question'); ?></h3></div>
                        <div class="accordions_content"><?php the_sub_field('answer'); ?></div>
                    </div>

                    <?php if ($count/2 == $n) { ?>
                    </div><div class="column-50">
                    <?php } ?>

                    <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','contact-us'); ?>

</div><!-- #front-page -->

<?php get_footer();?>