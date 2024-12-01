<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<main style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #34495e;"><?= lang('Auth.loginTitle') ?></h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow" style="border-radius: 10px; border: 1px solid #ddd;">
                    <div class="card-body">
                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <form action="<?= url_to('login') ?>" method="post">
                            <?= csrf_field() ?>

                            <?php if ($config->validFields === ['email']): ?>
                                <div class="mb-3">
                                    <label for="login" class="form-label"><?= lang('Auth.email') ?></label>
                                    <input type="email" 
                                           class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" 
                                           name="login" 
                                           placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="mb-3">
                                    <label for="login" class="form-label"><?= lang('Auth.emailOrUsername') ?></label>
                                    <input type="text" 
                                           class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" 
                                           name="login" 
                                           placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                                <input type="password" 
                                       class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" 
                                       name="password" 
                                       placeholder="<?= lang('Auth.password') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <?php if ($config->allowRemembering): ?>
                                <div class="form-check mb-3">
                                    <input type="checkbox" 
                                           class="form-check-input" 
                                           name="remember" 
                                           <?php if (old('remember')) : ?>checked<?php endif ?>>
                                    <label class="form-check-label"><?= lang('Auth.rememberMe') ?></label>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-warning w-100" style="border-radius: 5px;"><?= lang('Auth.loginAction') ?></button>
                        </form>

                        <div class="text-center mt-3">
                            <?php if ($config->allowRegistration) : ?>
                                <p style="color: #7f8c8d;">
                                    <?= lang('Auth.needAnAccount') ?> 
                                    <a href="<?= url_to('register') ?>" style="text-decoration: none; color: #3498db;"><?= lang('Auth.register') ?></a>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>
