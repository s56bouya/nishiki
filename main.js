/*!
 * Overlay
 */
jQuery(function() {
    var e = jQuery("#search_button");
    var r = jQuery("#search_overlay").find(".close");
    var s = jQuery("#menu_button");
    var a = jQuery("#menu_overlay").find(".close");
    var l = 0;
    if (jQuery("#wpadminbar").length > 0) {
        l = document.getElementById("wpadminbar").offsetHeight;
    }
    var i = "body";
    if (jQuery("#masthead").hasClass("fixed")) {
        i = "#page";
    }
    e.click(function() {
        jQuery("#search_overlay").addClass("display");
        var e = jQuery("body").scrollTop() - l;
        jQuery(i).addClass("nav_open").css({
            top: -e + "px"
        });
    });
    r.click(function() {
        jQuery("#search_overlay").removeClass("display");
        jQuery(".site_info a").removeClass("overlay");
        var e = jQuery(i).css("top").replace("px", "") - l;
        jQuery(i).removeClass("nav_open").css({
            top: 0
        });
        jQuery("body").scrollTop(-e);
    });
    s.click(function(e) {
        jQuery("#menu_overlay").addClass("display");
        var r = jQuery("body").scrollTop() - l;
        jQuery(i).addClass("nav_open").css({
            top: -r + "px"
        });
    });
    a.click(function(e) {
        jQuery("#menu_overlay").removeClass("display");
        jQuery(".site_info a").removeClass("overlay");
        var r = jQuery(i).css("top").replace("px", "") - l;
        jQuery(i).removeClass("nav_open").css({
            top: 0
        });
        jQuery("body").scrollTop(-r);
    });
    jQuery("#menu_overlay .menu-item-has-children").each(function() {
        jQuery(this).prepend('<i class="material-icons">expand_more</i>');
    });
    jQuery("#menu_overlay i").click(function() {
        jQuery(this).siblings("ul").slideToggle(300);
        jQuery(this).parent().toggleClass("active");
    });
});

/*!
 * Fixed Header
 */
var resize_speed = 1e3;

var resize_timer = null;

var scroll_height = 100;

try {
    window.addEventListener("scroll", nishiki_fixed_header_scrolled, false);
} catch (e) {
    window.attachEvent("onscroll", nishiki_fixed_header_scrolled);
}

function nishiki_fixed_header_scrolled() {
    if (jQuery("#masthead").hasClass("fixed") && jQuery("#page").hasClass("nav_open") == false) {
        clearTimeout(resize_timer);
        resize_timer = setTimeout(function() {
            setTimeout(function() {
                nishiki_get_scroll_height();
            }, 200);
        }, resize_speed / 3);
    }
}

/*!
 * Scrolled
 */
function nishiki_get_scroll_height() {
    var e = jQuery(window).scrollTop();
    if (e > scroll_height) {
        jQuery("body").addClass("scrolled");
    } else {
        jQuery("body").removeClass("scrolled");
    }
}