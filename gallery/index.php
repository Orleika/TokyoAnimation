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
      <div class="col-md-8"></div>
    </div>

    <hr>

    <!--フッター-->
    <footer>
      <?php include_once("../_parts/footer.html"); ?></footer>
  </div>

  <?php include_once("../_parts/script.html"); ?>
  <script src="js/querystring.js"></script>
  <script>
  $(function () {
    /*if (!query.id) {
      location.href = 'new/';
    }*/

    $('#side-nav li').eq(3).attr({'class': 'active'});

    /*$.ajax({
      async: true,
      url: '//tokyo-animation.azurewebsites.net/api/animations/' + query['id'],
      type: 'GET',
      dataType: 'json'
    }).done(function (json) {
      getGallery(json.Pictures);
    }).fail(function () {
    }).always(function () {
    });*/
  });
  </script></body>
</html>