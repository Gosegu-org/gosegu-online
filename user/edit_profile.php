<!DOCTYPE html>
<html lang="ko">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <title>개인정보 수정</title>
    <link rel="stylesheet" href="/user/edit_profile.css">
</head>
<body>
<nav class="navbar">
      <a href="/index.php"><img class="logo" src="/Assets/logo.png" alt="로고" /></a>
      <div class="navbar-links">
        <a href="/Forum/forum.php">Forum</a>
        <a href="/about/about.php">About</a>
        <a href="/Member/member.php">Members</a>
        <?php
          if (isset($_SESSION['user_id'])==true) {
            echo '<a href="/user/my_account.php">내 정보</a>
              <a href="/user/logout.php">로그아웃</a>';
          } else {
            echo '<a href="/user/login.php" class="login-button">로그인</a>';
          }
        ?>
      </div>
    </nav>
    <div class="container">
        <div class="signup-box">
            <center><h2>개인정보 수정</h2></center>
            <p class="signup-message">수정하시려면 아래 정보를 입력하세요</p>
            <form action="/models/user/user_update.php" method="post">
                <label for="user_name">사용자 이름</label>
                <input type="text" id="user_name" name="user_name"><br>
                
                <label for="user_pw">비밀번호</label>
                <input type="password" id="user_pw" name="user_pw"><br>
                
                <label for="user_email">이메일</label>
                <input type="email" id="user_email" name="user_email"><br>
                
                <label for="user_comment">코멘트</label>
                <input type="comment" id="user_comment" name="user_comment"><br><br>
                
                <input type="submit" value="수정하기">
            </form>
        </div>
        
    </div>
    <div class="links">
                <a href="/user/my_account.php">내 정보</a>
                <a href="/user/edit_profile.php">개인정보 수정</a>
                <a href="/user/delete_account.php">계정 삭제</a>  
            </div>
</body>
</html>
