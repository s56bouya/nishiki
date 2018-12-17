/*!
 * Overlay
 */
jQuery(function() {
    var e = jQuery("#search-button");
    var t = jQuery("#search-overlay").find(".close");
    var i = jQuery("#menu-button");
    var s = jQuery("#menu-overlay").find(".close");
    var r = 0;
    var n = 0;
    var a = "window";
    if (
jQuery("#wpadminbar").length > 0) {
        r = document.getElementById("wpadminbar").offsetHeight;
    }
    if (
jQuery("#masthead").hasClass("fixed")) {
        a = "#page";
        n = document.getElementById("masthead").offsetHeight;
    }

    var o = n + r;


    jQuery('a[href^="#"]').not(".noscroll,.woocommerce-tabs .stars a,.woocommerce-tabs .wc-tabs a,.reset_variations,.woocommerce-product-gallery__trigger").click(function() {
        if (!jQuery(this).parents("#menu-collapse").length) {
            var e = jQuery(this).attr("href");
            var t = jQuery(e == "#" || e == "" ? "html" : e);
            var i = t.offset().top - o;
            jQuery("html, body").animate({
                scrollTop: i
            }, 500, "swing");
            return false;
        }
    });
    e.click(function() {
        jQuery("#search-overlay").addClass("panel-open");


        var e = jQuery(window).scrollTop() - r;
        jQuery(a).addClass("nav-open").css({
            top: -e + "px"
        });
    });
    t.click(function() {
        jQuery("#search-overlay").removeClass("panel-open").addClass("panel-close");
        jQuery(".site-info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var e = jQuery(a).css("top").replace("px", "") - r;
        }
        jQuery(a).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-e);
        clearTimeout(m);
        m = setTimeout(function() {
            setTimeout(function() {
                jQuery("#search-overlay").removeClass("panel-close");
            }, 200);
        }, f / 3);
    });
    i.click(function(e) {
        jQuery("#menu-overlay").addClass("panel-open");


        var t = jQuery(window).scrollTop() - r;
        jQuery(a).addClass("nav-open").css({
            top: -t + "px"
        });
    });
    s.click(function(e) {
        jQuery("#menu-overlay").removeClass("panel-open").addClass("panel-close");
        jQuery(".site_info a").removeClass("overlay");
        if (jQuery("#masthead").hasClass("fixed")) {
            var t = jQuery(a).css("top").replace("px", "") - r;
        }
        jQuery(a).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-t);
        clearTimeout(m);
        m = setTimeout(function() {
            setTimeout(function() {
                jQuery("#menu-overlay").removeClass("panel-close");
            }, 200);
        }, f / 3);
    });
    jQuery("#menu-overlay .menu-item-has-children").each(function() {
        jQuery(this).prepend('<i class="icomoon icon-arrow-down"></i>');
    });
    jQuery("#menu-overlay i").click(function() {
        jQuery(this).siblings("ul").slideToggle(300);
        jQuery(this).parent().toggleClass("active");
    });



    var l = jQuery("#menu-collapse");
    var c = jQuery("#menu-collapse-button");
    var u = l.find(".close");
    var d = 768;


    var f = 1e3;
    var m = null;

    c.click(function(e) {
        l.addClass("panel-open");

        var t = jQuery(window).scrollTop() - r;
        jQuery(a).addClass("nav-open").css({
            top: -t + "px"
        });
    });
    l.find(".menu-item-has-children").each(function() {
        jQuery(this).children("a").append('<span><i class="icomoon icon-arrow-down"></i></span>');
    });


    l.find("ul span").click(function(e) {
        e.preventDefault();
        var t = jQuery(this).parent().parent();
        var i = t.parent().parent();
        if (


i.is("#menu-collapse") && i.hasClass("mobile") === false) {
            if (t.hasClass("nav-selected")) {

                t.removeClass("nav-selected");
            } else {

                i.find("li").removeClass("nav-selected");
                t.siblings().find("ul").hide();
                t.siblings().removeClass("active");
                t.siblings().find("li").removeClass("active");
                t.addClass("nav-selected");
            }
        }


        t.children("ul").slideToggle(300);

        t.hasClass("active") ? v(t) : g(t);
    });


    function g(e) {
        e.addClass("active");
    }

    function v(e) {
        e.removeClass("active");
    }

    u.click(function(e) {
        l.removeClass("panel-open");
        l.addClass("panel-close");
        if (jQuery("#masthead").hasClass("fixed")) {
            var t = jQuery(a).css("top").replace("px", "") - r;
        }
        jQuery(a).removeClass("nav-open").css({
            top: 0
        });
        jQuery(window).scrollTop(-t);
        clearTimeout(m);
        m = setTimeout(function() {
            setTimeout(function() {
                l.removeClass("panel-close");
            }, 200);
        }, f / 3);
    });



    nishiki_registerListener("load", p);
    nishiki_registerListener("resize", p);
    function p() {

        clearTimeout(m);
        m = setTimeout(function() {
            setTimeout(function() {
                var e = document.documentElement.clientWidth;
                if (
e >= d) {
                    if (
l.hasClass("mobile")) {
                        l.find("li").siblings().find("ul").hide();
                        l.find("li").siblings().removeClass("active");
                        l.find("li").siblings().find("li").removeClass("active");
                        l.removeClass("mobile");
                    }
                } else {
                    if (
l.hasClass("mobile") === false) {
                        l.addClass("mobile");
                    }
                }
            }, 200);
        }, f / 5);
    }
});

