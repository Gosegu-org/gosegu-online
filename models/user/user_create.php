<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_pw = $_POST['user_pw'];
    $user_email = $_POST['user_email'];
    $user_comment = $_POST['user_comment'];

    $api_endpoint = "api.gosegu.online:4029/api/signup.php";

    $data = array(
        'user_id' => $user_id,
        'user_name' => $user_name,
        'user_pw' => $user_pw,
        'user_email' => $user_email,
        'user_comment' => $user_comment
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
                echo '<script>alert("회원가입이 완료되었습니다.");</script>';
            } elseif ($code == 409) {
                echo '<script>alert("ID 혹은 이메일이 중복입니다.");</script>';
            } elseif ($code == 403) {
                echo '<script>alert("값이 비어있습니다.");</script>';
            } else {
                echo '<script>alert("회원가입에 실패했습니다. 다시 시도해주세요.");</script>';
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
