<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/

$address = get_field('address', 'options');
$phone_number = get_field('phone_number','options');
$email_address = get_field('email_address','options');
$map_url = get_field('map_embed','options');
$directions_url = get_field('driving_directions','options');
$global_schema = get_field('global_schema', 'options');

?>
<footer>

    <section class="footer">
        <div class="container">
            <div class="columns">
                <div class="footer-left">
                    <a href="/" class="custom-logo-link" rel="home" aria-current="page">
                        <img src="/wp-content/uploads/2024/02/Lantz-Logo-Navigation@2x.png" class="custom-logo" alt="Lantz Law Group" decoding="async" srcset="/wp-content/uploads/2024/02/Lantz-Law-Group-Logo-White-Stacked-Logo-Tight-Cropping.png 480w, /wp-content/uploads/2024/02/Lantz-Law-Group-Logo-White-Stacked-Logo-Tight-Cropping-300x64.png 300w" sizes="(max-width: 480px) 100vw, 480px">
                    </a>
                    <div class="spacer-30"></div>
                    <?php the_field('footer_left_column','options'); ?>
                    <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                </div>

                <div class="footer-right">
                    <div class="column-33 block menu">
                        <p><strong>QUICK LINKS</strong></p>
                        <?php
                            $theme_location = 'footer-quick-links';
                            
                            $args = array(
                                'container' => false,
                                'theme_location' => $theme_location
                            );
                            wp_nav_menu( $args );
                        ?>	
                    </div>
                    
                    <div class="column-33 block menu">
                        <p><strong>NAVIGATION</strong></p>
                        <?php
                            $theme_location = 'footer-nav';
                            
                            $args = array(
                                'container' => false,
                                'theme_location' => $theme_location
                            );
                            wp_nav_menu( $args );
                        ?>	
                    </div>

                    <div class="column-33 block address-map">
                        <p><strong>CONTACT US</strong></p>
                        <p><a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a>
                        <a href="mailto:<?php the_field('email_address','options'); ?>"><?php the_field('email_address','options'); ?></a>
                        </p>
                        <div class="footer-map">
                            <iframe src="<?php echo $map_url; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="spacer-30"></div>

                    <div class="footer-social">
                        <?php if(get_field('social_facebook','options')) { ?>
                            <a class="social-link" href="<?php the_field('social_facebook','options'); ?>" title="Facebook" target="blank"><span class="icon-social-facebook"></span></a>
                        <?php } ?>
                        <?php if(get_field('social_instagram','options')) { ?>
                            <a class="social-link" href="<?php the_field('social_instagram','options'); ?>" title="Instagram" target="blank"><span class="icon-social-instagram"></span></a>
                        <?php } ?>
                        <?php if(get_field('social_linkedin','options')) { ?>
                            <a class="social-link" href="<?php the_field('social_linkedin','options'); ?>" title="LinkedIn" target="blank"><span class="icon-social-linkedin"></span></a>
                        <?php } ?>
                        <?php if(get_field('social_twitter','options')) { ?>
                            <a class="social-link" href="<?php the_field('social_twitter','options'); ?>" title="Twitter" target="blank"><span class="icon-social-twitter"></span></a>
                        <?php } ?>
                        <?php if(get_field('social_youtube','options')) { ?>
                            <a class="social-link" href="<?php the_field('social_youtube','options'); ?>" title="YouTube" target="blank"><span class="icon-social-youtube"></span></a>
                        <?php } ?>
                    </div>
                    <div class="footer-utility">
                        <div class="utility">
                        <?php if ( have_rows('utility_links','options') ): ?>
                        <?php while ( have_rows('utility_links','options') ): the_row(); ?>  
                            <a href="<?php the_sub_field('utility_page_link'); ?>"><?php the_sub_field('utility_link_text'); ?></a>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                        </div>
                        <div class="disclaimer">
                            <p class="small"><?php the_field('disclaimer_text','options'); ?></p>
                            <!-- Start Iubenda Insert -->
                            <a href="https://www.iubenda.com/privacy-policy/30535471" class="iubenda-white iubenda-embed " title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                            <a href="https://www.iubenda.com/privacy-policy/30535471/cookie-policy" class="iubenda-white iubenda-embed " title="Cookie Policy ">Cookie Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                            <a href="https://www.iubenda.com/terms-and-conditions/30535471" class="iubenda-white iubenda-embed " title="Terms and Conditions ">Terms and Conditions</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>

                            <?php if(is_page_template('front-page.php')) { ?>
                            <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:20px 0;"></a>
                            <?php } ?>
                            <a href="https://alightnet.org/" target="blank">
                                <picture style="max-width: 120px; display:block; margin-top:10px;">
                                    <source type="image/webp" srcset="/wp-content/uploads/2025/08/alight-proud-sponsor.jpg.webp">
                                    <img src="/wp-content/uploads/2025/08/alight-proud-sponsor.jpg" style="border-radius:5px;">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</footer>

<script>
jQuery(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    jQuery(".video").fitVids();
});
</script>

<script type="text/javascript" src="//cdn.callrail.com/companies/988863866/42b5736c43350ee8e8a0/12/swap.js"></script> 
<script> (function(){ var s = document.createElement('script'); var h = document.querySelector('head') || document.body; s.src = 'https://eu.acsbapp.com/apps/app/dist/js/app.js'; s.async = true; s.onload = function(){ acsbJS.init(); }; h.appendChild(s); })(); </script> 

<?php wp_footer(); ?>

</body>
</html>


