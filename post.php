<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include_once("_parts/head.html"); ?>
  <title>画像投稿 | 東京メモリ</title>
</head>
<body>
  <!--大見出し-->
  <?php include_once("_parts/header.html"); ?>

  <!--コンテンツ-->
  <div class="container">
    <div class="raw">
      <!--ナビゲーション-->
      <div class="col-md-4">
        <?php include_once("_parts/side_nav.html"); ?>
        <br>

        <!--アップロードの説明書-->
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">投稿の手順</h3>
          </div>
          <div class="panel-body">
            <ol class="manual">
              <li>水色のエリアに画像をドラッグ アンド ドロップして下さい。</li>
              <li>画像を正方形にリサイズして下さい。</li>
              <li>地図を操作し、撮影した場所にピンを移動します。</li>
              <li>投稿ボタンをクリックします。</li>
              <li>GIF画像が作成されます。</li>
            </ol>
          </div>
        </div>
      </div>

      <!--メイン-->
      <div class="col-md-8">
        <h2>画像をアップロードする</h2>
        <div id="image-form">
          <img id="up-image" class="thumbnail" src="img/no.png" alt="no image"></div>
        <hr>
        <h2>撮影場所を選択する</h2>
        <div id="map"></div>
        <hr>
        <div id="up-form">
          <input type="file" name="upimage">
          <button type="button" id="up-submit" class="btn btn-warning btn-lg btn-block">投稿</button>
          <canvas id="up-canvas" hidden></canvas>
        </div>
      </div>
    </div>

    <hr>

    <!--フッター-->
    <footer>
      <?php include_once("_parts/footer.html"); ?></footer>

    <!-- Modal -->
    <div id="modal-message" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body"></div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once("_parts/script.html"); ?>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDX03u-ysXWKncq5Yn5FRvij9eI08bCEkQ&sensor=false"></script>
  <script src="js/jquery.Jcrop.min.js"></script>
  <script>
  $(function (){
    var $upForm = $('#up-form'),
      $canvas = $('#up-canvas'),
      x, y, w, h, blob, latitude, longitude,
      util = {
        stop: function(e) {
          e.preventDefault();
          e.stopPropagation();
        }
      },
      setMap = function () {
        var latlng = new google.maps.LatLng(35.671573, 139.721587);
        var opts = {
          zoom: 15,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map'), opts);
        var marker = new google.maps.Marker({
          position: latlng,
          draggable: true,
          map: map,
        });
        google.maps.event.addListener(marker,'dragend', function(event) {
          latitude = marker.getPosition().lat();
          longitude = marker.getPosition().lng();
        })
      },
      showModal = function (title, msg) {
        $('#modal-message .modal-title').text(title);
        $('#modal-message .modal-body').html(msg);
        $('#modal-message').modal('show');
      },
      referImage = function (file) {
        var reader = new FileReader();
        if (!file.type.match('image.*')) {
          return;
        }
        reader.onload = function () {
          $('.jcrop-holder').remove();
          $('#up-image').unbind();
          $('#up-image').remove();
          $('#image-form').append("<img id=\"up-image\" alt=\"upload image\">");
          $('#up-image').attr('src', reader.result);
          $('#up-image').Jcrop({
            aspectRatio: 1,
            onSelect: updateCoords,
            onChange: showPreview
          });
        }
        reader.readAsDataURL(file);
      },
      drawCanvas = function () {
        var $img = $('#up-image'),
          img = $img[0],
          ctx = $canvas[0].getContext('2d');
          ctx.drawImage(img, x, y, w, h, 0, 0, w, h);
      },
      convertImage = function () {
        var canvas = $canvas[0].toDataURL(),
          base64Data = canvas.split(',')[1],
          data = window.atob(base64Data),
          buff = new ArrayBuffer(data.length),
          arr = new Uint8Array(buff),
          i, dataLen;
        for( i = 0, dataLen = data.length; i < dataLen; i++){
          arr[i] = data.charCodeAt(i);
        }
        blob = new Blob([arr], {type: 'image/png'});
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

    $('#up-image').click(function () {
      $('input[type=file]').click();
    });

    $('#up-image').on({
      'dragenter': util.stop,
      'dragover': util.stop,
      'dragleave': util.stop,
      'drop': function (event) {
        var file = event.originalEvent.dataTransfer.files[0];
        util.stop(event);
        referImage(file);
      }
    });

    $('input[type=file]').change(function () {
      var file = $(this).prop('files')[0];
      referImage(file);
    });

    setMap();

    $('#up-submit').click(function () {
      var fd = new FormData();
      if (!$('input[type=file]').prop('files')[0]) {
        showModal('警告', '<p>アップロードする画像を選択もしくはドラッグ&ドロップしてください。</p>');
        return false;
      }
      if (!w) {
        showModal('警告', '<p>アップロードする画像を範囲選択してください。</p>');
        return false;
      }
      if (w != h) {
        showModal('警告', '<p>アップロードする画像は正方形で範囲選択してください。</p>');
        return false;
      }
      if (!latitude || !longitude) {
        showModal('警告', '<p>アップロードする画像の位置情報をマーカーで指定してください。</p>');
        return false;
      }
      $('#up-submit').attr('disabled', true);
      $canvas.attr({width: w, height: h});
      drawCanvas();
      convertImage();
      fd.append('path', blob);
      fd.append('latitude', latitude);
      fd.append('longitude', longitude);
      $.ajax({
        async: true,
        url: '//tokyo-animation.azurewebsites.net/api/pictures',
        type: 'POST',
        processData: false,
        contentType: false,
        data: fd
      }).done(function () {
        showModal('成功', '<p>アップロードに成功しました。</p>');
      }).fail(function () {
        showModal('警告', '<p>アップロードに失敗しました。<br>しばらくたってから再びアップロードしてください。</p>');
      }).always(function () {
        $('#up-submit').attr('disabled', false);
        $('#up-submit').removeAttr('disabled');
      });
    });
  });
  </script>
</body>
</html>
<?php
file_put_contents('post.html', ob_get_contents());
ob_end_clean();
?>
