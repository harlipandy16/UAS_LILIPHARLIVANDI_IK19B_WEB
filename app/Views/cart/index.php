<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Keranjang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Keranjang belanja</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <body>
    <div class="container mt-5">
        <h1 class="text-center mb-5"></h1>
        <div class="card" id="card-cart">
            <div class="card-header">Daftar belanja</div>
                <div class="card-body">
                    <!-- tampilkan pesan success -->
                    <?php if(session()->getFlashdata('success') != null){ ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                    <?php } ?>
                    <!-- selesai menampilkan pesan success -->
                    <?php if(count($items) != 0){ // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: ?>
                    <div class="table-responsive">
                        <?php echo form_open('cart/update', 'id="update-cart"'); ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Pesan</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $key => $item) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['product_name']; ?></td>
                                    <td>
                                        <input type="number" name="quantity[]" min="1" class="form-control" value="<?php echo $item['quantity']; ?>" style="width:50px">
                                    </td>
                                    <td>Rp. <?php echo number_format($item['product_price'], 0, 0, '.'); ?></td>
                                    <td>Rp. <?php echo number_format($item['quantity'] * $item['product_price'], 0, 0, '.'); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                            <a href="<?php echo base_url('cart/remove/'.$item['product_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?')"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" class="text-right">Jumlah</td>
                                    <td>Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php echo form_close(); ?>
                     
                    </div>
                    <?php } // selesai menampilkan list cart dalam bentuk table ?>
 
                    <?php if(count($items) == 0){ // jika cart kosong, maka tampilkan: ?>
                        Keranjang belanja Anda sedang kosong. <a href="<?php echo base_url('transaction'); ?>" class="btn btn-success">Belanja Yuk</a>
                    <?php } else { // jika cart tidak kosong, tampilkan: ?>
                        <div class="card-footer float-right" style="background: transparent !important;">
                            <a href="<?php echo base_url('transaction'); ?>" class="btn btn-danger">Batal</a>
                            <button onclick="order()" class="btn btn-success">Checkout <i class="fas fa-arrow-right"></i></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</div>

<script type="text/javascript">
    var transactionURL = `${BaseUrl}/transaction`;
    var orderURL = `${BaseUrl}/cart/order`;
    function order() {

        // Confirmation To Checkout
        Swal.fire({
          title: `Apakah anda yakin akan melakukan Checkout ?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Checkout'
        }).then((result) => {
            if (result.isConfirmed) {
                // Process Transaction
                fetch(orderURL)
                .then((response) => response.json())
                .then(function(data){
                    console.log(data)

                    Swal.fire(
                      'Checkout Success!',
                      `Data transaksi berhasil dibuat.`,
                      'success'
                    );

                    // Replace with empty kosong
                    var html = `Keranjang belanja Anda sedang kosong. <a href="${transactionURL}" class="btn btn-success">Belanja Yuk</a>`
                    $('#card-cart .card-body').html(html);
                });
                
            }
        });
    }
</script>

<?php echo view('_partials/footer'); ?>