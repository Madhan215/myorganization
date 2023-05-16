<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login RumahFM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Rumah</b>FM</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login</p>
      @error('error')
          <div class="alert alert-danger alert-has-icon">
              <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
              <div class="alert-body">
                  <div class="alert-title">Error</div>
                  {{ $message }}
              </div>
          </div>
      @enderror

      <form action="{{ route('auth') }}" method="post" class="needs-validation" novalidate="">
        @csrf
        <div class="input-group mb-3">
          <input placeholder="NIM" id="nim" type="text" class="form-control @error('nim')
            is-invalid
          @enderror" name="nim" tabindex="1"
                required autofocus>
                @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input placeholder="Password" id="password" type="password" class="form-control  @error('password')
            is-invalid
          @enderror" name="password"
                tabindex="2" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4 text-center">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
