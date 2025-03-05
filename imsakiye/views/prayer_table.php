<div class="prayer-times-container">
    <h2>Bugünün Namaz Vakitleri</h2>
    <table id="prayer-times-table">
        <thead>
            <tr>
                <th>Vakit</th>
                <th>Saat</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="2">Veriler yükleniyor...</td></tr>
        </tbody>
    </table>

    <h2>Ramazan Boyunca Namaz Vakitleri</h2>
    <table id="ramazan-prayer-times-table">
        <thead>
            <tr>
                <th>Tarih</th>
                <th>İmsak</th>
                <th>Güneş</th>
                <th>Öğle</th>
                <th>İkindi</th>
                <th>Akşam</th>
                <th>Yatsı</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="7">Veriler yükleniyor...</td></tr>
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.querySelector('#prayer-times-table tbody');
    const ramazanTableBody = document.querySelector('#ramazan-prayer-times-table tbody');
    const citySelect = document.getElementById('city-select');

    function updateTodayTable(times) {
        tableBody.innerHTML = '';
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
            if (times[key]) {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${vakitler[key]}</td><td>${times[key]}</td>`;
                tableBody.appendChild(row);
            }
        });
    }

    function updateRamazanTable(times) {
        ramazanTableBody.innerHTML = '';

        times.forEach((day, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><strong>${index + 1}. Gün</strong><br>${day.date}</td>
                <td>${day.Imsak}</td>
                <td>${day.Sunrise}</td>
                <td>${day.Dhuhr}</td>
                <td>${day.Asr}</td>
                <td>${day.Maghrib}</td>
                <td>${day.Isha}</td>
            `;
            if (index % 2 === 0) {
                row.style.background = '#f5f5f5'; // Alternatif gri arka plan
            }
            ramazanTableBody.appendChild(row);
        });
    }

    function fetchPrayerTimes(city) {
        fetch(`api/fetch_times.php?city=${city}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    updateTodayTable(data);
                } else {
                    console.error('Geçersiz API Yanıtı:', data);
                    tableBody.innerHTML = '<tr><td colspan="2">Veri yüklenemedi</td></tr>';
                }
            })
            .catch(error => {
                console.error('Namaz vakitleri yüklenirken hata:', error);
                tableBody.innerHTML = '<tr><td colspan="2">Bağlantı hatası!</td></tr>';
            });
    }

    function fetchRamazanTimes(city) {
        fetch(`api/fetch_ramazan_times.php?city=${city}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    updateRamazanTable(data);
                } else {
                    console.error('Geçersiz API Yanıtı:', data);
                    ramazanTableBody.innerHTML = '<tr><td colspan="7">Veri yüklenemedi</td></tr>';
                }
            })
            .catch(error => {
                console.error('Ramazan vakitleri yüklenirken hata:', error);
                ramazanTableBody.innerHTML = '<tr><td colspan="7">Bağlantı hatası!</td></tr>';
            });
    }

    fetchPrayerTimes("Istanbul");
    fetchRamazanTimes("Istanbul");

    citySelect.addEventListener('change', function () {
        const selectedCity = citySelect.value;
        if (selectedCity) {
            fetchPrayerTimes(selectedCity);
            fetchRamazanTimes(selectedCity);
        }
    });
});
</script>

<style>
/* =================== */
/* NAMAZ VAKİTLERİ TABLOSU */
/* =================== */
#prayer-times-table, #ramazan-prayer-times-table {
    width: 90%;
    max-width: 800px;
    margin: 20px auto;
    border-collapse: collapse;
    background: #FFF;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
}

#prayer-times-table th, #ramazan-prayer-times-table th {
    background: #2F6D2F; /* Koyu Yeşil */
    color: #FFF;
    padding: 12px;
    font-size: 1.2rem;
}

#prayer-times-table td, #ramazan-prayer-times-table td {
    padding: 10px;
    font-size: 1rem;
    border-bottom: 1px solid #A3C293;
}

#ramazan-prayer-times-table tr:nth-child(even) {
    background: #f5f5f5; /* Alternatif Gri */
}

#ramazan-prayer-times-table tr:nth-child(odd) {
    background: #ffffff;
}
</style>
