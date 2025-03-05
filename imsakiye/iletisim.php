<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim - Ramazan İmsakiyesi 2025 | e-icerik.net</title>
    
    <!-- SEO Meta Etiketleri -->
    <meta name="description" content="Ramazan İmsakiyesi 2025 ile ilgili sorularınız ve önerileriniz için bizimle iletişime geçin.">
    <meta name="keywords" content="iletişim, imsakiye 2025, sahur saatleri, iftar saatleri, namaz vakitleri, destek">
    <meta name="author" content="e-icerik.net">
    
    <!-- Open Graph (Sosyal Medya Paylaşımı İçin) -->
    <meta property="og:title" content="İletişim - Ramazan İmsakiyesi 2025">
    <meta property="og:description" content="Bize ulaşın! İletişim formu veya e-posta yoluyla önerilerinizi paylaşabilirsiniz.">
    <meta property="og:image" content="https://e-icerik.net/imsakiye/assets/images/ramazan-cover.jpg">
    <meta property="og:url" content="https://e-icerik.net/imsakiye/iletisim.php">
    <meta property="og:type" content="website">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/imsakiye/assets/css/style.css">
</head>
<body>
    <?php include 'views/header.php'; ?>

    <main class="hakkimizda-container">
        <h1>İLETİŞİM</h1>
        <p>Ramazan İmsakiyesi 2025 hakkında görüşlerinizi, önerilerinizi veya herhangi bir geri bildirimi bizimle paylaşabilirsiniz.</p>

        <h2>📧 E-Posta ile İletişim</h2>
        <p>Bize doğrudan aşağıdaki e-posta adresi üzerinden ulaşabilirsiniz:</p>
        <p><strong>📩 E-Posta:</strong> <a href="mailto:iletisim@e-icerik.net">iletisim@e-icerik.net</a></p>

        <h2>📋 İletişim Formu</h2>
        <p>Aşağıdaki formu doldurarak bize mesaj gönderebilirsiniz.</p>

        <form class="iletisim-form" action="/imsakiye/api/iletisim_gonder.php" method="POST">
            <label for="name">Adınız:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">E-Posta Adresiniz:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mesajınız:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Gönder</button>
        </form>

        <p>Mesajlarınız en kısa sürede yanıtlanacaktır. Ramazan ayınızı huzur içinde geçirmeniz dileğiyle! 🌙✨</p>
    </main>

    <?php include 'views/footer.php'; ?>
</body>
</html>
