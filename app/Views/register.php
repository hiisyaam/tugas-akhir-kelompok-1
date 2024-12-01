<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid my-4">
<main style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #34495e;"><?= lang('Auth.register') ?></h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow" style="border-radius: 10px; border: 1px solid #ddd;">
                    <div class="card-body">
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= url_to('register') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="pass_confirm" class="form-label"><?= lang('Auth.repeatPassword') ?></label>
                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-warning w-100" style="border-radius: 5px;"><?= lang('Auth.register') ?></button>
                        </form>
                        <hr>
                        <div class="text-center mt-3">
                            <p style="color: #7f8c8d;"><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>" style="text-decoration: none; color: #3498db;"><?= lang('Auth.signIn') ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>


<?= $this->endSection(); ?>