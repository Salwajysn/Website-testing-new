<?php
session_start(); // Mulai sesi PHP

// Sisipkan file koneksi ke database
require_once "db_connect.php";

// Periksa apakah user_id tersedia dalam sesi PHP
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Ambil user_id dari sesi PHP
} else {
    // Jika tidak ada user_id dalam sesi, arahkan kembali ke halaman login
    header("Location: login.php");
    exit(); // Pastikan keluar dari skrip PHP setelah redirect
}

// Query untuk mengambil persentase progres pengguna untuk kelas tertentu
$sql_progress = "SELECT percentage FROM progress WHERE Id_User = '$user_id' AND Id_Kelas = 'Kls01'";
$result_progress = $conn->query($sql_progress);

// Memeriksa apakah data progres ditemukan
if ($result_progress->num_rows > 0) {
    $progress = $result_progress->fetch_assoc();
    $percentage = $progress['percentage'];
} else {
    $percentage = 0; // Jika tidak ada progres, atur default ke 0 atau sesuai kebutuhan
}

// Query untuk mengambil persentase progres untuk kelas yang diikuti
$sql_kelas_diikuti = "SELECT p.Id_Kelas, p.percentage
                      FROM progress p
                      WHERE p.Id_User = '$user_id'";
$result_kelas_diikuti = $conn->query($sql_kelas_diikuti);

// Inisialisasi array untuk menyimpan persentase progres untuk setiap kelas
$progress_kelas_diikuti = array();

if ($result_kelas_diikuti->num_rows > 0) {
    while ($row = $result_kelas_diikuti->fetch_assoc()) {
        $progress_kelas_diikuti[$row['Id_Kelas']] = $row['percentage'];
    }
}

// Query untuk mengambil data pengguna dari database berdasarkan user_id
$sql = "SELECT * FROM user WHERE Id_User = '$user_id'";
$result = $conn->query($sql);

// Memeriksa apakah data pengguna ditemukan
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $namaUser = htmlspecialchars($user['Nama_User']); // Ambil nama pengguna
} else {
    echo "Pengguna tidak ditemukan";
    exit(); // Keluar dari skrip PHP jika pengguna tidak ditemukan
}

?>


