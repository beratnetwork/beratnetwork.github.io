<div class="city-selector-container">
    <h3>Şehir Seçiniz</h3>
    <select id="city-select">
        <option value="">Şehir Seçiniz</option>
    </select>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const citySelect = document.getElementById('city-select');

    // JSON'dan şehirleri yükle
    fetch('data/cities.json')
        .then(response => response.json())
        .then(data => {
            citySelect.innerHTML = '<option value="">Şehir Seçiniz</option>'; // Varsayılan seçenek

            data.forEach(city => {
                let option = document.createElement('option');
                option.value = city.name; // API'ye uygun şehir ismi
                option.textContent = city.name;
                citySelect.appendChild(option);
            });
        })
        .catch(error => console.error("Şehir listesi yüklenirken hata oluştu:", error));
});
</script>
