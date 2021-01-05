<?php require_once('../../core/Kereta.php');
require_once('../layouts/header.php');
$kereta = new Kereta();

// Tambah data
if (isset($_POST['tambahKereta'])):
    if ($kereta->insert($_POST)):?>
    <div class="kereta-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
    <div class="kereta-fail" data-isi="Gagal Ditambahkan!"></div>
    <?php endif;
endif;

// Ubah data
if (isset($_POST['ubahKereta'])):
    if ($kereta->update($_POST)): ?>
    <div class="kereta-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
        <div class="kereta-fail" data-isi="Gagal Diubah!"></div>
    <?php endif;
endif;

// Hapus data
if (isset($_POST['hapusKereta'])):
    if ($kereta->delete($_POST)): ?>
        <div class="kereta-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
        <div class="kereta-fail" data-isi="Gagal Dihapus!"></div>
    <?php endif;
endif; ?>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Kereta</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Kereta</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Kereta
                </div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#keretaModal">Tambah Data Kereta</button>
                    <div class="table-responsive">
                        <table class="table table-bordered table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kereta</th>
                                    <th>Kelas Kereta</th>
                                    <th>~</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>#</th>
                                    <th>Nama Kereta</th>
                                    <th>Kelas Kereta</th>
                                    <th>~</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 0; foreach($kereta->fetchAll() as $data): ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $data->nama_kereta ?></td>
                                        <td><?= $data->kelas_kereta ?></td>
                                        <td>
                                        <a href="edit.php?id_kereta=<?= $data->id_kereta ?>" class="btn btn-warning font-weight-bold">Edit</a>
                                        <form action="" method="post" class="form-inline d-inline">
                                            <input type="hidden" name="id_kereta" value="<?= $data->id_kereta ?>">
                                            <input type="hidden" name="pesan" value="Berhasil Dihapus!">
                                            <input type="hidden" name="hapusKereta">
                                            <button type="submit" class="tombolHapusKereta btn btn-danger font-weight-bold">Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- Modal -->
<div class="modal fade" id="keretaModal" tabindex="-1" aria-labelledby="keretaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="keretaModalLabel">Tambah Data Kereta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kereta">Nama Kereta</label>
                        <input type="text" id="nama_kereta" class="form-control" name="nama_kereta" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas_kereta">Kelas Kereta</label>
                        <input type="text" id="kelas_kereta" class="form-control" name="kelas_kereta" required>
                    </div>
                </div>
                <input type="hidden" name="pesan" value="Berhasil Ditambahkan!">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary" name="tambahKereta">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    require "../layouts/footer.php";
    ?>