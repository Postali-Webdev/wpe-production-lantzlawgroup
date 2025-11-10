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