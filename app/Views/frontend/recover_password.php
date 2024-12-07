<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NipponBeats | Recover Password</title>

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
  <!-- My Javascript -->
  <script src="/js/script.js"></script>
  <style>
    .login-page {
      background-color: #f2f2f2;
      background-image: url("<?= base_url('img/home_1.jpg') ?>");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }
    .login-logo {
      color: maroon;
      text-shadow: black 0 0 2px;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="\"><b>Nippon</b>Beats</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

        <form action="<?= site_url('/auth/recover_password/' . $token) ?>" method="post">
          <?= csrf_field() ?>
          <?php
          $validation = session('validation');
          ?>
          <?php if (session()->get('error')) : ?>
            <div class="alert alert-danger"><?= session()->get('error') ?></div>
          <?php endif; ?>

          <div class="input-group mb-3">
            <input type="password" class="form-control <?= ($validation && $validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye" id="togglePassword"></span>
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
          <div class="input-group mb-3">
            <input type="password" class="form-control <?= ($validation && $validation->hasError('password_retype')) ? 'is-invalid' : '' ?>" name="password_retype" placeholder="Retype Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- toggle password -->
  <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordField = document.getElementById('password');
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
  <!-- jQuery -->
  <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?> "></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?> "></script>
</body>

</html>