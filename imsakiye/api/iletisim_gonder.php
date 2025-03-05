<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "iletisim@e-icerik.net";
    $subject = "Yeni İletişim Formu Mesajı";
    $body = "Ad: $name\nE-Posta: $email\nMesaj:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mesajınız başarıyla gönderildi.";
    } else {
        echo "Mesaj gönderilirken hata oluştu.";
    }
}
?>
