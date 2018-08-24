/*!
 * Overlay
 */
jQuery(function() {
    var e = jQuery("#search-button");
    var i = jQuery("#search-overlay").find(".close");
    var s = jQuery("#menu-button");
    var a = jQuery("#menu-overlay").find(".close");
    var n = 0;
    var t = 0;
    var r = "window";
    if (jQuery("#wpadminbar").length > 0) {
        n = document.getElementById("wpadminbar").offsetHeight;
    }
    if (jQuery("#masthead").hasClass("fixed")) {
        r = "#page";
        t = document.getElementById("masthead").offsetHeight;
    }
    var l = t + n;
    jQuery('a[href^="#"]').not(".noscroll").click(function() {
        var e = jQuery(this).attr("href");
        var i = jQuery(e == "#" || e == "" ? "html" : e);
        var s = i.offset().top - l;
        jQuery("html, body").animate({
            scrollTop: s
        }, 500, "swing");
        return false;
    });
    e.click(function() {
        jQuery("#search-overlay").addClass("panel-open");
        var e = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -e + "px"
        });
    });
    i.click(function() {
        jQuery("#search-overlay").removeClass("panel-open").addClass("panel-close");
        jQuery(".site-info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var e = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
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
    s.click(function(e) {
        jQuery("#menu-overlay").addClass("panel-open");
        var i = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -i + "px"
        });
    });
    a.click(function(e) {
        jQuery("#menu-overlay").removeClass("panel-open").addClass("panel-close");
        jQuery(".site_info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var i = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-i);
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
        var i = jQuery(window).scrollTop() - n;
        jQuery(r).addClass("nav-open").css({
            top: -i + "px"
        });
    });
    o.find(".menu-item-has-children").each(function() {
        jQuery(this).children("a").append('<span><i class="icomoon icon-arrow-down"></i></span>');
    });
    o.find("ul span").click(function(e) {
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
        i.hasClass("active") ? h(i) : f(i);
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
            var i = jQuery(r).css("top").replace("px", "") - n;
        }
        jQuery(r).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-i);
        clearTimeout(v);
        v = setTimeout(function() {
            setTimeout(function() {
                o.removeClass("panel-close");
            }, 200);
        }, m / 3);
    });
    nishiki_registerListener("load", p);
    nishiki_registerListener("resize", p);
    function p() {
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
            var e = document.getElementById("main");
            if (e) {
                var i = e.getElementsByTagName("section");
                var s;
                for (var a = 0; a < i.length; a++) {
                    if (nishiki_inView(i[a]) && i[a].classList.contains("imgloaded") === false) {
                        if (i[a].classList.contains("has-header-image") || i[a].classList.contains("main-video")) {
                            var n = i[a].querySelector(".header-image");
                            if (n) {
                                if (n.hasAttribute("data-src") === true) {
                                    n.src = n.getAttribute("data-src");
                                    n.removeAttribute("data-src");
                                }
                                if (i[a].hasAttribute("data-srcset") === true) {
                                    n.srcset = i[a].getAttribute("data-srcset");
                                    n.removeAttribute("data-srcset");
                                }
                                n.offsetTop;
                                n.classList.add("imgloaded");
                            }
                        } else {
                            if (i[a].hasAttribute("data-src") === true) {
                                i[a].classList.add("imgloaded");
                                var t = new Image();
                                t.src = i[a].getAttribute("data-src");
                                t.onload = nishiki_imgloaded(i[a], t);
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
function nishiki_imgloaded(e, i) {
    e.appendChild(i);
    i.offsetTop;
    i.classList.add("imgloaded");
}

/*!
 * inView
 */
function nishiki_inView(e) {
    var i = e.getBoundingClientRect();
    return i.bottom >= 0 && i.right >= 0 && i.top <= (window.innerHeight || document.documentElement.clientHeight) && i.left <= (window.innerWidth || document.documentElement.clientWidth);
}