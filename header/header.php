<?php
// URL 설정 - GET 요청을 보낼 서버의 URL
$url = 'http://api.gosegu.online:4029/categories/list.php'; // 여기에 요청을 보낼 URL을 입력하세요.

// cURL 초기화
$curl = curl_init();
// cURL 옵션 설정
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true, // 응답을 변수에 저장할 것임
    CURLOPT_TIMEOUT => 30, // 타임아웃 설정 (초)
    // 기타 필요한 옵션들을 추가할 수 있습니다.
]);

// cURL 실행 및 응답 받기
$response = curl_exec($curl);

// cURL 에러 처리
if ($response === false) {
    $error = curl_error($curl);
    // 에러 처리 로직 추가
} else {
    // 정상적으로 응답을 받았을 때, $response 변수에 응답 내용이 저장됩니다.
    // 여기에서 $response를 필요에 따라 처리할 수 있습니다.
    
    // JSON 형식의 응답을 PHP 배열로 변환 (필요한 경우)
    $responseData = json_decode($response, true);
    
    // 이후 $responseData를 사용하여 데이터를 처리할 수 있습니다.
}

// foreach ($responseData as $item) {
//     $categoryID = $item['category_id'];
//     $categoryName = $item['category_name'];
    
//     // 각 객체에서 필요한 작업 수행
//     echo "Category ID: $categoryID, Category Name: $categoryName <br>";
// }



// cURL 리소스 해제
curl_close($curl);
?>



