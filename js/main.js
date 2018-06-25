/*!
 * Overlay
 */
jQuery(function() {
    var e = jQuery("#search-button");
    var s = jQuery("#search-overlay").find(".close");
    var i = jQuery("#menu-button");
    var a = jQuery("#menu-overlay").find(".close");
    var r = 0;
    var n = 0;
    var t = "window";
    if (jQuery("#wpadminbar").length > 0) {
        r = document.getElementById("wpadminbar").offsetHeight;
    }
    if (jQuery("#masthead").hasClass("fixed")) {
        t = "#page";
        n = document.getElementById("masthead").offsetHeight;
    }
    var l = n + r;
    jQuery("a[href^=#]").click(function() {
        var e = jQuery(this).attr("href");
        var s = jQuery(e == "#" || e == "" ? "html" : e);
        var i = s.offset().top - l;
        jQuery("html, body").animate({
            scrollTop: i
        }, 500, "swing");
        return false;
    });
    e.click(function() {
        jQuery("#search-overlay").addClass("display");
        jQuery("#search-overlay").addClass("panel-open");
        var e = jQuery(window).scrollTop() - r;
        jQuery(t).addClass("nav-open").css({
            top: -e + "px"
        });
    });
    s.click(function() {
        jQuery("#search-overlay").removeClass("display");
        jQuery("#search-overlay").removeClass("panel-open");
        jQuery("#search-overlay").addClass("panel-close");
        jQuery(".site-info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var e = jQuery(t).css("top").replace("px", "") - r;
        }
        jQuery(t).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-e);
        clearTimeout(v);
        v = setTimeout(function() {
            setTimeout(function() {
                jQuery("#search-overlay").removeClass("panel-close");
            }, 200);
        }, m / 3);
    });
    i.click(function(e) {
        jQuery("#menu-overlay").addClass("display");
        jQuery("#menu-overlay").addClass("panel-open");
        var s = jQuery(window).scrollTop() - r;
        jQuery(t).addClass("nav-open").css({
            top: -s + "px"
        });
    });
    a.click(function(e) {
        jQuery("#menu-overlay").removeClass("display");
        jQuery("#menu-overlay").removeClass("panel-open");
        jQuery("#menu-overlay").addClass("panel-close");
        jQuery(".site_info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var s = jQuery(t).css("top").replace("px", "") - r;
        }
        jQuery(t).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-s);
        clearTimeout(v);
        v = setTimeout(function() {
            setTimeout(function() {
                jQuery("#menu-overlay").removeClass("panel-close");
            }, 200);
        }, m / 3);
    });
    jQuery("#menu-overlay .menu-item-has-children").each(function() {
        jQuery(this).prepend('<i class="icomoon icon-arrow-down"></i>');
    });
    jQuery("#menu-overlay i").click(function() {
        jQuery(this).siblings("ul").slideToggle(300);
        jQuery(this).parent().toggleClass("active");
    });
    var o = jQuery("#menu-collapse");
    var c = jQuery("#menu-collapse-button");
    var d = o.find(".close");
    var u = 768;
    var m = 1e3;
    var v = null;
    c.click(function(e) {
        o.addClass("panel-open");
        var s = jQuery(window).scrollTop() - r;
        jQuery(t).addClass("nav-open").css({
            top: -s + "px"
        });
    });
    o.find(".menu-item-has-children").each(function() {
        jQuery(this).children("a").append('<span><i class="icomoon icon-arrow-down"></i></span>');
    });
    o.find("ul span").click(function(e) {
        e.preventDefault();
        var s = jQuery(this).parent().parent();
        var i = s.parent().parent();
        if (i.is("#menu-collapse") && i.hasClass("mobile") === false) {
            if (s.hasClass("nav-selected")) {
                s.removeClass("nav-selected");
            } else {
                i.find("li").removeClass("nav-selected");
                s.siblings().find("ul").hide();
                s.siblings().removeClass("active");
                s.siblings().find("li").removeClass("active");
                s.addClass("nav-selected");
            }
        }
        s.children("ul").slideToggle(300);
        s.hasClass("active") ? h(s) : f(s);
    });
    function f(e) {
        e.addClass("active");
    }
    function h(e) {
        e.removeClass("active");
    }
    d.click(function(e) {
        o.removeClass("panel-open");
        o.addClass("panel-close");
        if (jQuery("#masthead").hasClass("fixed")) {
            var s = jQuery(t).css("top").replace("px", "") - r;
        }
        jQuery(t).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-s);
        clearTimeout(v);
        v = setTimeout(function() {
            setTimeout(function() {
                o.removeClass("panel-close");
            }, 200);
        }, m / 3);
    });
    nishiki_registerListener("load", y);
    nishiki_registerListener("resize", y);
    function y() {
        clearTimeout(v);
        v = setTimeout(function() {
            setTimeout(function() {
                var e = document.documentElement.clientWidth;
                if (e >= u) {
                    if (o.hasClass("mobile")) {
                        o.find("li").siblings().find("ul").hide();
                        o.find("li").siblings().removeClass("active");
                        o.find("li").siblings().find("li").removeClass("active");
                        o.removeClass("mobile");
                    }
                } else {
                    if (o.hasClass("mobile") === false) {
                        o.addClass("mobile");
                    }
                }
            }, 200);
        }, m / 5);
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
function nishiki_registerListener(e, s) {
    if (window.addEventListener) {
        window.addEventListener(e, s);
    } else {
        window.attachEvent("on" + e, s);
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
            var e = document.getElementById("main");
            if (e) {
                var s = e.getElementsByTagName("section");
                var i;
                for (var a = 0; a < s.length; a++) {
                    if (nishiki_inView(s[a]) && s[a].classList.contains("imgloaded") === false) {
                        if (s[a].classList.contains("has-header-image") || s[a].classList.contains("main-video")) {
                            var r = s[a].querySelector(".header-image");
                            if (r) {
                                if (r.hasAttribute("data-src") === true) {
                                    r.src = r.getAttribute("data-src");
                                    r.removeAttribute("data-src");
                                }
                                if (s[a].hasAttribute("data-srcset") === true) {
                                    r.srcset = s[a].getAttribute("data-srcset");
                                    r.removeAttribute("data-srcset");
                                }
                                r.offsetTop;
                                r.classList.add("imgloaded");
                            }
                        } else {
                            if (s[a].hasAttribute("data-src") === true) {
                                s[a].classList.add("imgloaded");
                                var n = new Image();
                                n.src = s[a].getAttribute("data-src");
                                n.onload = nishiki_imgloaded(s[a], n);
                            }
                        }
                    }
                }
            }
        }, 100);
    }, speed / 3);
}

/*!
 * imgloaded
 */
function nishiki_imgloaded(e, s) {
    e.appendChild(s);
    s.offsetTop;
    s.classList.add("imgloaded");
}

/*!
 * inView
 */
function nishiki_inView(e) {
    var s = e.getBoundingClientRect();
    return s.bottom >= 0 && s.right >= 0 && s.top <= (window.innerHeight || document.documentElement.clientHeight) && s.left <= (window.innerWidth || document.documentElement.clientWidth);
}