<?php $this->extend('layout'); ?>
<?php $this->section('content'); ?>
<?php if (logged_in()): ?>
    <div class="container my-5">
        <h2 class="text-center mb-4">Profile</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Informasi Akun</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Nama:</strong> <?= user()->username ?></p>
                        <p><strong>Email:</strong> <?= user()->email ?></p>
                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#editProfile">Edit Profil</button>
                    </div>
                </div>
                    <div class="card">
                             <div class="card-header">
                                 <h5 class="card-title">Riwayat Pemesanan</h5>
                             </div>
                             <div class="card-body">
                                 <h6 class="fw-semibold">Pemesanan Terakhir:</h6>
                                 <ul class="list-unstyled">
                                     <li><strong>Ruangan:</strong> Aula Utama</li>
                                     <li><strong>Tanggal Pemesanan:</strong> 15 November 2024</li>
                                     <li><strong>Status:</strong> Selesai</li>
                                 </ul>
     
                                 <h6 class="fw-semibold mt-4">Riwayat Pemesanan Lain:</h6>
                                 <ul class="list-unstyled">
                                     <li><strong>Ruangan:</strong> Ruang Seminar</li>
                                     <li><strong>Tanggal Pemesanan:</strong> 5 Oktober 2024</li>
                                     <li><strong>Status:</strong> Pembayaran Diterima</li>
                                 </ul>
                                 <a href="history.html" class="btn btn-warning text-white mt-3">Lihat Semua Pemesanan</a>
                             </div>
                    </div> 
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/profile/update" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= user()->username ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= user()->email ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>             
<?php endif; ?>
<?php $this->endSection(); ?>
