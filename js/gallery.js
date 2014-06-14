(function ($) {
  'use strict';

  $.fn.thumGallery = function (options) {
    var settings = $.extend({
      url: ''
    }, options),
    $this = $(this),
    getGallery = function (json) {
      for(var n in json) {
        if (json[n].AnimationId) {
          $this.find('a').eq(n).attr({'href': 'gallery/?id=' + json[n].AnimationId});
        } else {
          $this.find('a').eq(n).attr({});
        }
        $this.find('img').eq(n).attr({'src': json[n].Url});
      }
    };

    $.ajax({
      async: true,
      url: settings.url,
      type: 'GET',
      dataType: 'json'
    }).done(function (json) {
      getGallery(json.Pictures);
    }).fail(function () {
    }).always(function () {
    });

    return this;
  }
})(jQuery);