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
    var t = "window";
    if (jQuery("#masthead").hasClass("fixed")) {
        t = "#page";
    }
    e.click(function() {
        jQuery("#search-overlay").addClass("display");
        var e = jQuery(window).scrollTop() - n;
        jQuery(t).addClass("nav-open").css({
            top: -e + "px"
        });
    });
    i.click(function() {
        jQuery("#search-overlay").removeClass("display");
        jQuery(".site-info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var e = jQuery(t).css("top").replace("px", "") - n;
        }
        jQuery(t).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-e);
    });
    s.click(function(e) {
        jQuery("#menu-overlay").addClass("display");
        var i = jQuery(window).scrollTop() - n;
        jQuery(t).addClass("nav-open").css({
            top: -i + "px"
        });
    });
    a.click(function(e) {
        jQuery("#menu-overlay").removeClass("display");
        jQuery(".site_info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var i = jQuery(t).css("top").replace("px", "") - n;
        }
        jQuery(t).removeClass("nav-open").css({
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
    var r = jQuery("#menu-collapse");
    var l = jQuery("#menu-collapse-button");
    var o = r.find(".close");
    var d = 768;
    var c = 1e3;
    var u = null;
    l.click(function(e) {
        r.addClass("panel-open");
        var i = jQuery(window).scrollTop() - n;
        jQuery(t).addClass("nav-open").css({
            top: -i + "px"
        });
    });
    r.find(".menu-item-has-children").each(function() {
        jQuery(this).children("a").append('<span><i class="icomoon icon-arrow-down"></i></span>');
    });
    r.find("ul span").click(function(e) {
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
        i.hasClass("active") ? v(i) : m(i);
    });
    function m(e) {
        e.addClass("active");
    }
    function v(e) {
        e.removeClass("active");
    }
    o.click(function(e) {
        r.removeClass("panel-open");
        r.addClass("panel-close");
        if (jQuery("#masthead").hasClass("fixed")) {
            var i = jQuery(t).css("top").replace("px", "") - n;
        }
        jQuery(t).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-i);
        clearTimeout(u);
        u = setTimeout(function() {
            setTimeout(function() {
                r.removeClass("panel-close");
            }, 200);
        }, c / 3);
    });
    nishiki_registerListener("load", f);
    nishiki_registerListener("resize", f);
    function f() {
        clearTimeout(u);
        u = setTimeout(function() {
            setTimeout(function() {
                var e = document.documentElement.clientWidth;
                if (e >= d) {
                    if (r.hasClass("mobile")) {
                        r.find("li").siblings().find("ul").hide();
                        r.find("li").siblings().removeClass("active");
                        r.find("li").siblings().find("li").removeClass("active");
                        r.removeClass("mobile");
                    }
                } else {
                    if (r.hasClass("mobile") === false) {
                        r.addClass("mobile");
                    }
                }
            }, 200);
        }, c / 5);
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
                var s;
                for (var a = 0; a < i.length; a++) {
                    if (nishiki_inView(i[a]) && i[a].classList.contains("imgloaded") === false) {
                        if (i[a].classList.contains("header-image")) {
                            if (i[a].hasAttribute("data-src") === true) {
                                i[a].src = i[a].getAttribute("data-src");
                                i[a].removeAttribute("data-src");
                            }
                            if (i[a].hasAttribute("data-srcset") === true) {
                                i[a].srcset = i[a].getAttribute("data-srcset");
                                i[a].removeAttribute("data-srcset");
                            }
                            i[a].offsetTop;
                            i[a].classList.add("imgloaded");
                        } else {
                            s = i[a].parentNode;
                            if (s.hasAttribute("data-src") === true) {
                                i[a].classList.add("imgloaded");
                                var n = new Image();
                                n.src = s.getAttribute("data-src");
                                n.onload = nishiki_imgloaded(s, n);
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