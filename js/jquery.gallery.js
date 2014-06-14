/**
* Gallery loader
* usage: url
*/
(function ($) {
  'use strict';

  $.fn.galleryLoader = function (options) {
    var settings = $.extend({
        url: ''
      }, options), i,
      getGallery = function (json) {
        for(i in json) {
          $('#gallery a').eq(i).attr({'href': json[i].Animation.Url});
          $('#gallery img').eq(i).attr({'src': json[i].Url});
        }
      };
    $.ajax({
      async: true,
      url: url,
      type: 'GET',
      dataType: 'json'
    }).done(function (json) {
      getGallery(json.Pictures);
    }).fail(function () {
    }).always(function () {
    });
  }
})(jQuery);