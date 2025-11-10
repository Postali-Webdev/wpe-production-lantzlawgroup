<?php
/**
 * Template Name: Attorney Navigational
 * @package Postali Child
 * @author Postali LLC
**/

get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php if ( have_rows('attorneys') ): ?>
                    <?php while ( have_rows('attorneys') ): the_row(); 
                    $img = get_sub_field('headshot'); ?>  
                        <article>
                            <div class="image-holder">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['url']; ?>">
                            </div>
                            <div class="copy-holder">
                                <h2><?php the_sub_field('name'); ?></h2>
                                <p><?php the_sub_field('intro_copy'); ?></p>
                                <?php if ( get_sub_field('page_link') ) :  ?><a class="btn" href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('name'); ?>">Learn More about <?php the_sub_field('name');  ?></a><?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php endif; ?> 
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