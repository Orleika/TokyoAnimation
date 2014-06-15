(function ($) {
  'use strict';

  $.fn.thumGallery = function (options) {
    var settings = $.extend({
      url: '',
      type: 'thumb'
    }, options),
    $this = $(this),
    getConvertText = function (text) {
      var str = text.substr(0, 10);
      return str;
    },
    getThumb = function (json) {
      for(var n in json) {
        if (json[n].AnimationId) {
          $this.find('a').eq(n).attr({'href': 'gallery/?id=' + json[n].AnimationId});
        } else {
          $this.find('a').eq(n).attr({'href': 'javascript:void(0)'});
        }
        $this.find('img').eq(n).attr({'src': json[n].Url});
        $this.find('img').eq(n).after('<span>' + getConvertText(json[n].CreateTime) + '</span>');
      }
    },
    getGif = function (json) {
      for(var n in json) {
        $this.find('a').eq(n).attr({'href': 'gallery/?id=' + json[n].Id});
        $this.find('img').eq(n).attr({'src': json[n].Url});
        $this.find('img').eq(n).after('<span>' + getConvertText(json[n].CreateTime) + '</span>');
      }
    };

    $.ajax({
      async: true,
      url: settings.url,
      type: 'GET',
      dataType: 'json'
    }).done(function (json) {
      if (settings.type === 'thumb') {
        getThumb(json.Pictures);
      } else if(settings.type === 'gif') {
        getGif(json.Animations);
      }
    }).fail(function () {
    }).always(function () {
    });

    return this;
  }
})(jQuery);