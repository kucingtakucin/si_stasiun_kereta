<?php 
require_once "../../core/Tiket.php";
require_once "../../core/Stasiun.php";
require_once "../../core/Kereta.php";
require_once "../../core/Penumpang.php";
$stasiun = new Stasiun();
$kereta = new Kereta();
$penumpang = new Penumpang();
$tiket = new Tiket();
$data = $tiket->fetch($_GET['id_tiket']);
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
            <input type="hidden" name="id_tiket" value="<?= $data->id_tiket ?>">
            <div class="form-group">
                <label for="id_penumpang">nama penumpang</label>
                <select id="id_penumpang" class="form-control custom-select" name="id_penumpang" >
                    <option value="<?= $data->id_penumpang ?>"><?= $data->nama_penumpang ?></option>
                        <?php foreach($penumpang->fetchAll() as $item ): ?>
                        <option value="<?= $item->id_penumpang ?>"><?= $item->nama_penumpang ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_kereta">Nama Kereta</label>
                <select id="id_kereta" class="form-control custom-select" name="id_kereta" >
                    <option value="<?= $data->id_kereta ?>"><?= $data->nama_kereta ?></option>
                    <?php foreach ($kereta->fetchAll() as $item): ?>
                        <option value="<?= $item->id_kereta ?>"><?= $item->nama_kereta ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_stasiun_asal">Stasiun asal</label>
                <select id="id_stasiun_asal" class="form-control custom-select" name="id_stasiun_asal" >
                    <option value="<?= $data->id_stasiun_asal ?>"><?= $data->stasiun_berangkat ?></option>
                    <?php foreach($stasiun->fetchAll() as $item ): ?>
                        <option value="<?= $item->id_stasiun ?>"><?= $item->nama_stasiun ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_stasiun_tujuan">Stasiun Tujuan</label>
                <select id="id_stasiun_tujuan" class="form-control custom-select" name="id_stasiun_tujuan" >
                    <option value="<?= $data->id_stasiun_tujuan ?>"><?= $data->stasiun_tiba ?></option>
                    <?php foreach($stasiun->fetchAll() as $item ): ?>
                        <option value="<?= $item->id_stasiun ?>""><?= $item->nama_stasiun ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="berangkat">berangkat</label>
                <input type="date" id="berangkat" class="form-control" name="berangkat" value="<?= $data->berangkat ?>" required>
            </div>
            <div class="form-group">
                <label for="tiba">tiba</label>
                <input type="date" id="tiba" class="form-control" name="tiba" value="<?= $data->tiba ?>" required>
            </div>
            <div class="form-group">
                <label for="durasi">durasi</label>
                <input type="text" id="durasi" class="form-control" name="durasi" value="<?= $data->durasi ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">harga</label>
                <input type="number" id="harga" class="form-control" name="harga" value="<?= $data->harga ?>" required>
            </div>
            <input type="hidden" name="pesan" value="Berhasil Diubah!">
            <div class="form-group">
                <button type="submit" name="ubahTiket" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</main>
<?php require_once "../layouts/footer.php" ?>
