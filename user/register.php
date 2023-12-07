<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <link rel="stylesheet" href="/user/register.css">
    <script>
        function goToIndex() {
            window.location.href = '../index.php';
        }

        function validateForm() {
            var userId = document.getElementById('user_id').value;
            var userName = document.getElementById('user_name').value;
            var userPw = document.getElementById('user_pw').value;
            var userEmail = document.getElementById('user_email').value;

            // 필수 입력란이 모두 비어있는지 확인
            if (userId === '' || userName === '' || userPw === '' || userEmail === '') {
                alert('모든 필수 입력란을 채워주세요.');
                return false; // 폼 제출을 막음
            }
            return true; // 폼 제출 허용
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="signup-box">
            <center><h2>회원가입</h2></center>
            <span class="close-button" onclick="goToIndex()">&times;</span>
            <p class="signup-message">가입하시려면 아래 정보를 입력하세요</p>
            <form action="../model/user/user_create.php" method="post" onsubmit="return validateForm()">
                <label for="user_id">사용자 ID<span class="required">*</span></label>
                <input type="text" id="user_id" name="user_id" required><br>
                
                <label for="user_name">사용자 이름<span class="required">*</span></label>
                <input type="text" id="user_name" name="user_name" required><br>
                
                <label for="user_pw">비밀번호<span class="required">*</span></label>
                <input type="password" id="user_pw" name="user_pw" required><br>
                
                <label for="user_email">이메일<span class="required">*</span></label>
                <input type="email" id="user_email" name="user_email" required><br>
                
                <label for="user_comment">코멘트</label>
                <input type="comment" id="user_comment" name="user_comment"><br><br>
                
                <input type="submit" value="가입하기">
            </form>
            <p class="login-message">이미 계정이 있으신가요? <a href="/user/login.php">로그인</a></p>
        </div>
    </div>
</body>
</html>
