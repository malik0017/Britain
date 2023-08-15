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

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<!-- Meta, title, CSS, favicons, etc. -->

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">


	
	<?php include 'layout/header.php'; ?>
	<title>
		<?=SITE_NAME?> | Login</title>


<style>
	.login_content form div a {
    font-size: 16px !important;
	align-items: center;
	
}
	</style>
</head>



<body class="login-page" style="min-height: 496.781px;">

	<div class="login-box">
		
		<a class="hiddenanchor" id="signup"></a>

		<a class="hiddenanchor" id="signin"></a>



		<div class="card">

			<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>

				<section class="login_content">

					<!-- <div class="">

						<?php include('includes/messages-display.php')?>

					</div> -->
                   
					<form id="form-signin" action="" method="post">

						<h1>Login</h1>

						<div class="input-group mb-3">

						<input type="text" class="form-control"  name="username" placeholder="Username" required=""/>
         

						</div>
						<div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password"  required=""/>
          
        </div>

						
						<div class="row">
							
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
		  <div class="col-8">
            <div class="icheck-primary">
             
			  <!-- <p class="mb-1">
        <a href="forgotpassword.php">forgot my password</a>
      </p> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login"  class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
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

					</form>
					

				</section>


			</div>

		</div>
		
	</div>

</body>

</html>