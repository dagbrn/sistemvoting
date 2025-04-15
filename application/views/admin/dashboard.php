<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin Voting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Dashboard Admin - Data Kandidat</h2>

  <!-- Tombol untuk ke Form Penambahan Kandidat -->
  <a href="<?= site_url('dashboard/form') ?>" class="btn btn-primary mb-3">Tambah Kandidat</a>

  <!-- Tabel Kandidat -->
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>No Urut</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Visi</th>
        <th>Misi</th>
        <th>Jumlah Suara</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
  <?php if (empty($kandidat)): ?>
    <tr>
      <td colspan="9" class="text-center">Belum ada data kandidat yang tersedia.</td>
    </tr>
  <?php else: ?>
    <?php foreach ($kandidat as $index => $k): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $k->no_urut ?></td>
        <td><?= $k->mhs_id ?></td>
        <td><?= $k->nama ?></td>
        <td><img src="<?= base_url('uploads/'.$k->foto) ?>" width="100" height="auto" alt="Foto Kandidat"></td>
        <td><?= $k->visi ?></td>
        <td><?= $k->misi ?></td>
        <td><?= $k->total_suara ?></td>
        <td>
          <a href="<?= site_url('dashboard/edit/'.$k->id) ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="<?= site_url('dashboard/delete/'.$k->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php endif; ?>
  </tbody>
  </table>
  <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger mt-4">Logout</a>

</div>
</body>
</html>
