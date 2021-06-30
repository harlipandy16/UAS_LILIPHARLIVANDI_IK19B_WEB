<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href='<?= base_url('favicon/favicon.ico') ?>' rel='icon' type='image/x-icon'/>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="text-center mb-3">
      <img src="<?php echo base_url('favicon/HZS.png')?>" style="width:6rem; height:6rem;"/>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <?php $errors = session()->getFlashdata('errors');
        if(!empty($errors)){ ?>
          <div class="alert alert-danger" role="alert">
            Ada kesalahan saat input data, yaitu:
            <ul>
              <?php foreach ($errors as $error) { ?>
              <li><?php echo esc($error); ?></li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>
        <?php 
        $error_login = session()->getFlashdata('error_login');
        if(!empty($error_login)){ ?>
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger text-center">
                <?php echo $error_login; ?>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if($success_register = session()->getFlashdata('success_register')){ ?>
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success text-center">
                <?php echo $success_register; ?>
              </div>
            </div>
          </div>
        <?php 
        } 
        $inputs = session()->getFlashdata('inputs'); 
        if (empty($inputs)) {
          $inputs = array(
            'email' => '',
            'password' => '',
          );
        }
        echo form_open(base_url('auth/proses_login')); 
        ?>
        <div class="input-group mb-3">
          <?php
          $email = [
            'type'  => 'email',
            'name'  => 'email',
            'id'    => 'email',
            'value' => $inputs['email'],
            'class' => 'form-control',
            'placeholder' => 'your_email@gmail.com'
          ];
          echo form_input($email); 
          ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <?php
          $password = [
            'type'  => 'password',
            'name'  => 'password',
            'id'    => 'password',
            'value' => $inputs['password'],
            'class' => 'form-control',
            'placeholder' => 'your password'
          ];
          echo form_input($password); 
          ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <p class="mb-0">
              <a href="<?php echo base_url('auth/register'); ?>" class="text-center">Register</a>
            </p>
          </div> -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
</body>
</html>