<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gosegu online</title>
    <link rel="stylesheet" href="/header/header.css" />
  </head>
  <body>
    <nav class="navbar">
      <a href="/index.html"><img class="logo" src="/Assets/logo.png" alt="로고" /></a>
      <div class="navbar-links">
        <a href="/Forum/forum.php">Forum</a>
        <a href="/About/about.php">About</a>
        <a href="/Member/member.php">Members</a>
        <?php
          session_start(); 
          if (isset($_SESSION['user_id'])) {
            // 로그인 되어 있다면
            echo '<a href="/user/profile.php" class="login-button">내 정보</a>';
          } else {
            // 로그인 되어 있지 않다면
            echo '<a href="/user/register.php" class="login-button">로그인</a>';
          }
        ?>
      </div>
    </nav>
    <div class="middle"></div>
    <footer class="footer"></footer>
  </body>
</html>
