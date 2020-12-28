<?php require_once('../../core/Penumpang.php');
require "../layouts/header.php";
$penumpang = new Penumpang();

// Tambah data
if (isset($_POST['tambahPenumpang'])):
    if ($penumpang->insert($_POST)):?>
    <div class="penumpang-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
    <div class="penumpang-fail" data-isi="Gagal Ditambahkan!"></div>
    <?php endif;
endif;

// Ubah data
if (isset($_POST['ubahPenumpang'])):
    if ($penumpang->update($_POST)): ?>
    <div class="penumpang-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
        <div class="penumpang-fail" data-isi="Gagal Diubah!"></div>
    <?php endif;
endif;

// Hapus data
if (isset($_POST['hapusPenumpang'])):
    if ($penumpang->delete($_POST)): ?>
        <div class="penumpang-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
        <div class="penumpang-fail" data-isi="Gagal Dihapus!"></div>
    <?php endif;
endif; 

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Penumpang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Penumpang</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Penumpang
            </div>
            <div class="card-body">
                <!-- Button buat tambah data -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#penumpangModal">Tambah Data Penumpang</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Penumpang</th>
                                <th>Nama Penumpang</th>
                                <th>NIK</th>
                                <th>Nama Kereta</th>
                                <th>Tanggal Lahir</th>
                                <th> ~ </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>ID Penumpang</th>
                                <th>Nama Penumpang</th>
                                <th>NIK</th>
                                <th>Nama Kereta</th>
                                <th>Tanggal Lahir</th>
                                <th> ~ </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 0; foreach($penumpang->fetchAll() as $data): ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $data->id_penumpang ?></td>
                                    <td><?= $data->nama_penumpang ?></td>
                                    <td><?= $data->NIK ?></td>
                                    <td><?= $data->nama_kereta ?></td>
                                    <td><?= $data->tgl_lahir ?></td>
                                    <td>
                                        <a href="edit.php?id_penumpang=<?= $data->id_penumpang ?>" class="btn btn-warning">Edit</a>
                                        <form action="" method="post" class="form-inline d-inline">
                                            <input type="hidden" name="id_penumpang" value="<?= $data->id_penumpang ?>">
                                            <input type="hidden" name="pesan" value="Berhasil Dihapus!">
                                            <input type="hidden" name="hapusPenumpang">
                                            <button type="submit" class="tombolHapusPenumpang btn btn-danger font-weight-bold">Delete</button>  
                                        </form>
                                    </td>
                            <?php endforeach ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="penumpangModal" tabindex="-1" aria-labelledby="penumpangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="penumpangModalLabel">Tambah Data Penumpang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_penumpang">Nama penumpang</label>
                        <input type="text" id="nama_penumpang" class="form-control" name="nama_penumpang" required>
                    </div>
                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" id="NIK" class="form-control" name="NIK" >
                    </div>
                    <div class="form-group">
                        <label for="id_kereta">Nama Kereta</label>
                        <select id="id_kereta" class="form-control custom-select" name="id_kereta" >
                            <option value="1">Thomas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_stasiun">Nama Stasiun</label>
                        <select id="id_stasiun" class="form-control custom-select" name="id_stasiun" >
                            <option value="1">Solo Balapan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" >
                    </div>
                    <input type="hidden" name="pesan" value="Berhasil Ditambahkan!">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary" name="tambahPenumpang">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require "../layouts/footer.php" ?>