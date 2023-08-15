<?php 
//delete record
if ( isset( $_POST[ 'deleteid' ] ) ) {
  $deleteid=$_POST[ 'deleteid' ];
  //delete From Database
	//$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = FEEDEFAULTPACKAGE. " set `is_deleted`=1  where id='" . $deleteid . "'";
		$flagmain = $conf->updateValue( $table );
  if ( $flagmain ) {
		$success = "<p>Record  is <strong>Deleted</strong> Successfully</p>";
	}
 
}
$results=$conf->fetchall(FEEDEFAULTPACKAGE." where is_deleted = 0");
// $results=$conf->fetchall(FEEDEFAULTPACKAGEDETAIL." where is_deleted = 0");
 ?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
              <div class="card center1">
    <div class="card-header ">
        <!-- <p class="  float-left mt-2  btn1">Sections</p> -->
        <div class="float-right mt-3">
            <a class="btn btn-warning float-right" href="fee-package-add.php"> Create New Fee Package</a>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline"
            aria-describedby="example1_info">
            <thead class="btn-warning">
                <tr>
                <th style="width:2%">Session </th>
                    <th style="width:6%">Campus </th>
                    <th style="width:2%">Class</th>
                    
                    <!-- <th style="width:4%">Actual</th>
                    <th style="width:4%"> Fee Head</th> -->
                   
                    <th style="width:1%">View</th>
                    <th style="width:1%">Edit</th>
                    <th style="width:1%">Delete</th>
                    
                    
                    
                    
                  
                    <!-- <th class="no-sort" style="width:13%">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $data){
                  $sessionName = SESSIONYEAR . " where id='" . $data->session_id . "'";
                $session = $conf->singlev($sessionName);

                $campusName = CAMPUStbl . " where id='" . $data->campus . "'";
                $cat = $conf->singlev($campusName);

                $ClassName = CLASStbl . " where id='" . $data->class . "'";
                $com = $conf->singlev($ClassName);

               
               ?>
                <tr>
                <td>
               
         <?=$session->session_year?>
        
       </td>      
       

        <td> 
         <?=$cat->campus_name?>
        </td>

       <td>
      <?=$com->class_name?>

       </td>
       
       

      
       <td class="">

       <form action="fee-package-show.php?CD=<?php echo $data->id; ?>" method="post">
       <button type="submit" class="btn btn-primary">Show</button>									

      </form>

      </td>
      <td>
           <form action="fee-package-edit.php?CD=<?php echo $data->id; ?>" method="post">

                  <button type="submit" class="btn btn-primary">Edit</button>									

           </form>  
         </td>
         <td>
         <form action="" method="post">
         <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">
    
         <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
         </form>
         </td>


         </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- /.card-body -->
    </div>
                
              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>