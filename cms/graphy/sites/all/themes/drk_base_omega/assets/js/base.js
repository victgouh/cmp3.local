(function($, Drupal) {
  var helper, site;

  helper = {
    scrollTo: function(target) {
      var destination, speed, topoffset;

      if ($(target).offset() !== null) {
        topoffset = 70;
        speed = 600;
        destination = $(target).offset().top - topoffset;
        $("html:not(:animated),body:not(:animated)").animate({
          scrollTop: destination
        }, speed, function() {
          return $(document).scrollTop(destination);
        });
      }
      return false;
    },

    highest: function(selector) {
      var highest = 0;

      selector.each(function () {
        if ($(this).height() > highest) {
          highest = $(this).height();
        }
      });
      return highest;
    },

    equalheights: function(selector, highest) {
      return selector.each(function() {
        return $(this).css("height", "" + highest + "px");
      });
    },

    getLabelTemplate: function(state, id, text) {
      return _.template($("#openinghour-label").html())({state: state, id: id, text: text});
    },

    findLabelInDom: function(id) {
      var $label = $("." + id);
      if($label.length) {
        return $label;
      } else {
        return false;
      }
    },

    getCorrectLabelStatus: function(begin, end) {
      var now = new Date().getTime();
      if(begin <= now && now < end) {
        return "open";
      } else {
        return "closed";
      }
    }
  };

  site = {
    // THE BOWSER LIBRARY CAN DETECT THE BROWSER AND THE VERSION OF THE BROWSER
    // THIS APPENDS THAT VERSION TO THE BODY SO STYLEFIXES CAN BE MADE IN fallback.scss
    // https://github.com/ded/bowser

    bowser:{
      attach: function() {
        var version = bowser.version.split(".")[0];
        $("body").addClass(bowser.name.toLowerCase().replace(" ", "-") + "-" + version);
      }
    },

    handleOpenClosedLabels: {
      attach: function() {
        if(Drupal.settings.addresses) {
          if(!_.isEmpty(Drupal.settings.addresses.nodes)) {
            _.each(Drupal.settings.addresses.nodes, function(element, id) {
              var $label = helper.findLabelInDom(id);
              var html = "";

              if($label) {
                _.some(element, function(hourpack) {
                  var status = helper.getCorrectLabelStatus(hourpack.begin, hourpack.end);
                  html = helper.getLabelTemplate(status, id, Drupal.settings.addresses.labels[status]);
                  return status === "open";
                });

                $label.replaceWith(html);
              }
            });
          }
        }
      }
    },

    svg: {
      attach: function() {
        if (Modernizr.svg) {
          //SITE LOGO
          var logo = $("#logo img");
          if(logo.length) {
            logo.attr("src", function() {
              return $(this).attr("data-svg");
            });
          }
        }
      }
    },

    cloneSearch: {
      attach: function() {
        if ($(".mobile-searchbox").length < 1) {
          var searchbox = $(".block--search-form").clone();
          searchbox.addClass("mobile-searchbox");
          var maincontent = $("#main > header");
          maincontent.after(searchbox);
        }
      }
    },

    cloneServiceMenu: {
      attach: function() {
        if ($(".l-region--mobile-navigation .menu .service").length < 1) {
          var $serviceMenu = $(".block--menu-menu-service-menu .menu").clone();
          $serviceMenu.addClass("service");
          var $mobileMenu = $(".l-region--mobile-navigation .menu");
          $mobileMenu.append($serviceMenu);
        }
      }
    },

    justifiedHeight: {
      attach: function() {
        $(window).load(function() {
          if($(window).width() > 480) {
            var toJustifyHeight = $(".justify-height");

            toJustifyHeight.each(function (i, el) {
              var parent = $(el).parent();
              parent.height(parent.height());
            });
          }
        });
      }
    },

    singleServiceCaptionFix: {
      attach: function() {
        $(window).load(function() {
          var containerheight = $("#ctas .justify-height").height();
          var imgheight = $("#ctas .justify-height .field--lijstafbeelding").height() + 2;

          var latest = $("#ctas .ctas-normal").width();
          var imgwidth = $("#ctas .ctas-normal .field--lijstafbeelding").width();

          var $toheightfix = $("#ctas .justify-height .cta .caption");
          var $towidthfix = $("#ctas .ctas-normal .caption");

          if($(window).width() > 480) {
            $toheightfix.height(containerheight - imgheight);
          }


          if($(window).width() > 940) {
            $towidthfix.width(latest - imgwidth - 10);
            $toheightfix.find("a").css("margin-top", - $toheightfix.find("a").height() / 2 + "px");
          }
        });
      }
    },

    accordeon: {
      attach: function () {
        $(".accordeon .field--opening-hours-higlighted .field--open-hours-highl-title").click(function(e) {
          e.preventDefault();
          var correctItem = $(e.currentTarget).parent().parent();

          if (correctItem.hasClass("active")) {
            correctItem.siblings().removeClass("hide");
            correctItem.removeClass("active");
            correctItem.find(".info").addClass("hidden");
          } else {
            correctItem.siblings().addClass("hide");
            correctItem.addClass("active");
            correctItem.find(".info").removeClass("hidden");
          }
        });

        $(".opening-exceptions .accordion-item").each(function(i, el){
          $(el)
            .addClass("active")
            .css("background-color", "rgba(255, 255, 255, 0.9)");
        });

        // $(".opening-exceptions .accordion-item").click(function(e) {
        //   e.preventDefault();
        //   var $cur = $(e.currentTarget);

        //   if (!$cur.hasClass("active")) {
        //     if ($cur.hasClass("active")) {
        //       $cur.removeClass("active");
        //     } else {
        //       $cur.siblings().removeClass("active");
        //       $cur.addClass("active");
        //     }
        //   }
        // });
      }
    },

    tabs:{
      attach: function () {
        var closetabs = function() {
          $(".tabs-container").removeClass("tabs-open");

          setTimeout(function() {
            $(".tabs-container").addClass("hidden");
            // $(".tabs-overlay").addClass("hidden");
          }, 400);
        };

        $(".open-tabs").click(function(e) {
          e.preventDefault();
          // $(".tabs-overlay").removeClass("hidden");
          $(".tabs-container").removeClass("hidden");

          setTimeout(function() {
            $(".tabs-container").addClass("tabs-open");
          }, 100);
        });

        // $(".tabs-overlay").click(closetabs);
        $(".close-tabs").click(closetabs);
        $(".tabs li a").click(closetabs);
      }
    },

    equalHeights: {
      attach: function () {
        $(window).load(function() {
          if ($(window).width() > 480) {
            var selectors = [
              ".picture-grid .field--lijstafbeelding",
              ".field--news-item h3",
              ".news-items",

              ".field--fc-spotlight-item",
              ".field--lp-services-teaser",
              ".field--spotlight-teaser-item",

              ".field--lp-services-teaser h3 a",
              ".field--fc-spotlight-item h3 a",
              ".field--spotlight-teaser-item h3 a",
              ".field--lp-spotlights-visual h3 a",

              ".page-adressen .views-row",

              ".service-item",
              ".contact-and-map > div",
              ".contact-service .container > div",
              ".reference-service .container > div",
              "#higlighted-service .contact, #higlighted-service .map-info"
            ];

            var filter = function(element, index, list) {
              return $(list[0]).offset().top === $(element).offset().top;
            };

            _.each(selectors, function(selector) {
              var $selector = $(selector);

              while($selector.length > 0) {
                var el = _.filter($selector, filter);

                helper.equalheights($(el), helper.highest($(el)));
                $selector = _.difference($selector, el);
              }
            });

            // recalculate tabheights introduced by equal heights
            var $hortabs = $(".horizontal-tabs");
            if ($hortabs.length) {
              var $panes = $hortabs.find(".horizontal-tabs-pane");
              var initheight = $panes.first().height();
              var heighest = helper.highest($panes);
              var newHeight =  $(".contact-and-map .contact").innerHeight() + (heighest - initheight);
              $(".contact-and-map .contact, .contact-and-map .map-info").css("height", newHeight + "px");
            }

            // recalculate googlemaps issues introduced by equal heights
            if (Drupal.settings.gmap) {
              _.each(Drupal.settings.gmap, function(map) {
                if (_.isFunction(Drupal.gmap.getMap)) {
                  map = Drupal.gmap.getMap(map.id);
                  google.maps.event.trigger(map.map, "resize");
                  map.map.setCenter(map.map.markers[0].getPosition());
                }
              });
            }
          }
        });
      }
    },
    mobileMenu: {
      attach: function () {
        var $hamburger = $(".hamburger");
        var $overlay = $(".stretch.mobile");
        var $menu = $(".l-region--mobile-navigation");

        $overlay.click(function(e) {
          e.preventDefault();
          $menu.removeClass("open");
          $overlay.addClass("hidden");
        });

        $hamburger.click(function(e) {
          e.preventDefault();
          $menu.addClass("open");
          $overlay.removeClass("hidden");
        });

        $menu.find("li.expanded > a, li.expanded > span").click(function(e) {
          if(!$(e.currentTarget).parent().hasClass("open")) {
            e.preventDefault();

            $(e.currentTarget).parent().siblings().removeClass("open");
            $(e.currentTarget).parent().addClass("open");
          }
        });
      }
    },

    messages: {
      attach: function() {
        if ($(".messages")) {
          var $close = $(".messages .close");

          $close.click(function(e) {
            e.preventDefault();
            $(e.currentTarget).parent().hide();
            $close.off("click");
          });
        }
      }
    },

    lastOfRelated: {
      attach: function() {
        if ($(".related-items").length) {
          $(".related-items").last().css("margin-bottom", "10px");
        }
      }
    },

    clickableArea: {
      attach: function() {
          $(document).ready(function(){
             var clickArea = $(".cta-news, .field--spotlight-teaser-item,.field--spotlight-teaser-item,.field--news-item");
             clickArea.click(function(){
                window.location = $(this).find("a:first").attr("href");
                return false;
             });
          });
      }
    },

    pagerFragments: {
      attach: function (context) {
        if(context === document) {
          var pagerLinks = $(".node--fotoalbum .pager a");
          pagerLinks.each(function() {
            this.href = this.href + "#gallery";
          });
        }
      }
    },

    companyGuide: {
      attach: function () {
        $( ".search-forms .form-text" ).each(function(i, el){
          if($(el).val() !== "" && $(el).val() !== $(el).prev().text()) {
            $(el).addClass("inputgiven");
          } else {
            $(el).removeClass("inputgiven");
          }
        });

        $(".search-forms .form-text").focus(function(e) {
          if($(e.currentTarget).val() === $(e.currentTarget).prev().text()) {
            $(e.currentTarget).data("default-placeholder",$(e.currentTarget).val());
            $(e.currentTarget).val("");
          }
        });

        $( ".search-forms .form-text" ).keyup(function(e) {
          if($(e.currentTarget).val() !== "" && $(e.currentTarget).val() !== $(e.currentTarget).prev().text()) {
            $(e.currentTarget).addClass("inputgiven");
          } else {
            $(e.currentTarget).removeClass("inputgiven");
          }
        });

        $(".search-forms .form-text").focusout(function(e) {
          if($(e.currentTarget).val() === "") {
            $(e.currentTarget).val($(e.currentTarget).data("default-placeholder"));
            $(e.currentTarget).removeClass("inputgiven");
          }
        });
      }
    }
  };

  _.extend(Drupal.behaviors, site);
})(jQuery, Drupal);
