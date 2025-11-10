<?php 
    
    $GLOBALS['font_primary'] = get_field('font_primary','options');
    $GLOBALS['font_secondary'] = get_field('font_secondary','options');

    if(get_field('font_H1','options') == 'primary') {
        $GLOBALS['font_H1'] = $GLOBALS['font_primary'];
    } else {
        $GLOBALS['font_H1'] = $GLOBALS['font_secondary'];
    }

    if(get_field('font_H2','options') == 'primary') {
        $GLOBALS['font_H2'] = $GLOBALS['font_primary'];
    } else {
        $GLOBALS['font_H2'] = $GLOBALS['font_secondary'];
    }

    if(get_field('font_H3','options') == 'primary') {
        $GLOBALS['font_H3'] = $GLOBALS['font_primary'];
    } else {
        $GLOBALS['font_H3'] = $GLOBALS['font_secondary'];
    }

    if(get_field('font_H4','options') == 'primary') {
        $GLOBALS['font_H4'] = $GLOBALS['font_primary'];
    } else {
        $GLOBALS['font_H4'] = $GLOBALS['font_secondary'];
    }

    if(get_field('font_paragraph','options') == 'primary') {
        $GLOBALS['font_paragraph'] = $GLOBALS['font_primary'];
    } else {
        $GLOBALS['font_paragraph'] = $GLOBALS['font_secondary'];
    }

    $body_font_color = get_field('body_font_color','options');
    $color_primary_1 = get_field('color_primary_1','options');
    $color_primary_2 = get_field('color_primary_2','options');
    $color_secondary_1 = get_field('color_secondary_1','options');
    $color_secondary_2 = get_field('color_secondary_2','options');
    $color_page_bg = get_field('color_page_bg','options');

    $h2_font_color = get_field('h2_font_color', 'options');
    $h3_font_color = get_field('h3_font_color', 'options');
    $h4_font_color = get_field('h4_font_color', 'options');
    
    // banner styles
    $color_banner_gradient = get_field('color_banner_gradient','options');
    $color_banner_gradient_opacity = get_field('color_banner_gradient_opacity','options');
    $color_banner_fonts = get_field('color_banner_fonts','options');
    
    // button styles
    $primary_button_style = get_field('primary_button_style','options');
    $primary_button_background_color = get_field('primary_button_background_color','options');
    $primary_button_text_color = get_field('primary_button_text_color','options');
    $primary_button_background_color_hover = get_field('primary_button_background_color_hover','options');
    $primary_button_text_color_hover = get_field('primary_button_text_color_hover','options');
    $primary_button_border_color = get_field('primary_button_border_color','options');
    $primary_button_border_weight = get_field('primary_button_border_weight','options');
    $primary_button_border_radius = get_field('primary_button_border_radius','options');

    $secondary_button_style = get_field('secondary_button_style','options');
    $secondary_button_background_color = get_field('secondary_button_background_color','options');
    $secondary_button_text_color = get_field('secondary_button_text_color','options');
    $secondary_button_background_color_hover = get_field('secondary_button_background_color_hover','options');
    $secondary_button_text_color_hover = get_field('secondary_button_text_color_hover','options');
    $secondary_button_border_color = get_field('secondary_button_border_color','options');
    $secondary_button_border_weight = get_field('secondary_button_border_weight','options');
    $secondary_button_border_radius = get_field('secondary_button_border_radius','options');

    // rgba value of primary color for gradient //
    list($r, $g, $b) = array_map(
        function ($c) {
          return hexdec(str_pad($c, 2, $c));
        },
        str_split(ltrim($color_banner_gradient, '#'), strlen($color_banner_gradient) > 4 ? 2 : 1)
      );

      // rgba value for header background when scrolled
      list($r2, $g2, $b2) = array_map(
        function ($c2) {
          return hexdec(str_pad($c2, 2, $c2));
        },
        str_split(ltrim($color_page_bg, '#'), strlen($color_page_bg) > 4 ? 2 : 1)
      );
?>

