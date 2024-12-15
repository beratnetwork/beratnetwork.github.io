// Firebase Messaging Service Worker

// Push bildirimlerini dinleme
self.addEventListener("push", (event) => {
    if (event.data) {
        try {
            const notif = event.data.json().notification;

            event.waitUntil(
                self.registration.showNotification(notif.title, {
                    body: notif.body,
                    icon: notif.image || "default-icon.png", // Eğer image yoksa varsayılan bir ikon kullanılır.
                    data: {
                        url: notif.click_action || "/" // Eğer click_action yoksa ana sayfaya yönlendirir.
                    }
                })
            );
        } catch (error) {
            console.error("Push event sırasında hata oluştu:", error);
        }
    } else {
        console.warn("Push event data boş geldi.");
    }
});

// Bildirim tıklamasını dinleme
self.addEventListener("notificationclick", (event) => {
    const targetUrl = event.notification.data?.url || "/";
    event.notification.close(); // Bildirimi kapat

    // Açılacak pencereyi yönet
    event.waitUntil(
        clients.matchAll({ type: "window", includeUncontrolled: true }).then((clientList) => {
            for (const client of clientList) {
                if (client.url === targetUrl && "focus" in client) {
                    return client.focus(); // Eğer pencere zaten açık ise ona odaklan
                }
            }
            if (clients.openWindow) {
                return clients.openWindow(targetUrl); // Pencereyi aç
            }
        })
    );
});
