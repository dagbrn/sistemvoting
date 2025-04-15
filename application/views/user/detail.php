<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Detail Kandidat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h3>Detail Kandidat</h3>

  <div class="card">
    <div class="card-body">
      <img src="<?= base_url('uploads/' . $kandidat->foto) ?>" class="mb-3" width="150" alt="Foto Kandidat">
      <h5>No. Urut: <?= $kandidat->no_urut ?></h5>
      <h5>Nama: <?= $kandidat->nama ?></h5>
      <p><strong>Visi:</strong> <?= $kandidat->visi ?></p>
      <p><strong>Misi:</strong> <?= $kandidat->misi ?></p>
    </div>
  </div>

  <div class="mt-3 d-flex justify-content-between">
    <a href="<?= site_url('user/index') ?>" class="btn btn-secondary">Kembali</a>

    <?php if ((int)$sudah_memilih === 1): ?>
      <button class="btn btn-success" disabled>Sudah Memilih</button>
    <?php else: ?>
      <a href="<?= site_url('user/vote/' . $kandidat->id) ?>" class="btn btn-success">Pilih Kandidat Ini</a>
    <?php endif; ?>
  </div>
</div>
</body>
</html>
