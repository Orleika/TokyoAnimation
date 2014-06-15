<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include_once("_parts/head.html"); ?>
  <title>新着動画 | TOKYO ANIMATION</title>
</head>
<body>
  <!--大見出し-->
  <?php include_once("_parts/header.html"); ?>

  <!--コンテンツ-->
  <div class="container">
    <div class="raw">
      <!--ナビゲーション-->
      <div class="col-md-4">
        <?php include_once("_parts/side_nav.html"); ?></div>

      <!--サムネイルサンプル-->
      <div id="gallery" class="col-md-8">
        <?php include_once("_parts/gallery.html"); ?></div>
    </div>

    <hr>

    <!--フッター-->
    <footer>
      <?php include_once("_parts/footer.html"); ?></footer>
  </div>

  <?php include_once("_parts/script.html"); ?>
  <script src="js/gallery.js"></script>
  <script>
  $(function () {
    $('#side-nav li').eq(0).attr({'class': 'active'});
    $('#gallery').thumGallery({'url': '//tokyo-animation.azurewebsites.net/api/animations', 'type': 'gif'});
  });
  </script>
</body>
</html>
<?php
file_put_contents('new.html', ob_get_contents());
ob_end_clean();
?>