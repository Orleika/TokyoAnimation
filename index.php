<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include_once("_parts/head.html"); ?>
  <title>TOKYO ANIMATION</title>
</head>
<body>
  <div id="bg-img" class="container">
    <div id="top-title" class="jumbotron">
      <div class="container">
        <h1>
          <img src="./img/logo0.png" width="500"></h1>
        <p class="color-base shadow-white">未来にのこそう、私の東京</p>
      </div>
    </div>

    <div id="id-form" class="row color-sub">
      <div class="col-xs-6 col-md-4"></div>
      <div class="col-xs-12 col-md-8">
        <section id="loginForm">
          <form action="/Account/Login" class="form-horizontal" method="post" role="form">
            <input name="__RequestVerificationToken" type="hidden" value="6BW-zYsVi8eBdDe5Nbr43pUK5PVvNQlg3JNT0WnrDaNyocujaE5ZA9MRuY3jhy01eInQqa2-CdWNWRjZIPBnNTcMe7uUHCGxJKAOaQu7WrY1" />
            <h4>東京メモリを閲覧するためにはログインしてください。</h4>
            <hr />
            <div class="form-group">
              <label class="col-md-2 control-label" for="Email">電子メール</label>
              <div class="col-md-10">
                <input class="form-control" id="Email" name="Email" type="text" value="" />

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="Password">パスワード</label>
              <div class="col-md-10">
                <input class="form-control" id="Password" name="Password" type="password" />

              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-2 col-md-10">
                <div class="checkbox">
                  <input id="RememberMe" name="RememberMe" type="checkbox" value="true" />
                  <input name="RememberMe" type="hidden" value="false" />
                  <label for="RememberMe">このアカウントを記憶する</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="ログイン" class="btn btn-default" />
                <a id="regist-change" class="btn btn-primary" href="javascript:void(0)">新規登録</a>
              </div>
            </div>
          </form>
          <div class="col-md-offset-2 col-md-10">
            <form action="/Account/ExternalLogin" method="post">
              <input name="__RequestVerificationToken" type="hidden" value="zmcTVpun1Zkemlw4MgLV3BsZR64BO3HrlqOW3ORF5OWSFvsA_omiSKFjQpyp0PRB0m7eMTJLf0dUycPGLxM1BpGaZvXFRADBWbDErrEk15o1" />
              <div id="socialLoginList">
                <button type="submit" class="btn btn-primary" id="Facebook" name="provider" value="Facebook" title="Log in using your Facebook account">Facebookでログイン</button>
              </div>
            </form>
            <div class="col-md-offset-2 col-md-10"></section>
            <section id="registForm">
              <form action="/Account/Register" class="form-horizontal" method="post" role="form">
                <input name="__RequestVerificationToken" type="hidden" value="9FJbibTfo7-lfdz-u5GnPYj0474MtuAN20oVUMe0kl6Kse8D8gGv6f0TcUQTH8l1nVm3IfQM0TdxHb8MbtIqalIrcfgJfztml4XyGXdPOGM1" />
                <h4>新しいアカウントを作成します。</h4>
                <hr />
                <div class="form-group">
                  <label class="col-md-2 control-label" for="Email">電子メール</label>
                  <div class="col-md-10">
                    <input class="form-control" id="Email" name="Email" type="text" value="" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="Password">パスワード</label>
                  <div class="col-md-10">
                    <input class="form-control" id="Password" name="Password" type="password" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="ConfirmPassword">パスワードの確認入力</label>
                  <div class="col-md-10">
                    <input class="form-control" id="ConfirmPassword" name="ConfirmPassword" type="password" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-offset-2 col-md-10">
                    <input type="submit" class="btn btn-default" value="登録" />
                    <a id="login-change" class="btn btn-primary" href="javascript:void(0)">通常ログイン</a>
                  </div>
                </div>
              </form>
            </section>
          </div>
        </div>

        <!--フッター-->
        <footer class="color-white">
          <?php include_once("_parts/footer.html"); ?></footer>
      </div>
    </div>

    <?php include_once("_parts/script.html"); ?>
    <script>
  $(function () {
    var type = Math.random() < 0.5 ? 0 : 1;
    if (type == 0) {
      $('body').attr({'class': 'top-old-image'});
      $('#id-form').attr({'class': 'row color-white'});
    } else if (type == 1) {
      $('body').attr({'class': 'top-new-image'});
      $('#id-form').attr({'class': 'row color-white'});
    }
    $('#regist-change').click(function () {
      $('#loginForm').css('display', 'none');
      $('#registForm').css('display', 'block');
    });
    $('#login-change').click(function () {
      $('#loginForm').css('display', 'block');
      $('#registForm').css('display', 'none');
    });
  });
  </script></body>
  </html>