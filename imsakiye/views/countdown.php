<div class="countdown-container">
    <p class="countdown-title">İftara Kalan Süre</p>
    <div id="countdown-timer">--:--:--</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const citySelect = document.getElementById('city-select');
    const timerElement = document.getElementById('countdown-timer');
    let intervalID = null;

    function updateCountdown(iftarTime) {
        if (intervalID) clearInterval(intervalID); // Önceki interval'ı temizle

        function calculateTime() {
            const now = new Date();
            const iftar = new Date();
            const [hours, minutes] = iftarTime.split(':');

            iftar.setHours(parseInt(hours), parseInt(minutes), 0, 0);

            // Eğer iftar vakti geçtiyse, yarına ayarla
            if (now > iftar) {
                iftar.setDate(iftar.getDate() + 1);
            }

            // Kalan süreyi hesapla
            const diff = iftar - now;
            const h = Math.floor(diff / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            const s = Math.floor((diff % 60000) / 1000);

            timerElement.textContent =
                `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
        }

        calculateTime();
        intervalID = setInterval(calculateTime, 1000);
    }

    function fetchIftarTime(city) {
        fetch(`api/fetch_times.php?city=${city}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.Maghrib) {
                    updateCountdown(data.Maghrib);
                } else {
                    console.error('API Yanıtı Geçersiz:', data);
                    timerElement.textContent = "Saat bilgisi alınamadı";
                }
            })
            .catch(error => {
                console.error('API Hatası:', error);
                timerElement.textContent = "Bağlantı hatası!";
            });
    }

    // Varsayılan olarak İstanbul iftar vakti ile başla
    fetchIftarTime("Istanbul");

    // Şehir değiştirildiğinde yeni iftar saatini getir
    citySelect.addEventListener('change', function () {
        const selectedCity = citySelect.value;
        if (selectedCity) {
            fetchIftarTime(selectedCity);
        }
    });
});
</script>

<style>
.countdown-container {
    text-align: center;
    font-size: 2rem;
    margin-top: 20px;
    background: #F5E9C7; /* Krem Renk */
    padding: 20px;
    border-radius: 10px;
    color: #2F6D2F; /* Yeşil */
    font-weight: bold;
    box-shadow: 0px 0px 10px rgba(47, 111, 47, 0.3);
}
</style>
