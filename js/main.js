/*!
 * Overlay
 */
jQuery(function() {
    var e = jQuery("#search_button");
    var i = jQuery("#search_overlay").find(".close");
    var r = jQuery("#menu_button");
    var s = jQuery("#menu_overlay").find(".close");
    var t = 0;
    if (jQuery("#wpadminbar").length > 0) {
        t = document.getElementById("wpadminbar").offsetHeight;
    }
    var a = "window";
    if (jQuery("#masthead").hasClass("fixed")) {
        a = "#page";
    }
    e.click(function() {
        jQuery("#search_overlay").addClass("display");
        var e = jQuery(window).scrollTop() - t;
        jQuery(a).addClass("nav_open").css({
            top: -e + "px"
        });
    });
    i.click(function() {
        jQuery("#search_overlay").removeClass("display");
        jQuery(".site_info a").removeClass("overlay");
        var e = jQuery(a).css("top").replace("px", "") - t;
        jQuery(a).removeClass("nav_open").css({
            top: 0
        });
        jQuery(window).scrollTop(-e);
    });
    r.click(function(e) {
        jQuery("#menu_overlay").addClass("display");
        var i = jQuery(window).scrollTop() - t;
        jQuery(a).addClass("nav_open").css({
            top: -i + "px"
        });
    });
    s.click(function(e) {
        jQuery("#menu_overlay").removeClass("display");
        jQuery(".site_info a").removeClass("overlay");
        var i = jQuery(a).css("top").replace("px", "") - t;
        jQuery(a).removeClass("nav_open").css({
            top: 0
        });
        jQuery(window).scrollTop(-i);
    });
    jQuery("#menu_overlay .menu-item-has-children").each(function() {
        jQuery(this).prepend('<i class="icomoon icon-arrow-down"></i>');
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

/*!
 * Event Listener
 */
function nishiki_registerListener(e, i) {
    if (window.addEventListener) {
        window.addEventListener(e, i);
    } else {
        window.attachEvent("on" + e, i);
    }
}

var speed = 1e3;

var timer = null;

nishiki_registerListener("load", nishiki_lazyLoad);

nishiki_registerListener("scroll", nishiki_lazyLoad);

/*!
 * Lazyload
 */
function nishiki_lazyLoad() {
    clearTimeout(timer);
    timer = setTimeout(function() {
        setTimeout(function() {
            var e = document.getElementById("content");
            if (e) {
                var i = e.getElementsByTagName("img");
                for (var r = 0; r < i.length; r++) {
                    if (nishiki_inView(i[r]) && i[r].classList.contains("imgloaded") === false) {
                        if (i[r].hasAttribute("data-src") === true) {
                            i[r].src = i[r].getAttribute("data-src");
                            i[r].removeAttribute("data-src");
                            i[r].parentNode.classList.add("show");
                        }
                        if (i[r].hasAttribute("data-srcset") === true) {
                            i[r].srcset = i[r].getAttribute("data-srcset");
                            i[r].removeAttribute("data-srcset");
                        }
                        i[r].classList.add("imgloaded");
                    }
                }
            }
        }, 100);
    }, speed / 3);
}

/*!
 * inView
 */
function nishiki_inView(e) {
    var i = e.getBoundingClientRect();
    return i.bottom >= 0 && i.right >= 0 && i.top <= (window.innerHeight || document.documentElement.clientHeight) && i.left <= (window.innerWidth || document.documentElement.clientWidth);
}