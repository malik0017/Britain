<?php
//delete record
if (isset($_POST['deleteid'])) {
  $deleteid = $_POST['deleteid'];
  // echo "wwwwwww".$deleteid;
  // delete From Database
  //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
  //delete From Frontened
  $table = INREAMENTSALARY . " set `is_deleted`=1  where id='" . $deleteid . "'";
  $flagmain = $conf->updateValue($table);
  // echo "wwwwwww".$flagmain;
  if ($flagmain) {
    $success = "<p>Record  is <strong>Deleted</strong> Successfully</p>";
  }
}
// $results = $conf->fetchall(STAFF . " where is_deleted = 0");
$results = "SELECT * FROM ".INREAMENTSALARY." where is_deleted = 0 LIMIT 100";
$results = $conf->QueryRun($results);
$empid= $results[0]->emp_id;


 $sql = "SELECT i.*, c.campus_name,s.employel_name as employee 
 FROM " . INREAMENTSALARY . " as i
 INNER JOIN " . STAFF . " as s ON i.emp_id = s.employel_id
 INNER JOIN " . CAMPUStbl . " as c ON i.campus_id = c.id
 WHERE i.is_deleted = 0" ;
	  
	$results1 = $conf->QueryRun($sql);
  

?>



<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <div class="card center1">
              <div class="card-header ">
                <!-- <p class="  float-left mt-2  btn1">Sections</p> -->
                <div class="float-right mt-3">
                  <a class="btn btn-warning float-right" href="increament_salary.php"> Create New  Increament Salary</a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <table id="" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="ust-th">
                <tr>
                      <th style="width:10%">Date</th>
                      <th style="width:10%">Campus</th>
                      <th style="width:10%">Employee Name</th>
                      <th style="width:8%">Previos Salary</th>
                      <th style="width:10%">Increament Amount</th>
                      <th style="width:5%">New Salary</th>
                      <th style="width:1%">View</th>
                      <th style="width:1%">Edit</th>
                      <th style="width:1%">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($results1 > 0) {
                   
                    foreach ($results1 as $data) {
						?>
						  <tr>
	
							 <td>
							  <?= $data->date ?>
							</td> 
              <td>
							  <?= $data->campus_name ?>
							</td> 
	
							<td>
							  <?= $data->employee ?>
	
							</td>
							<td>
							  <?= $data->pre_salary ?>
	
							</td>
							<td>
							  <?= $data->increament_amount ?>
	
							</td>
							<td>
							  <?= $data->new_salary ?>
	
							</td>
              <td class="">

                          <form action="salary-increament-show.php?CD=<?php echo $data->id; ?>" method="post">
                            <button type="submit" class="btn btn-primary">Show</button>

                          </form>

                        </td>
                        <td>
                          <form action="increament-salary-edit.php?CD=<?php echo $data->id; ?>" method="post">

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
                    <?php }
                } ?>
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