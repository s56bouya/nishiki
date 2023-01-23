(function () {
	'use strict';

	jQuery(function () {
	  var searchButton = jQuery('#search-button');
	  var searchClose = jQuery('#search-overlay').find('.close');
	  var menuButton = jQuery('#menu-button');
	  var menuClose = jQuery('#menu-overlay').find('.close');
	  var adminY = 0;
	  var headerHeight = 0;
	  var scroll = 'window';

	  if (jQuery('#wpadminbar').length > 0) {
	    adminY = document.getElementById('wpadminbar').offsetHeight;
	  }

	  if (jQuery('#masthead').hasClass('fixed')) {
	    scroll = '#page';
	    headerHeight = document.getElementById('masthead').offsetHeight;
	  }

	  var headerOffset = headerHeight + adminY;
	  jQuery('a[href^="#"]').not('.noscroll,.woocommerce-tabs .stars a,.woocommerce-tabs .wc-tabs a,.reset_variations,.woocommerce-product-gallery__trigger,.shipping-calculator-button').click(function () {
	    var href = jQuery(this).attr('href');
	    var target = jQuery(href === '#' || href === '' ? 'html' : href);
	    var position = target.offset().top - headerOffset;
	    jQuery('html, body').animate({
	      scrollTop: position
	    }, speed / 3, 'swing');
	    return false;
	  });
	  searchButton.click(function () {
	    jQuery('#search-overlay').addClass('panel-open');
	    jQuery('body').addClass('overflow-hidden');
	  });
	  searchClose.click(function () {
	    jQuery('#search-overlay').removeClass('panel-open').addClass('panel-close');
	    jQuery('.site-info a').removeClass('overlay');
	    jQuery('body').removeClass('overflow-hidden');

	    if (jQuery('#masthead').hasClass('fixed')) {
	      jQuery(scroll).css('top').replace('px', '') - adminY;
	    }

	    clearTimeout(timer);
	    timer = setTimeout(function () {
	      setTimeout(function () {
	        jQuery('#search-overlay').removeClass('panel-close');
	      }, 200);
	    }, speed / 3);
	  });
	  menuButton.click(function (event) {
	    jQuery('#menu-overlay').addClass('panel-open');
	    jQuery('body').addClass('overflow-hidden');
	  });
	  menuClose.click(function (event) {
	    jQuery('#menu-overlay').removeClass('panel-open').addClass('panel-close');
	    jQuery('.site_info a').removeClass('overlay');
	    jQuery('body').removeClass('overflow-hidden');
	    clearTimeout(timer);
	    timer = setTimeout(function () {
	      setTimeout(function () {
	        jQuery('#menu-overlay').removeClass('panel-close');
	      }, 200);
	    }, speed / 3);
	  });
	  jQuery('#menu-overlay .menu-item-has-children').each(function () {
	    jQuery(this).prepend('<i class="icomoon icon-arrow-down"></i>');
	  });
	  jQuery('#menu-overlay i').click(function () {
	    jQuery(this).siblings('ul').slideToggle(300);
	    jQuery(this).parent().toggleClass('active');
	  });
	  var menuCollapse = jQuery('#menu-collapse');
	  var menuCollapseButton = jQuery('#menu-collapse-button');
	  var menuCollapseClose = menuCollapse.find('.close');
	  var mobileSize = 768;
	  var speed = 1000;
	  var timer = null;
	  menuCollapseButton.click(function (event) {
	    menuCollapse.addClass('panel-open');
	    jQuery('body').addClass('overflow-hidden');
	  });
	  menuCollapse.find('.menu-item-has-children').each(function () {
	    jQuery(this).children('a').append('<span><i class="icomoon icon-arrow-down"></i></span>');
	  });
	  menuCollapse.find('ul span').click(function (event) {
	    event.preventDefault();
	    var el = jQuery(this).parent().parent();
	    var parent = el.parent().parent();

	    if (parent.is('#menu-collapse') && parent.hasClass('mobile') === false) {
	      if (el.hasClass('nav-selected')) {
	        el.removeClass('nav-selected');
	      } else {
	        parent.find('li').removeClass('nav-selected');
	        el.siblings().find('ul').hide();
	        el.siblings().removeClass('active');
	        el.siblings().find('li').removeClass('active');
	        el.addClass('nav-selected');
	      }
	    }

	    el.children('ul').slideToggle(300);
	    el.hasClass('active') ? hideSubMenu(el) : showSubMenu(el);
	  });

	  function showSubMenu(el) {
	    el.addClass('active');
	  }

	  function hideSubMenu(el) {
	    el.removeClass('active');
	  }

	  menuCollapseClose.click(function (event) {
	    menuCollapse.removeClass('panel-open');
	    menuCollapse.addClass('panel-close');
	    jQuery('body').removeClass('overflow-hidden');
	    clearTimeout(timer);
	    timer = setTimeout(function () {
	      setTimeout(function () {
	        menuCollapse.removeClass('panel-close');
	      }, 200);
	    }, speed / 3);
	  });
	  nishikiRegisterListener('load', nishikiResize);
	  nishikiRegisterListener('resize', nishikiResize);

	  function nishikiResize() {
	    clearTimeout(timer);
	    timer = setTimeout(function () {
	      setTimeout(function () {
	        var resizeX = document.documentElement.clientWidth;

	        if (resizeX >= mobileSize) {
	          if (menuCollapse.hasClass('mobile')) {
	            menuCollapse.find('li').siblings().find('ul').hide();
	            menuCollapse.find('li').siblings().removeClass('active');
	            menuCollapse.find('li').siblings().find('li').removeClass('active');
	            menuCollapse.removeClass('mobile');
	          }
	        } else {
	          if (menuCollapse.hasClass('mobile') === false) {
	            menuCollapse.addClass('mobile');
	          }
	        }
	      }, 200);
	    }, speed / 5);
	  }
	});
	var resizeSpeed = 1000;
	var resizeTimer = null;
	var scrollHeight = 100;

	try {
	  window.addEventListener('scroll', nishikiFixedHeaderScrolled, false);
	} catch (e) {
	  window.attachEvent('onscroll', nishikiFixedHeaderScrolled);
	}

	function nishikiFixedHeaderScrolled() {
	  if (jQuery('#masthead').hasClass('fixed') && jQuery('#page').hasClass('nav-open') === false) {
	    clearTimeout(resizeTimer);
	    resizeTimer = setTimeout(function () {
	      setTimeout(function () {
	        nishikiGetScrollHeight();
	      }, 200);
	    }, resizeSpeed / 3);
	  }
	}

	function nishikiGetScrollHeight() {
	  var scrolled = jQuery(window).scrollTop();

	  if (scrolled > scrollHeight) {
	    jQuery('body').addClass('scrolled');
	  } else {
	    jQuery('body').removeClass('scrolled');
	  }
	}

	function nishikiRegisterListener(event, func) {
	  if (window.addEventListener) {
	    window.addEventListener(event, func);
	  } else {
	    window.attachEvent('on' + event, func);
	  }
	}

	var speed = 1000;
	var timer = null;
	nishikiRegisterListener('load', nishikiLazyLoad);
	nishikiRegisterListener('scroll', nishikiLazyLoad);

	function nishikiLazyLoad() {
	  clearTimeout(timer);
	  timer = setTimeout(function () {
	    setTimeout(function () {
	      var getcontent = document.getElementById('main');

	      if (getcontent) {
	        var lazy = getcontent.getElementsByTagName('section');

	        for (var i = 0; i < lazy.length; i++) {
	          if (nishikiInview(lazy[i]) && lazy[i].classList.contains('imgloaded') === false) {
	            if (lazy[i].classList.contains('has-header-image') || lazy[i].classList.contains('main-video')) {
	              var mainImg = lazy[i].querySelector('.header-image');

	              if (mainImg) {
	                if (mainImg.hasAttribute('data-src') === true) {
	                  mainImg.src = mainImg.getAttribute('data-src');
	                  mainImg.removeAttribute('data-src');
	                }

	                if (lazy[i].hasAttribute('data-srcset') === true) {
	                  mainImg.srcset = lazy[i].getAttribute('data-srcset');
	                  mainImg.removeAttribute('data-srcset');
	                }

	                mainImg.offsetTop;
	                objectFitImages(mainImg);
	                mainImg.classList.add('imgloaded');
	              }
	            } else if (lazy[i].hasAttribute('data-src') === true) {
	              lazy[i].classList.add('imgloaded');
	              var imglarge = new Image();
	              imglarge.src = lazy[i].getAttribute('data-src');
	              imglarge.onload = nishikiImgloaded(lazy[i], imglarge);
	            }
	          }
	        }
	      }
	    }, 100);
	  }, speed / 3);
	}

	function nishikiImgloaded(parent, img) {
	  parent.appendChild(img);
	  img.offsetTop;
	  objectFitImages(img);
	  img.classList.add('imgloaded');
	}

	function nishikiInview(el) {
	  var rect = el.getBoundingClientRect();
	  return rect.bottom >= 0 && rect.right >= 0 && rect.top <= (window.innerHeight || document.documentElement.clientHeight) && rect.left <= (window.innerWidth || document.documentElement.clientWidth);
	}

	document.addEventListener('DOMContentLoaded', nishikiLinkControll);

	function nishikiLinkControll() {
	  var menuItems = document.querySelectorAll('.menu-items');

	  if (!!menuItems) {
	    menuItems.forEach(function (menu, i) {
	      var menuItemsAnchor = menu.querySelectorAll('a[href^="#"]');
	      menuItemsAnchor.forEach(function (anchor, j) {
	        anchor.addEventListener('click', function () {
	          var parent = anchor.parentNode;
	          var panel = menu.parentNode;

	          if (!!panel.classList.contains('panel-open')) {
	            if (!!parent.classList.contains('anchor')) {
	              panel.classList.remove('panel-open');
	              panel.classList.add('panel-close');
	              document.body.classList.remove('overflow-hidden');
	              var menuAnchorTimer = null;
	              clearTimeout(menuAnchorTimer);
	              menuAnchorTimer = setTimeout(function () {
	                setTimeout(function () {
	                  panel.classList.remove('panel-close');
	                }, 200);
	              }, speed / 3);
	            }
	          }
	        });
	      });
	    });
	  }
	}

	var objectFitImages = function () {

	  var OFI = 'bfred-it:object-fit-images';
	  var propRegex = /(object-fit|object-position)\s*:\s*([-.\w\s%]+)/g;
	  var testImg = typeof Image === 'undefined' ? {
	    style: {
	      'object-position': 1
	    }
	  } : new Image();
	  var supportsObjectFit = ('object-fit' in testImg.style);
	  var supportsObjectPosition = ('object-position' in testImg.style);
	  var supportsOFI = ('background-size' in testImg.style);
	  var supportsCurrentSrc = typeof testImg.currentSrc === 'string';
	  var nativeGetAttribute = testImg.getAttribute;
	  var nativeSetAttribute = testImg.setAttribute;
	  var autoModeEnabled = false;

	  function createPlaceholder(w, h) {
	    return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='" + w + "' height='" + h + "'%3E%3C/svg%3E";
	  }

	  function polyfillCurrentSrc(el) {
	    if (el.srcset && !supportsCurrentSrc && window.picturefill) {
	      var pf = window.picturefill._;

	      if (!el[pf.ns] || !el[pf.ns].evaled) {
	        pf.fillImg(el, {
	          reselect: true
	        });
	      }

	      if (!el[pf.ns].curSrc) {
	        el[pf.ns].supported = false;
	        pf.fillImg(el, {
	          reselect: true
	        });
	      }

	      el.currentSrc = el[pf.ns].curSrc || el.src;
	    }
	  }

	  function getStyle(el) {
	    var style = getComputedStyle(el).fontFamily;
	    var parsed;
	    var props = {};

	    while ((parsed = propRegex.exec(style)) !== null) {
	      props[parsed[1]] = parsed[2];
	    }

	    return props;
	  }

	  function setPlaceholder(img, width, height) {
	    var placeholder = createPlaceholder(width || 1, height || 0);

	    if (nativeGetAttribute.call(img, 'src') !== placeholder) {
	      nativeSetAttribute.call(img, 'src', placeholder);
	    }
	  }

	  function onImageReady(img, callback) {
	    if (img.naturalWidth) {
	      callback(img);
	    } else {
	      setTimeout(onImageReady, 100, img, callback);
	    }
	  }

	  function fixOne(el) {
	    var style = getStyle(el);
	    var ofi = el[OFI];
	    style['object-fit'] = style['object-fit'] || 'fill';

	    if (!ofi.img) {
	      if (style['object-fit'] === 'fill') {
	        return;
	      }

	      if (!ofi.skipTest && supportsObjectFit && !style['object-position']) {
	          return;
	        }
	    }

	    if (!ofi.img) {
	      ofi.img = new Image(el.width, el.height);
	      ofi.img.srcset = nativeGetAttribute.call(el, 'data-ofi-srcset') || el.srcset;
	      ofi.img.src = nativeGetAttribute.call(el, 'data-ofi-src') || el.src;
	      nativeSetAttribute.call(el, 'data-ofi-src', el.src);

	      if (el.srcset) {
	        nativeSetAttribute.call(el, 'data-ofi-srcset', el.srcset);
	      }

	      setPlaceholder(el, el.naturalWidth || el.width, el.naturalHeight || el.height);

	      if (el.srcset) {
	        el.srcset = '';
	      }

	      try {
	        keepSrcUsable(el);
	      } catch (err) {
	        if (window.console) {
	          console.warn('https://bit.ly/ofi-old-browser');
	        }
	      }
	    }

	    polyfillCurrentSrc(ofi.img);
	    el.style.backgroundImage = 'url("' + (ofi.img.currentSrc || ofi.img.src).replace(/"/g, '\\"') + '")';
	    el.style.backgroundPosition = style['object-position'] || 'center';
	    el.style.backgroundRepeat = 'no-repeat';
	    el.style.backgroundOrigin = 'content-box';

	    if (/scale-down/.test(style['object-fit'])) {
	      onImageReady(ofi.img, function () {
	        if (ofi.img.naturalWidth > el.width || ofi.img.naturalHeight > el.height) {
	          el.style.backgroundSize = 'contain';
	        } else {
	          el.style.backgroundSize = 'auto';
	        }
	      });
	    } else {
	      el.style.backgroundSize = style['object-fit'].replace('none', 'auto').replace('fill', '100% 100%');
	    }

	    onImageReady(ofi.img, function (img) {
	      setPlaceholder(el, img.naturalWidth, img.naturalHeight);
	    });
	  }

	  function keepSrcUsable(el) {
	    var descriptors = {
	      get: function get(prop) {
	        return el[OFI].img[prop ? prop : 'src'];
	      },
	      set: function set(value, prop) {
	        el[OFI].img[prop ? prop : 'src'] = value;
	        nativeSetAttribute.call(el, 'data-ofi-' + prop, value);
	        fixOne(el);
	        return value;
	      }
	    };
	    Object.defineProperty(el, 'src', descriptors);
	    Object.defineProperty(el, 'currentSrc', {
	      get: function get() {
	        return descriptors.get('currentSrc');
	      }
	    });
	    Object.defineProperty(el, 'srcset', {
	      get: function get() {
	        return descriptors.get('srcset');
	      },
	      set: function set(ss) {
	        return descriptors.set(ss, 'srcset');
	      }
	    });
	  }

	  function hijackAttributes() {
	    function getOfiImageMaybe(el, name) {
	      return el[OFI] && el[OFI].img && (name === 'src' || name === 'srcset') ? el[OFI].img : el;
	    }

	    if (!supportsObjectPosition) {
	      HTMLImageElement.prototype.getAttribute = function (name) {
	        return nativeGetAttribute.call(getOfiImageMaybe(this, name), name);
	      };

	      HTMLImageElement.prototype.setAttribute = function (name, value) {
	        return nativeSetAttribute.call(getOfiImageMaybe(this, name), name, String(value));
	      };
	    }
	  }

	  function fix(imgs, opts) {
	    var startAutoMode = !autoModeEnabled && !imgs;
	    opts = opts || {};
	    imgs = imgs || 'img';

	    if (supportsObjectPosition && !opts.skipTest || !supportsOFI) {
	      return false;
	    }

	    if (imgs === 'img') {
	      imgs = document.getElementsByTagName('img');
	    } else if (typeof imgs === 'string') {
	      imgs = document.querySelectorAll(imgs);
	    } else if (!('length' in imgs)) {
	      imgs = [imgs];
	    }

	    for (var i = 0; i < imgs.length; i++) {
	      imgs[i][OFI] = imgs[i][OFI] || {
	        skipTest: opts.skipTest
	      };
	      fixOne(imgs[i]);
	    }

	    if (startAutoMode) {
	      document.body.addEventListener('load', function (e) {
	        if (e.target.tagName === 'IMG') {
	          fix(e.target, {
	            skipTest: opts.skipTest
	          });
	        }
	      }, true);
	      autoModeEnabled = true;
	      imgs = 'img';
	    }

	    if (opts.watchMQ) {
	      window.addEventListener('resize', fix.bind(null, imgs, {
	        skipTest: opts.skipTest
	      }));
	    }
	  }

	  fix.supportsObjectFit = supportsObjectFit;
	  fix.supportsObjectPosition = supportsObjectPosition;
	  hijackAttributes();
	  return fix;
	}();

}());
