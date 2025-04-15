<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Kandidat</h2>

        <!-- Form Edit Kandidat -->
        <form action="<?= base_url('dashboard/update/' . $kandidat['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nim" class="form-label">NIM Mahasiswa</label>
                    <input type="text" id="nim" name="mhs_id" class="form-control" value="<?= $kandidat['mhs_id']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="no_urut" class="form-label">No Urut</label>
                    <input type="number" id="no_urut" name="no_urut" class="form-control" value="<?= $kandidat['no_urut']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="foto" class="form-label">Foto Kandidat</label>
                    <input type="file" id="foto" name="foto" class="form-control">
                    <small>Biarkan kosong jika tidak ingin mengubah foto</small>
                </div>
                <div class="col-md-6">
                    <label for="visi" class="form-label">Visi</label>
                    <textarea id="visi" name="visi" class="form-control" rows="4" required><?= $kandidat['visi']; ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="misi" class="form-label">Misi</label>
                    <textarea id="misi" name="misi" class="form-control" rows="4" required><?= $kandidat['misi']; ?></textarea>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
