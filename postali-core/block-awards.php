<?php if( have_rows('awards','options') ): ?>
    <section class="awards">
        <div class="container">
            <div class="columns">
                <div id="awards" class="slide">
                    <?php $n=1 ?>
                    <?php while( have_rows('awards','options') ): the_row(); ?>  
                        <div class="column-20" id="award_<?php echo $n; ?>">
                        <?php 
                        $image = get_sub_field('award_image');
                        if( !empty( $image ) ): ?>
                            <img class="ignore-lazy" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                        </div>
                        <?php $n++; ?>
                    <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
    </section>
<?php endif; ?> 