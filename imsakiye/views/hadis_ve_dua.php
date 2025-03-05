<div class="hadis-dua-container">
    <div class="hadis-box">
        <h2>Günün Hadisi</h2>
        <p id="gunun-hadisi">Yükleniyor...</p>
    </div>

    <div class="dua-box">
        <h2>Günün Duası</h2>
        <p id="gunun-duasi">Yükleniyor...</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Hadis API'den veriyi çek
    fetch('/imsakiye/api/hadis.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('gunun-hadisi').textContent = data.hadis;
        })
        .catch(error => {
            console.error('Hadis yüklenirken hata oluştu:', error);
            document.getElementById('gunun-hadisi').textContent = "Hadis yüklenemedi!";
        });

    // Dua API'den veriyi çek
    fetch('/imsakiye/api/dua.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('gunun-duasi').textContent = data.dua;
        })
        .catch(error => {
            console.error('Dua yüklenirken hata oluştu:', error);
            document.getElementById('gunun-duasi').textContent = "Dua yüklenemedi!";
        });
});
</script>

<style>
/* =================== */
/* GÜNÜN HADİSİ VE GÜNÜN DUASI YAN YANA */
/* =================== */
.hadis-dua-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin: 20px auto;
    max-width: 1100px;
}

.hadis-box, .dua-box {
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    flex: 1;
    min-width: 300px;
    border-radius: 10px;
    text-align: center;
    font-size: 1.1rem;
    font-weight: bold;
    color: #2F6D2F;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border-left: 5px solid #FFD700;
    transition: all 0.3s ease-in-out;
}

/* Hover efekti */
.hadis-box:hover, .dua-box:hover {
    transform: scale(1.02);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

/* Mobil uyumluluk */
@media screen and (max-width: 768px) {
    .hadis-dua-container {
        flex-direction: column;
        gap: 15px;
    }
}
</style>
