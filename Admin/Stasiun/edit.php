<?php require_once "../../core/Stasiun.php";
$stasiun = new Stasiun();
$data = $stasiun->fetch($_GET['id_stasiun']);
require_once "../layouts/header.php" ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Ubah Data Stasiun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">Stasiun</a></li>
            <li class="breadcrumb-item active">Ubah</li>
        </ol>
        <form action="index.php" method="post">
            <input type="hidden" name="id_stasiun" value="<?= $data->id_stasiun ?>">
            <div class="form-group">
                <label for="nama_stasiun">Nama Stasiun</label>
                <input type="text" id="nama_stasiun" class="form-control" name="nama_stasiun" value="<?= $data->nama_stasiun ?>">
            </div>
            <div class="form-group">
                <label for="alamat_stasiun">Alamat Stasiun</label>
                <input type="text" id="alamat_stasiun" class="form-control" name="alamat_stasiun" value="<?= $data->alamat_stasiun ?>">
            </div>
            <input type="hidden" name="pesan" value="Berhasil Diubah!">
            <div class="form-group">
                <button type="submit" name="ubahStasiun" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</main>
<?php require_once "../layouts/footer.php" ?>
