<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gosegu online</title>
    <style>
  .post-box {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
  }

  .post-title {
    padding: 10px;
  }

  .post-date {
    font-style: italic;
    margin-bottom: 10px;
    color: #888;
  }

  hr {
    border: none;
    border-top: 1px solid #ccc;
    width: 100%; /* 변경 가능: hr 요소의 길이를 조절합니다. */
    margin: 20px auto; /* 가운데 정렬을 위한 마진 설정 */
  }

</style>

    <link rel="stylesheet" href="/Forum/allPost.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
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
    
        <?php
            $post_id = $_GET['post_id'] ?? null;

            if ($post_id) {
                // API로부터 JSON 데이터 가져오기
                $api_url = 'http://api.gosegu.online:4029/posts/read.php?post_id=' . $post_id;
                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // JSON 데이터를 PHP 배열로 변환
                $post_data = json_decode($response, true);

                // 데이터 출력
                if ($post_data) {
                    // 여기서 데이터를 사용하여 페이지를 구성할 수 있습니다.
                    echo '<div class="post-box">';
echo '<h2 class="post-title">' . $post_data['post_title'] . '</h2>';
echo '<p class="post-date">작성일: ' . $post_data['post_date'] . '</p>';
echo '<hr>'; // 줄 추가
echo '<p class="post-content">' . $post_data['post_contents'] . '</p>';
echo '</div>';

                } else {
                    echo '데이터를 가져올 수 없습니다.';
                }
            } else {
                echo '게시물 ID가 제공되지 않았습니다.';
            }
            ?>



      </div>
    </div>
    <footer class="footer"></footer>
  </body>
</html>
