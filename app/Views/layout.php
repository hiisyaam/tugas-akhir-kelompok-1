<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro/styles/index.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro/index.js" defer></script>
  <link rel="stylesheet" href="style/index.css">
  <title><?= $judulHalaman; ?></title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-warning px-2 px-lg-5 py-3 z-index-5">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold d-flex" href="/">
        <iconify-icon icon="cil:room" style="color: #171717" width="30"></iconify-icon>
        TemuRuang
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (logged_in() && in_groups('admin')) : ?>
              <li class="dropdown-item">
                  <a class="nav-link" href="#">Ruangan</a>
              </li>
              <li class="dropdown-item">
                  <a class="nav-link" href="#">Artikel</a>
              </li>
              <li class="dropdown-item">
                  <a class="nav-link" href="#">Pemesanan</a>
              </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="/faq">FAQs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/artikel">Artikel</a>
          </li>
        </ul>
        
        <?php if(logged_in()): ?>
        <div class="dropdown-center">
          <button class="btn  dropdown-toggle text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= user()->username; ?>
          </button>
          <ul class="dropdown-menu">
          <?php if (logged_in() && in_groups('admin')) : ?>
              <li class="dropdown-item">
                  <a class="nav-link" href="/admin">Admin</a>
              </li>
          <?php endif; ?>
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div>
        <?php else: ?>
          <div class="dropdown-center">
            <a href="/login">
          <button type="button" class="btn btn-outline-dark">Login</button>
          </div>
          </a>
        <?php endif; ?>
      </div>
  </nav>

  <?= $this->renderSection('content') ?>
  
  <div class="bg-warning">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-5 mx-5 border-top">
      <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Kelompok 1</p>

      <a href="/"
        class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <iconify-icon icon="cil:room" style="color: #171717" width="30"></iconify-icon>
        TemuRuang
      </a>
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="/artikel" class="nav-link px-2 text-body-secondary">Artikel</a></li>
        <li class="nav-item"><a href="/faq" class="nav-link px-2 text-body-secondary">FAQs</a></li>
    </footer>
  </div>
</body>
<script src="script/script.js"></script>

</html>