<?php
            $student = array();
            $results1 = array();
            $arry = array();

            
            if (isset($_POST['print'])) {
              $student=$_REQUEST['student'];
              // $student = array();
              // $student = ($_GET[$student=' array()']);
              // echo "asssssssssss".$student;
              // print_r($student);
              }



            if (isset($_POST['submit'])) {

              $campus = ($_POST['campus']);
              $class_name = ($_POST['class_name']);
              $session_name = ($_POST['session_name']);
              $section_name = ($_POST['section_name']);
              // $stationery = ($_POST['stationery']); 
              $results1 = $conf->fetchall(Student . " WHERE session_name = $session_name And campus = $campus 
              And class = $class_name And section_name = $section_name  And is_deleted=0 ");
            }

            
            $student = array();
            $result5 = array();
            $arry = array();
            // if (isset($_POST['print'])) {

            //   $campus = ($_POST['campus']);
            //   $class_name = ($_POST['class_name']);
            //   $name = ($_POST['name']);
            //   $fee_type = ($_POST['fee_type']);
            //   $v_amount = ($_POST['v_amount']); 
            //   $addmission_no = ($_POST['addmission_no']); 
            //   $for_month = ($_POST['for_month']); 
            //   $issue_date = ($_POST['issue_date']); 
            //   $fee_date = ($_POST['fee_date']); 
            //   $account_no = ($_POST['account_no']); 
            //   $sql5 = "SELECT a.* FROM " . FEEVOUCHERDETAIL . " as a  WHERE a.id = $data";

            //   // $results1 = $conf->fetchall(Student . " WHERE session_name = $session_name And campus = $campus 
            //   // And class = $class_name And section_name = $section_name  And is_deleted=0 ");
            // }




            if (isset($_POST['save'])) {
            //   $fee_type = ($_POST['fee_type']);
              
               $discount = ($_POST['discount']);
              
              $arrear = ($_POST['arrear']);
              
              $v_amount = ($_POST['v_amount']);
            
                $f_amount = ($_POST['f_amount']);
               
              $for_month = ($_POST['for_month']);


              $issue_date = ($_POST['issue_date']);
              $fee_date = ($_POST['fee_date']);
              $disc = ($_POST['disc']);
              $account_no = ($_POST['account_no']);
              // echo "==============".$for_month;
              $student = ($_POST['student']);
            
              
              foreach ($student as $data) {

                //data fetch in student table
                $sql1 = "SELECT fv.*,sy.session_year FROM " . FEEVOUCHER . " as fv

                 INNER JOIN " . Student . " as st ON fv.std_id = st.id
                 INNER JOIN " . SESSIONYEAR . " as sy ON st.session_name = sy.id

                WHERE fv.std_id = $data AND fv.for_month=$for_month";
                $sessionstd = $conf->QueryRun($sql1);
                $sessionStdData = $sessionstd[0];
                $stdyear = explode('-', $sessionStdData->session_year);
                $stdcurrentYear = $stdyear[0];
                $current_year = (new DateTime())->format('Y');
                echo $current_year;
                if ($current_year == $stdcurrentYear) {
                  echo "voucher genated";
                } else {
                  echo "voucher not  genated";



                  $sql = "SELECT a.* FROM " . FEEVOUCHER . " as a
             



            WHERE a.id = $data";
            // echo "---------------------------".$sql;

                  $sessionstd = $conf->QueryRun($sql);
                  // $student_fee = $conf->QueryRun($sql);

                  //if condition already chech voucher generate or not
                  //  if($for_month as $data)
                  //  {

                  // echo "Did not generate"
                  // };

                  if (empty($error)) {
                    $data_post = array(
                      'for_month' => $for_month, 'std_id' => $data, 'issue_date' => $issue_date, 'fee_date' => $fee_date, 'disc' => $disc,
                      'account_no' => $account_no
                    );
                    // print_r($data_post);
                    $recodes = $conf->insert($data_post, FEEVOUCHER);


                   
                    $sql = "SELECT *
                  FROM " . STUDENTFEE . " 
                  WHERE std_id = $data";
                   
                    $student_fee = $conf->QueryRun($sql);
                    if (!empty($student_fee)) {

                      $sql1 = "SELECT *
                    FROM " . STUDENTFEEDETAIL . " 
                    WHERE std_id = $data";
                      //  echo $sql1;
                      $student_fee_detail = $conf->QueryRun($sql1);
                      // print_r($student_fee_detail);
                    

                      foreach ($student_fee_detail as $data) {
  
                        $data_post = array(
                             
                          'fee_voucher_id' => $recodes, 'student_fee_id' => $student_fee[0]->id, 'std_id' => $recodes,
                           'fee_type' => $data->fee_type,
                           'package_payable' => $data->package_payable, 
                           'discount' => $discount[0], 
                           'arrear' => $arrear[0], 
                           'f_amount' => $f_amount[0],
                           'v_amount' => $v_amount[0],
                          'user_id' => $_SESSION['user_reg'], 'created_at' => $cDateTime
                         
                        );
                         
                        $recodes2 = $conf->insert($data_post, FEEVOUCHERDETAIL);
                        // print_r($recodes2);
                        
                  //  exit();

                        
                      }
                    }

                    if ($recodes == true) {
                      // print_r($recodes);
                      $success = "Record <strong>generate</strong> Successfully";

                      $id = $recodes;
                      $url = 'fee-voucher-add.php?id=' .$id;
                      $gen->redirecttime($url, '2000');

                    //  $gen->redirecttime( 'fee-voucher-add.php', '2000' );
                    } else {
                      $error = "voucher Not Updated";
                    }
                  }
                }
              }
            }




            $campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
            $class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");
            $session_year = $conf->fetchall(SESSIONYEAR . " WHERE is_deleted=0");
            $section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
            $results = $conf->fetchall(Student . " where  is_deleted = 0 ORDER BY id ASC LIMIT 100");
            $name = $conf->fetchall(Student . " where  is_deleted = 0 ORDER BY id ASC LIMIT 100");
            $account_no = $conf->fetchall(BANKACCOUNT . " where  is_deleted = 0");
            $fee_type = $conf->fetchall(FEETYPE . " WHERE is_deleted=0");
            $package_payable = $conf->fetchall(STUDENTFEEDETAIL . " WHERE is_deleted=0   ORDER BY std_id ASC LIMIT 10");

            ?>

<div class="content">

  <div class="container">

    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>

        <div class="card card-primary card-outline">
          <div class="card-body">


            <div class="card-body">
              <form action="" method="POST">
                <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="session_name" class="form-label ">Session</label>
                      <select class="form-select form-control" id="session_name" tabindex="1" name="session_name" required>
                        <?php foreach ($session_year as $data) { ?>
                          <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->session_year) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $data->session_year; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6">

                    <div class="form-group">
                      <label for="campus" class="form-label ">Campus</label>
                      <select class="form-select form-control" id="campus" tabindex="2" name="campus" required>
                        <?php foreach ($campus_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->campus_name) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $data->campus_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="class_name" class="form-label ">Class</label>
                      <select class="form-select form-control" id="class_name" tabindex="3" name="class_name" required>
                        <?php foreach ($class_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->class_name) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $data->class_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                  </div>

                  <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="section_name" class="form-label ">Section</label>
                      <select class="form-select form-control" id="section_name" tabindex="4" name="section_name" required>
                        <?php foreach ($section_title as $data) { ?>
                          <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->section_title) {
                                                                      echo "selected";
                                                                    } ?>><?php echo $data->section_title; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6 mt-5">
                    <div class="form-check ">
                      <input type="checkbox" name="stationery" id="stationery" tabindex="5" value="1">
                      <label class="form-check-label font-weight-bold  ml-2" for="stationery">Include Stationery In Print </label>
                    </div>
                  </div>
                  <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="addmission_no">Admission Number</label>
                      <input type="text" class="form-control" id="addmission_no" name="addmission_no" tabindex="6" placeholder="">
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="name">Student Name</label>

                      <select class="form-select form-control" id="name" tabindex="7" name="name">
                        <?php foreach ($name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
                        <?php  } ?>
                      </select>


                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="form-group">
                      <label for="due_date"> Fee Due Date </label>

                      <input type="date" class="form-control" id="due_date" name="due_date" tabindex="8" placeholder="">

                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6 mt-5">
                    <div class="form-check ">
                      <input type="checkbox" name="show_all" id="show_all" tabindex="9" value="1">
                      <label class="form-check-label font-weight-bold  ml-2" for="show_all">Show All </label>
                    </div>
                  </div> -->
                  <div class="col-lg-6 col-md-6 col-sm-6 text-center" style="margin-top: 35px;">
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">
                        Search
                      </button>
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <?php
            if (count($results1) > 0) {
            ?>
              <div class="card-body">
                <form action="" id="promotedstd" method="POST">
                  <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="for_month">For Month</label>
                        <select id="monthDropdown" class="form-control" name="for_month" tabindex="10" required>
                          <option value="">Select Month</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="issue_date"> Issue Date </label>

                        <input type="date" class="form-control" id="issue_date" name="issue_date" tabindex="11" placeholder="">

                      </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="fee_date"> Fee Due Date </label>

                        <input type="date" class="form-control" id="fee_date" name="fee_date" tabindex="12" placeholder="">

                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="disc">Disc%</label>
                        <input type="text" class="form-control" id="disc" name="disc" tabindex="13" placeholder="">
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-group">
                        <label for="account_no">Bank Account</label>

                        <select class="form-select form-control" id="account_no" tabindex="14" name="account_no">

                          <?php foreach ($account_no as $data) { ?>
                            <option value="<?php echo $data->id; ?>"><?php echo $data->account_no; ?></option>
                          <?php  } ?>
                        </select>


                      </div>
                    </div>


                  </div>
                  <hr>
                  <div class="bg-danger p-2 error-pkg" id="error-pkg" style="display:none">
                    Please select at lest 1 Student</div>
                  <table class="table ">
                    <thead>
                      <tr class="col-lg-2 col-md-4 col-sm-12">
                        <th width="2px"><input id="check_all" class="formcontrol" type="checkbox" /></th>
                        <th>Admin#</th>
                        <th class="w-50">Student Name</th>
                        <th class="w-50">Print Due Date</th>
                        <th>Fee Type</th>
                        <th>Pkg.Amount</th>
                        <th>Discount</th>
                        <th>Arrear</th>
                        <th>F.Amount</th>
                        <th>V.Amount</th>


                      </tr>
                    </thead>
                    <tbody>
                      <?php  $i=1;
                      foreach ($results1 as $data) {

                      ?>
                      
                        <tr>
                          <td class=""><input class="case promot_required feestd" type="checkbox" name="student[]" value="<?php echo $data->id; ?>"
                           <?php if (array_search($data->id, $arry)) echo  "checked"; ?> />
                          
                          </td>
                          <td><?php echo $data->addmission_no ?></td>
                          <td><?php echo $data->name ?></td>
                          <td><?php echo $data->due_date ?></td>
                          
                          
                          <td>
                          <?php foreach ($fee_type as $data) { ?>
                              <option value="<?php echo $data->id; ?>" <?php if ($data->id == $row->fee_type) {
                           echo "selected";
                             } ?>><?php echo $data->fee_type; ?></option>
                            <?php  } ?>
                          </td> 


                                                                    
                         <td>
					  <?php $j = 1; 
					  foreach ($package_payable as $data) {?>
					  <div class="pkg com_<?php echo $j; ?> package_<?php echo $i;  ?>" rownum="<?php echo $i; ?>">
					  <?php echo $data->package_payable; ?></div>
					  <?php $j++;}?>
					</td>
					
					<td>
					  
					   
					   
					  <input type="number" class="w-75 discount com_<?php echo $i; ?>"  rownum="<?php echo $i; ?>" name="discount[]" />
					</td>
					
					<td>
					  <input class="w-75" type="text" name="arrear[]" value="" />
					</td>
					
					<td>
					  <input type="number" class="pkgpay_<?php echo $i; ?>" rownum="<?php echo $i; ?>" name="f_amount[]" value="" />
					</td>
					
					<td>
					  <input class="w-75" type="text" name="v_amount[]" value="" />
					</td>
					
					
					
					

                          <!-- <td><?php echo $data->v_amount ?></td> -->

                          <!-- <td><?php echo $data->created_at ?></td> -->
                          <!-- <?php print_r($data) ?> -->
                        </tr>
                      <?php 
                   
                   $i++; }  ?>
                    </tbody>
                    
                  </table>
                  
                  <div class="text-center mt-2 p-3">
                    <input type="submit" name="save" value="Generate" class="btn btn-warning " tabindex="15" />
                    <input type="submit" name="print" value="Generate & Print" class="btn btn-warning " tabindex="16" />

                    <input type="reset" name="reset" value="Clear" class="btn btn-warning " tabindex="17" />
                  </div>
              </div>


              <input type="hidden" name="student[]"/>
              </form>
              <!-- /.card-body -->

          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->

</div>