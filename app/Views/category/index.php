<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pengaturan Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                            Daftar Kategori
                            <a href="<?php echo base_url('category/create'); ?>" class="btn btn-primary float-right">Tambah</a>
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
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($categories as $key => $row){ ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php echo $row['category_status']; ?></td>
                                            <td>
                                                <div class="btn-group text-center">
                                                    <center>
                                                    <a href="<?php echo base_url('category/edit/'.$row['category_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <?php 
                                                        $id = $row['category_id'];
                                                        $category_name = $row['category_name'];
                                                    ?>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteCategory('<?= $id ?>', '<?= $category_name ?>')">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
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