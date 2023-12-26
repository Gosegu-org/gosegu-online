<!DOCTYPE html>
<html lang="ko">
  <head>
    <?php session_start(); ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>gosegu online</title>
    <link rel="stylesheet" href="write.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
  </head>
  <body>
    <?php require_once("../header.php"); ?>
    <nav class="navbar">
      <a href="../index.php"
        ><img class="logo" src="../Assets/logo.png" alt="로고"
      /></a>
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
      <div class="middle_title">
        <h1>gosegu online</h1>
        <h3>gosegu is best</h3>
      </div>
      <div class="middle_box">
        <div class="top-bar">
          <div class="buttons">
            <button type="button" class="btn category">
              <a href="../Forum/forum.php">신규 게시물</a>
            </button>
            <button type="button" class="btn">
              <a href="../Forum/allPost.php">전체 게시물</a>
            </button>
            <button type="button" class="btn">
              <a href="../Forum/mypost.php">내 게시물</a>
            </button>
          </div>
        </div>
        <?php $user_id = 'root';
         $user_pw = 'root';
        ?>
           
     <form id="postForm" action="/models/post/post_create.php" method="post">
    <h2 class="text_title">글 작성</h2>
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
    <select id="categorySelect" name="category_id"> <!-- 이름을 category_id로 변경 -->
        <?php foreach ($responseData as $item) : ?>
            <option value="<?php echo $item['category_id']; ?>">
                <?php echo $item['category_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <label class="text_Title" for="post_title">글 제목</label><br>
    <input type="text" id="post_title" name="post_title"><br><br>
    
    <label for="post_contents">글 내용</label><br>
    <textarea id="post_contents" name="post_contents" rows="4" cols="50"></textarea><br><br>
    
    <input type="submit" value="글 등록">
</form>
      </div>
    </div>
    <footer class="footer"></footer>
  </body>
</html>
