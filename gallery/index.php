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

      </div>
    </div>

    <hr>

    <!--フッター-->
    <footer>
      <p>&copy; TeamA 2014 TOKYO HACKATHON</p>
    </footer>
  </div>

  <?php include_once("../_parts/script.html"); ?>
  <script>
  $(function () {
    $('#side-nav li').eq(3).attr({'class': 'active'});
  });
  </script>
</body>
</html>