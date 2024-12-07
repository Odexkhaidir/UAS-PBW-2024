<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NipponBeats | Forgot Password</title>

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
    .login-page {
      background-color: #f2f2f2;
      background-image: url("<?= base_url('img/home_1.jpg') ?>");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }

    .login-logo a {
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
        <p class="login-box-msg">You forgot your password?</p>
        <p class="login-box-msg">Just let us know your email address and we will email you a new password.</p>

        <form action="/auth/forgot_password" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <div class="text-center">
          <p class="mt-3 mb-1">
            <span>Already have an account?</span>
            <a href="/">Sign In</a>
          </p>
          <span>or</span>
          <a href="/register"">Sign Up</a>
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src=" <?= base_url('adminlte/plugins/jquery/jquery.min.js') ?> "></script>
  <!-- Bootstrap 4 -->
  <script src=" <?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
            <!-- AdminLTE App -->
            <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?> "></script>
</body>

</html>