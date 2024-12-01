<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1>Kelola Data User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>


                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dataUser): ?>
                        <tr>
                            <td><?= $dataUser['id']; ?></td>
                            <td><?= $dataUser['username']; ?></td>
                            <td><?= $dataUser['email']; ?></td>
                            <?php if ($dataUser['role'] == 'admin') : ?>
                                <td>Admin</td>
                            <?php elseif ($dataUser['role'] == 'user') : ?>
                                <td>User</td>
                            <?php endif; ?>
                            <td>
                                <a href="user/hapus/<?= $dataUser['id']; ?>" class="btn btn-danger btn-sm text-white">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1>Kelola Data Pemesanan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered table-hover">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Durasi (Jam)</th>
                        <th>Durasi (Hari)</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pemesanan as $pesan): ?>
                    <tr>
                        <td><?= $pesan->username; ?></td>
                        <td><?= $pesan->durasi_jam ?></td>
                        <td><?= $pesan->durasi_hari; ?></td>
                        <td><?= $pesan->total_harga; ?></td>
                        <td><?= $pesan->tanggal_pemesanan; ?></td>
                        <td><?= $pesan->status_pembayaran; ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="/user/acceptPesanan/<?= $pesan->id_pesanan ?>" method="post">
                                    <button type="submit" class="btn btn-success btn-sm">Accept Pesanan</button>
                                </form>
                                <form action="/user/rejectPesanan/<?= $pesan->id_pesanan ?>" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm">Batalkan Pesanan</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
</div>

<?= $this->endSection() ?>