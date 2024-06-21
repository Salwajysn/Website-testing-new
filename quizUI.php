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

<!--HALAMAN WEB TECHTREE: QUIZ-->
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8"> <!--Character encoding-->
    <!--Responsive design viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kelompok3_B"> <!-- Author of the webpage -->
    <link rel="stylesheet" href="quiz_admin.css">
    <!-- Include FontAwesome from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="quiz.js" defer></script>
    <title>Quiz Materi</title>
  </head>

  <body>
    <header>
      <!--LOGO-->
      <a id="logo_link" href="dashboard.php">
          <img src="Logo.png" id="logo">
      </a>
      <!--MATERI YANG SEDANG DIPELAJARI-->
      <h3>Desain UI/UX</h3>
      <!--Sees User Name-->
      <section class="profileAdjust">
        <img src="user.png">
        <h2><?php echo htmlspecialchars($namaUser); ?></h2>
      </section>
    </header>

    <!--Bagian utama halaman-->
    <main>
      <h1 class="titleH1">Quiz</h1>
      <!--section class="editable_nama_materi">
        <h2>#2 Tools UI/UX</h2>
        <i class="fa-solid fa-pen-to-square" onclick="editMateriJudul()"></i>
      </section-->
      <!--button back to materi-->
      <section class="kembaliKeMateri">
        <button onclick="redirectToPage('detailKelas.php')">
          <i class="fa-solid fa-chevron-left"></i>
          <span>Kembali ke Materi</span>
        </button>
      </section>

      <div class="class-form-wrap" id="quizContainer">
        <div class="editable_soal_quiz">
          <!--pertanyaan-->
          <form class="class-form" action="GET">
            <!--pertanyaannya-->
            <h3>1. Sebagai seorang desainer, penting untuk memilih tools yang dapat meningkatkan...</h3>
  
            <!--PILIHAN JAWABAN-->
            <div class="quizAnswers">
              <!--A-->
              <label>
                <input type="radio" name="answer" value="A">
                <span class="opsi">A</span><span class="kalimatJawaban">Kreativitas dan Estetika</span>
              </label>
              <!--B-->
              <label>
                <input type="radio" name="answer" value="B">
                <span class="opsi">B</span><span class="kalimatJawaban">Produktivitas dan Kreativitas</span>
              </label>
              <!--C-->
              <label>
                <input type="radio" name="answer" value="C">
                <span class="opsi">C</span><span class="kalimatJawaban">Produktivitas dan Estetika</span>
              </label>
              <!--D-->
              <label>
                <input type="radio" name="answer" value="D">
                <span class="opsi">D</span><span class="kalimatJawaban">Usabilitas dan Estetika</span>
              </label>
            </div>
          </form>
        </div>
  
        <div class="editable_soal_quiz">
          <!--pertanyaan-->
          <form class="class-form" action="GET">
            <!--pertanyaannya-->
            <h3>2. Tools apa yang akan kita gunakan pada kelas ini dalam membuat desain UI/UX?</h3>
  
            <!--PILIHAN JAWABAN-->
            <div class="quizAnswers">
              <!--A-->
              <label>
                <input type="radio" name="answer" value="A">
                <span class="opsi">A</span><span class="kalimatJawaban">Capcut</span>
              </label>
              <!--B-->
              <label>
                <input type="radio" name="answer" value="B">
                <span class="opsi">B</span><span class="kalimatJawaban">Procreate</span>
              </label>
              <!--C-->
              <label>
                <input type="radio" name="answer" value="C">
                <span class="opsi">C</span><span class="kalimatJawaban">Adobe Photoshop</span>
              </label>
              <!--D-->
              <label>
                <input type="radio" name="answer" value="D">
                <span class="opsi">D</span><span class="kalimatJawaban">Figma</span>
              </label>
            </div>
          </form>
        </div>
  
        <div class="editable_soal_quiz">
          <!--pertanyaan-->
          <form class="class-form" action="GET">
            <!--pertanyaannya-->
            <h3>3. Plugin apa yang dapat digunakan dalam membuat animasi yang ringan untuk desain UI/UX?</h3>
  
            <!--PILIHAN JAWABAN-->
            <div class="quizAnswers">
              <!--A-->
              <label>
                <input type="radio" name="answer" value="A">
                <span class="opsi">A</span><span class="kalimatJawaban">AEUX</span>
              </label>
              <!--B-->
              <label>
                <input type="radio" name="answer" value="B">
                <span class="opsi">B</span><span class="kalimatJawaban">Jetpack</span>
              </label>
              <!--C-->
              <label>
                <input type="radio" name="answer" value="C">
                <span class="opsi">C</span><span class="kalimatJawaban">Instagram Feed</span>
              </label>
              <!--D-->
              <label>
                <input type="radio" name="answer" value="D">
                <span class="opsi">D</span><span class="kalimatJawaban">Yoast SEO</span>
              </label>
            </div>
          </form>
        </div>
  
        <div class="editable_soal_quiz">
          <!--pertanyaan-->
          <form class="class-form" action="GET">
            <!--pertanyaannya-->
            <h3>4. Agar prototype yang ada di Figma dapat langsung terlihat pada smartphone, smartphone perlu menginstall aplikasi ...</h3>
            <!--PILIHAN JAWABAN-->
            <div class="quizAnswers">
              <!--A-->
              <label>
                <input type="radio" name="answer" value="A">
                <span class="opsi">A</span><span class="kalimatJawaban">Adobe Photoshop</span>
              </label>
              <!--B-->
              <label>
                <input type="radio" name="answer" value="B">
                <span class="opsi">B</span><span class="kalimatJawaban">Canva</span>
              </label>
              <!--C-->
              <label>
                <input type="radio" name="answer" value="C">
                <span class="opsi">C</span><span class="kalimatJawaban">Medium</span>
              </label>
              <!--D-->
              <label>
                <input type="radio" name="answer" value="D">
                <span class="opsi">D</span><span class="kalimatJawaban">Figma Mirror App</span>
              </label>
            </div>
          </form>
        </div>
  
        <div class="editable_soal_quiz">
          <!--pertanyaan-->
          <form class="class-form" action="GET">
            <!--pertanyaannya-->
            <h3>5. Website untuk melakukan testing prototype yang dapat dibuat adalah, kecuali ...</h3>
  
            <!--PILIHAN JAWABAN-->
            <div class="quizAnswers">
              <!--A-->
              <label>
                <input type="radio" name="answer" value="A">
                <span class="opsi">A</span><span class="kalimatJawaban">Canva</span>
              </label>
              <!--B-->
              <label>
                <input type="radio" name="answer" value="B">
                <span class="opsi">B</span><span class="kalimatJawaban">Maze</span>
              </label>
              <!--C-->
              <label>
                <input type="radio" name="answer" value="C">
                <span class="opsi">C</span><span class="kalimatJawaban">Sketch</span>
              </label>
              <!--D-->
              <label>
                <input type="radio" name="answer" value="D">
                <span class="opsi">D</span><span class="kalimatJawaban">Marvel</span>
              </label>
            </div>
          </form>
        </div>
      </div>

      <!--WARNING SUBMIT-->
      <button class="kirim">Kirim</button>
      
      <!--Footer-->
      <section id="colorBG">
        <p style="text-align: center;">&copy; 2024 Proyek Website Bootcamp TechThree -- Kelompok 3</p>
      </section> 
    </main>
  </body>
</html>