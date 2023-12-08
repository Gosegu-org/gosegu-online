<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];

    $api_endpoint = "api.gosegu.online:4029/users/login.php";

    $data = array(
        'user_id' => $user_id,
        'user_pw' => $user_pw
    );

    $ch = curl_init($api_endpoint);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode == 200) {
        $responseData = json_decode($response, true);

        if ($responseData && isset($responseData['code'])) {
            $code = $responseData['code'];

            if ($code == 201) {
                session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_pw'] = $user_pw;
    header("Location: /index.php");
    exit();

            } elseif ($code == 403) {
                echo '<script>alert("아이디 또는 비밀번호가 올바르지 않습니다.");</script>';
            } elseif ($code == 400) {
                echo '<script>alert("아이디 또는 비밀번호 값이 없습니다.");</script>';
            } else {
                echo '<script>alert("로그인에 실패했습니다. 다시 시도해주세요.");</script>';
            }
        } else {
            echo '<script>alert("서버 응답 형식 오류");</script>';
        }
    } elseif ($httpCode == 404) {
        echo '<script>alert("서버를 찾을 수 없습니다.");</script>';
    } else {
        echo '<script>alert("알 수 없는 오류 발생");</script>';
    }

    curl_close($ch);
}
?>
