<?php
// Kullanılacak API URL'si (Aladhan API)
define('API_URL', 'https://api.aladhan.com/v1/timingsByCity?city=');

// Varsayılan ülke (Türkiye için)
define('COUNTRY', 'Turkey');

// Önbellekleme süresi (saniye cinsinden) - 1 gün (86400 saniye)
define('CACHE_TIME', 86400);

// Önbellek ve veri dosyalarının yolları
define('CACHE_DIR', __DIR__ . '/../cache/'); // Önbellek klasörü
define('CACHE_FILE', CACHE_DIR . 'prayer_times.json'); // Ana önbellek dosyası
define('CITIES_FILE', __DIR__ . '/cities.json'); // Şehirler listesi JSON

// Önbellek klasörü mevcut değilse oluştur
if (!file_exists(CACHE_DIR)) {
    mkdir(CACHE_DIR, 0777, true);
}
?>
