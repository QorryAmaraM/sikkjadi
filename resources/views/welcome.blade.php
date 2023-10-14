<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIKK | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/dashboard.css"/>
  
</head>
<body>
<div class="wrapper">

<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-left">
        <button class="toggle-btn" id="toggleBtn">
            <i class="fas fa-bars"></i>
        </button>
        <div class="navbar-brand">
            HOME
        </div>
    </div>
    <div class="navbar-right">
        <ul class="nav-profile">
            <li><a href="#">Profil</a></li>
        </ul>
    </div>
</nav>


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="logo-brand">
        <img src="/assets/img/bps.png" alt="Logo">
        <span class="brand-text">SISTEM INFORMASI<br>KINERJA KARYAWAN<br>BPS</span>
    </div>
    <hr class="sidebar-divider">
    <ul class="nav">
        <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="nav-text"><i class="fas fa-home"></i>DASHBOARD</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
             <p class="nav-text"><i class="fas fa-book"></i>PERENCANAAN KERJA</p>
             <i class="fas fa-caret-left right"></i>
            </a>
            <ul class="sub-nav"> <!-- Tambahkan ul untuk sub-nav -->
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>SKP Tahunan</p>
                    </a>
                </li>
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>Rencana Kinerja</p>
                    </a>
                </li>
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>Penilaian SKP</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
             <p class="nav-text"><i class="fas fa-envelope"></i>MASTER ANGKA KREDIT</p>
             <i class="fas fa-caret-left right"></i>
            </a>
            <ul class="sub-nav"> <!-- Tambahkan ul untuk sub-nav -->
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>List Angka Kredit</p>
                    </a>
                </li>
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>Entri Angka Kredit</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="nav-text"><i class="fas fa-bookmark"></i>MASTER URAIAN KEGIATAN</p>
              <i class="fas fa-caret-left right"></i>
            </a>
            <ul class="sub-nav"> <!-- Tambahkan ul untuk sub-nav -->
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>List Uraian Kegiatan</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="nav-text"><i class="fas fa-book-open"></i>CKP</p>
              <i class="fas fa-caret-left right"></i>
            </a>
            <ul class="sub-nav"> <!-- Tambahkan ul untuk sub-nav -->
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>CKP-T</p>
                    </a>
                </li>
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>CKP-R</p>
                    </a>
                </li>
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>Penilaian CKP-R</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="nav-text"><i class="fas fa-desktop"></i>MONITORING</p>
              <i class="fas fa-caret-left right"></i>
            </a>
            <ul class="sub-nav"> <!-- Tambahkan ul untuk sub-nav -->
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>Monitoring CKP</p>
                    </a>
                </li>
                <li class="sub-nav-item">
                    <a href="#" class="sub-nav-link">
                        <p class="sub-nav-text"><i class="fas fa-bookmark"></i>Monitoring Presensi</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
</div>

<!-- Content -->
<div class="content">
    <div class="container-fluid">
        <h1>Selamat Datang di Sistem Informasi Kinerja Karyawan BPS Bukittinggi</h1>
        <p>Lorem ipsum dolor sit amet</p>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="scripts.js"></script>
<script>
// Toggle Sidebar
document.getElementById("toggleBtn").addEventListener("click", function () {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("closed");
    const content = document.querySelector(".content");
    content.classList.toggle("expanded");
});

// Toggle Sub-Nav
const subNavItems = document.querySelectorAll('.nav-item'); // Ambil semua elemen nav-item

subNavItems.forEach((item) => {
    item.addEventListener('click', () => {
        item.classList.toggle('active'); // Toggle class active pada item utama
        const subNav = item.querySelector('.sub-nav'); // Ambil sub-nav yang berada di bawah item utama

        if (subNav) {
            subNav.classList.toggle('show'); // Toggle class show pada sub-nav
        }
    });
});

// Ambil elemen-elemen yang dibutuhkan
const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');
    const toggleBtn = document.getElementById('toggleBtn');

    // Fungsi untuk mengatur margin kiri .content
    function adjustContentMargin() {
        if (sidebar.classList.contains('collapsed')) {
            content.style.marginLeft = '55px'; // Atur margin kiri saat sidebar tertutup
        } else {
            content.style.marginLeft = '270px'; // Atur margin kiri saat sidebar terbuka
        }
    }

    // Tambahkan event listener untuk tombol toggle
    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        adjustContentMargin();
    });

    // Panggil fungsi adjustContentMargin saat halaman dimuat
    window.addEventListener('load', adjustContentMargin);

</script>
</body>
</html>
