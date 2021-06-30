<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Riwayat transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Riwayat Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Riwayat Transaksi
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table table-striped" id="my-table">
                                    <thead>
                                        <tr>
                                            <th width="10px" class="text-center">No</th>
                                            <th>Kode Unik</th>
                                            <th>Total</th>
                                            <th>Date Order</th>
                                            <th class="text-center">Detail Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_transaction as $key => $item) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $item['kode_unik']; ?></td>
                                                <td><?php echo "Rp. " . number_format($item['total']); ?></td>
                                                <td><?php echo $item['date_create']; ?></td>
                                                <td>
                                                    <div class="text-center">
                                                        <center>
                                                            <a href="<?= base_url('dashboard/detail_order/' . $item['id']) ?>" class="btn btn-sm btn-info" onclick="">
                                                                <i class="fa fa-info-circle"></i>
                                                            </a>
                                                        </center>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>