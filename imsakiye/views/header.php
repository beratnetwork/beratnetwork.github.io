<header class="header">
    <div class="header-container">
        <h1>
            <img src="assets/images/logo.png" alt="İmsakiye Logo" class="logo"> 
            Ramazan İmsakiyesi 2025
        </h1>
        <nav>
            <ul class="nav-links">
                <li><a href="/imsakiye">Ana Sayfa</a></li>
                <li><a href="/imsakiye">İmsakiye</a></li>
                <li><a href="/imsakiye/hakkimizda.php">Hakkımızda</a></li>
                <li><a href="/imsakiye/iletisim.php">İletişim</a></li>
            </ul>
        </nav>
    </div>
</header>

<style>
/* =================== */
/* HEADER STİLLERİ */
/* =================== */
.header {
    background: linear-gradient(135deg, rgba(47, 109, 47, 0.9), rgba(0, 0, 0, 0.6)); /* Yumuşak gradient arka plan */
    color: #FFF;
    text-align: center;
    padding: 15px 30px; /* Küçük padding ile daha kompakt hale getirme */
    border-bottom: 3px solid #FFD700; /* Altın sarısı çizgi */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(8px); /* Blur efekti */
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: auto;
    flex-wrap: wrap;
    gap: 20px; /* Aralarındaki boşluğu daraltma */
}

h1 {
    font-size: 1.6rem; /* Küçük ama etkileyici font */
    font-weight: 600; /* Daha zarif yazı */
    display: flex;
    align-items: center;
    gap: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #FFD700; /* Altın sarısı renk */
    text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.4); /* Yumuşak gölge efekti */
}

.logo {
    height: 50px;
    filter: drop-shadow(3px 4px 8px rgba(0, 0, 0, 0.5)); /* Logo gölgesi */
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 30px;
    margin: 0;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    text-decoration: none;
    color: #FFD700; /* Altın Sarısı */
    font-weight: 600;
    font-size: 1rem;
    text-transform: uppercase;
    transition: color 0.3s ease, transform 0.3s ease;
}

.nav-links a:hover {
    color: #E5C100; /* Hover etkisiyle daha parlak sarı */
    text-decoration: underline;
    transform: translateY(-2px); /* Hover efekti ile yükselme */
}

/* =================== */
/* MOBİL UYUMLULUK */
/* =================== */
@media screen and (max-width: 768px) {
    h1 {
        font-size: 1.4rem;
    }

    .nav-links {
        flex-direction: column;
        gap: 15px;
    }

    .nav-links a {
        font-size: 1.1rem;
    }
}
</style>
