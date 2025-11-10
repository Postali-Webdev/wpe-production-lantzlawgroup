<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P69H653Q');</script>
<!-- End Google Tag Manager -->

<!-- Iubenda Start -->
<script type="text/javascript">
	var _iub = _iub || [];
	_iub.csConfiguration = {
		"askConsentAtCookiePolicyUpdate":true,
		"enableLgpd":true,
		"enableUspr":true,
		"floatingPreferencesButtonDisplay":"bottom-right","lang":"en-GB","perPurposeConsent":true,
		"siteId":4125830,
		"usprApplies":true,
		"whitelabel":false,
		"cookiePolicyId":30535471, 
		"banner":{ 
			"acceptButtonDisplay":true,
			"backgroundOverlay":true,
			"closeButtonDisplay":false,
			"customizeButtonDisplay":true,
			"explicitWithdrawal":true,
			"listPurposes":true,
			"rejectButtonDisplay":true,
			"showPurposesToggles":true 
		},
        "callback": {
            onPreferenceExpressedOrNotNeeded: function(preference) {
                dataLayer.push({
                    iubenda_ccpa_opted_out: _iub.cs.api.isCcpaOptedOut()
                });
                if (!preference) {
                    dataLayer.push({
                        event: "iubenda_preference_not_needed"
                    });
                } else {
                    if (preference.consent === true) {
                        dataLayer.push({
                            event: "iubenda_consent_given"
                        });
                    } else if (preference.consent === false) {
                        dataLayer.push({
                            event: "iubenda_consent_rejected"
                        });
                    } else if (preference.purposes) {
                        for (var purposeId in preference.purposes) {
                            if (preference.purposes[purposeId]) {
                                dataLayer.push({
                                    event: "iubenda_consent_given_purpose_" + purposeId
                                });
                            }
                        }
                    }
                }
            }
        }
	};
</script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/gpp/stub.js"></script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
<!-- Iubenda End -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<?php get_template_part('block','design'); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<?php get_template_part('block','font-select'); ?>

</head>

<a class="skip-link" href='#main-content'>Skip to Main Content</a>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P69H653Q"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<header>
		<div id="header-top" class="container">
			<div id="header-top_left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_right_menu">
                    <?php

					
					$theme_location = 'header-nav';
					
					$args = array(
						'container' => false,
						'theme_location' => $theme_location
					);
					wp_nav_menu( $args );
                    ?>	
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
            <div class="translate"><?php echo do_shortcode( ' [weglot_switcher] ' ); ?></div>
		</div>
	</header> 

    

    <span id="main-content"></span>