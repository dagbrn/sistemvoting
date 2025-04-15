<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Tambah Kandidat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Form Tambah Kandidat</h2>

  <!-- Form untuk menambah kandidat -->
  <form method="post" action="<?= site_url('dashboard/store') ?>" enctype="multipart/form-data">
    <div class="row g-2">
    <div class="col-md-4">
        <select name="mhs_id" class="form-control" required>
        <option value="">-- Pilih Mahasiswa --</option>
        <?php foreach ($mahasiswa as $mhs): ?>
        <option value="<?= $mhs->nim ?>"><?= $mhs->nim ?> - <?= $mhs->nama ?></option>
        <?php endforeach; ?>
        </select>
    </div>
      <div class="col-md-4">
        <input type="number" name="no_urut" class="form-control" placeholder="No Urut" required>
      </div>
      <div class="col-md-4">
        <input type="file" name="foto" class="form-control" required>
      </div>
      <div class="col-md-12 mt-3">
        <textarea name="visi" class="form-control" placeholder="Visi Kandidat" rows="3" required></textarea>
      </div>
      <div class="col-md-12 mt-3">
        <textarea name="misi" class="form-control" placeholder="Misi Kandidat" rows="3" required></textarea>
      </div>
      <div class="col-md-4 d-grid mt-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>

  <br>
  <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>
</body>
</html>