<!--HALAMAN WEB TECHTREE: DASHBOARD USER (SETELAH LOGIN)-->
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8"> <!--Character encoding-->
    <!--Responsive design viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kelompok3_B"> <!-- Author of the webpage -->
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
    <script src="dashboard.js" defer></script>
  </head>

  <body>
    <header>
      <!---->
      <a id="logo_link" href="dashboard.php">
          <img src="Logo.png" id="logo">
      </a>
      <!--Navigasi halaman lapor keluh kesah dan profile-->
      <nav id="nav_header">
        <!--Navigasi Feedback/Lapor-->
        <a href="feedback.php" class="circle-container">
          <img class="circle-img" src="feedback.png">
        </a>
        <!--Navigasi Halaman Profile-->
        <p onclick="toggleMenu()" class="circle-container">
          <img class="circle-img" src="user.png">
        </p>
        <!--dropdown menu-->
        <div id="subMenu" class="subMenu-wrap">
          <div class="subMenu">
            <div class="user-info">
              <img src="user.png">
              <h2><?php echo htmlspecialchars($namaUser); ?></h2>
            </div>
            <hr>
              <!--link-->
              <a href="javascript:void(0);" class="sub-menu-link" onclick="navigateTo('dashboardContent')">
                <img src="dashboardIcon.png">
                <p>Dashboard</p>
              </a>
              <a href="profile.php" class="sub-menu-link">
                <img src="profileIcon.png">
                <p>Profile</p>
              </a>
              <a href="javascript:void(0);" class="sub-menu-link" onclick="navigateTo('kelasBootcampContent')">
                <img src="kelasSayaIcon.png">
                <p>Kelas Bootcamp</p>
              </a>
              <a href="javascript:void(0);" class="sub-menu-link" onclick="navigateTo('proyekAkhirContent')">
                <img src="projectIcon.png">
                <p>Proyek Akhir</p>
              </a>
              <a href="#" class="sub-menu-link">
                <img src="certificateIcon.png">
                <p>Sertifikat</p>
              </a>
              <a href="feedback.php" class="sub-menu-link">
                <img src="feedback.png">
                <p>Feedback</p>
              </a>
              <!--log out-->
              <a href="logOut" id="logOut" class="sub-menu-link">
                <img src="logOut.png">
                <p>Keluar</p>
              </a>
          </div>
        </div>
      </nav>
    </header>

    <!--Navigasi bagian kiri-->
    <nav id="navDashboard">
      <a href="javascript:void(0);" class="sectionDashboard" onclick="navigateTo('dashboardContent')">
        <img class="iconAdjust" src="dashboardIcon.png">
        <p class="navAdjust">Dashboard</p>
      </a>

      <a href="profile.php" class="sectionDashboard">
        <img class="iconAdjust" src="profileIcon.png">
        <p class="navAdjust">Profile </p>
      </a>

      <a href="javascript:void(0);" class="sectionDashboard" onclick="navigateTo('kelasBootcampContent')">
        <img class="iconAdjust" src="kelasSayaIcon.png">
        <p class="navAdjust">Kelas Bootcamp</p>
      </a>

      <a href="javascript:void(0);" class="sectionDashboard" onclick="navigateTo('proyekAkhirContent')">
        <img class="iconAdjust" src="projectIcon.png">
        <p class="navAdjust">Proyek Akhir</p>
      </a>

      <a href="#" class="sectionDashboard">
        <img class="iconAdjust" src="certificateIcon.png">
        <p class="navAdjust">Sertifikat</p>
      </a>

      <a href="feedback.php" class="sectionDashboard">
        <img class="iconAdjust" src="feedback.png">
        <p class="navAdjust">Feedback</p>
      </a>
    </nav>
    
    <!--Bagian utama halaman-->
    <main>
      <!--halaman konten (center)-->
      <div class="content active" id="dashboardContent">
        <div id="motivationSquare">
          <h1 id="haloUser">Halo, <?php echo $namaUser; ?>!</h1>
          <p id="teruskanProgresAnda">Teruskan progres Anda dan hadapi tantangan baru!</p>
          <div id="innerSquare">
            <!--jumlah kelas yang diikuti-->
            <section>
              <img class="iconAdjustInner" src="kelasSayaIcon.png">
              <h1 class="titleSubSquareMotivate">Kelas yang Diikuti</h1>
              <hr>
              <p class="jumlahMotivate"><span class="jumlahMotivateBold">1</span> dari 3</p>
            </section>
            <!--sertifikat-->
            <section>
              <img class="iconAdjustInner" src="certificateIcon.png">
              <h1 class="titleSubSquareMotivate">Sertifikat</h1>
              <hr>
              <p class="jumlahMotivate"><span class="jumlahMotivateBold">0</span> dari 3</p>
            </section>
          </div>
        </div>

        <!--lanjutkan progres kelas-->
        <h1 id="lanjutkanMateri">Lanjutkan Materi</h1>
        <div id="materiSquare">
          <img class="imgBoxAdjust" src="uiux.png">
        <section class="divideTitleBar">
          <h1>Desain UI/UX - Tools</h1>
        <div class="progress-container">
            <div class="progress-bar" style="width: <?php echo $percentage; ?>%;"><span class="percentageBar"><?php echo $percentage; ?>%</span></div>
        </div>
        </section>
        <button class="lihatDetail" onclick="redirectToPage3('detailKelas.php')">Lihat Detail Kelas</button>
      </div>
      </div>

      <!--KELAS BOOTCAMP-->
      <div class="content" id="kelasBootcampContent">
        <!--kelas yang diikuti-->
        <!--kelas yang diikuti-->
        <h1 class="subTitle-kelas">Kelas yang Diikuti</h1>
        <div class="classWrap">
        <img class="imgAdjust2" src="uiux.png">
        <section class="divideTitleBar2">
          <h1 class="titleKelas">Desain UI/UX - Tools</h1>
        <div class="progress-container2">
        <div class="progress-bar2" style="width: <?php echo isset($progress_kelas_diikuti['Kls01']) ? $progress_kelas_diikuti['Kls01'] : 0; ?>%;"><span class="percentageBar2"><?php echo isset($progress_kelas_diikuti['Kls01']) ? $progress_kelas_diikuti['Kls01'] : 0; ?>%</span></div>
      </div>
  </section>
  <button class="lihatDetailKelas2" onclick="redirectToPage3('detailKelas.php')">Lihat Detail Kelas</button>

</div>

        <!--kelas lainnya-->
        <h1 id="kelasLainnya" class="subTitle-kelas">Kelas Lainnya</h1>
        <!--kelas 1-->
        <div class="classWrap">
          <img class="imgAdjust2" src="fotografi.png">
          <h1 class="titleKelas2">Fotografi</h1>
          <button class="lihatDetailKelas2" onclick="redirectToPage3('detailKelasFotografi.php')">Ikuti Kelas</button>
        </div>
        <!--kelas 2-->
        <div class="classWrap">
          <img class="imgAdjust2" src="webdev.png">
          <h1 class="titleKelas2">Pengembangan Web</h1>
          <button class="lihatDetailKelas2" onclick="redirectToPage3('detailKelasWeb.php')">Ikuti Kelas</button>
        </div>
      </div>

      <!--PROYEK AKHIR-->
      <div class="content" id="proyekAkhirContent">
        <!--kelas yang diikuti-->
        <h1 class="subTitle-kelas">Proyek Akhir</h1>
        <div class="classWrap">
          <img class="imgAdjust2" src="uiux.png">
          <h1 class="titleKelas3">Design Aplikasi Mobile E-Commerce Niche untuk Fashion Sustainable</h1>
          <?php if ($percentage >= 100): ?>
            <button class="lihatDetailKelas3" onclick="redirectToPage3('detail_dan_submit_proyekAkhir.php')">Lihat Detail Proyek</button>
          <?php else: ?>
            <button class="lihatDetailKelas3" disabled>Terkunci</button>
            <img class="locked" src="locked.png">
          <?php endif; ?>

        </div>
      </div>
    </main>
  </body>
</html>