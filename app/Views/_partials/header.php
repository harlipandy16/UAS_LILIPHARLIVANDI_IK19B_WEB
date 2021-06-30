<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href='<?= base_url('favicon/favicon.ico') ?>' rel='icon' type='image/x-icon'/>
    <title>HZS Toko</title>
    <style type="text/css"  id="debugbar_dynamic_style"></style>
    <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
    <script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
    <script type="text/javascript"  id="debugbar_dynamic_script"></script>
    <script type="text/javascript"  id="debugbar_loader" data-time="1585277113" src="<?php echo base_url('themes/plugins/'); ?>/index.php?debugbar"></script>
    <script src="<?php echo base_url('swal2/dist/sweetalert2.min.js') ?>"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('data-tables/jquery.dataTables.css') ?>">
    <script type="text/javascript" charset="utf8" src="<?php echo base_url('data-tables/jquery.dataTables.js') ?>"></script>

    <script type="text/javascript">
        // Variable Global
        var BaseUrl = "<?= base_url(); ?>";


        $(document).ready(function(){
            $('#my-table').DataTable();
        });

        // For Delete Product
        function deleteProduct(id,name_product) {
            var redirectUrl = `${BaseUrl}/product/delete/${id}`;

            Swal.fire({
              title: `Apakah yakin ingin menghapus ${name_product}`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Iya, hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                      'Deleted!',
                      `${name_product} Data berhasil dihapus.`,
                      'success'
                    );

                    window.location.replace(`${redirectUrl}`);
                }
            });
        }

        // For Delete Category
        function deleteCategory(id,name_category) {
            var redirectUrl = `${BaseUrl}/category/delete/${id}`;

            Swal.fire({
              title: `Apakah yakin ingin menghapus ${name_category}`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Iya, hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                      'Deleted!',
                      `${name_category} Data berhasil dihapus.`,
                      'success'
                    );

                    window.location.replace(`${redirectUrl}`);
                }
            });
        }
    </script>

    <style type="text/css">
        /* Logo */
        .brand-text {
            font-size: 1rem !important;
        }
    </style>

    <link rel="stylesheet" href="<?php echo base_url('swal2/dist/sweetalert2.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <?php echo session()->get('level'); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item">
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>