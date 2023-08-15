<?php
include( 'setup/config.php' );
$conf = new config();
$conf->site_settings();
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
	@extract( $_POST );
	include_once 'setup/loginmodel.php';
	$log = new loginmodel();
	$check = $log->loginme( $username, $password );
    if ( $check == "user" ) {
		echo "<script>window.location='index.php';</script>";
	}
 else if ( $check == "admin" ) {
		echo "<script>window.location='index.php';</script>";
	}  
     else {
		$error = "Invalid username or password";
	}



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'layout/header.php'; ?>

  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="recover-password.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
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

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <div class="separator">

							<!--<p class="change_link">New to site?

                  <a href="#signup" class="to_register"> Create Account </a>

                </p>-->


							<br/>



							<div>

								 

								<p>©
									<?php echo date('Y')?> All Rights Reserved By <a href="<?=SITE_URL;?>"><?=SITE_NAME;?></a>
								</p>

							</div>

						</div>
    <!-- /.login-card-body -->
  </div>
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
