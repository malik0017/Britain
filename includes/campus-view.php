<?php 

//delete record
if ( isset( $_POST[ 'deleteid' ] ) ) {
    $deleteid=$_POST[ 'deleteid' ];
    //delete From Database
      //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
    //delete From Frontened
    $table = CAMPUStbl. " set `is_deleted`=1  where id='" . $deleteid . "'";
          $flagmain = $conf->updateValue( $table );
    if ( $flagmain ) {
          $success = "<p>Record  is <strong>Deleted</strong> Successfully</p>";
      }
   
  }
 $results=$conf->fetchall(CAMPUStbl." where is_deleted = 0");
// $sql = "SELECT a.*, c.campus_type
// FROM ".CAMPUStbl." as a
// INNER JOIN ".CAMPUSTYPE. " as c ON a.campus_type = c.id

// WHERE a.id = $campus_id";
// $results1 = $conf->QueryRun($sql);
// $results = $results1[0];
//  print_r($results);
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
            <a class="btn btn-warning float-right" href="campus-add.php"> Create New Campus</a>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
    <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline no-footer collapsed" 
                      aria-describedby="tabledata_info">
            <thead class="btn-warning">
                <tr>
                    <th style="width:15%">Campus Type</th>
                    <th style="width:15%">Campus Name</th>
                    <th style="width:15%">Campus Address</th>
                    <th style="width:15%">Franchise</th>
                    <th style="width:15%">College</th>
                    
                    <th style="width:1%">View</th>
                    <th style="width:1%">Edit</th>
                    <th style="width:1%">Delete</th>
                    
                  
                    <!-- <th class="no-sort" style="width:13%">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
               
                foreach ($results as $data){

                  $CampusType = CAMPUSTYPE . " where id='" . $data->campus_type . "'";
                  $campustype = $conf->singlev($CampusType);
               ?>
                <tr>

              <td> 
                <?=$campustype->campus_type?>
                </td>
                <td> 
                <?=$data->campus_name?>
              </td>
                <td> 
              <?=$data->campus_address?>
            </td>
            <td> 
            <?=$data->franchise?>
            </td>
            <td> 
            <?=$data->college?>
              </td>
            

                    <td class="">
                    
                    <form action="campus-show.php?CD=<?php echo $data->id; ?>" method="post">
										<button type="submit" class="btn btn-primary">Show</button>									

                </form>
                    
                    </td>
                    <td>
                    <form action="campus-edit.php?CD=<?php echo $data->id; ?>" method="post">
                   
					<button type="submit" class="btn btn-primary">Edit</button>									

                </form>  
                    </td>
                    <td>
                       <form action="" method="post">
                      <input type="hidden" name="deleteid" value="<?php echo $data->id; ?>">
                        
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                      </form></td>

               
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- /.card-body -->
    </div>