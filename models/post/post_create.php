<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $category_id = $_POST["category_id"];
    $post_title = $_POST["post_title"];
    $post_contents = $_POST["post_contents"];

    $api_endpoint = "api.gosegu.online:4029/posts/create.php";

    $data = array(
        'user_id' => $user_id,
        'category_id' => $category_id,
        'post_title' => $post_title,
        'post_contents' => $post_contents
    );

    $ch = curl_init($api_endpoint);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode == 200) {
        echo $response;
    } elseif ($httpCode == 404) {
        echo '<script>alert("서버를 찾을 수 없습니다.");</script>';
    } else {
        echo '<script>alert("알 수 없는 오류 발생");</script>';
    }

    curl_close($ch);
}
?>
