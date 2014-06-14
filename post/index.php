<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <base href="http://localhost/tokyo/">
  <link rel="stylesheet" href="css/jquery.Jcrop.min.css">
  <title></title>
</head>
<body>
  <header></header>
  <main>
    <img id="up-image" src="img/no.png" alt="">
    <form id="up-form">
      <input type="file" name="upimage" size="30">
      <canvas id="up-canvas" width="500" height="500"></canvas>
      <input id="up-submit" type="submit" value="submit">
    </form>
  </main>
  <footer></footer>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="js/jquery.Jcrop.min.js"></script>
  <script>
  $(function(){
    var $upForm = $('#up-form'),
      $canvas = $('#up-canvas'),
      $img = $('#up-image'),
      x, y, w, h,
      drawCanvas = function (event) {
        var $img = $(event.target),
          img = $img[0],
          ctx = $canvas[0].getContext('2d');
          ctx.drawImage(img, 0, 0);
      },
      updateCoords = function (c) {
        x = c.x; y = c.y; w = c.w; h = c.h;
      },
      showPreview = function (coords) {
        var rx = 100 / coords.w;
        var ry = 100 / coords.h;
        $('#preview').css({
          width: Math.round(rx * 500) + 'px',
          height: Math.round(ry * 370) + 'px',
          marginLeft: '-' + Math.round(rx * coords.x) + 'px',
          marginTop: '-' + Math.round(ry * coords.y) + 'px'
        });
      };
    //$img.load(drawCanvas);
    $img.Jcrop({
        aspectRatio: 1,
        onSelect: updateCoords,
        onChange: showPreview
    });

    $('input[type=file]').change(function() {
      var file = $(this).prop('files')[0],
        reader = new FileReader();
      if (!file.type.match('image.*')) {
        return;
      }
      reader.onload = function() {
        $img.attr('src', reader.result);
      }
      reader.readAsDataURL(file);
    });

    $('#up-submit').click(function () {
      var fd = new FormData(),
        detail = getFileDetail(file);
        fd.append('path', file);
        fd.append('longitude', );
        fd.append('latitude', );
      $.ajax({
        async: true,
        xhr: function () {
          var XHR = $.ajaxSettings.xhr();
          if (XHR.upload) {
              XHR.upload.addEventListener('progress', function (e) {
              }, false);
          }
          return XHR;
        },
        url: '/api/pictures',
        type: 'POST',
        processData: false,
        contentType: false,
        data: fd
      }).done(function () {
      }).fail(function () {
      }).always(function () {
      });
    });
  });
  </script>
</body>
</html>