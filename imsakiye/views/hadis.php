<div class="hadis-container">
    <h2>Günün Hadisi</h2>
    <p id="gunun-hadisi">Yükleniyor...</p>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('/imsakiye/api/hadis.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('gunun-hadisi').textContent = data.hadis;
        })
        .catch(error => {
            console.error('Hadis yüklenirken hata oluştu:', error);
            document.getElementById('gunun-hadisi').textContent = "Hadis yüklenemedi!";
        });
});
</script>

<style>
/* =================== */
/* GÜNÜN HADİSİ STİLİ */
/* =================== */
.hadis-container {
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    margin: 20px auto;
    max-width: 600px;
    border-radius: 10px;
    text-align: center;
    font-size: 1.2rem;
    font-weight: bold;
    color: #2F6D2F;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border-left: 5px solid #FFD700;
}
</style>
