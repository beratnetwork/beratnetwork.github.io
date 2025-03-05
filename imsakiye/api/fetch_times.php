<?php
require_once 'config.php';
require_once 'cache.php'; // Önbellek sistemini dahil et

// JSON formatında hata mesajları döndürmek için yardımcı fonksiyon
function jsonError($message, $extra = []) {
    $response = ["error" => $message] + $extra;
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Şehir bilgisi al ve temizle
$city = isset($_GET['city']) ? trim($_GET['city']) : 'Istanbul';
$country = COUNTRY;

// Önbellekten veri al
$cachedData = getCache($city);
if ($cachedData) {
    header('Content-Type: application/json');
    echo json_encode($cachedData);
    exit; // Önbellekten veriyi verdik, çıkış yap
}

// API çağrısını yap
$url = API_URL . urlencode($city) . "&country=" . urlencode($country) . "&method=13";

// API isteği yap ve hata kontrolü
$response = @file_get_contents($url);
if ($response === FALSE) {
    jsonError("API isteği başarısız oldu. URL erişilemiyor.");
}

// JSON'u çöz ve geçerliliğini kontrol et
$data = json_decode($response, true);
if (!$data || !isset($data['data']['timings'])) {
    jsonError("API'den geçersiz yanıt alındı.", ["response" => $response]);
}

// API verisini önbelleğe kaydet
setCache($city, $data['data']['timings']);

// JSON çıktıyı döndür
header('Content-Type: application/json');
echo json_encode($data['data']['timings']);
?>
