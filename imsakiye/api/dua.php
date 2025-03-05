<?php
header('Content-Type: application/json');

// Günlük değişen genişletilmiş dua listesi
$dualar = [
    "Allah’ım! Beni affet, bana merhamet et ve bana hidayet ver. (Tirmizî, Deavât, 53)",
    "Ey Rabbimiz! Bize dünyada da iyilik ver, ahirette de iyilik ver ve bizi ateş azabından koru. (Bakara, 2/201)",
    "Allah’ım! Senden kalbimi doğrulukla sabit kılmanı istiyorum. (Müslim, Zikir, 92)",
    "Allah’ım! Beni ve ailemi affet, bize rahmetinle muamele et. (Tirmizî, Deavât, 30)",
    "Ey Rabbim! İlmi, anlayışı ve rızkımı artır. (Tirmizî, Deavât, 130)",
    "Allah’ım! Kalbimi nurlandır, dilimi doğrulukla konuştur. (Müslim, Zikir, 66)",
    "Ey Allah’ım! Sen affedicisin, affetmeyi seversin, beni de affet. (Tirmizî, Deavât, 110)",
    "Rabbimiz! Bizleri sana yönelenlerden eyle ve dualarımızı kabul buyur. (İbrahim, 14/40-41)",
    "Allah’ım! Bizi doğru yolda sabit kıl, bize rahmetinle muamele et. (Müslim, Zikir, 67)",
    "Ey Allah’ım! Kalplerimizi birbirine yaklaştır ve bizi affet. (Müslim, Zikir, 80)",
    "Allah’ım! Beni salih kulların arasına kat. (Tirmizî, Deavât, 9)",
    "Allah’ım! Zorlukları benim için kolaylaştır. (Müslim, Zikir, 68)",
    "Ey Rabbim! Sabır ve sebat ver, bizi inkârcılara karşı muzaffer eyle. (Bakara, 2/250)",
    "Allah’ım! Kalbimize nur, dilimize doğruluk ver. (Müslim, Zikir, 69)",
    "Rabbim! Bana ve anne babama verdiğin nimetlere şükretmemi nasip eyle. (Ahkaf, 46/15)",
    "Allah’ım! Beni rahmetinle kuşat, şefkatinle sar. (Tirmizî, Deavât, 25)",
    "Ey Rabbim! Beni nimet verdiğin salih kulların arasına kat. (Nisa, 4/69)",
    "Allah’ım! Kalplerimizi imanla sabit kıl. (Müslim, Zikir, 71)",
    "Allah’ım! Dünya ve ahiret hayatımızı hayırlı kıl. (Müslim, Zikir, 72)",
    "Ey Rabbim! Beni ve neslimi namazı dosdoğru kılanlardan eyle. (İbrahim, 14/40)",
    "Allah’ım! Nefsimize hidayet ver ve onu takva ile süsle. (Müslim, Zikir, 73)",
    "Ey Rabbim! Günahlarımızı affet ve bizi cennetine kabul et. (Ali İmran, 3/16)",
    "Allah’ım! Bize hayırlı rızıklar ver ve rızkımıza bereket kat. (Müslim, Zikir, 74)",
    "Ey Rabbim! Bizi affet, bizi bağışla ve bize merhamet et. (Bakara, 2/286)",
    "Allah’ım! Bizlere sabır ver, ayaklarımızı sabit kıl. (A’raf, 7/126)",
    "Ey Rabbim! Kalplerimizi birleştir ve bizi kardeşlik duygularıyla donat. (Enfal, 8/63)",
    "Allah’ım! Kalbimizi kötülüklerden temizle, bizi nurunla aydınlat. (Müslim, Zikir, 75)",
    "Ey Rabbim! Dualarımızı kabul buyur, bizi huzura erdir. (İbrahim, 14/40-41)",
    "Allah’ım! Bize helal rızıklar ver ve haramdan koru. (Müslim, Zikir, 76)",
    "Ey Allah’ım! Bizi imanı güçlü, ahlakı güzel kullarından eyle. (Müslim, Zikir, 77)",
    "Allah’ım! Bizi dünya fitnelerinden koru, ahirette bizi hayırla karşıla. (Müslim, Zikir, 78)",
    "Ey Rabbim! Bizi gaflet uykusundan uyandır ve salih kulların arasına kat. (Müslim, Zikir, 79)",
    "Allah’ım! Günahlarımızı bağışla ve bizi doğru yola ilet. (Müslim, Zikir, 80)",
    "Ey Rabbim! Bizleri ve ailelerimizi koru, rahmetinle bizi kuşat. (Müslim, Zikir, 81)",
    "Allah’ım! Nefsimize adalet ve iyilik ilham et. (Müslim, Zikir, 82)"
];

// Günlük değişen bir dua seç
$gunlukIndex = date('z') % count($dualar); // Gün numarasına göre değişim
$gununDuasi = $dualar[$gunlukIndex];

// JSON formatında çıktı ver
echo json_encode(["dua" => $gununDuasi]);
?>
