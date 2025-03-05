<?php
header('Content-Type: application/json');

// Hadisleri içeren genişletilmiş JSON dizisi
$hadisler = [
    "Allah’a ve ahiret gününe iman eden ya hayır söylesin ya da sussun. (Buhârî, Edeb, 31)",
    "Kolaylaştırın, zorlaştırmayın; müjdeleyin, nefret ettirmeyin. (Buhârî, İlim, 12)",
    "İnsanlara merhamet etmeyene Allah da merhamet etmez. (Buhârî, Tevhid, 2)",
    "Komşusu açken tok yatan bizden değildir. (Müslim, İman, 45)",
    "En hayırlınız, ahlâkı en güzel olanınızdır. (Buhârî, Edeb, 38)",
    "İyilik güzel ahlâktır, günah ise vicdanını rahatsız eden şeydir. (Müslim, Birr, 14)",
    "Bir müslüman, bir müslümana üç günden fazla küs duramaz. (Buhârî, Edeb, 62)",
    "Güzel söz sadakadır. (Buhârî, Rikak, 24)",
    "Mümin kardeşinin yüzüne gülümsemen sadakadır. (Tirmizî, Birr, 36)",
    "Dua ibadetin özüdür. (Tirmizî, Dua, 1)",
    "Zorlaştırmayın, kolaylaştırın; nefret ettirmeyin, sevdirin! (Buhârî, İlim, 12)",
    "İnsanların en hayırlısı, insanlara en faydalı olandır. (Müsned, 1/378)",
    "Sabır imanın yarısıdır. (Beyhakî, Şuabü’l-İman, 7/517)",
    "Müslüman, insanların elinden ve dilinden emin olduğu kimsedir. (Tirmizî, İman, 12)",
    "Sadaka, belayı def eder ve ömrü uzatır. (Taberânî, el-Mu’cemü’l-Kebîr, 7/127)",
    "Cennet annelerin ayakları altındadır. (Nesâî, Cihad, 6)",
    "İşlerin en hayırlısı orta karar olandır. (Beyhakî, Şuabü’l-İman, 5/261)",
    "Adalet güzeldir, fakat yöneticilerde olursa daha güzeldir. (Deylemî, el-Firdevs, 1/73)",
    "Her sabah sadaka vermek gerekir; bir tebessüm bile sadakadır. (Buhârî, Cihad, 72)",
    "Kim bir mümine dua ederse, melekler de ona dua eder. (Müslim, Zikir, 48)",
    "Allah, kulunun tövbesini can boğaza gelmeden önce kabul eder. (İbn Mâce, Zühd, 30)",
    "Bizi aldatan bizden değildir. (Müslim, İman, 164)",
    "Haksız yere bir karış yer alan, kıyamette yedi kat yere gömülür. (Buhârî, Mezâlim, 13)",
    "Kardeşine yapacağın en büyük iyilik, onu hatalarından sakındırmaktır. (İbn Mâce, Zühd, 24)",
    "Öfkeli anında susmak imandandır. (Tirmizî, Zühd, 11)",
    "Çalışan kişinin hakkını, teri kurumadan önce veriniz. (İbn Mâce, Ticaret, 4)",
    "Kibirli kimseye cennet haramdır. (Müslim, İman, 147)",
    "Dostlarının en iyisi, seni Allah’a yaklaştırandır. (Buhârî, İlim, 36)",
    "Her iyilik sadakadır. (Müslim, Zekât, 53)"
];

// Günlük değişen bir hadis seç
$gunlukIndex = date('z') % count($hadisler); // Gün numarasına göre değişim
$gununHadisi = $hadisler[$gunlukIndex];

// JSON formatında çıktı ver
echo json_encode(["hadis" => $gununHadisi]);
?>
