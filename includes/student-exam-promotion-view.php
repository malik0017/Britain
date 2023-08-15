<?php 
//delete record
if ( isset( $_POST[ 'deleteid' ] ) ) {
  $deleteid=$_POST[ 'deleteid' ];
  //delete From Database
	//$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = EXAMPROMOTION . " set `is_deleted`=1  where id='" . $deleteid . "'";
		$flagmain = $conf->updateValue( $table );
  if ( $flagmain ) {
		$success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
	}
 
}
$results=$conf->fetchall(EXAMPROMOTION." where  is_deleted = 0");
 ?>

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 "><?php include('includes/messages.php')?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <div class="card center1">
    <div class="card-header ">
        <!-- <p class="  float-left mt-2  btn1">Sections</p> -->
        <div class="float-right mt-3">
            <a class="btn btn-warning float-right" href="student-exam-promotion-add.php"> Create New Student Exam Promotion</a>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline "
            aria-describedby="example1_info">
            <thead class="btn-warning">
                <tr>
                    <th style="width:3%">Session </th>
                    <th style="width:2%">Class</th>
                    <th style="width:1%">Section</th>
                    <th style="width:3%">Exam</th>
                    <th style="width:2%">Student</th>
                    
                    
                    <th style="width:4%">Subject</th>
                    <th style="width:3%"> Passed</th>
                    <th style="width:7%"> Total Marks</th>
                     <th style="width:9%"> Obtained Marks</th>
                    <th style="width:1%"> Result</th>
                    <th style="width:1%"> Promoted</th> 
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
                    <?=$data->session_name?>
                    </td>
                    <td> 
                    <?=$data->class_name?>
                    </td>
                    <td>
                    <?=$data->section_name?>

                </td>
                <td>
                    <?=$data->exam?>

                </td>
                <td>
                    <?=$data->name?>

                </td>
                <td>
                   <?=$data->subject?> 
                    <!-- <?php echo date("d-m-Y", strtotime($data->date_birth)); ?> -->

                </td>
                <td>
                    <?=$data->passed?>

                </td>
                <td>
                    <?=$data->total_marks?>

                </td>
                <td>
                    <?=$data->obtained?>

                </td>
                <td>
                    <?=$data->result?>

                </td>
                <td>
                    <?=$data->promoted?>

                </td>
                
                    

                    <td class="">
                    
                    <form action="student-exam-promotion-show.php?CD=<?php echo $data->id; ?>" method="post">
										<button type="submit" class="btn btn-primary">Show</button>									

                </form>
                    
                    </td>
                    <td>
                    <form action="student-exam-promotion-edit.php?CD=<?php echo $data->id; ?>" method="post">
                   
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
                
              </div>
            </div>
          </div>         
        </div>       
      </div><!-- /.container-fluid -->
    </div>