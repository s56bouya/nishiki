/*!
 * Overlay
 */
jQuery(function() {
    var e = jQuery("#search-button");
    var s = jQuery("#search-overlay").find(".close");
    var i = jQuery("#menu-button");
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
        jQuery("#search-overlay").addClass("panel-open");
        var e = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -e + "px"
        });
    });
    s.click(function() {
        jQuery("#search-overlay").removeClass("display");
        jQuery("#search-overlay").removeClass("panel-open");
        jQuery("#search-overlay").addClass("panel-close");
        jQuery(".site-info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var e = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-e);
        clearTimeout(u);
        u = setTimeout(function() {
            setTimeout(function() {
                jQuery("#search-overlay").removeClass("panel-close");
            }, 200);
        }, d / 3);
    });
    i.click(function(e) {
        jQuery("#menu-overlay").addClass("display");
        jQuery("#menu-overlay").addClass("panel-open");
        var s = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -s + "px"
        });
    });
    a.click(function(e) {
        jQuery("#menu-overlay").removeClass("display");
        jQuery("#menu-overlay").removeClass("panel-open");
        jQuery("#menu-overlay").addClass("panel-close");
        jQuery(".site_info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var s = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-s);
        clearTimeout(u);
        u = setTimeout(function() {
            setTimeout(function() {
                jQuery("#menu-overlay").removeClass("panel-close");
            }, 200);
        }, d / 3);
    });
    jQuery("#menu-overlay .menu-item-has-children").each(function() {
        jQuery(this).prepend('<i class="icomoon icon-arrow-down"></i>');
    });
    jQuery("#menu-overlay i").click(function() {
        jQuery(this).siblings("ul").slideToggle(300);
        jQuery(this).parent().toggleClass("active");
    });
    var l = jQuery("#menu-collapse");
    var t = jQuery("#menu-collapse-button");
    var o = l.find(".close");
    var c = 768;
    var d = 1e3;
    var u = null;
    t.click(function(e) {
        l.addClass("panel-open");
        var s = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -s + "px"
        });
    });
    l.find(".menu-item-has-children").each(function() {
        jQuery(this).children("a").append('<span><i class="icomoon icon-arrow-down"></i></span>');
    });
    l.find("ul span").click(function(e) {
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
        s.hasClass("active") ? v(s) : m(s);
    });
    function m(e) {
        e.addClass("active");
    }
    function v(e) {
        e.removeClass("active");
    }
    o.click(function(e) {
        l.removeClass("panel-open");
        l.addClass("panel-close");
        if (jQuery("#masthead").hasClass("fixed")) {
            var s = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-s);
        clearTimeout(u);
        u = setTimeout(function() {
            setTimeout(function() {
                l.removeClass("panel-close");
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
                    if (l.hasClass("mobile")) {
                        l.find("li").siblings().find("ul").hide();
                        l.find("li").siblings().removeClass("active");
                        l.find("li").siblings().find("li").removeClass("active");
                        l.removeClass("mobile");
                    }
                } else {
                    if (l.hasClass("mobile") === false) {
                        l.addClass("mobile");
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
                            var n = s[a].querySelector(".header-image");
                            if (n) {
                                if (n.hasAttribute("data-src") === true) {
                                    n.src = n.getAttribute("data-src");
                                    n.removeAttribute("data-src");
                                }
                                if (s[a].hasAttribute("data-srcset") === true) {
                                    n.srcset = s[a].getAttribute("data-srcset");
                                    n.removeAttribute("data-srcset");
                                }
                                n.offsetTop;
                                n.classList.add("imgloaded");
                            }
                        } else {
                            if (s[a].hasAttribute("data-src") === true) {
                                s[a].classList.add("imgloaded");
                                var r = new Image();
                                r.src = s[a].getAttribute("data-src");
                                r.onload = nishiki_imgloaded(s[a], r);
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