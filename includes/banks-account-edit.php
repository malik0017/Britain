<?php

$banks_account_id =  $_REQUEST[ 'CD' ] ;
if ( isset( $_POST[ 'submit' ] ) ) {

  $campus =$_POST[ 'campus' ];
  $bank_name =$_POST[ 'bank_name' ];
  $account_title = $_POST[ 'account_title' ];
  $account_no = $_POST[ 'account_no' ];
  $branch_name = $_POST[ 'branch_name' ];
  $branch_code = $_POST[ 'branch_code' ];
  $note = $_POST[ 'note' ];
          
        
//   $val->name('Campus Name')->value($campus_name)->pattern('text')->required();
//   $val->name('Bank Name')->value($bank_name)->pattern('text')->required();
//   $val->name('Account Title')->value($account_title)->pattern('words')->required();

//   $val->name('Account No')->value($account_no)->pattern('text')->required();
//   $val->name('Branch Name')->value($branch_name)->pattern('text')->required();
 

  if(!$val->isSuccess()){
   
    $error = $val->displayErrors();        
  }

	if ( empty( $error ) ) {

    echo"alassals".$table = BANKACCOUNT . " set `campus`='" . $campus . "', `bank_name`='" . $bank_name . "', `account_title`='" . $account_title . "',
     `account_no`='" . $account_no . "', `branch_name`='" . $branch_name . "', `branch_code`='" . $branch_code . "' , `note`='" . $note . "'
      where id='" . $banks_account_id . "'";
		$recodes = $conf->updateValue( $table );
// exit;
		if ( $recodes == true ) {
			$success = "Record <strong>Updated</strong> Successfully";

			$gen->redirecttime( 'banks-account-view.php', '2000' );
		} 
    else {
			$error = "Campus Not Updated";
		}
    
		
	}
}
   $table_fetch = BANKACCOUNT . " where id='" . $banks_account_id . "'";
$row = $conf->singlev( $table_fetch );
$campus_name=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );
$bank_name=$conf->fetchall( BANK . " WHERE is_deleted=0" );
?>


<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="post">
                
                <div class="card-body">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="form-group">
                            <label for="campus" class="form-label ">Campus </label>
                        <select class="form-select form-control" id="campus" tabindex="1" name="campus" required>  
                        <?php foreach($campus_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if($data->id==$row->campus)
                          { echo "selected";} ?>><?php echo $data->campus_name; ?></option>
                            <?php  }?>                                     
                                
                            </select>
                    </div>
                    </div>
                  
                        <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="bank_name" class="form-label ">Bank</label>
                        <select class="form-select form-control" id="bank_name" tabindex="2" name="bank_name" required>  
                        <?php foreach($bank_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" ><?php echo $data->bank_name; ?></option>
                            <?php  }?>                                     
                                
                            </select>
                    </div>
                            </div>
                            
                          <div class="col-lg-4 col-md-4 col-sm-6">
                          <div class="form-group">
                                <label for="account_title"> Account Title</label>
                                <input type="text" class="form-control" id="account_title" value="<?php echo $row->account_title; ?>" name="account_title" tabindex="3" placeholder="" required>
                            </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="form-group">
                            <label for="account_no">Account No</label>
                            <input type="text" class="form-control" id="account_no" value="<?php echo $row->account_no; ?>" name="account_no" tabindex="4" placeholder="" required>
                        </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="form-group">
                            <label for="branch_name">Branch Name</label>
                            <input type="text" class="form-control" id="branch_name"  value="<?php echo $row->branch_name; ?>" name="branch_name" tabindex="5" placeholder="" required>
                        </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="form-group">
                            <label for="branch_code">Branch Code</label>
                            <input type="text" class="form-control" id="branch_code"  value="<?php echo $row->branch_code; ?>" name="branch_code" tabindex="6" placeholder="" required>
                        </div>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="form-group">
                            <label for="note">Note</label>
                            <input type="text" class="form-control" id="note" name="note" value="<?php echo $row->note; ?>" tabindex="7" placeholder="" required>
                        </div>
                        </div>
                              </div >
                              <div class="text-center mt-2">
                              <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="8"/>
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