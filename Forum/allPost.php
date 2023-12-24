<!DOCTYPE html>
<html lang="ko">
  <head>
    <?php session_start(); ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gosegu online</title>
    <link rel="stylesheet" href="/Forum/allPost.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    <script>
      function redirectToWrite() {
      var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

    if (isLoggedIn) {
      window.location.href = "/Forum/write.php";
    } else {
      alert("로그인이 필요합니다.");
      }
  }
</script>
  </head>
  <body>
    <nav class="navbar">
      <a href="/index.php"
        ><img class="logo" src="/Assets/logo.png" alt="로고"
      /></a>
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
    <div class="middle">
      <div class="middle_title">
        <h1>gosegu online</h1>
        <h3>gosegu is best</h3>
      </div>
      <div class="middle_box">
        <div class="top-bar">
          <div class="buttons">
            <button type="button" class="btn">
              <a href="/Forum/forum.php">신규 게시물</a>
            </button>
            <button type="button" class="btn post">
              <a href="/Forum/allPost.php">전체 게시물</a>
            </button>
            <button type="button" class="btn">
              <a href="/Forum/mypost.php">내 게시물</a>
            </button>
          </div>
        </div>
        <div class="write_btn_wrap">
        <button onclick="redirectToWrite()">게시물 작성하기</button>
        </div>
        <?php
$api_url = 'http://api.gosegu.online:4029/posts/list.php';
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$post_data = json_decode($response, true);
if ($post_data) {
    foreach ($post_data as $post) {
        echo '<div class="post" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; margin-left: 20px; margin-right: 20px;">';
        echo '<h2 class="title" style="color: #333; font-size: 24px; margin-bottom: 10px;"><a href="post_info.php?post_id=' . $post['post_id'] . '&title=' . urlencode($post['post_title']) . '">' . $post['post_title'] . '</a></h2>';
        echo '<p style="color: #555; font-size: 16px; margin-bottom: 8px;">' . $post['post_contents'] . '</p>';
        echo '<p style="color: #777; margin-bottom: 4px;">작성자: ' . $post['user_id'] . '</p>';
        echo '<p style="color: #777; margin-bottom: 4px;">작성일: ' . $post['post_date'] . '</p>';
        echo '</div>';
    }
} else {
    echo '글 목록을 불러올 수 없습니다.';
}
?>


      </div>
    </div>
    <footer class="footer"></footer>
  </body>
</html>
