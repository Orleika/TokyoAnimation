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
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"></div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"></div>
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

    <hr>

    <!--フッター-->
    <footer>
      <?php include_once("../_parts/footer.html"); ?>
    </footer>
  </div>

  <?php include_once("../_parts/script.html"); ?>
  <script>
  $(function () {
    $('#side-nav li').eq(4).attr({'class': 'active'});
  });
  </script>
</body>
</html>