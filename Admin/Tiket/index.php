<?php require_once('../../core/Tiket.php');
require_once('../layouts/header.php');
$tiket = new Tiket();
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Tiket</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Tiket</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Tiket
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama penumpang</th>
                                <th>id tiket</th>
                                <th>keberangkatan kereta</th>
                                <th>tujuan kereta</th>
                                <th>id kereta</th>
                                <th>jam berangkat</th>
                                <th>jam tiba</th>
                                <th>waktu tempuh</th>
                                <th>harga tiket</th>
                                <th>status</th>
                                <th>jumlah</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama penumpang</th>
                                <th>id tiket</th>
                                <th>keberangkatan kereta</th>
                                <th>tujuan kereta</th>
                                <th>id kereta</th>
                                <th>jam berangkat</th>
                                <th>jam tiba</th>
                                <th>waktu tempuh</th>
                                <th>harga tiket</th>
                                <th>status</th>
                                <th>jumlah</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($tiket->fetchAll() as $item): ?>
                                <tr>
                                    <td><?= $item->nama_penumpang ?></td>
                                    <td><?= $item->nama_penumpang ?></td>
                                    <td><?= $item->nama_penumpang ?></td>
                                    <td><?= $item->nama_penumpang ?></td>
                                    <td><?= $item->nama_penumpang ?></td>
                                    <td><?= $item->nama_penumpang ?></td>
                                    <td><?= $item->nama_penumpang ?></td>
                                    <td><?= $item->nama_penumpang ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require '../layouts/footer.php'?>