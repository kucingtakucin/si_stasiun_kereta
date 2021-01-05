<?php require_once "../../core/Kereta.php";
$kereta = new Kereta();
$data = $kereta->fetch($_GET['id_kereta']);
require_once "../layouts/header.php" ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Ubah Data Kereta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">Kereta</a></li>
            <li class="breadcrumb-item active">Ubah</li>
        </ol>
        <form action="index.php" method="post">
            <input type="hidden" name="id_kereta" value="<?= $data->id_kereta ?>">
            <div class="form-group">
                <label for="nama_kereta">Nama Kereta</label>
                <input type="text" id="nama_kereta" class="form-control" name="nama_kereta" value="<?= $data->nama_kereta ?>">
            </div>
            <div class="form-group">
                <label for="kelas_kereta">Kelas Kereta</label>
                <input type="text" id="kelas_kereta" class="form-control" name="kelas_kereta" value="<?= $data->kelas_kereta ?>">
            </div>
            <input type="hidden" name="pesan" value="Berhasil Diubah!">
            <div class="form-group">
                <button type="submit" name="ubahKereta" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</main>
<?php require_once "../layouts/footer.php" ?>
