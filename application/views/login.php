<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WAEROENG MODUS | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-image: url('<?= base_url('assets/');?>images/warung.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
  <div class="container">
    <!-- Konten halaman -->
  </div>
</body>

   
      
<div class="row justify-content-center">
  <div class="row mt-5" >
  <div class="card">
  <div class="login-box">
<div class="card-body login-card-body">
  <div class="login-logo">
    <div class="image">
   <img src="<?php echo base_url('assets/')?>/images/logo111.png" class="center" alt="center" width="200" height"200">
</div>
  </div>

    </div>
 
  <!-- /.login-logo -->
 
 
    <div class="card-body login-card-body bgroung">
    <p class="login-box-msg" style="font-weight: bold;">SELAMAT DATANG DISISTEM INFORMASI WAROENG MODUS</p>
<p class="login-box-msg" style="margin-top: 10px;">Silakan Login Untuk Memulai</p>

      

<form action="<?php echo site_url('Login/proses_login'); ?>" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></span>
            </div>
        </div>
    </div>
    <div class="social-auth-links text-center mb-3">
        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
    </div>
</form>

    </div>
</body>


    <!-- /.login-card-body -->
  </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets')?>/dist/js/adminlte.min.js"></script>
<script>
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});
</script>
</body>
</html>