<?php require_once "../../core/Penumpang.php";
require_once "../../core/Stasiun.php";
$penumpang = new Penumpang();
$stasiun = new Stasiun();
// $kereta = new Kereta();
$data = $penumpang->fetch($_GET['id_penumpang']);
require_once "../layouts/header.php" ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Ubah Data Penumpang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">Penumpang</a></li>
            <li class="breadcrumb-item active">Ubah</li>
        </ol>
        <form action="index.php" method="post">
            <input type="hidden" name="id_penumpang" value="<?= $data->id_penumpang ?>">
            <div class="form-group">
                <label for="nama_penumpang">Nama Penumpang</label>
                <input type="text" id="nama_penumpang" class="form-control" name="nama_penumpang" value="<?= $data->nama_penumpang ?>">
            </div>
            <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="text" id="NIK" class="form-control" name="NIK" value="<?= $data->NIK ?>">
            </div>
            <div class="form-group">
                <label for="id_kereta">Nama Kereta</label>
                <select id="id_kereta" class="form-control custom-select" name="id_kereta" >
                    <?php foreach($kereta->fetchAll() as $item): ?>
                        <option value="<?= $item->id_kereta?>"><?= $item->nama_kereta ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_stasiun">Nama Stasiun</label>
                <select id="id_stasiun" class="form-control custom-select" name="id_stasiun" >
                    <?php foreach($stasiun->fetchAll() as $item): ?>
                        <option value="<?= $item->id_stasiun?>"><?= $item->nama_stasiun ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" value="<?= $data->tgl_lahir ?>">
            </div>
            <input type="hidden" name="pesan" value="Berhasil Diubah!">
            <div class="form-group">
                <button type="submit" name="ubahPenumpang" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</main>
<?php require_once "../layouts/footer.php" ?>