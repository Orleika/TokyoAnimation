<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <base href="//localhost/tokyo/">
  <title>Top</title>
</head>
<body>
  <header>
    <h1>Tokyo Animation</h1>
  </header>
  <main>
    <div id="image-form"><img id="up-image" src="img/no.png" alt="no image"></div>
    <form id="up-form">
      <input type="file" name="upimage" size="30">
      <canvas id="up-canvas" width="500" height="500"></canvas>
      <input id="up-submit" type="submit" value="submit">
    </form>
  </main>
  <footer></footer>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>