document.addEventListener('DOMContentLoaded', function () {
    const citySelect = document.getElementById('city-select');
    const tableBody = document.querySelector('#prayer-times-table tbody');

    // Sayfa yüklendiğinde varsayılan olarak İstanbul'u getir
    fetchPrayerTimes("Istanbul");

    // Şehir seçildiğinde API'yi çağır ve tabloyu güncelle
    citySelect.addEventListener('change', function () {
        const selectedCity = citySelect.value;
        if (selectedCity) {
            fetchPrayerTimes(selectedCity);
        }
    });

    function fetchPrayerTimes(city) {
        fetch(`api/fetch_times.php?city=${city}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error("API Hatası:", data.error);
                    tableBody.innerHTML = `<tr><td colspan="2">${data.error}</td></tr>`;
                    return;
                }
                updatePrayerTimes(data);
            })
            .catch(error => {
                console.error("Bağlantı hatası:", error);
                tableBody.innerHTML = `<tr><td colspan="2">Bağlantı hatası. Lütfen tekrar deneyin.</td></tr>`;
            });
    }

    function updatePrayerTimes(times) {
        tableBody.innerHTML = '';

        // API'deki vakitleri Türkçeye çevir
        const vakitler = {
            "Imsak": "İmsak",
            "Fajr": "Sabah",
            "Sunrise": "Güneş",
            "Dhuhr": "Öğle",
            "Asr": "İkindi",
            "Maghrib": "Akşam",
            "Isha": "Yatsı"
        };

        Object.keys(vakitler).forEach(key => {
            if (times[key]) { // Eğer API bu vakti sağlıyorsa
                const row = document.createElement('tr');
                row.innerHTML = `<td>${vakitler[key]}</td><td>${times[key]}</td>`;
                tableBody.appendChild(row);
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
    function highlightPastDays() {
        const today = new Date(); // Şu anki tarih
        const rows = document.querySelectorAll('#ramazan-prayer-times-table tbody tr');

        rows.forEach(row => {
            const dateText = row.cells[0].textContent.split(" ")[0]; // "01 Mart 2025 Cumartesi" formatından sadece günü al
            const turkishMonths = {
                "Ocak": 0, "Şubat": 1, "Mart": 2, "Nisan": 3, "Mayıs": 4,
                "Haziran": 5, "Temmuz": 6, "Ağustos": 7, "Eylül": 8, "Ekim": 9, "Kasım": 10, "Aralık": 11
            };

            const day = parseInt(dateText);
            const monthText = row.cells[0].textContent.split(" ")[1]; // "Mart"
            const month = turkishMonths[monthText];
            const year = parseInt(row.cells[0].textContent.split(" ")[2]); // "2025"

            const rowDate = new Date(year, month, day); // Satırdaki tarihi oluştur

            if (rowDate < today) {
                row.classList.add('past-day'); // Eğer tarih geçmişse kırmızı çizgi ekle
            }
        });
    }

    // Ramazan vakitleri yüklendiğinde çalıştır
    setTimeout(highlightPastDays, 1000);
});
