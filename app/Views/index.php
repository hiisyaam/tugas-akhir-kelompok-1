<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<main>
    <?php if (logged_in()): ?>
        <h2 class="my-4 text-center">Selamat Datang Brokk <?= user()->username; ?>!</h2>
    <?php endif; ?>
    <style>
        .carousel-image {
            filter: brightness(0.6);
        }
        .carousel-dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
    </style>
    <div>
        <div class="row">
            <div class="col">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.pexels.com/photos/3184306/pexels-photo-3184306.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100 carousel-image" alt="...">
                            <div class="carousel-caption d-none d-md-block text-center">
                                <h2>Temukan Halaman Anda</h2>
                                <p>Anda bisa cari ruagan dengan mudah untuk keperluan anda</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/8276142/pexels-photo-8276142.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100 carousel-image" alt="...">
                            <div class="carousel-caption d-none d-md-block text-center">
                                <h2>Mudah nya mencari Ruangan</h2>
                                <p>Cari ruangan yang diinginkan dengan filter</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/416320/pexels-photo-416320.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100 carousel-image" alt="...">
                            <div class="carousel-caption d-none d-md-block text-center">
                                <h2>Nikmati Kemudahan nya</h2>
                                <p>Cari ruangan cepat, Pembayaran juga Mudah</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</style>

<style>
    .carousel-image {
        height: 700px; 
        object-fit: cover; 
    }
</style>

  <!-- Section Workspaces -->
  <div id="workspaces" class="mt-5">
    <div class="container my-1 text-white rounded p-4" style="background-color: #0f172a;">
      <h3>Cari sesuai kebutuhan kamu!</h3>
      <div class="mb-4 row">
        <div class="col-12 col-lg-11">
          <input type="text" class="form-control" id="searchInput" placeholder="Nama gedung, lokasi, atau kata kunci">
        </div>
        <div class="col-1 d-none d-lg-block">
          <button class="btn btn-warning px-4">Cari</button>
        </div>
      </div>

      <!-- Filters -->
       <form action="/cari" method="get">
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="locationFilter" class="form-label">Lokasi</label>
            <select class="form-select" id="locationFilter">
              <option value="">Pilih lokasi</option>
              <option value="Jakarta">Jakarta</option>
              <option value="Bandung">Bandung</option>
              <option value="Malang">Malang</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="capacityFilter" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="capacityFilter" placeholder="Jumlah orang">
          </div>
          <div class="col-md-3 mb-3">
            <label for="priceRange" class="form-label">Harga</label>
            <select class="form-select" id="locationFilter">
              <option value="">Rentang Harga</option>
              <option value="Harga Terendah">Harga Terendah</option>
              <option value="Harga Tertinggi">Harga Tertinggi</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="roomTypeFilter" class="form-label">Tipe Ruangan</label>
            <select class="form-select" id="roomTypeFilter">
              <option value="">Pilih tipe</option>
              <option value="indoor">Indoor</option>
              <option value="outdoor">Outdoor</option>
              <option value="ballroom">Ballroom</option>
              <option value="aula">Aula</option>
            </select>
          </div>
          <div class="col-md-3 d-block d-lg-none">
            <button class="btn btn-warning w-100" type="submit" >Cari</button>
          </div>
        </div>
      </form>
    </div>
    <div class="container my-5 text-white d-flex justify-content-between">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
              $limitedData = array_slice($ruangan, 0, 6);
              foreach ($limitedData as $data): 
                  $foto = isset($data['foto']['foto']) ? 'data:image/jpeg;base64,' . base64_encode($data['foto']['foto']) : 'https://via.placeholder.com/350x200';
              ?>
                  <div class="col d-flex flex-column">
                      <div class="card h-100">
                          <img src="<?= $foto; ?>" class="card-img-top" alt="<?= $data['nama_ruangan']; ?>" style="object-fit: cover; height: 400px">
                          <div class="card-body">
                              <h5 class="card-title fw-semibold"><?= $data['nama_ruangan']; ?></h5>
                              <p class="card-text"><?= $data['deskripsi_ruangan']; ?></p>
                          </div>
                          <div class="card-footer text-center">
                              <a href="/ruang/<?= slugify($data['nama_ruangan']) ?>" 
                                class="btn btn-warning text-black">
                                Lihat Ruangan
                              </a>
                          </div>

                      </div>
                  </div>
            <?php endforeach; ?>
        </div>
        
      </div>
      <!-- <nav aria-label="Page navigation example" class="d-flex">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="/?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="/?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="/?page=3">3</a></li>
          <li class="page-item"><a class="page-link" href="/?page=4">4</a></li>
          <li class="page-item"><a class="page-link" href="/?page=5">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav> -->
  </div>
</div>
</div>
</main>

<?= $this->endSection() ?>