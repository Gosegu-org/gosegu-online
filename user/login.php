<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <link rel="stylesheet" href="/user/login.css">
    <!-- You'll link your CSS file here -->
    <script>
        // Your JavaScript functions can go here
        function goToIndex() {
            window.location.href = '/index.php';
        }

        function validateLoginForm() {
            // Validation logic can be added here
            // ...
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2>로그인</h2>
            <span class="close-button" onclick="goToIndex()">&times;</span>
            <p class="login-message">아래 정보로 로그인하세요</p>
            <form action="/models/user/user_login.php" method="post" onsubmit="return validateLoginForm()">
                <label for="login_id">사용자 ID</label>
                <input type="text" id="login_id" name="login_id" required><br>

                <label for="login_pw">비밀번호</label>
                <input type="password" id="login_pw" name="login_pw" required><br><br>

                <input type="submit" value="로그인">
            </form>
            <p class="signup-message">계정이 없으신가요? <a href="/user/register.php">회원가입</a></p>
        </div>
    </div>
</body>

</html>
