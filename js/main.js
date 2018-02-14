/*!
 * Overlay
 */
jQuery(function() {
    var e = jQuery("#search-button");
    var i = jQuery("#search-overlay").find(".close");
    var s = jQuery("#menu-button");
    var a = jQuery("#menu-overlay").find(".close");
    var n = 0;
    if (jQuery("#wpadminbar").length > 0) {
        n = document.getElementById("wpadminbar").offsetHeight;
    }
    var r = "window";
    if (jQuery("#masthead").hasClass("fixed")) {
        r = "#page";
    }
    e.click(function() {
        jQuery("#search-overlay").addClass("display");
        var e = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -e + "px"
        });
    });
    i.click(function() {
        jQuery("#search-overlay").removeClass("display");
        jQuery(".site-info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var e = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-e);
    });
    s.click(function(e) {
        jQuery("#menu-overlay").addClass("display");
        var i = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -i + "px"
        });
    });
    a.click(function(e) {
        jQuery("#menu-overlay").removeClass("display");
        jQuery(".site_info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var i = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-i);
    });
    jQuery("#menu-overlay .menu-item-has-children").each(function() {
        jQuery(this).prepend('<i class="icomoon icon-arrow-down"></i>');
    });
    jQuery("#menu-overlay i").click(function() {
        jQuery(this).siblings("ul").slideToggle(300);
        jQuery(this).parent().toggleClass("active");
    });
    var t = jQuery("#menu-collapse");
    var l = jQuery("#menu-collapse-button");
    var o = t.find(".close");
    var c = 768;
    var d = 1e3;
    var u = null;
    l.click(function(e) {
        t.addClass("panel-open");
        var i = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -i + "px"
        });
    });
    t.find(".menu-item-has-children").each(function() {
        jQuery(this).children("a").append('<span><i class="icomoon icon-arrow-down"></i></span>');
    });
    t.find("ul span").click(function(e) {
        e.preventDefault();
        var i = jQuery(this).parent().parent();
        var s = i.parent().parent();
        if (s.is("#menu-collapse") && s.hasClass("mobile") === false) {
            if (i.hasClass("nav-selected")) {
                i.removeClass("nav-selected");
            } else {
                s.find("li").removeClass("nav-selected");
                i.siblings().find("ul").hide();
                i.siblings().removeClass("active");
                i.siblings().find("li").removeClass("active");
                i.addClass("nav-selected");
            }
        }
        i.children("ul").slideToggle(300);
        i.hasClass("active") ? m(i) : v(i);
    });
    function v(e) {
        e.addClass("active");
    }
    function m(e) {
        e.removeClass("active");
    }
    o.click(function(e) {
        t.removeClass("panel-open");
        t.addClass("panel-close");
        if (jQuery("#masthead").hasClass("fixed")) {
            var i = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-i);
        clearTimeout(u);
        u = setTimeout(function() {
            setTimeout(function() {
                t.removeClass("panel-close");
            }, 200);
        }, d / 3);
    });
    nishiki_registerListener("load", f);
    nishiki_registerListener("resize", f);
    function f() {
        clearTimeout(u);
        u = setTimeout(function() {
            setTimeout(function() {
                var e = document.documentElement.clientWidth;
                if (e >= c) {
                    if (t.hasClass("mobile")) {
                        t.find("li").siblings().find("ul").hide();
                        t.find("li").siblings().removeClass("active");
                        t.find("li").siblings().find("li").removeClass("active");
                        t.removeClass("mobile");
                    }
                } else {
                    if (t.hasClass("mobile") === false) {
                        t.addClass("mobile");
                    }
                }
            }, 200);
        }, d / 5);
    }
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
    if (jQuery("#masthead").hasClass("fixed") && jQuery("#page").hasClass("nav-open") === false) {
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
                for (var s = 0; s < i.length; s++) {
                    if (nishiki_inView(i[s]) && i[s].classList.contains("imgloaded") === false) {
                        if (i[s].hasAttribute("data-src") === true) {
                            i[s].src = i[s].getAttribute("data-src");
                            i[s].removeAttribute("data-src");
                        }
                        if (i[s].hasAttribute("data-srcset") === true) {
                            i[s].srcset = i[s].getAttribute("data-srcset");
                            i[s].removeAttribute("data-srcset");
                        }
                        if (i[s].classList.contains("header-image")) {
                            var a = i[s].parentNode.parentNode.parentNode;
                        } else {
                            var a = i[s].parentNode;
                        }
                        a.classList.add("show");
                        i[s].classList.add("imgloaded");
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