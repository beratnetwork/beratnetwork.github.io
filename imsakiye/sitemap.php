<?php
header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Ana Sayfa
echo '<url>
        <loc>https://e-icerik.net/imsakiye/</loc>
        <lastmod>' . date('Y-m-d') . '</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
      </url>';

// Sabit Sayfalar
$static_pages = [
    "hakkimizda.php" => "0.8",
    "iletisim.php" => "0.7",
    "namaz-vakitleri.php" => "0.9"
];

foreach ($static_pages as $page => $priority) {
    echo '<url>
            <loc>https://e-icerik.net/imsakiye/' . $page . '</loc>
            <lastmod>' . date('Y-m-d') . '</lastmod>
            <changefreq>monthly</changefreq>
            <priority>' . $priority . '</priority>
          </url>';
}

// Tüm Şehirler İçin Namaz Vakitleri Sayfaları
$cities = ["Istanbul", "Ankara", "Izmir", "Bursa", "Antalya", "Konya", "Adana", "Gaziantep", "Diyarbakir", "Samsun"];

foreach ($cities as $city) {
    echo '<url>
            <loc>https://e-icerik.net/imsakiye/namaz-vakitleri.php?city=' . urlencode($city) . '</loc>
            <lastmod>' . date('Y-m-d') . '</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
          </url>';
}

echo '</urlset>';
?>
