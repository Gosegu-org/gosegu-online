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
    if ($httpCode === 404) {
        echo '<script>alert("오류가 발생했습니다.");</script>';
        return -1;
    } else if ($httpCode === 200) {
        echo '<script>alert("회원가입 완료하였습니다.");</script>';
    } else {
        echo '<script>alert("알수없는 오류");</script>';
    }

    curl_close($ch);
}
?>
