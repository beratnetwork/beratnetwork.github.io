<?php
require_once 'config.php';

// Şehir ve ülke bilgisi
$city = isset($_GET['city']) ? $_GET['city'] : 'Istanbul';
$country = "Turkey"; // Varsayılan ülke Türkiye

// İngilizce - Türkçe Gün Çeviri Dizisi
$gunler = [
    "Saturday" => "Cumartesi",
    "Sunday" => "Pazar",
    "Monday" => "Pazartesi",
    "Tuesday" => "Salı",
    "Wednesday" => "Çarşamba",
    "Thursday" => "Perşembe",
    "Friday" => "Cuma"
];

// Aladhan API'den Ramazan boyunca tüm namaz vakitlerini al
function fetchRamazanTimes($city, $country, $gunler) {
    $apiUrl = "https://api.aladhan.com/v1/calendarByCity?city=" . urlencode($city) . "&country=" . urlencode($country) . "&method=13&month=3&year=2025";

    $response = file_get_contents($apiUrl);

    // API isteği başarısızsa hata döndür
    if ($response === FALSE) {
        return json_encode(["error" => "API isteği başarısız oldu. URL erişilemiyor."]);
    }

    $data = json_decode($response, true);

    // API Yanıtı Boşsa veya Geçersizse
    if (!$data || !isset($data['data'])) {
        return json_encode([
            "error" => "API'den geçersiz yanıt alındı.",
            "response" => $response // API'den gelen yanıtı görmek için
        ]);
    }

    // Ramazan boyunca vakitleri düzenle
    $timings = [];
    foreach ($data['data'] as $index => $day) {
        $ingilizceGun = $day['date']['gregorian']['weekday']['en']; // API'den İngilizce gün adı al
        $turkceGun = isset($gunler[$ingilizceGun]) ? $gunler[$ingilizceGun] : $ingilizceGun; // Türkçeye çevir

        $timings[] = [
            "date" => $day['date']['gregorian']['date'] . " " . $turkceGun,
            "Imsak" => $day['timings']['Imsak'],
            "Sunrise" => $day['timings']['Sunrise'],
            "Dhuhr" => $day['timings']['Dhuhr'],
            "Asr" => $day['timings']['Asr'],
            "Maghrib" => $day['timings']['Maghrib'],
            "Isha" => $day['timings']['Isha']
        ];
    }

    // JSON formatında döndür
    return json_encode($timings);
}

// API'den verileri al ve JSON formatında döndür
header('Content-Type: application/json');
echo fetchRamazanTimes($city, $country, $gunler);
?>