/*!
 * Fixed Header




 */ var resize_speed = 1e3;

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
 */ function nishiki_get_scroll_height() {
    var e = jQuery(window).scrollTop();
    if (e > scroll_height) {
        jQuery("body").addClass("scrolled");
    } else {
        jQuery("body").removeClass("scrolled");
    }
}

/*!
 * Event Listener
 */ function nishiki_registerListener(e, t) {
    if (window.addEventListener) {
        window.addEventListener(e, t);
    } else {
        window.attachEvent("on" + e, t);
    }
}

var speed = 1e3;

var timer = null;

nishiki_registerListener("load", nishiki_lazyLoad);

nishiki_registerListener("scroll", nishiki_lazyLoad);

/*!
 * Lazyload
 */ function nishiki_lazyLoad() {
    clearTimeout(timer);
    timer = setTimeout(function() {
        setTimeout(function() {
            var e = document.getElementById("main");
            if (
e) {
                var t = e.getElementsByTagName("section");
                var i;
                for (
var s = 0; s < t.length; s++) {
                    if (nishiki_inView(t[s]) && t[s].classList.contains("imgloaded") === false) {
                        if (

t[s].classList.contains("has-header-image") || t[s].classList.contains("main-video")) {

                            var r = t[s].querySelector(".header-image");
                            if (r) {
                                if (r.hasAttribute("data-src") === true) {
                                    r.src = r.getAttribute("data-src");
                                    r.removeAttribute("data-src");
                                }
                                if (
t[s].hasAttribute("data-srcset") === true) {
                                    r.srcset = t[s].getAttribute("data-srcset");
                                    r.removeAttribute("data-srcset");
                                }
                                r.offsetTop;
                                objectFitImages(r);
                                r.classList.add("imgloaded");
                            }
                        } else {
                            if (
t[s].hasAttribute("data-src") === true) {
                                t[s].classList.add("imgloaded");

                                var n = new Image();
                                n.src = t[s].getAttribute("data-src");
                                n.onload = nishiki_imgloaded(t[s], n);
                            }
                        }
                    }
                }
            }
        },


 100);
    }, speed / 3);
}

/*!
 * imgloaded

 */ function nishiki_imgloaded(e, t) {
    e.appendChild(t);
    t.offsetTop;
    objectFitImages(t);
    t.classList.add("imgloaded");
}

/*!
 * inView

 */ function nishiki_inView(e) {
    var t = e.getBoundingClientRect();




    return t.bottom >= 0 && t.right >= 0 && t.top <= (window.innerHeight || document.documentElement.clientHeight
) && t.left <= (window.innerWidth || document.documentElement.clientWidth);
}

