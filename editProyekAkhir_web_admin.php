<!--HALAMAN WEB TECHTREE: EDIT DETAIL PROYEK AKHIR-->
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8"> <!--Character encoding-->
    <!--Responsive design viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kelompok3_B"> <!-- Author of the webpage -->
    <link rel="stylesheet" href="editProyekAkhir.css">
    <!-- Include FontAwesome from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Proyek Akhir | Admin </title>
    <script src="proyekAkhir.js" defer></script>
  </head>

  <body>
    <header>
      <!--LOGO-->
      <a id="logo_link" href="dashboard_admin.php">
          <img src="Logo.png" id="logo">
      </a>
      <!--MATERI YANG SEDANG DIPELAJARI-->
      <h3>Pemrograman Web - Proyek Akhir</h3>
      <h4 class="halaman_admin">Halaman Admin</h4>
      <!--Sees User Name-->
      <section class="profileAdjust">
        <img src="user.png">
        <p>Admin123</p>
      </section>
    </header>

    <!--Bagian utama halaman-->
    <main>
      <h1>Proyek Akhir</h1>
      <!--judul proyek akhir-->
      <section class="editable_nama_materi">
        <h2>Sistem Manajemen Toko Online</h2>
        <i class="fa-solid fa-pen-to-square" onclick="editMateriJudul()"></i>
      </section>
      <!--deskripsi produk-->
      <section class="editable_icon_video">
        <h2>Deskripsi Proyek</h2>
        <i class="fa-solid fa-pen-to-square" onclick="editSection(this)"></i>
      </section>
      <p class="paragraf">
        Sistem ini memungkinkan pemilik toko dapat menjalankan toko online secara efisien seperti dalam hal mengelola produk, 
        inventaris, pesanan, dan pelanggan mereka secara terpusat melalui antarmuka web yang responsif dan mudah digunakan.
        Pada web diharapkan terdapat beberapa fitur seperti untuk manajemen produk, pesanan, pelanggan, pencarian dan dilter serta checkout dan pembayaran
      </p>
      <!--gambaran umum dan tujuan-->
      <section class="editable_icon_video">
        <h2>Gambaran Umum dan Tujuan Proyek</h2>
        <i class="fa-solid fa-pen-to-square" onclick="editSection(this)"></i>
      </section>
      <p class="paragraf">
        Fitur Utama:
        - Tambah, edit, dan hapus produk dengan deskripsi, gambar, harga, dan kategori.
        - Kelola stok produk dan status ketersediaan.
        - Lihat dan kelola pesanan yang masuk dari pelanggan.
        - Konfirmasi, proses, dan hapus pesanan.
        - Daftar dan kelola informasi pelanggan.
        - Lihat riwayat pembelian pelanggan dan status akun.
        - Pencarian produk berdasarkan nama, kategori, atau harga.
        - Filter produk untuk mempermudah navigasi pelanggan.
        - Integrasi dengan sistem pembayaran online (opsional).
        - Proses checkout yang aman dan mudah bagi pengguna.
        
        Desain:
        Antarmuka yang intuitif dan ramah pengguna dengan estetika modern dan minimalis. Penggunaan warna dan gambar yang mencerminkan 
        nilai-nilai keberlanjutan serta tata letak yang jelas dan mudah dinavigasi.

        Tujuan Proyek:
        Membuat platform e-commerce yang fungsional dan dapat diimplementasikan, mencakup aspek manajemen produk, pesanan, dan pelanggan 
        secara efisien.      </p>
      <!--hasil akhir produk-->
      <section class="editable_icon_video">
        <h2>Hasil Akhir yang Diharapkan</h2>
        <i class="fa-solid fa-pen-to-square" onclick="editSection(this)"></i>
      </section>
      <p class="paragraf">Hasil akhir proyek yang diharapkan berupa: 
        - Kode Sumber (HTML, CSS, JavaScript, dan backend (PHP, Python))
        - Dokumentasi lengkap seperti cara instalasi, konfigurasi, dan manual user
        - Presentasi atau laporan yang berisi ringkasan fitur - fitur
        - Video demo web 
      </p>
      <p class="paragraf paragrafNone">Gabung seluruh file menjadi satu dalam tautan <span class="googleDrive">google drive</span>.</p>

      <!--button goes to dashboard-->
      <section class="backToDashboard">
        <button onclick="redirectToPage('dashboard_admin.php')">
          <i class="fa-solid fa-chevron-left"></i>Kembali ke Dashboard</button>
      </section>
    </main>
  </body>
</html>