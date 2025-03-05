<div class="dua-container">
    <h2>Günün Duası</h2>
    <p id="gunun-duasi">Yükleniyor...</p>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
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
/* GÜNÜN DUASI KARTI */
/* =================== */
.dua-container {
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
    transition: all 0.3s ease-in-out;
}

/* Hover efekti ile büyüme */
.dua-container:hover {
    transform: scale(1.02);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}
</style>
