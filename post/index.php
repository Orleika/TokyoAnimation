<?php

  set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__));
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>投稿ページ | TokyoAnimation</title>
</head>
<body>
  <header></header>
  <main>
    <img src="img/img.jpg" id="jcrop_target">
    <div id="thumb">
        <img src="img/img.jpg" id="preview">
    </div>
<form action="jcrop_load.php" method="post" onsubmit="return checkCoords();"> <input type="hidden" id="x" name="x" /> <input type="hidden" id="y" name="y" /> <input type="hidden" id="w" name="w" /> <input type="hidden" id="h" name="h" /> <input type="submit" value="SUBMIT" /> </form>
  </main>
  <footer></footer>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="js/jquery.Jcrop.min.js"></script>
  <script src=""></script>
  <script>
  $(function() {
    $('#jcrop_target').Jcrop({
        aspectRatio: 1,
        onSelect: showPreview,
        onChange: showPreview
    });
  });
  </script>
</body>
</html>