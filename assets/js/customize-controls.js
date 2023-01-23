(function () {
	'use strict';

	(function () {
	  wp.customize.bind('ready', function () {
	    var section = jQuery("[id^='customize-control-ctrl_front_page_section']");
	    var sectionCount = section.length;
	    jQuery("[id^='customize-control-ctrl_front_page_section']").find('.customize-control-title').css({
	      'font-weight': 'normal',
	      color: '#fff',
	      background: '#313a6f',
	      padding: '0.2rem 0.6rem'
	    });
	    var featuredItem = jQuery("[id^='customize-control-ctrl_front_page_featured_items']");
	    var featuredItemCount = featuredItem.length;
	    jQuery("[id^='customize-control-ctrl_front_page_featured_items']").find('.customize-control-title').css({
	      'font-weight': 'normal',
	      color: '#fff',
	      background: '#555',
	      padding: '0.2rem 0.6rem'
	    });
	    jQuery("[id^='customize-control-ctrl_front_page_featured_item_header']").find('.customize-control-title').css({
	      'font-weight': 'normal',
	      color: '#fff',
	      background: '#888',
	      padding: '0.2rem 0.6rem'
	    });

	    var _loop = function _loop(i) {
	      wp.customize('setting_front_page_section' + i, function (setting) {
	        wp.customize.control('setting_front_page_image' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_image_placeholder_display' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_image_placeholder_grayscale' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_background_color' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_background_opacity' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_main_text' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_sub_text' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_text_align' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_text_color' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_button_text' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_button_text_color' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_button_link' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_button_link_color' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_button_link_target' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize.control('ctrl_front_page_featured_items' + i, function (control) {
	          var visibility = function visibility() {
	            if ('custom' === setting.get()) {
	              control.container.slideDown(180);
	            } else {
	              control.container.slideUp(180);
	            }
	          };

	          visibility();
	          setting.bind(visibility);
	        });
	        wp.customize('setting_front_page_featured_items' + i, function (settingItem) {
	          j = 1;

	          while (j < featuredItemCount) {
	            wp.customize('setting_front_page_featured_item_type' + i + '_' + j, function (settingItemType) {
	              wp.customize.control('ctrl_front_page_featured_item_icon' + i + '_' + j, function (control) {
	                var visibility = function visibility() {
	                  if ('icon' === settingItemType.get() && 'enabled' === settingItem.get() && 'custom' === setting.get()) {
	                    control.container.slideDown(300);
	                  } else {
	                    control.container.slideUp(300);
	                  }
	                };

	                visibility();
	                setting.bind(visibility);
	                settingItem.bind(visibility);
	                settingItemType.bind(visibility);
	              });
	              wp.customize.control('ctrl_front_page_featured_item_icon_color' + i + '_' + j, function (control) {
	                var visibility = function visibility() {
	                  if ('icon' === settingItemType.get() && 'enabled' === settingItem.get() && 'custom' === setting.get()) {
	                    control.container.slideDown(180);
	                  } else {
	                    control.container.slideUp(180);
	                  }
	                };

	                visibility();
	                setting.bind(visibility);
	                settingItem.bind(visibility);
	                settingItemType.bind(visibility);
	              });
	              wp.customize.control('ctrl_front_page_featured_item_image' + i + '_' + j, function (control) {
	                var visibility = function visibility() {
	                  if ('image' === settingItemType.get() && 'enabled' === settingItem.get() && 'custom' === setting.get()) {
	                    control.container.slideDown(300);
	                  } else {
	                    control.container.slideUp(300);
	                  }
	                };

	                visibility();
	                setting.bind(visibility);
	                settingItem.bind(visibility);
	                settingItemType.bind(visibility);
	              });
	            });
	            wp.customize.control('ctrl_front_page_featured_item_header' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_column' + i, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_type' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_title' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_title_color' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_text' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_text_color' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_button_text' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_button_link' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_button_text_color' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_button_link_color' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            wp.customize.control('ctrl_front_page_featured_item_button_link_target' + i + '_' + j, function (control) {
	              var visibility = function visibility() {
	                if ('enabled' === settingItem.get() && 'custom' === setting.get()) {
	                  control.container.slideDown(180);
	                } else {
	                  control.container.slideUp(180);
	                }
	              };

	              visibility();
	              setting.bind(visibility);
	              settingItem.bind(visibility);
	            });
	            j++;
	          }
	        });
	      });
	    };

	    for (var i = 1; i <= sectionCount; i++) {
	      _loop(i);
	    }
	  });
	})(jQuery);

}());
