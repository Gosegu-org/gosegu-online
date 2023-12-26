<!DOCTYPE html>
<html lang="ko">
  <head>
    <?php if (isset($_SESSION) === false){session_start();} ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gosegu online</title>
    <link rel="stylesheet" href="../Member/member.css" />
  </head>
  <body>
    <nav class="navbar">
      <a href="../index.php"><img class="logo" src="../Assets/logo.png" alt="로고" /></a>
      <div class="navbar-links">
        <a href="../Forum/forum.php">Forum</a>
        <a href="../about/about.php">About</a>
        <a href="../Member/member.php">Members</a>
        <?php
          if (isset($_SESSION['user_id'])===true) {
            echo '<a href="../user/my_account.php">내 정보</a>
              <a href="../user/logout.php">로그아웃</a>';
          } else {
            // 로그인 되어 있지 않다면
            echo '<a href="../user/login.php" class="login-button">로그인</a>';
          } 
        ?>
      </div>
    </nav>
    <div class="middle">
    <?php
        $json_data = file_get_contents('http://api.gosegu.online:4029/users/info_all.php');
        $users = json_decode($json_data, true);
        
        if ($users !== null && is_array($users) && count($users) > 0) {
          echo '<table class="user-table">';
          echo '<tr>';
          echo '<th>User Name</th>';
          echo '<th>Email</th>';
          echo '<th>Comment</th>';
          echo '</tr>';
          
          foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user['user_name'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . $user['comment'] . '</td>';
            echo '</tr>';
          }
          
          echo '</table>';
        } else {
          echo '<p>No user data available.</p>';
        }
      ?>
    </div>
    <div class="middle"></div>
    <footer class="footer"></footer>
  </body>
</html>
