<?php
header('Content-Type: application/json');

// Kullanıcının IP adresini al
$userIP = $_SERVER['REMOTE_ADDR'];

// IP adresi özel (local) mi? Özel IP adresleri için varsayılan olarak İstanbul'u döndür.
$privateIPs = ['127.0.0.1', '::1'];
if (in_array($userIP, $privateIPs)) {
    echo json_encode(["city" => "Istanbul"]);
    exit;
}

// IP API'yi kullanarak konumu bul
$geoAPI = "http://ip-api.com/json/{$userIP}?fields=status,message,city,countryCode";
$response = @file_get_contents($geoAPI);
$data = json_decode($response, true);

// API yanıtını kontrol et
if (!$data || $data['status'] !== 'success') {
    echo json_encode(["error" => "Konum bilgisi alınamadı. Varsayılan olarak İstanbul atanıyor.", "city" => "Istanbul"]);
    exit;
}

// API'den gelen şehir bilgisi
$city = $data['city'] ?? "Istanbul";

// JSON çıktıyı döndür
echo json_encode(["city" => $city]);
?>
