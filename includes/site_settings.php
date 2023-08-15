<?php

if ( isset( $_POST[ 'update_settings' ] ) ) {
	$error = "";
	$site_name = $_POST[ 'site_name' ];
	if ( empty( $site_name ) ) {
		$error = "Please enter site name.";
	}
	$site_tagline = $_POST[ 'site_tagline' ];
	if ( empty( $site_tagline ) ) {
		$error = "Please enter site tagline.";
	}
	$site_url = $_POST[ 'site_url' ];
	if ( empty( $site_url ) ) {
		$error = "Please enter site URL.";
	}
	$site_email = $_POST[ 'site_email' ];
	if ( empty( $site_email ) ) {
		$error = "Please enter site email address.";
	}
	$site_phone = $_POST[ 'site_phone' ];
	$site_skype = $_POST[ 'site_skype' ];
	$site_address = $_POST[ 'site_address' ];
	$site_copyrights = $_POST[ 'site_copyrights' ];
	$site_logo = $_FILES[ "site_logo" ][ "name" ];
	//image check
	if ( !empty( $site_logo ) ) {
		$site_logo_check = $conf->image_upload_check( 'site_logo' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
	$site_favicon = $_FILES[ "site_favicon" ][ "name" ];
	//image check
	if ( !empty( $site_favicon ) ) {
		$site_favicon_check = $conf->image_upload_check( 'site_favicon' );
		if ( $site_favicon_check != "OK" ) {
			$error = $site_favicon_check;
		}
	}


	$site_header_code = addslashes( $_POST[ 'site_header_code' ] );
	$site_footer_code = addslashes( $_POST[ 'site_footer_code' ] );


	if ( empty( $error ) ) {

		$table = SITE_SETTINGS . " set `site_name`='" . $site_name . "', `site_phone`='" . $site_phone . "' , `site_skype`='" . $site_skype . "' , `site_address`='" . $site_address . "' , `site_copyrights`='" . $site_copyrights . "' , `site_tagline`='" . $site_tagline . "' , `site_url`='" . $site_url . "' , `site_email`='" . $site_email . "' , `site_header_code`='" . $site_header_code . "' , `site_footer_code`='" . $site_footer_code . "' where id='1'";

		////log upload and check
		//if(!empty($site_logo))
		if ( !empty( $site_logo ) ) {
			if ( $site_logo_check == "OK" ) {
				$table_fetch = SITE_SETTINGS . " where id='1'";
				$chk_row = $conf->single( $table_fetch, site_logo );

				if ( !empty( $chk_row->site_logo ) ) {
					unlink( "uploads/site/" . $chk_row->site_logo );
				}
				move_uploaded_file( $_FILES[ "site_logo" ][ "tmp_name" ], "uploads/site/" . $_FILES[ "site_logo" ][ "name" ] );
				$path = $_FILES[ "site_logo" ][ "name" ];
				$table2 = SITE_SETTINGS . " set `site_logo`='" . $path . "' where id='1'";
				$recodes1 = $conf->updateValue( $table2 );
			} else {
				$error = $image_check;
			}
		}

		////favicon upload and check
		//if(!empty($site_favicon))
		if ( !empty( $site_favicon ) ) {
			if ( $site_favicon_check == "OK" ) {
				$table_fetch2 = SITE_SETTINGS . " where id='1'";
				$chk_row2 = $conf->single( $table_fetch2, site_favicon );

				if ( !empty( $chk_row2->site_favicon ) ) {
					unlink( "uploads/site/" . $chk_row2->site_favicon );
				}
				move_uploaded_file( $_FILES[ "site_favicon" ][ "tmp_name" ], "uploads/site/" . $_FILES[ "site_favicon" ][ "name" ] );
				$path2 = $_FILES[ "site_favicon" ][ "name" ];
				$table3 = SITE_SETTINGS . " set `site_favicon`='" . $path2 . "' where id='1'";
				$recodes3 = $conf->updateValue( $table3 );
			} else {
				$error = $image_check;
			}
		}

		$recodes = $conf->updateValue( $table );
		$success = "Update successfully..";
		$gen->redirecttime( 'site_settings.php', '1000' );
		$conf->unset_post();
	}

}
$table_fetch = SITE_SETTINGS . " where id='1'";
$row = $conf->singlev( $table_fetch );
?>
<div class="page-title">
	<div class="title_left">

		<!----------- Page Main Heading ----------->
		<h3>Site Settings</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php include('messages-display.php')?>
	</div>
	<!-- col 12 -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<form id="package-form" name="package" method="post" action="" class="form-validate form-horizontal" data-validate="parsley" enctype="multipart/form-data">
					<!-- tile -->
					<section class="tile color transparent-black">

						<!-- tile header -->
						<div class="tile-header">
							<h1></h1>
						</div>
						<div class="tile-body">
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"><span class="star">*</span> Site Name: </label>
								<div class="col-sm-6">
									<input type="text" name="site_name" class="form-control" id="site_name" value="<?php echo $row->site_name; ?>" data-trigger="change" data-required="true" required>
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Phone: </label>
								<div class="col-sm-6">
									<input type="text" name="site_phone" class="form-control" id="site_phone" value="<?php echo $row->site_phone; ?>" data-type="number">
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Skype: </label>
								<div class="col-sm-6">
									<input type="text" name="site_skype" class="form-control" id="site_skype" value="<?php echo $row->site_skype; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Address: </label>
								<div class="col-sm-6">
									<input type="text" name="site_address" class="form-control" id="site_address" value="<?php echo $row->site_address; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Copyrights: </label>
								<div class="col-sm-6">
									<input type="text" name="site_copyrights" class="form-control" id="site_copyrights" value="<?php echo $row->site_copyrights; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Site Tagline: </label>
								<div class="col-sm-6">
									<input type="text" name="site_tagline" class="form-control" id="site_tagline" value="<?php echo $row->site_tagline; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"><span class="star">*</span> Site Email:</label>
								<div class="col-sm-6">
									<input type="email" name="site_email" data-type="email" class="form-control" value="<?php echo $row->site_email; ?>" id="site_email" data-required="true" required>
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"><span class="star">*</span> Site URL:</label>
								<div class="col-sm-6">
									<input type="url" name="site_url" data-type="url" class="form-control" id="site_url" value="<?php echo $row->site_url; ?>" data-required="true" required>
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Site Logo: </label>
								<div class="col-sm-6">
									<div class="input-group">
										<?php if($row->site_logo=="") {?>
										<img src="images/no_foto.png" style="width: 100px;margin-bottom: 10px;">
										<?php } else {?>
										<img src="uploads/site/<?php echo $row->site_logo;?>" style="width: 100px;margin-bottom: 10px;">
										<?php } ?>
										<br>
										<input type="file" multiple name="site_logo" class="form-control" id="site_logo">

									</div>


								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Favicon: </label>
								<div class="col-sm-6">
									<div class="input-group">
										<?php if($row->site_favicon=="") {?>
										<img src="images/no_foto.png" style="width:50px;margin-bottom: 10px;">
										<?php } else {?>
										<img src="uploads/site/<?php echo $row->site_favicon;?>" style="width:50px;margin-bottom: 10px;">
										<?php } ?>
										<br>
										<input type="file" multiple name="site_favicon" class="form-control" id="site_favicon">

									</div>


								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Custom Header Code:</label>
								<div class="col-sm-6">
									<textarea class="form-control" id="input05" name="site_header_code" rows="6">
										<?php echo $row->site_header_code; ?>
									</textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="input01" class="col-sm-4 control-label"> Custom Footer Code:</label>
								<div class="col-sm-6">
									<textarea class="form-control" id="input05" name="site_footer_code" rows="6">
										<?php echo $row->site_footer_code; ?>
									</textarea>
								</div>
							</div>
							<div class="form-group form-footer">
								<div class="col-sm-offset-4 col-sm-6">
									<button type="submit" class="btn btn-primary" name="update_settings">Update</button>
								</div>
							</div>
						</div>
					</section>
				</form>
			</div>
		</div>
	</div>
	<!-- /col 6 -->

</div>