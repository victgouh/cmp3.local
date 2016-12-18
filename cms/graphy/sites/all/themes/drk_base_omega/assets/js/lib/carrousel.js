(function($, Drupal) {
  var helper, carousel, carousels;

  helper = {

    highest: function(selector) {
      var highest = 0;

      selector.each(function () {
        if ($(this).innerHeight() > highest) {
          highest = $(this).innerHeight();
        }
      });
      return highest;
    },

    jump: function () {
      if (940 <= $(window).width()) {
        return 6;
      } else if (480 <= $(window).width() && $(window).width() < 940){
        return 4;
      } else if (0 <= $(window).width() && $(window).width() < 480){
        return 1;
      }
    },

    handleHeight: function($carousel, $slides, $next, $prev, slide, jump) {
      var padd = 20;
      var height = helper.highest($slides.slice(slide, slide + jump())) - $next.height();

      $next.css("margin-top", (height - padd) / 2);
      $prev.css("margin-top", (height - padd) / 2);

      $carousel.height(height + padd);
    },

    makeCarrousel: function ($carousel, $items, $item, $tab) {

      var $prev = $carousel.find(".prev");
      var $next = $carousel.find(".next");

      var $slides = $items;

      var slide = 0;
      var debounce = 200;
      var slideWidth = $item.width();
      var slideAmount = $slides.length;

      // HEIGHT FIX ON ITEM LIST
      // $carousel.find(".item-list").height(this.highest($carousel.find(".item-list .views-row")));

      // CALCULATE JUMP BASED ON FIXED WIDTH IN => CAROUSEL.SCSS


      var slideAction = function () {
        $slides.each(function(i, el) {
          $(el).addClass("hidden");
          if (slide <= i && i < slide + helper.jump()) {
            $(el).removeClass("hidden");
          }
        });
      };

      var handleArrows = function () {
        $next.removeClass("disabled");
        $prev.removeClass("disabled");

        if (slide === 0) {
          $prev.addClass("disabled");
        }

        if (slide + helper.jump() >= slideAmount) {
          $next.addClass("disabled");
        }

        if (slideAmount <= helper.jump()) {
          $next.addClass("disabled");
          $prev.addClass("disabled");
        }

        helper.handleHeight($carousel, $slides, $next, $prev, slide, helper.jump);
      };

      // NEXT SLIDE
      var nextslide = function () {

        // LEFTOVER SLIDE ANTICIPATION ON UNEVEN NUMER OF SLIDES
        if (slide < (slideAmount - helper.jump())) {
          if ((slide + helper.jump()) > slideAmount) {
            slide += 1;
          } else {
            slide += helper.jump();
          }
        }

        slideAction();
        handleArrows();
      };

      // PREV SLIDE
      var prevslide = function () {

        // LEFTOVER SLIDE ANTICIPATION ON UNEVEN NUMER OF SLIDES
        if (slide > 0) {
          if ((slide - helper.jump()) < 0) {
            slide -= 1;
          } else {
            slide -= helper.jump();
          }
        }

        slideAction();
        handleArrows();
      };

      // EVENTS WITH DEBOUNCE
      $prev.click(function(e) {
        e.preventDefault();
        if(! $(e.currentTarget).hasClass("disabled")) {
          _.debounce(prevslide, debounce)();
        }
      });

      $next.click(function(e) {
        e.preventDefault();
        if(! $(e.currentTarget).hasClass("disabled")) {
          _.debounce(nextslide, debounce)();
        }
      });

      // if($tab.length) {
      //   $tab.click(function(e) {
      //     e.preventDefault();
      //     handleArrows();
      //   });
      // }

      slideAction();
      handleArrows();

      return $carousel;
    }
  };

  carousel = {
    fullWidth: {
      attach: function () {
        $(window).load(function() {
          var $carrousel = $(".carrousel-full");
          var $carrousels = [];

          if($carrousel.length) {
            $carrousel.each(function(i, el) {
              $carrousels.push(helper.makeCarrousel($(el), $(el).find("ul").children(), $(el).find("ul li").first()));
            });
          }

          if ($(".quicktabs-tabs").length) {
            $(".quicktabs-tabs li a").click(function(e) {
              var $currentCarrousel = $carrousels[$(e.currentTarget).parent().index()];
              helper.handleHeight($currentCarrousel, $currentCarrousel.find("ul").children(), $currentCarrousel.find(".next"), $currentCarrousel.find(".prev"), 0, helper.jump);
            });
          }
        });
      }
    }
  };

  _.extend(Drupal.behaviors, carousel);

})(jQuery, Drupal);
