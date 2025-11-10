<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="banner wide">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1 class="post-title"><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
                    <div class="spacer-15"></div>
                    <div class="green-tick"></div>
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
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="search-item">
                                <h2><?php echo esc_html(get_the_title()); ?></h2>
                                <p><?php echo substr(acf_esc_html(get_the_excerpt()), 0, 333); echo strlen(get_the_excerpt()) > 333 ? '...' : ''; ?></p>
                            </a>
                            <hr>
                            
                        <?php endwhile; ?>
                        <?php the_posts_pagination(); ?>
                    <?php else : ?>
                        <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                    <?php endif; ?>
                    </div>
                    <div class="column-33 sidebar-block block">
                        <?php get_template_part('block','sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();
