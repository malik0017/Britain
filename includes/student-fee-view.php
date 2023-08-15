<?php 
//delete record
if ( isset( $_POST[ 'deleteid' ] ) ) {
  $deleteid=$_POST[ 'deleteid' ];
  //delete From Database
	//$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = STUDENTFEE. " set `is_deleted`=1  where id='" . $deleteid . "'";
		$flagmain = $conf->updateValue( $table );
  if ( $flagmain ) {
		$success = "<p>Record  is <strong>Deleted</strong> Successfully</p>";
	}
 
}
$results=$conf->fetchall(STUDENTFEE." where is_deleted = 0");
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
            <a class="btn btn-warning float-right" href="student-fee-add.php"> Create New Fee Package</a>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline"
            aria-describedby="example1_info">
            <thead class="btn-warning">
                <tr>
                   
                    <th style="width:10%">Month Fee Plan</th>
                    <th style="width:5%"> Free Student</th>
                    <th style="width:7%"> Staff Kid</th>
                    <th style="width:3%">Stationary</th>
                    <th style="width:8%">Admission Deltail </th>
                    <th style="width:1%">Commitment</th>
                    <th style="width:1%">Reference </th>
                    <th style="width:1%">View</th>
                    <th style="width:1%">Edit</th>
                    <th style="width:1%">Delete</th>
                    
                    
                    
                    
                  
                    <!-- <th class="no-sort" style="width:13%">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
               
                foreach ($results as $data){
               ?>
                <tr>

        <td> 
         <?=$data->month_fee?>
        </td>

      
       <td> 
         <?=$data->student_free?>
        </td>
       <td> 
         <?=$data->staff_kid?>
        </td>

       <td>
      <?=$data->stationary?>

       </td>

       <td> 
         <?=$data->admission_detail?>
        </td>
        <td> 
         <?=$data->commitment?>
        </td>
        <td> 
         <?=$data->reference?>
        </td>
        
       <td class="">

       <form action="student-fee-show.php?CD=<?php echo $data->id; ?>" method="post">
       <button type="submit" class="btn btn-primary">Show</button>									

      </form>

      </td>
      <td>
           <form action="student-fee-edit.php?CD=<?php echo $data->id; ?>" method="post">

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