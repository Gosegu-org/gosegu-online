<!DOCTYPE html>
<html lang="ko">
<head>
  <?php session_start() ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>gosegu online</title>

  <style>
    * {
      margin: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #f8dec1;
      color: black;
      font-family: Arial, sans-serif;
    }

    .logo {
      width: 150px;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f8dec1;
      color: black;
      padding: 10px;
      overflow: hidden;
      height: 50px;
    }

    .navbar-links {
      display: flex;
    }

    .navbar-links a {
      color: black;
      text-decoration: none;
      padding: 8px 15px;
    }

    .navbar-links a:hover {
      background-color: #555;
      color: white;
    }

    .login-button {
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    .middle {
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .middle div {
      width: 550px;
      height: 550px;
      background-color: white;
      border: 1px solid #ccc;
      padding: 20px; /* 여백 추가 */
      overflow: auto; /* 내용이 넘칠 경우 스크롤 표시 */
      position: absolute;
      bottom: 50px;
    }

    .middle div h1 {
        color: black;
        font-size: 40px;
    }

    .middle div p {
      font-size: 18px;
      color: #333;
      word-wrap: break-word; /* 긴 단어를 강제로 줄 바꿈 */
      margin-top: 50px;
    }
    
    .footer {
      height: 350px;
      background-color: #454f65;
    }
  </style>
</head>
<body>
<nav class="navbar">
      <a href="/index.php"
        ><img class="logo" src="../Assets/logo.png" alt="로고"
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
    <div>
        <h1>랄로 왈</h1>
        <p>내가 누군가를 좋아한다는 사실이 그 사람에게는 상처가 될 수 있잖아요</p>
        <p>남 탓을 할 수도 있다. 우리는 남이니까</p>
        <p>불편해? 불편하면 자세를 고쳐앉아</p>
        <p>밥해주고 청소해주고 빨래해주고 좀 제육이나 볶아온나</p>
        <p>열심히 하시잖아</p>
    </div>
  </div>
  <footer class="footer"></footer>
</body>
</html>
