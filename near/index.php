<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include_once("../_parts/head.html"); ?>
  <title>近くを探す | TOKYO ANIMATION</title>
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

      <!--サムネイルサンプル-->
      <div id="gallery" class="col-md-8">
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

    <hr>

    <!--フッター-->
    <footer>
      <p>&copy; TeamA 2014 TOKYO HACKATHON</p>
    </footer>
  </div>

  <?php include_once("../_parts/script.html"); ?>
  <script src=""></script>
  <script>
  $(function () {
    var getGallery = function (json) {
      var i;
      for(i in json) {
        $('#gallery a').eq(i).attr({'href': json[i].Animation.Url});
        $('#gallery img').eq(i).attr({'src': json[i].Url});
      }
    };
    $('#side-nav li').eq(1).attr({'class': 'active'});
    $.ajax({
      async: true,
      url: '//tokyo-animation.azurewebsites.net/api/pictures/near',
      type: 'GET',
      dataType: 'json'
    }).done(function (json) {
      getGallery(json.Pictures);
    }).fail(function () {
    }).always(function () {
    });
  });
  </script>
</body>
</html>