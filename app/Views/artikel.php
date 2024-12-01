


  <?= $this->extend('layout'); ?>
  <?= $this->section('content'); ?>
  <main>
    <div class="container my-5">
      <h2 class="text-center mb-4">Blog dan Artikel Panduan</h2>

      <div class="row mb-5">
        <div class="col-md-6">
          <div class="card">
            <img src="https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Tips Memilih Ruangan">
            <div class="card-body">
              <h5 class="card-title">Tips Memilih Ruangan</h5>
              <p class="card-text">Cari tahu cara memilih ruangan yang tepat untuk acara Anda! Dalam artikel ini, kami
                memberikan tips praktis untuk memastikan Anda memilih ruangan yang sesuai dengan kebutuhan acara, jumlah
                peserta, dan fasilitas yang dibutuhkan.</p>
              <a href="/detailArtikel1.html" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="card">
            <img src="https://media-cdn.yummyadvisor.com/store/6cd3819f-d157-4940-aaf5-2ddc2bf291ae.jpg?x-oss-process=style/type_15" class="card-img-top" alt="Inspirasi Acara">
            <div class="card-body">
              <h5 class="card-title">Kopi Calf Hadir di Malang!</h5>
              <p class="card-text">Kopi Calf Hadir di Malang: Sensasi Kopi Berkemasan Kaleng dengan Konsep Industrial Modern</p>
              <a href="/detailArtikel2.html" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>

      <h3 class="text-center mb-4">Artikel Lainnya</h3>
      <div class="container">
      <div class="row">

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Event Planning">
            <div class="card-body">
              <h5 class="card-title mb-3">Solusi Efektif untuk Mengatasi Masalah Ruang Kantor</h5>
              <p class="card-text text-truncate text-nowrap" style="max-width: 100%;">Solusi Ruang Kerja Modern: Kunci Meningkatkan Kolaborasi dan Produktivitas Perusahaan</p>
              <a href="/detailArtikel3.html" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
            
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="https://images.unsplash.com/photo-1551834317-9ddfd4ec7069?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Event Planning">
            <div class="card-body">
              <h5 class="card-title mb-3">Daftar 5 Coworking Space di Malang</h5>
              <p class="card-text text-truncate text-nowrap" style="max-width: 100%;">5 Coworking Space Terbaik di Malang untuk Pekerja Remote: Mulai dari Kafe hingga Ruang Hybrid</p>
              <a href="/detailArtikel4.html" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
            
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="https://blog.go-work.com/wp-content/uploads/2024/07/Blog-GoWork-Aplikasi-dan-Tools-Produktivitas-1.jpg" class="card-img-top" alt="Event Planning">
            <div class="card-body">
              <h5 class="card-title mb-3">5 Rekomendasi Tools Produktivitas untuk Peningkatan Kinerja Tim</h5>
              <p class="card-text text-truncate text-nowrap" style="max-width: 100%;">Tingkatkan Produktivitas Tim dengan Tools Manajemen Proyek dan Pelacakan Waktu yang Efektif</p>
              <a href="/detailArtikel5.html" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
            
          </div>
        </div>

      </div>
      </div>
    </div>
  </main>
  <?= $this->endSection(); ?>
</body>

</html>