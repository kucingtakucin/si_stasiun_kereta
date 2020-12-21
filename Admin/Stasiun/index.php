<?php require_once('../../core/Stasiun.php');
require_once('../layouts/header.php');
$stasiun = new Stasiun();

// Tambah data
if (isset($_POST['tambahStasiun'])):
    if ($stasiun->insert($_POST)):?>
    <div class="stasiun-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
    <div class="stasiun-fail" data-isi="Gagal Ditambahkan!"></div>
    <?php endif;
endif;

// Ubah data
if (isset($_POST['ubahStasiun'])):
    if ($stasiun->update($_POST)): ?>
    <div class="stasiun-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
        <div class="stasiun-fail" data-isi="Gagal Diubah!"></div>
    <?php endif;
endif;

// Hapus data
if (isset($_POST['hapusStasiun'])):
    if ($stasiun->delete($_POST)): ?>
        <div class="stasiun-success" data-isi="<?= $_POST['pesan'] ?>"></div>
    <?php else: ?>
        <div class="stasiun-fail" data-isi="Gagal Dihapus!"></div>
    <?php endif;
endif; ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Stasiun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Stasiun</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Stasiun
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#stasiunModal">Tambah Data Stasiun</button>
                <div class="table-responsive">
                    <table class="table table-bordered table-dark" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Stasiun</th>
                                <th>Alamat Stasiun</th>
                                <th>~</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Stasiun</th>
                                <th>Alamat Stasiun</th>
                                <th>~</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 0; foreach($stasiun->fetchAll() as $data): ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $data->nama_stasiun ?></td>
                                    <td><?= $data->alamat_stasiun ?></td>
                                    <td>
                                        <a href="edit.php?id_stasiun=<?= $data->id_stasiun ?>" class="btn btn-warning font-weight-bold">Edit</a>
                                        <form action="" method="post" class="form-inline d-inline">
                                            <input type="hidden" name="id_stasiun" value="<?= $data->id_stasiun ?>">
                                            <input type="hidden" name="pesan" value="Berhasil Dihapus!">
                                            <input type="hidden" name="hapusStasiun">
                                            <button type="submit" class="tombolHapusStasiun btn btn-danger font-weight-bold">Delete</button>
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
<div class="modal fade" id="stasiunModal" tabindex="-1" aria-labelledby="stasiunModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="stasiunModalLabel">Tambah Data Stasiun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_stasiun">Nama Stasiun</label>
                        <input type="text" id="nama_stasiun" class="form-control" name="nama_stasiun" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_stasiun">Alamat Stasiun</label>
                        <input type="text" id="alamat_stasiun" class="form-control" name="alamat_stasiun" required>
                    </div>
                </div>
                <input type="hidden" name="pesan" value="Berhasil Ditambahkan!">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary" name="tambahStasiun">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('../layouts/footer.php') ?>