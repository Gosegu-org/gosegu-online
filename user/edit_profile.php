<!DOCTYPE html>
<html lang="ko">
<head>
    <?php session_start(); 

      if (isset($_GET['user_id'])) {
          $user_id = $_GET['user_id'];
      
          $_SESSION["user_id"] = $user_id;
      } else {
          $user_id = $_SESSION["user_id"];
      }
      
      $api_url = 'http://api.gosegu.online:4029/users/info.php?user_id=' . $user_id;
      
      $curl = curl_init($api_url);
      
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $user_info = json_decode($response, true);
      curl_close($curl);
    ?>
    <meta charset="UTF-8">
    <title>개인정보 수정</title>
    <link rel="stylesheet" href="edit_profile.css">
</head>
<body>
<nav class="navbar">
      <a href="../index.php"><img class="logo" src="../Assets/logo.png" alt="로고" /></a>
      <div class="navbar-links">
        <a href="../Forum/forum.php">Forum</a>
        <a href="../about/about.php">About</a>
        <a href="../Member/member.php">Members</a>
        <?php
          if (isset($_SESSION['user_id'])==true) {
            echo '<a href="my_account.php">내 정보</a>
              <a href="logout.php">로그아웃</a>';
          } else {
            echo '<a href="login.php" class="login-button">로그인</a>';
          }
        ?>
      </div>
    </nav>
    <div class="container">
        <div class="signup-box">
            <center><h2>개인정보 수정</h2></center>
            <p class="signup-message">수정하시려면 아래 정보를 입력하세요</p>
            <form action="../models/user/user_update.php" method="post">
                <label for="user_name">사용자 이름</label>
                <input type="text" id="user_name" name="user_name" value="<?php echo $user_info['user_name']; ?>" required><br>
                
                <label for="user_pw">비밀번호</label>
                <input type="password" id="user_pw" name="user_pw" required><br>
                
                <label for="user_email">이메일</label>
                <input type="email" id="user_email" name="user_email" value="<?php echo $user_info['user_email']; ?>" required><br>
                
                <label for="user_comment">코멘트</label>
                <input type="comment" id="user_comment" name="user_comment" value="<?php echo $user_info['user_comment']; ?>"><br><br>
                
                <input type="submit" value="수정하기">
            </form>
        </div>
        
    </div>
    <div class="links">
        <a href="my_account.php">내 정보</a>
        <a href="edit_profile.php">개인정보 수정</a>
        <a href="delete_account.php">계정 삭제</a>  
    </div>
</body>
</html>
