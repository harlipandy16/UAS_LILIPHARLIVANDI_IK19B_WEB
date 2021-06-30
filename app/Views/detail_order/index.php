<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Detail Order</li>
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
                            Detail Order
                        </div>
                        <div class="card-body">
                        	<?php if (isset($data_transaction)) { ?>
                        		<div class="mb-5">
	                        		<div class="card" style="width: 18rem;">

	                        	      <?php  
	                        	      	$date = date_create($data_transaction['date_create']);
								        $date_format = date_format($date,"d/m/Y H:i:s");
	                        	      ?>

									  <ul class="list-group list-group-flush">
									    <li class="list-group-item"><b>Nota</b> : <b><?= $data_transaction['kode_unik'] ?></b></li>
									    <li class="list-group-item"><b>Total</b> : <b><?= number_format($data_transaction['total']) ?></b></li>
									    <li class="list-group-item"><b>Tanggal</b> : <b><?= $date_format ?></b></li>
									  </ul>
									</div>
	                        	</div>

	                            <div class="table-responsive">
	                                <table class="table table table-striped" id="my-table">
	                                    <thead>
	                                        <tr>
	                                            <th width="10px" class="text-center">No</th>
	                                            <th>Image</th>
	                                            <th>Nama</th>
	                                            <th>Harga</th>
	                                            <th>QTY</th>
	                                            <th>Sub Total</th>
	                                            <th>Kode(SKU)</th>
	                                            <th>Deskripsi</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <?php foreach($my_order as $key => $row){ ?>
	                                        <tr>
	                                            <td><?php echo $key + 1; ?></td>
	                                            <td><img src="<?php echo base_url('uploads/'.$row['image_product']) ?>" class="rounded-circle" width="50" height="50"></td>
	                                            <td><?php echo $row['name_product']; ?></td>
	                                            <td><?php echo "Rp. " . number_format($row['price_product']); ?></td>
	                                            <td><?php echo $row['qty_product']; ?></td>
	                                            <td><?php echo "Rp. " . number_format($row['subtotal']); ?></td>
	                                            <td><?php echo $row['sku']; ?></td>
	                                            <td><?php echo $row['description']; ?></td>
	                                        </tr>
	                                        <?php } ?>
	                                    </tbody>
	                                </table>
	                            </div>
                        	<?php } else { ?>
                        		<div class="text-center">
                        			<b>Data Transaksi tidak ditemukan.</b>
                        		</div>
                        	<?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>