<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Beli barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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
                            Data barang
                            <a class="btn btn-lg btn-success btn-sm float-right" href="<?php echo base_url('cart'); ?>">
                                <i class="fa fa-cart-plus"></i> Keranjang : <?php echo count($total); ?>
                            </a>
                            <div class="btn-group float-right">
                            </div>
                        </div>
                        <div class="card-body">
                        
                            <?php
                            if(!empty(session()->getFlashdata('success'))){ ?>
                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('success');?>
                            </div>     
                            <?php } ?>

                            <?php if(!empty(session()->getFlashdata('info'))){ ?>
                            <div class="alert alert-info">
                                <?php echo session()->getFlashdata('info');?>
                            </div>
                            <?php } ?>

                            <?php if(!empty(session()->getFlashdata('warning'))){ ?>
                            <div class="alert alert-warning">
                                <?php echo session()->getFlashdata('warning');?>
                            </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table table-striped" id="my-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Kode Barang</th>
                                            <th>Harga</th>
                                            <th>Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($product as $key => $item) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><img src="<?php echo base_url('uploads/'.$item['product_image']) ?>" class="rounded-circle" width="50" height="50"></td>
                                                <td><?php echo $item['product_name']; ?></td>
                                                <td><?php echo $item['product_sku']; ?></td>
                                                <td><?php echo "Rp. ".number_format($item['product_price']); ?></td>
                                                
                                                <td>
                                                   <a href="<?php echo base_url('cart/beli/'.$item['product_id']); ?>" class="btn btn-primary">Beli</a>
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