/*!
 * object-fit-images 3.2.4


 */ var objectFitImages = function() {
    "use strict";

    var r = "bfred-it:object-fit-images";
    var n = /(object-fit|object-position)\s*:\s*([-.\w\s%]+)/g;
    var e = typeof Image === "undefined" ? {
        style: {
            "object-position": 1
        }
    } : new Image();
    var s = "object-fit" in e.style;
    var a = "object-position" in e.style;
    var o = "background-size" in e.style;
    var i = typeof e.currentSrc === "string";
    var l = e.getAttribute;
    var c = e.setAttribute;
    var u = false;
    function d(e, t) {
        return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='" + e + "' height='" + t + "'%3E%3C/svg%3E";
    }
    function f(e) {
        if (e.srcset && !i && window.picturefill) {
            var t = window.picturefill._;
            if (!e[t.ns] || !e[t.ns].evaled) {
                t.fillImg(e, {
                    reselect: true
                });
            }
            if (!e[t.ns].curSrc) {
                e[t.ns].supported = false;
                t.fillImg(e, {
                    reselect: true
                });
            }
            e.currentSrc = e[t.ns].curSrc || e.src;
        }
    }

    function m(e) {
        var t = getComputedStyle(e).fontFamily;
        var i;
        var s = {};
        while ((i = n.exec(t)) !== null) {
            s[i[1]] = i[2];
        }
        return s;
    }

    function g(e, t, i) {

        var s = d(t || 1, i || 0);
        if (

l.call(e, "src") !== s) {
            c.call(e, "src", s);
        }
    }

    function v(e, t) {
        if (

e.naturalWidth) {
            t(e);
        } else {
            setTimeout(v, 100, e, t);
        }
    }

    function p(t) {
        var e = m(t);
        var i = t[r];
        e["object-fit"] = e["object-fit"] || "fill";
        if (

!i.img) {
            if (
e["object-fit"] === "fill") {
                return;
            }
            if (




!i.skipTest && s && !e["object-position"]) {

                return;
            }
        }
        if (

!i.img) {
            i.img = new Image(t.width, t.height);
            i.img.srcset = l.call(t, "data-ofi-srcset") || t.srcset;
            i.img.src = l.call(t, "data-ofi-src") || t.src;



            c.call(t, "data-ofi-src", t.src);
            if (t.srcset) {
                c.call(t, "data-ofi-srcset", t.srcset);
            }

            g(t, t.naturalWidth || t.width, t.naturalHeight || t.height);
            if (

t.srcset) {
                t.srcset = "";
            }
            try {
                h(t);
            } catch (e) {
                if (window.console) {
                    console.warn("https://bit.ly/ofi-old-browser");
                }
            }
        }

        f(i.img);

        t.style.backgroundImage = 'url("' + (i.img.currentSrc || i.img.src).replace(/"/g, '\\"') + '")';
        t.style.backgroundPosition = e["object-position"] || "center";
        t.style.backgroundRepeat = "no-repeat";
        t.style.backgroundOrigin = "content-box";
        if (
/scale-down/.test(e["object-fit"])) {
            v(i.img, function() {
                if (i.img.naturalWidth > t.width || i.img.naturalHeight > t.height) {
                    t.style.backgroundSize = "contain";
                } else {
                    t.style.backgroundSize = "auto";
                }
            });
        } else {
            t.style.backgroundSize = e["object-fit"].replace("none", "auto").replace("fill", "100% 100%");
        }

        v(i.img, function(e) {
            g(t, e.naturalWidth, e.naturalHeight);
        });
    }

    function h(s) {
        var t = {
            get: function e(t) {
                return s[r].img[t ? t : "src"];
            },
            set: function e(t, i) {
                s[r].img[i ? i : "src"] = t;
                c.call(s, "data-ofi-" + i, t);
                p(s);
                return t;
            }
        };
        Object.defineProperty(s, "src", t);
        Object.defineProperty(s, "currentSrc", {
            get: function() {
                return t.get("currentSrc");
            }
        });
        Object.defineProperty(s, "srcset", {
            get: function() {
                return t.get("srcset");
            },
            set: function(e) {
                return t.set(e, "srcset");
            }
        });
    }
    function t() {
        function i(e, t) {
            return e[r] && e[r].img && (t === "src" || t === "srcset") ? e[r].img : e;
        }
        if (!a) {
            HTMLImageElement.prototype.getAttribute = function(e) {
                return l.call(i(this, e), e);
            };
            HTMLImageElement.prototype.setAttribute = function(e, t) {
                return c.call(i(this, e), e, String(t));
            };
        }
    }
    function y(e, t) {
        var i = !u && !e;
        t = t || {};
        e = e || "img";
        if (a && !t.skipTest || !o) {
            return false;
        }
        if (e === "img") {
            e = document.getElementsByTagName("img");
        } else if (typeof e === "string") {
            e = document.querySelectorAll(e);
        } else if (!("length" in e)) {
            e = [ e ];
        }
        for (

var s = 0; s < e.length; s++) {
            e[s][r] = e[s][r] || {
                skipTest: t.skipTest
            };
            p(e[s]);
        }
        if (
i) {
            document.body.addEventListener("load", function(e) {
                if (e.target.tagName === "IMG") {
                    y(e.target, {
                        skipTest: t.skipTest
                    });
                }
            }, true);
            u = true;
            e = "img";
        }
        if (

t.watchMQ) {
            window.addEventListener("resize", y.bind(null, e, {
                skipTest: t.skipTest
            }));
        }
    }

    y.supportsObjectFit = s;
    y.supportsObjectPosition = a;

    t();

    return y;
}();