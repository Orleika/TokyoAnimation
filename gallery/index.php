<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include_once("../_parts/head.html"); ?>
  <title>設定 | TOKYO ANIMATION</title>
</head>
<body>
  <!--固定型ヘッダー-->
  <?php include_once("../_parts/head_nav.html"); ?>

  <!--大見出し-->
  <?php include_once("../_parts/header.html"); ?>

  <!--コンテンツ-->
  <div class="container">
    <div class="raw">
      <!--ナビゲーション-->
      <?php include_once("../_parts/side_nav.html"); ?>

      <!--メイン-->
      <div class="col-md-8">
        <div id="gif-anime" class="row">
          <div class="col-md-6 col-md-offset-3">
            <a href="#" class="thumbnail">
              <img src="./img/thumbnail-sample.png" alt="thumbnail-sample">
            </a>
          </div>
        </div>

        <!--サムネイル-->
        <div id="gallery">
          <div class="row">
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
            <div class="col-md-4">
              <a href="#" class="thumbnail">
                <img src="./img/thumbnail-sample.png" alt="thumbnail-sample"></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <!--フッター-->
    <footer>
      <?php include_once("../_parts/footer.html"); ?></footer>
  </div>

  <?php include_once("../_parts/script.html"); ?>
  <script src="js/querystring.js"></script>
  <script src="js/gallery.js"></script>
  <script>
  $(function () {
    if (!query.id) {
      location.href = 'new/';
    }

    var url = '//tokyo-animation.azurewebsites.net/api/animations/' + query['id'],
      getGif = function (json) {
        $('#gif-anime img').attr({'src': json.Url, 'alt': 'gif animation'});
      };

    $('#gallery').thumGallery({'url': url});

    $.ajax({
      async: true,
      url: url,
      type: 'GET',
      dataType: 'json'
    }).done(function (json) {
      getGif(json);
    }).fail(function () {
    }).always(function () {
    });
  });
  </script>
</body>
</html>