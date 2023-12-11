<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
session_start();
$user_id = $_SESSION["user_id"];

$data = array('user_id' => $user_id);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'api.gosegu.online:4029/users/delete.php'); 
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    
    session_destroy();
    echo $response;
    
curl_close($curl);
}
?>
