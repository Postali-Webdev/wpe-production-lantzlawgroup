/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    // set all needed classes when we start
    $('.sub-menu').addClass('closed');

    //Hamburger animation
    $('.toggle-nav').click(function() {
        $(this).toggleClass('active');
        $('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').toggleClass('opened');
        $('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').toggleClass('active'); 
        $('.sub-menu').removeClass('opened');
        $('.sub-menu').addClass('closed');
        return false;
    });
     
    //Close navigation on anchor tap
    $('.active').click(function() {	
        $('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').addClass('closed');
        $('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').toggleClass('opened');
        $('#menu-main-menu .sub-menu, #menu-global-menu .sub-menu, #menu-evergreen-main-menu .sub-menu').removeClass('opened');
        $('#menu-main-menu .sub-menu, #menu-global-menu .sub-menu, #menu-evergreen-main-menu .sub-menu').addClass('closed');
    });	

    //Mobile menu accordion toggle for sub pages
    $('#menu-main-menu > li.menu-item-has-children, #menu-global-menu > li.menu-item-has-children, #menu-evergreen-main-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle"><span class="icon-chevron-right"></span></div>');
    $('#menu-main-menu > li.menu-item-has-children > .sub-menu, #menu-global-menu > li.menu-item-has-children > .sub-menu, #menu-evergreen-main-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="child-close"><span class="icon-chevron-left"></span> back</div>');

    //Mobile menu accordion toggle for third-level pages
    $('#menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children, #menu-global-menu #menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children, #menu-evergreen-main-menu #menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle2"<span class="icon-chevron-right"></span></div>');
    $('#menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu, #menu-global-menu #menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu, #menu-evergreen-main-menu #menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="tertiary-close">&nbsp;</div>');

    // $('#menu-main-menu .accordion-toggle, #menu-global-menu .accordion-toggle, #menu-evergreen-main-menu .accordion-toggle').click(function(event) {
    $('#menu-main-menu > li.menu-item-has-children, #menu-global-menu > li .menu-item-has-children, #menu-evergreen-main-menu > li .menu-item-has-children').on('click', function(event) {
        // event.preventDefault();
        if( !$(event.target).is('a') && !$(event.target).hasClass('child-close')) {
            $(this).find('.sub-menu').addClass('opened');
            $(this).find('.sub-menu').removeClass('closed');
        }
    });

    $('#menu-main-menu .accordion-toggle2, #menu-global-menu .accordion-toggle2, #menu-evergreen-main-menu .accordion-toggle2').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
    });

    $('.child-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    $('.tertiary-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    // desktop child click close parent subnav
    $('#menu-main-menu > li.menu-item-has-children > .sub-menu > li > a').click(function(event) {
        $(this).closest('.sub-menu').css('display', 'none');
    });

    //add button before child links on landing page
    $("<div class='all-pages'><span class='copy'>View All Pages</span> <span></span></div>").insertBefore('.children');
    $('.all-pages').click(function() {
        $(this).toggleClass("active");
        $(this).parent().find('.children').toggleClass("active");
        $(this).parent().find('.children').slideToggle(400);
	});

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
        $(this).parent().toggleClass("active");
    });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	$(document).ready(function() {
		$('.menu-item-has-children').on('focusin', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.css('display', 'block');

			$(this).find('.sub-menu > li:last-child').on('focusout', function() {
				subMenu.css('display', 'none');
			});
		});
	});

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-search-icon').addClass('icon-close-x');
						$('#menu-main-menu li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-search-icon');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

    // tab-through functionality
    $(document).ready(function() {
		$('.menu-item-has-children').on('focusin', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.addClass('show');

			$(this).find('.sub-menu > li:last-child').on('focusout', function() {
				subMenu.removeClass('show');
			});
			$(this).find('.sub-menu').on('mouseout', function() {
				subMenu.addClass('remove');
			});
		});
	});

});