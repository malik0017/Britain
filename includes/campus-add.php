<?php
// $campus_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $campus_type =$_POST[ 'campus_type' ];
  $campus_name =$_POST[ 'campus_name' ];
  $campus_address = $_POST[ 'campus_address' ];
  $franchise = $_POST[ 'franchise' ];
  $college = $_POST[ 'college' ];

   //Campus image for campus_logo
  //  $campus_logo = $_POST[ 'campus_logo' ];
   $site_favicon = $_FILES[ "campus_logo" ][ "name" ];
   if ( !empty( $site_favicon ) ) {
     $site_logo_check = $conf->image_upload_check( 'campus_logo' );
     if ( $site_logo_check != "OK" ) {
       $error = $site_logo_check;
     }
   }
   
  //  echo "Aamir".$site_favicon;
   move_uploaded_file( $_FILES[ "campus_logo" ][ "tmp_name" ], "upload/campus/" . $_FILES[ "campus_logo" ][ "name" ] );
   $campus_logo = $_FILES[ "campus_logo" ][ "name" ];
    // echo "=====".$campus_logo;



  //Campus log image for landscape_header
  // $landscape_header = $_POST[ 'landscape_header' ];
  $site_favicon = $_FILES[ "landscape_header" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'landscape_header' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "Anas".$site_favicon;
	move_uploaded_file( $_FILES[ "landscape_header" ][ "tmp_name" ], "upload/campus/" . $_FILES[ "landscape_header" ][ "name" ] );
	$landscape_header = $_FILES[ "landscape_header" ][ "name" ];
  //  echo "...................".$landscape_header;


  


  //Campus image for  portrait_header
// $portrait_header = $_POST[ 'portrait_header' ];
  $site_favicon = $_FILES[ "portrait_header" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'portrait_header' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "asssss".$site_favicon;
	move_uploaded_file( $_FILES[ "portrait_header" ][ "tmp_name" ], "upload/campus/" . $_FILES[ "portrait_header" ]
  [ "name" ] );
	$portrait_header = $_FILES[ "portrait_header" ][ "name" ];
  //  echo "ASif1111111111111111".$portrait_header;






  //Campus image for  landscape_footer
  // $landscape_footer = $_POST[ 'landscape_footer' ];
  $site_favicon = $_FILES[ "landscape_footer" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'landscape_footer' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "asssss".$site_favicon;
	move_uploaded_file( $_FILES[ "landscape_footer" ][ "tmp_name" ], "upload/campus/" . $_FILES[ "landscape_footer" ][ "name" ] );
	$landscape_footer = $_FILES[ "landscape_footer" ][ "name" ];
  //  echo "Ali222222222222222222".$landscape_footer;


 
 
 
  //Campus image for  portrait_footer
  // $portrait_footer = $_POST[ 'portrait_footer' ];
  $site_favicon = $_FILES[ "portrait_footer" ][ "name" ];
  if ( !empty( $site_favicon ) ) {
		$site_logo_check = $conf->image_upload_check( 'portrait_footer' );
		if ( $site_logo_check != "OK" ) {
			$error = $site_logo_check;
		}
	}
  
  // echo "Noor3333333333".$site_favicon;
	move_uploaded_file( $_FILES[ "portrait_footer" ][ "tmp_name" ], "upload/campus/" . $_FILES[ "portrait_footer" ]
  [ "name" ] );
	 $portrait_footer = $_FILES[ "portrait_footer" ][ "name" ];
 
  //  echo "Noor3333333333".$portrait_footer;
          
        
  $val->name('Campus Type')->value($campus_type)->pattern('text')->required();
  // $val->name('Campus Name')->value($campus_name)->pattern('text')->required();
  $val->name('Campus Address')->value($campus_address)->pattern('text')->required();

  // $val->name('Franchise')->value($franchise)->pattern('text')->required();
  // $val->name('College')->value($college)->pattern('text')->required();
 

  if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {
    
		$data_post = array( 'campus_type' => $campus_type,'campus_name' =>$campus_name, 'campus_address' => $campus_address, 'franchise' =>$franchise,'campus_logo' =>$campus_logo,'landscape_header' =>$landscape_header,'portrait_header' =>$portrait_header,'landscape_footer' =>$landscape_footer,'portrait_footer' =>$portrait_footer,
    'college' =>$college,'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $cDateTime);
		$recodes = $conf->insert( $data_post, CAMPUStbl );
    // print_r($portrait_footer);
    // print_r($portrait_header);


		if ( $recodes == true ) {
			$success = "Data <strong>Added</strong> Successfully";

			//$gen->redirecttime( 'campus', '2000' );
		}
	}
}
// $table_fetch = CAMPUSTYPE . " where id='" . $campus_id . "'";
// $row = $conf->singlev( $table_fetch );
$campus_type=$conf->fetchall( CAMPUSTYPE . " WHERE is_deleted=0" );
?>


<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="card-body">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="form-group">
                            <label for="campus_type" class="form-label ">Campus Type</label>
                        <select class="form-select form-control" id="campus_type" tabindex="1" name="campus_type">  
                        <?php foreach($campus_type as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->campus_type; ?></option>
                            <?php  }?>                                     
                                
                            </select>
                    </div>
                    </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="campus_name"> Campus Name</label>
                                <input type="text" class="form-control" id="campus_name" name="campus_name" tabindex="2" placeholder="">
                            </div>
                            </div>
                            
                          <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="form-group">
                            <label for="campus_address"> Campus Address</label>
                            <input type="text" class="form-control" id="campus_address" name="campus_address" tabindex="3" placeholder="">
                        </div>
                         </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                              <div class="form-group">
                              <label for="campus_logo" class="form-label">Campus Logo </label>
                              <input class="form-control form-controll-style" type="file" id="campus_logo"  name="campus_logo" tabindex="4">
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                            <div class="form-group">
                            <label for="landscape_header" class="form-label">Landscape Header </label>
                            <input class="form-control form-controll-style" type="file" id="landscape_header"  name="landscape_header" tabindex="5">
                            </div>
                         </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                          <div class="form-group">
                          <label for="portrait_header" class="form-label">Portrait Header </label>
                          <input class="form-control form-controll-style" type="file" id="portrait_header"  name="portrait_header" tabindex="6">
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                        <div class="form-group">
                        <label for="landscape_footer" class="form-label"> Lanscape Footer </label>
                        <input class="form-control form-controll-style" type="file" id="landscape_footer"  name="landscape_footer" tabindex="7">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="form-group">
                      <label for="portrait_footer" class="form-label">Portrait Footer </label>
                      <input class="form-control form-controll-style" type="file" id="portrait_footer"  name="portrait_footer" tabindex="8">
                      </div>
                  </div>
                   
                 
                  <div class="col-lg-5 col-md-4 col-sm-6">
                          
                    <div class="form-check">
                      <input type="radio" name="franchise" id="is_franchise" value="1" tabindex="9" >
                      <label class="form-check-label font-weight-bold   ml-2" for="franchise" > Is Franchise </label>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 ">
                      <div class="form-check ">
                        <input type="radio" name="college" id="college" value="1" tabindex="10">
                        <label class="form-check-label font-weight-bold  ml-2" for="college" > Is College </label>
                      </div>
                      </div>
                              </div >
                              <div class="text-center mt-2">
                              <input type="submit" name="submit"  value="Submit" class="btn btn-warning " tabindex="11"/>
                              </div>
                              
                              </div>

                <!-- /.card-body -->
            </form>
              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>