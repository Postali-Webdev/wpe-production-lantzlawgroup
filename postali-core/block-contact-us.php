    <section class="contact-us">
        <div class="container wide">
            <div class="columns">
                <div class="column-66">
                    <p class="pre-headline"><?php the_field('contact_block_title','options'); ?></p>
                    <h2><?php the_field('contact_block_headline','options'); ?></h2>
                    <?php the_field('contact_block_copy','options'); ?>
                    <div class="contact-block">
                        <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                        <p>or use our <a href="/contact-us/">online form</a></p>
                    </div>
                </div>
                <?php $image = get_field('contact_block_photo','options'); ?>
                <div class="column-33" style="background-image:url('<?php echo esc_url($image['url']); ?>');">
                    
                </div>
            </div>
        </div>
    </section>