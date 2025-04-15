<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Halaman User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="container mt-5">
  <h3 class="mb-4">Daftar Kandidat</h3>

  <?php foreach ($kandidat as $k): ?>
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-2">
          <img src="<?= base_url('uploads/' . $k->foto) ?>" class="img-fluid rounded-start" alt="Foto Kandidat">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">No. Urut <?= $k->no_urut ?> - <?= $k->nama ?></h5>
          </div>
        </div>
        <div class="col-md-2 d-flex align-items-center">
          <a href="<?= site_url('user/detail/' . $k->id) ?>" class="btn btn-primary">Detail</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger mt-4">Logout</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>