<style type="text/css">  
    /* global */

    /* header */
    header.scrolled { background:<?php echo "rgba(" . $r2 . ", " . $g2 . ", " . $b2 . ",.95)"; ?> !important; }
    header #header-top #header-top_right #header-top_right_menu .menu li a { font-family: <?php echo $GLOBALS['font_paragraph']; ?>; }
    header #header-top #header-top_right #header-top_right_menu .menu li a::before { background:<?php echo $color_secondary_1; ?>; }
    header #header-top #header-top_right #header-top_right_menu .menu li.nav-contact a { background: white; color:#09472C; }
    header #header-top #header-top_right #header-top_right_menu .menu li.nav-contact a:hover { background: #082e1e !important; color: white !important; }
    header #header-top #header-top_right #header-top_right_menu .menu li .sub-menu { background: <?php echo $color_page_bg; ?>; border: solid 1px <?php echo $body_font_color; ?>; }
    header #header-top #header-top_right .navbar-form-search .search-form-container.hdn .search-input-group .btn { background: <?php echo $color_secondary_1; ?>; }
    header .navbar-form-search .form-control { font-family: <?php echo $GLOBALS['font_paragraph']; ?>; }
    header .navbar-form-search .icon-search-icon:before { color:<?php echo $color_primary_2; ?>; }

    /* body */
    .body-container { background:<?php echo $color_page_bg; ?> !important; }
    .body-container p { font-family: <?php echo $GLOBALS['font_paragraph']; ?>; color:<?php echo $body_font_color; ?>; font-weight:300; }
    .body-container h1 { font-family: <?php echo $GLOBALS['font_H1']; ?> !important; color:<?php echo $body_font_color; ?>; }
    .body-container h2 { font-family: <?php echo $GLOBALS['font_H2']; ?>; }
    .body-container h3 { font-family: <?php echo $GLOBALS['font_H3']; ?>; }
    .body-container h4 { font-family: <?php echo $GLOBALS['font_H4']; ?>; }
    .body-container ul li { font-family: <?php echo $GLOBALS['font_paragraph']; ?>; color:<?php echo $body_font_color; ?>; font-weight:300; }

    /* blocks */
    .awards { background: none !important; }
    .banner .banner-gradient { background:linear-gradient(0deg, <?php echo "rgba(" . $r . ", " . $g . ", " . $b . ",1)"; ?> 0%, <?php echo "rgba(" . $r . ", " . $g . ", " . $b . ",.9)"; ?> 100%); opacity:.<?php echo $color_banner_gradient_opacity; ?> }
    .banner h1 { font-family: <?php echo $GLOBALS['font_H1']; ?> !important; color:<?php echo $color_banner_fonts; ?> !important; }
       
    /* sidebar */
    .sidebar-block .testimonial-block { background:<?php echo $color_primary_1; ?> !important; }
    .sidebar-block .sidebar-spacer { border-bottom: 1px solid <?php echo $color_primary_1; ?>; }
    .sidebar-block .sidebar-header { color: #128E5A;  font-family: <?php echo $GLOBALS['font_paragraph']; ?>; }
    .sidebar-block #menu-practice-areas-menu li, .sidebar-block #menu-evergreen-practice-areas-menu li { border-bottom: 1px solid <?php echo $color_primary_1; ?>; }
    .sidebar-block #menu-practice-areas-menu li a, .sidebar-block #menu-evergreen-practice-areas-menu li a { font-family:<?php echo $GLOBALS['font_paragraph']; ?>; color:<?php echo $body_font_color; ?>; }
    .sidebar-block #menu-practice-areas-menu li a:hover, .sidebar-block #menu-evergreen-practice-areas-menu li a:hover { font-weight:bold; }
    .sidebar-block .sidebar-more a { color:<?php echo $color_primary_1; ?>; }
    .sidebar-block .sidebar-more a:hover { color:<?php echo $color_primary_2; ?>; }
    .sidebar-block .sidebar-more:hover span { color:<?php echo $color_primary_2; ?>; }


    /* homepage */
    .home #hp-banner .subhead { font-family: <?php echo $GLOBALS['font_primary']; ?>; }

    /* blog landing */
    .blog article .meta-content .blog-date { color: #fff; }

    /* case results archive */
    .post-type-archive-results .banner .column-50.result .result-main { background: white; }
    .post-type-archive-results .banner .column-50.result .accordions { background: #00378D; }

    /* testimonials block */
    #testimonial h2, #testimonial h3, #testimonial h4, #testimonial p { color: #082E1E; }
    #testimonial p.testimonial-callout { color: #fff; }

    /* pre-footer */
    #pre-footer h2, #pre-footer h3, #pre-footer h4, #pre-footer p { color: <?php echo $color_primary_1; ?>; }

    /* footer */
    .footer p, .footer ul li a { font-family: <?php echo $GLOBALS['font_paragraph']; ?>; }
    .footer p a:hover { color: <?php echo $color_primary_2; ?>; }
    .footer .container .columns a.social-link span { background-color: <?php echo $color_page_bg; ?> !important; }
    .footer .container .columns a.social-link span:hover { background-color: #408ADF !important; }
    .footer .footer-utility .utility a { font-family: <?php echo $GLOBALS['font_paragraph']; ?>; }

    .pagination .nav-links a { 
        color: white; 
        background:<?php echo $color_primary_1; ?>;
    }
    .pagination .nav-links a.prev:hover::before, 
    .pagination .nav-links a.next:hover::before { 
        background: <?php echo $color_primary_1; ?>; 
        color: white; }
    .pagination .nav-links a.prev::before, 
    .pagination .nav-links a.next::before {
        color: white;
        background: <?php echo $color_primary_1; ?>;
    }
    .pagination .nav-links .page-numbers {
        color: <?php echo $color_primary_1; ?>;
        font-family: <?php echo $GLOBALS['font_paragraph']; ?>;
        background:white;
    }

    @media screen and (max-width:1024px) {
        header #header-top #header-top_right #header-top_menu .menu { background:<?php echo $color_primary_1; ?>; }
        header #header-top #header-top_right #header-top_menu .menu li:hover ul.sub-menu { background:<?php echo $color_secondary_1; ?>; }
    }

</style>