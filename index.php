<!DOCTYPE html>
<html lang="ko">
  <head>
    <?php if (isset($_SESSION) === false){session_start();} ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gosegu online</title>
    <link rel="stylesheet" href="/index.css" />
  </head>
  <body>
    <nav class="navbar">
      <a href="/index.php"><img class="logo" src="/Assets/logo.png" alt="로고" /></a>
      <div class="navbar-links">
        <a href="/Forum/forum.php">Forum</a>
        <a href="/about/about.php">About</a>
        <a href="/Member/member.php">Members</a>
        <?php
          if (isset($_SESSION['user_id'])===true) {
            echo '<a href="/user/my_account.php">내 정보</a>
              <a href="/user/logout.php">로그아웃</a>';
          } else {
            // 로그인 되어 있지 않다면
            echo '<a href="/user/login.php" class="login-button">로그인</a>';
          }
        ?>
      </div>
    </nav>
    <div class="middle"></div>
    <footer class="footer"></footer>
  </body>
</html>
