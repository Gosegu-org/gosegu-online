<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Delete Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8dec1;
            padding: 20px;
        }
        .confirmation-box {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }
        .confirmation-box h2 {
            margin-top: 0;
        }
        .confirmation-box form {
            display: inline-block;
        }
        .confirmation-box form button {
            padding: 8px 15px;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>계정을 삭제하시겠습니까?</h2>
        <form action="/models/user/user_delete.php" method="POST">
            <input type="hidden" name="confirm_delete" value="yes">
            <button type="submit">네, 삭제합니다</button>
        </form>
        <form action="/user/my_account.php">
            <button type="submit">아니요</button>
        </form>
    </div>
</body>
</html>
