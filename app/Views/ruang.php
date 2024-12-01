<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
  <main>
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-8">
          <div class="card mb-4">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?= $ruangan['foto'] ? 'data:image/jpeg;base64,' . base64_encode($ruangan['foto']) : 'https://via.placeholder.com/600x400' ?>" class="d-block w-100" alt="Ruangan Image 1">
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title fw-semibold"><?= $ruangan['nama_ruangan'] ?></h5>
              <p class="card-text"><?= $ruangan['deskripsi_ruangan'] ?></p>
              <ul class="list-unstyled">
                <li><strong>Lokasi:</strong> <?= $ruangan['lokasi'] ?></li>
                <li><strong>Kapasitas:</strong> <?= $ruangan['kapasitas'] ?></li>
                <li><strong>Harga:</strong> Rp Rp <?= number_format($ruangan['harga_per_hari'], 0, ',', '.') ?></li>
                <li><strong>Tipe:</strong> <?= $ruangan['jenis_ruangan'] ?></li>
              </ul>
            </div>
            <div class="card-footer text-center d-flex justify-content-center w-100">
            <?php if (logged_in()): ?>
                  <button class="btn btn-warning text-black mx-2" data-bs-toggle="modal" data-bs-target="#bookingModal">
                      Pesen Ruangan
                  </button>
              <?php else: ?>
                  <a href="/login" class="btn btn-warning text-black mx-2">
                      Login untuk Pesen Ruangan
                  </a>
              <?php endif; ?>
              <a href="https://wa.me/6281586786180" class="btn btn-primary text-black mx-2">Hubungi Admin</a>
              <a href="/" class="btn btn-success text-black mx-2">Kembali</a>
            </div>
          </div>
        </div>


        <div class="col-lg-4">
          <div class="card">
            <div class="card-header" style="background-color: #0f172a;">
              <h5 class="fw-semibold text-white pt-1">Reviews</h5>
            </div>
            <div class="card-body" style="max-height: 400px; overflow-y: auto; padding-right: 15px;">
                  <?php if (!empty($review)): ?>
                      <?php foreach ($review as $r): ?>
                          <div class="review mb-3">
                              <h6 class="fw-bold"><?= $r->username; ?></h6>
                              <i><p class="text-muted"><?= $r->tanggal_dibuat; ?></p></i>
                              <p><?= $r->ulasan; ?></p>
                          </div>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <p>Tidak ada ulasan.</p>
                  <?php endif; ?>
            </div>

          </div>

          <div class="card mt-3">
            <div class="card-header" style="background-color: #0f172a;">
              <h5 class="fw-semibold text-white pt-1">Tulis Review Anda</h5>
            </div>
            <div class="card-body">
                  <form method="post" action="/profile/saveKomentar">
                      <div class="mb-3">
                          <label for="reviewText" class="form-label">Review</label>
                          <input type="text" name="reviewText" id="reviewText" class="form-control" style="height: 100px; white-space: pre-line;" required>
                          <input type="hidden" id="id_ruangan" name="id_ruangan" value="<?= $ruangan['id_ruangan']; ?>">
                          <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= user_id(); ?>">
                      </div>
                      <?php if (logged_in()): ?>
                          <button type="submit" class="btn btn-warning w-100 text-black">Kirim Review</button>
                      <?php else: ?>
                          <a href="/login" class="btn btn-warning w-100 text-black">
                              Login untuk Kirim Review
                          </a>
                      <?php endif; ?>
                  </form>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Lihat Siapa Aja Pemesan Ruangan ini</h5>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Customer</th>
                      <th scope="col">Durasi (Jam)</th>
                      <th scope="col">Durasi (Hari)</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($pemesanan)): ?>
                    <?php foreach ($pemesanan as $p): ?>
                    <tr>
                      <td><?= $p->username ?></td>
                      <td><?= $p->durasi_jam; ?></td>
                      <td><?= $p->durasi_hari; ?></td>
                      <td><?= $p->tanggal_pemesanan; ?></td>
                      <?php 
                      switch ($p->status_pembayaran) {
                        case 'dibayar':
                        ?><td><button class="btn btn-success btn-sm">Dibayar</button></td><?php 
                          break;
                        case 'dibatalkan':
                          ?><td><button class="btn btn-danger btn-sm">Dibatalkan</button></td><?php 
                          break;
                        default:
                        ?><td><button class="btn btn-warning btn-sm">Menunggu</button></td><?php 
                          break;
                      }
                      ?>
                    </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                      <p>Tidak ada yang booking</p>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer text-center d-flex justify-content-center w-100">
                
              </div>
          </div>
      </div>
    </div>
  
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Online - <?= $ruangan['nama_ruangan'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/ruang/proses">
                    <div class="mb-3">
                        <label for="bookingDate" class="form-label">Pilih Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal_pemesanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="bookingDuration" class="form-label">Durasi Penggunaan (Jam)</label>
                        <input type="number" class="form-control" id="durasiJam" name="durasi_jam" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="bookingDuration" class="form-label">Durasi Penggunaan (Hari)</label>
                        <input type="number" class="form-control" id="durasiHari" name="durasi_hari" min="1">
                    </div>
                    
                    <input type="hidden" id="hargaPerJam" value="<?= $ruangan['harga_per_jam']; ?>">
                    <input type="hidden" id="hargaPerHari" value="<?= $ruangan['harga_per_hari']; ?>">
                    
                    <div class="mb-3">
                        <label for="totalHargaDisplay" class="form-label">Harga yang harus dibayar</label>
                        <input type="text" class="form-control" id="totalHargaDisplay" readonly>
                    </div>
                    
                    <input type="hidden" id="totalHarga" name="total_harga">
                    <input type="hidden" id="status_pembayaran" name="status_pembayaran" value="menunggu">
                    <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan']; ?>">
                    <input type="hidden" name="id_pengguna" value="<?= user_id(); ?>">
                    
                    <button type="submit" class="btn btn-warning w-100">Konfirmasi Pemesanan</button>
                </form>
    
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const durasiJamInput = document.getElementById("durasiJam");
                        const durasiHariInput = document.getElementById("durasiHari");
                        const totalHargaInput = document.getElementById("totalHarga");
                        const totalHargaDisplay = document.getElementById("totalHargaDisplay");
    
                        // Mengambil harga per jam dan per hari dari hidden input
                        const hargaPerJam = parseInt(document.getElementById("hargaPerJam").value);
                        const hargaPerHari = parseInt(document.getElementById("hargaPerHari").value);
    
                        // Fungsi untuk menghitung total harga
                        function hitungHarga() {
                            const durasiJam = parseInt(durasiJamInput.value) || 0;
                            const durasiHari = parseInt(durasiHariInput.value) || 0;
    
                            const totalHarga = (durasiJam * hargaPerJam) + (durasiHari * hargaPerHari);
                            totalHargaInput.value = totalHarga; // Menyimpan nilai untuk dikirimkan ke form
                            totalHargaDisplay.value = `Rp ${totalHarga.toLocaleString("id-ID")}`; // Tampilkan dalam format mata uang
                        }
    
                        // Event listener untuk update harga saat durasi berubah
                        durasiJamInput.addEventListener("input", hitungHarga);
                        durasiHariInput.addEventListener("input", hitungHarga);
                    });
                </script>
            </div>
        </div>
    </div>
</div>

</main>
  <?= $this->endSection(); ?>