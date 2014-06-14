/**
* Contents Fader(in order)
* Remember to add css - display: none
*/
(function ($) {
  'use strict';

  $.fn.contentsFader = function (options) {
    var settings = $.extend({
      delaySpeed: 100,
      fadeSpeed: 1000
    }, options);

    return this.each(function (i) {
      var $this = $(this),
        fader = function () {
          $this.delay(i * settings.delaySpeed).fadeIn(settings.fadeSpeed);
        };

      $(window).on('load', fader);
    })
  }
})(jQuery);