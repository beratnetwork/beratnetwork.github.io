<?php
require_once 'config.php';

define('CACHE_DIR', __DIR__ . '/../cache/'); // Önbellek klasörü

// Önbellek klasörünü oluştur (eğer yoksa)
if (!file_exists(CACHE_DIR)) {
    mkdir(CACHE_DIR, 0777, true);
}

// Önbelleğe veri kaydetme fonksiyonu
function setCache($city, $data) {
    $cacheFile = CACHE_DIR . strtolower($city) . '.json';
    file_put_contents($cacheFile, json_encode($data));
}

// Önbellekten veri getirme fonksiyonu
function getCache($city) {
    $cacheFile = CACHE_DIR . strtolower($city) . '.json';

    // Önbellek dosyası varsa ve süre geçmemişse
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < CACHE_TIME)) {
        return json_decode(file_get_contents($cacheFile), true);
    }
    return null; // Önbellek yok veya süresi geçmiş
}

// Önbelleği temizleme fonksiyonu (isteğe bağlı kullanılabilir)
function clearCache($city = null) {
    if ($city) {
        $cacheFile = CACHE_DIR . strtolower($city) . '.json';
        if (file_exists($cacheFile)) {
            unlink($cacheFile);
        }
    } else {
        // Tüm önbellek dosyalarını temizle
        array_map('unlink', glob(CACHE_DIR . "*.json"));
    }
}
?>
