<?php

session_start();

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

curl_close($curl);

if ($response === false) {
    echo 'GET 요청 실패: ' . curl_error($curl);
} else {
    $user_info = json_decode($response, true);

    if ($user_info !== null) {
        ?>
        <!DOCTYPE html>
        <html lang="ko">
        <head>
            <meta charset="UTF-8">
            <title>User Info</title>
            <link rel="stylesheet" href="my_account.css">
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
            echo '<a href="my_account.php">내 정보</a>
              <a href="logout.php">로그아웃</a>';
          } else {
            // 로그인 되어 있지 않다면
            echo '<a href="login.php" class="login-button">로그인</a>';
          }
        ?>
      </div>
    </nav>
            <div class="user-info">
                <h1>유저 정보</h1>
                <p><strong>이름:</strong> <?php echo $user_info['user_name']; ?></p>
                <p><strong>이메일:</strong> <?php echo $user_info['user_email']; ?></p>
                <p><strong>코멘트:</strong> <?php echo $user_info['user_comment']; ?></p>
                <p><strong>가입일:</strong> <?php echo $user_info['user_created_at']; ?></p>
            </div>
            <div class="links">
                <a href="my_account.php">내 정보</a>
                <a href="edit_profile.php">개인정보 수정</a>
                <a href="delete_account.php">계정 삭제</a>  
            </div>
        </body>
        </html>
        <?php
    } else {
        echo 'JSON 파싱 실패';
    }
}
?>
