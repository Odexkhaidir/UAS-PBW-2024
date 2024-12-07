<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NipponBeats | Registration</title>

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script> -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?> ">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?> ">
  <!-- Theme style -->
  <link rel="stylesheet" href=" <?= base_url('adminlte/dist/css/adminlte.min.css') ?> ">
  <style>
    .register-page {
      background-color: #f2f2f2;
      background-image: url("<?= base_url('img/home_1.jpg') ?>");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }
    .register-logo a{
      color: maroon;
      text-shadow: black 0 0 2px;
    }
  </style>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="/"><b>Nippon</b>Beats</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Be a new membership now!</p>

        <form action="auth/register" method="post">
          <?= csrf_field() ?>
          <?php
          $validation = session('validation');
          ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= ($validation && $validation->hasError('nama')) ? 'is-invalid' : '' ?>" name="nama" placeholder="Full name" value="<?= old('nama') ?>" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?php
              if ($validation) {
                echo $validation->getError('nama');
              }
              ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= ($validation && $validation->hasError('username')) ? 'is-invalid' : '' ?> " name="username" value="<?= old('username') ?>" placeholder="User name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?php
              if ($validation) {
                echo $validation->getError('username');
              }
              ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= ($validation && $validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email" value="<?= old('email') ?>" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
              <div class="invalid-feedback">
                <?php
                if ($validation) {
                  echo $validation->getError('email');
                }
                ?>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control <?= ($validation && $validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password" placeholder="Password (min. 8 character)">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?php
              if ($validation) {
                echo $validation->getError('password');
              }
              ?>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>

        <div class="text-center">
          <span>Have an account?</span>
          <a href="/" class="text-center">Sign in</a>
        </div>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?> "></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?> "></script>
</body>

</html>