<?php
<?php
// Hubungkan ke file koneksi
require __DIR__ . '/../../config/database.php';

// Query data informasi
$qInfo = $conn->query("SELECT judul, deskripsi FROM informasi ORDER BY id DESC LIMIT 8");
?>

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Puskesmas Ngasem — Kesehatan Modern untuk Anda</title>

  <!-- Bootstrap lokal -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <!-- Style kustom -->
  <link rel="stylesheet" href="1asset/css/style.css"/>
</head>
<body>

<!-- Top strip -->
<div class="top-strip text-center small text-white">
  🌿 Selamat Datang di Puskesmas Ngasem — Kesehatan Anda Prioritas Kami
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="img/logo-puskesmas.jpg" class="logo me-2" alt="Logo">
      <span class="fw-bold">Puskesmas Ngasem</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Informasi</a></li>
        <li class="nav-item ms-lg-3">
          <a class="btn btn-success rounded-pill" href="#informasi">Lihat Informasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO (Parallax + Glass Card) -->
<header class="hero position-relative text-white">
  <!-- layer parallax -->
  <div class="hero-layer hero-bg" data-parallax data-speed="0.15"></div>
  <div class="hero-layer hero-deco-1" data-parallax data-speed="0.35"></div>
  <div class="hero-layer hero-deco-2" data-parallax data-speed="0.25"></div>

  <div class="container h-100 d-flex align-items-center">
    <div class="hero-glass p-4 p-md-5 tilt" data-tilt>
      <h1 class="display-5 fw-bold mb-2">Got Health? <span class="text-accent">We Care.</span></h1>
      <p class="lead mb-4">Pelayanan cepat, tepat, dan ramah untuk seluruh keluarga.</p>

      <!-- Search bar ala template -->
      <form class="row g-2 hero-search">
        <div class="col-12 col-md-6">
          <input class="form-control form-control-lg" type="text" placeholder="Cari layanan / kata kunci">
        </div>
        <div class="col-8 col-md-4">
          <select class="form-select form-select-lg">
            <option selected>Semua Lokasi</option>
            <option>Ngasem</option>
            <option>Kab. Kediri</option>
          </select>
        </div>
        <div class="col-4 col-md-2 d-grid">
          <button class="btn btn-success btn-lg rounded-3">Cari</button>
        </div>
      </form>

      <!-- trust badges -->
      <div class="mt-4 small opacity-75">
        Dipercaya oleh komunitas & mitra: <strong>Puskesmas, Dinkes</strong>
      </div>
    </div>
  </div>
</header>

<!-- Kartu CTA untuk dua peran -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card cta-card tilt" data-tilt>
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <h5 class="fw-bold mb-1">Untuk Pasien</h5>
              <p class="mb-3 text-muted">Daftar layanan dan lihat jadwal dokter.</p>
              <a href="#" class="btn btn-outline-success rounded-pill">Lihat Jadwal</a>
            </div>
            <img src="img/cta-patient.png" class="cta-illus" alt="patient"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card cta-card tilt" data-tilt>
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <h5 class="fw-bold mb-1">Untuk Tenaga Kesehatan</h5>
              <p class="mb-3 text-muted">Kelola jadwal, informasi, dan edukasi.</p>
              <a href="#" class="btn btn-success rounded-pill">Masuk Admin</a>
            </div>
            <img src="img/cta-staff.png" class="cta-illus" alt="staff"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Kategori Layanan (tilt 3D) -->
<section class="py-5">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="mb-0">Layanan Populer</h2>
      <a href="#" class="small text-decoration-none">Lihat semua layanan</a>
    </div>
    <div class="row g-4">
      <?php
        $kategori = [
          ['Pelayanan Umum','bi bi-heart-pulse'],
          ['Poli Gigi','bi bi-emoji-smile'],
          ['Poli KIA','bi bi-people'],
          ['Farmasi','bi bi-capsule']
        ];
        foreach($kategori as $k): ?>
        <div class="col-6 col-md-3">
          <div class="card kategori tilt reveal" data-tilt>
            <div class="card-body text-center">
              <i class="<?= $k[1] ?> display-6 text-success"></i>
              <h6 class="mt-3 mb-0"><?= $k[0] ?></h6>
              <p class="text-muted small mb-0">Informasi & pendaftaran</p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Informasi Terbaru (dinamis dari DB) -->
<section id="informasi" class="py-5 bg-light">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="mb-0">Informasi Terbaru</h2>
      <a href="#" class="small text-decoration-none">Lihat semua</a>
    </div>

    <div class="row g-4">
      <?php if ($qInfo && $qInfo->num_rows): ?>
        <?php while($r = $qInfo->fetch_assoc()): ?>
          <div class="col-md-6 col-lg-4">
            <article class="card info-card hover-lift tilt reveal" data-tilt>
              <div class="card-body">
                <h5 class="fw-bold mb-2"><?= htmlspecialchars($r['judul']) ?></h5>
                <p class="text-muted mb-0"><?= nl2br(htmlspecialchars($r['deskripsi'])) ?></p>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-muted">Belum ada informasi.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer py-4 text-center text-white">
  <div class="container small">
    &copy; <?= date('Y') ?> Puskesmas Ngasem • Made with ❤️
  </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
<?php $conn->close(); ?>
