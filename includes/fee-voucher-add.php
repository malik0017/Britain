<?php

  //  $voucher_id  =  $_REQUEST[ 'CD' ] ;
 
  $student = ($_GET['id']);
//   echo "asssssssssss".$student;
   $sql = "SELECT *
   FROM " . FEEVOUCHER . " 
   WHERE id = $student";
   $student_fee = $conf->QueryRun($sql);
    // print("<pre>".print_r($student_fee,true)."</pre>");
    // echo"<hr>";
  $issue_date = $student_fee[0]->issue_date;
  $valid_date = $student_fee[0]->fee_date;
  $for_month_fee = $student_fee[0]->for_month;
  $std_id = $student_fee[0]->std_id;
  $account_no = $student_fee[0]->account_no;
  
  $sql = "SELECT std.addmission_no, std.name, cl.class_name as class FROM  " . Student . "  as std  INNER JOIN " . CLASStbl . " as cl ON std.class = cl.id  WHERE std.id = $std_id";
  $student_info = $conf->QueryRun($sql);
//   print("<pre>".print_r($account_no,true)."</pre>");
//   echo"<hr>";
  $addmission_no = $student_info[0]->addmission_no;
  $std_name = $student_info[0]->name;
  $std_class = $student_info[0]->class;

    $sql1 = "SELECT * FROM  " . BANK . "  WHERE id = $account_no";
    $account_info = $conf->QueryRun($sql1);
    $account_no = $account_info[0]->bank_name;
    // print("<pre>".print_r($account_info,true)."</pre>");
    // echo"<hr>";

    $fee_type = $conf->fetchall(FEETYPE . " WHERE is_deleted=0");
    $package_payable = $conf->fetchall(STUDENTFEEDETAIL . " WHERE is_deleted=0   ORDER BY std_id ASC LIMIT 10");


    $package_payable = $conf->fetchall(STUDENTFEEDETAIL . " WHERE is_deleted=0   ORDER BY std_id ASC LIMIT 10");
    $std_id = $package_payable[0]->std_id;
    $sql = "SELECT cmp.campus_name as campus_name FROM  " . CAMPUStbl . "  as cmp  INNER JOIN " . Student . " as std ON std.id = $std_id  WHERE cmp.id = std.campus";
    $campus = $conf->QueryRun($sql);
    $campus_name = $campus[0]->campus_name;
    // print("<pre>".print_r($campus_name,true)."</pre>");
 ?>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-3"><?php include('includes/messages.php') ?>
        <div class="card card-primary card-outline">
          <div class="card-body">
            <!-- <form action="" method="post"> -->
              <div class="card-body">


                <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-6 d-flex">
                    <div class="form-group w-75">
                      <h6>FEE DEPOSIT SLIP</h6>
                    </div>
                    <div class="form-group bg-dark text-white text-center w-50 ">
                      <h6>PARENTS</h6>
                    </div>

                  </div>
                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <img src="image\png-clipart-logo-faysal-bank-islamic-faysal-bank-islamic-vip-membership-card-purple-blue.png" class="img-fluid img-thumbnail" alt="faysalbanks">
                  </div> 
                  <div class="col-lg-12" style="font-size:13px; text-align:center;">
                  <h5><?php echo  $account_no; ?></h5>
                  </div>
                  <div class="col-lg-12" style="font-size:13px; text-align:center;">
                    <h6>Symbols Bill Payment Screen (TS319) <br />Institution Code = BRITN-FEES </h6>
                  </div>

                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="form-group text-center  border border-dark ">
                      <label for="fee_slip" class="form-label ">FEE VOUCHER</label>
                      <input type="text" class="form-control text-center  bg-black " id="fee_slip" name="fee_slip" tabindex="1" placeholder="CHALLAN # 618603920110" required>
                    </div>
                  </div>

                <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                  <div class="ml-2">
                    <label for="issue_date" class="form-label ">Issue on</label>
                    <input type="Date" id="issue_date" name="issue_date"value="<?php echo $issue_date; ?>" tabindex="1" placeholder="" required="" readonly="">
                  </div>

                  <div>
                    <label for="valid_date" class="form-label">Valid Till</label>
                    <input type="Date" id="valid_date" name="valid_date" value="<?php echo $valid_date; ?>" tabindex="1" placeholder="" required="" readonly="">
                  </div>
                </div>

                  <!--<div class="col-lg-4 col-md-4 col-sm-6  d-flex ">-->
                  <!--  <div class="ml-2">-->
                  <!--    <label for="issue_date" class="form-label ">Issue on</label>-->
                  <!--    <input type="Date" id="issue_date" name="issue_date" value="<?php echo $issue_date; ?>" tabindex="1" placeholder="" required readonly>-->
                  <!--  </div>-->

                  <!--  <div>-->
                  <!--    <label for="valid_date" class="form-label">Valid Till</label>-->
                  <!--    <input type="Date" id="valid_date" name="valid_date" value="<?php echo $valid_date; ?>" tabindex="1" placeholder="" required readonly>-->
                  <!--  </div>-->
                  <!--</div>-->

                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="form-group ml-2 mr-2">
                      <label for="name" class="form-label ">Student:</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $std_name ?>" tabindex="1" placeholder="" required>
                     
                    </div>
                  </div>


                  <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                    <div class="ml-2 w-50">
                      <label for="class_name" class="form-label ">Class:</label>
                      <input type="text" class="form-control" id="class_name" value="<?php echo $std_class ?>" name="class_name"  tabindex="2" placeholder="" required>
                      <!-- <select class="form-select form-control" id="class_name" tabindex="2" name="class_name" required>
                        <?php foreach ($class_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->class_name; ?></option>
                        <?php  } ?>

                      </select> -->
                    </div>

                    <div class="ml-2">
                      <label for="valid_date" class="form-label">Adm. #</label>
                      <input type="text" class="form-control" id="student_name" value="<?php echo $addmission_no ?>" name="student_name" tabindex="1" placeholder="" required>
                    </div>
                  </div>


                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="form-group ml-2 mr-2">
                      <label for="for_month" class="form-label ">For month(s):</label>
                      <input type="text" class="form-control" id="for_month" value="<?php echo $for_month_fee; ?>" name="for_month" tabindex="1" placeholder="" required readonly>
                    </div>
                  </div>
           
                  <div class="col-lg-12 col-md-4 col-sm-6  ">
                      <div class="row">
                                   <div class="col-8" >
                                         <label >Fee Head:</label>
                                         <?php echo"<br>"; foreach ($fee_type as $val): ?>
                                                    <td>
                                                      <?php echo $val->fee_type; echo"<br>"; ?>
                                                    </td>
                                                  <?php endforeach; ?>
                                    </div>
                                    <div class="col-4">
                                        <label >Actual Fee:</label>
                                               <?php echo"<br>";
                                                $sum = 0;
                                               $j = 0; 
                                              foreach ($package_payable as $data) {
                                               $value = floatval($data->package_payable);
    
                                                // Add the value to the sum
                                                $sum += $value;
                                              ?>
                                              <td class="pkg com_<?php echo $j; ?> package_<?php echo $i;  ?>" rownum="<?php echo $i; ?>">
                                              <?php echo $data->package_payable; echo"<br>";?></td>
                                              
                                              <?php $j++;}?>
                                    </div>
                        </div>
                       <div class="row">
                              <div class="col-8 bg-dark" ><label >Toal Payable due:</label></div>
                              <div class="col-4"> <strong><?php echo  $sum; ?></strong></div>
                        </div>
                         <div class="row">
                             <div class="col-8 bg-dark" ><label >Note: Voucher Valid till</label></div>
                             <div class="col-4 "><strong><?php echo $valid_date; ?></strong> </div>
                        </div>
                 </div>

            
                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="form-group text-center">
                      <h5><?php echo $campus_name; ?></h5> 
                    </div>

                    <div class="col-lg-12 col-md-4 col-sm-6 border ">
                      <img src="image\britain-school.png" class="img-fluid img-thumbnail w-100" alt="britainschool">
                    </div>



                    <div class="col-lg-12 border border-1 border-dark mt-3">
                      <h6>Symbols Bill Payment Screen (TS319) <br />Institution Code = BRITN-FEES </h6>
                    </div>

                    <div class="mt-3 mb-5">

                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    
                    <div class=" d-flex justify-content-end  ">
                      <span class="border-top border-dark "><h6 class="mt-1">Bank Cashier Officer</h6></span>
                    </div>

                  </div>

                </div>

            <!-- </form> -->
          </div>
        </div>
      </div>




    </div>
    <div class="col-lg-3">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <!-- <form action="" method="post"> -->
            <div class="card-body">


              <div class="row">
                <div class="col-lg-12 col-md-4 col-sm-6 d-flex">
                  <div class="form-group w-75">
                    <h6>FEE DEPOSIT SLIP</h6>
                  </div>
                  <div class="form-group bg-dark text-white text-center w-50 ">
                    <h6>BANKS</h6>
                  </div>

                </div>
                <div class="col-lg-12 col-md-4 col-sm-6">
                  <img src="image\png-clipart-logo-faysal-bank-islamic-faysal-bank-islamic-vip-membership-card-purple-blue.png
                  
                  " class="img-fluid img-thumbnail" alt="faysalbanks">
                </div>
                <div class="col-lg-12" style="font-size:13px; text-align:center;">
                  <h5><?php echo  $account_no; ?></h5>
                  </div>
                <div class="col-lg-12" style="font-size:13px; text-align:center;">
                  <h6>Symbols Bill Payment Screen (TS319) <br>Institution Code = BRITN-FEES </h6>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group text-center  border border-dark ">
                    <label for="fee_slip" class="form-label ">FEE VOUCHER</label>
                    <input type="text" class="form-control text-center  bg-black " id="fee_slip" name="fee_slip" tabindex="1" placeholder="CHALLAN # 618603920110" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                  <div class="ml-2">
                    <label for="issue_date" class="form-label ">Issue on</label>
                    <input type="Date" id="issue_date" name="issue_date" value="<?php echo $issue_date; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>

                  <div>
                    <label for="valid_date" class="form-label">Valid Till</label>
                    <input type="Date" id="valid_date" name="valid_date" value="<?php echo $valid_date; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group ml-2 mr-2">
                    <label for="student_name" class="form-label ">Student:</label>
                    <input type="text" class="form-control" id="student_name" value="<?php echo $std_name ?>" name="student_name" tabindex="1" placeholder="" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                  <div class="ml-2 w-50">
                    <label for="issue_date" class="form-label ">Class:</label>
                    <input type="text" class="form-control" id="class_name" value="<?php echo $std_class ?>" name="class_name"  tabindex="2" placeholder="" required>
                  </div>

                  <div class="ml-2">
                    <label for="valid_date" class="form-label">Adm. #</label>
                    <input type="text" class="form-control" id="student_name" value="<?php echo $addmission_no ?>" name="student_name" tabindex="1" placeholder="" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group ml-2 mr-2">
                    <label for="for_month" class="form-label ">For month(s):</label>
                    <input type="text" class="form-control" id="for_month" name="for_month" value="<?php echo $for_month_fee; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6  ">
                      <div class="row">
                                   <div class="col-8" >
                                         <label >Fee Head:</label>
                                         <?php echo"<br>"; foreach ($fee_type as $val): ?>
                                                    <td>
                                                      <?php echo $val->fee_type; echo"<br>"; ?>
                                                    </td>
                                                  <?php endforeach; ?>
                                    </div>
                                    <div class="col-4">
                                        <label >Actual Fee:</label>
                                               <?php echo"<br>";
                                                $sum = 0;
                                               $j = 0; 
                                              foreach ($package_payable as $data) {
                                               $value = floatval($data->package_payable);
    
                                                // Add the value to the sum
                                                $sum += $value;
                                              ?>
                                              <td class="pkg com_<?php echo $j; ?> package_<?php echo $i;  ?>" rownum="<?php echo $i; ?>">
                                              <?php echo $data->package_payable; echo"<br>";?></td>
                                              
                                              <?php $j++;}?>
                                    </div>
                        </div>
                       <div class="row">
                              <div class="col-8 bg-dark" ><label >Toal Payable due:</label></div>
                              <div class="col-4"> <strong><?php echo  $sum; ?></strong></div>
                        </div>
                         <div class="row">
                             <div class="col-8 bg-dark" ><label >Note: Voucher Valid till</label></div>
                             <div class="col-4 "><strong><?php echo $valid_date; ?></strong> </div>
                        </div>
                 </div>


                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group text-center">
                    <h5><?php echo $campus_name; ?></h5> 
                  </div>

                  <div class="col-lg-12 col-md-4 col-sm-6 border ">
                    <img src="image\britain-school.png" class="img-fluid img-thumbnail w-100" alt="britainschool">
                  </div>



                  <div class="col-lg-12 border border-1 border-dark mt-3">
                    <h6>Symbols Bill Payment Screen (TS319) <br>Institution Code = BRITN-FEES </h6>
                  </div>

                  <div class="mt-3 mb-5">

                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                  <div class=" d-flex justify-content-end  ">
  <span class="border-top border-dark "><h6 class="mt-1">Bank Cashier Officer</h6></span>
                    </div>


                </div>

              </div>


            </div>
          <!-- </form> -->
        </div>
      </div>

    </div>
    <div class="col-lg-3">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <!-- <form action="" method="post"> -->
            <div class="card-body">


              <div class="row">
                <div class="col-lg-12 col-md-4 col-sm-6 d-flex">
                  <div class="form-group w-75">
                    <h6>FEE DEPOSIT SLIP</h6>
                  </div>
                  <div class="form-group bg-dark text-white text-center w-50 ">
                    <h6>SCHOOL</h6>
                  </div>

                </div>
                <div class="col-lg-12 col-md-4 col-sm-6">
                  <img src="image\png-clipart-logo-faysal-bank-islamic-faysal-bank-islamic-vip-membership-card-purple-blue.png" class="img-fluid img-thumbnail" alt="faysalbanks">
                </div>
                <div class="col-lg-12" style="font-size:13px; text-align:center;">
                  <h5><?php echo  $account_no; ?></h5>
                  </div>
                <div class="col-lg-12" style="font-size:13px; text-align:center;">
                  <h6>Symbols Bill Payment Screen (TS319) <br>Institution Code = BRITN-FEES </h6>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group text-center  border border-dark ">
                    <label for="fee_slip" class="form-label ">FEE VOUCHER</label>
                    <input type="text" class="form-control text-center  bg-black " id="fee_slip" name="fee_slip" tabindex="1" placeholder="CHALLAN # 618603920110" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                  <div class="ml-2">
                    <label for="issue_date" class="form-label ">Issue on</label>
                    <input type="Date" id="issue_date" name="issue_date" value="<?php echo $issue_date; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>

                  <div>
                    <label for="valid_date" class="form-label">Valid Till</label>
                    <input type="Date" id="valid_date" name="valid_date" value="<?php echo $valid_date; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group ml-2 mr-2">
                    <label for="student_name" class="form-label ">Student:</label>
                    <input type="text" class="form-control" id="student_name" value="<?php echo $std_name ?>" name="student_name" tabindex="1" placeholder="" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                  <div class="ml-2 w-50">
                    <label for="issue_date" class="form-label ">Class:</label>
                    <input type="text" class="form-control" id="class_name" value="<?php echo $std_class ?>" name="class_name"  tabindex="2" placeholder="" required>
                  </div>

                  <div class="ml-2">
                    <label for="valid_date" class="form-label">Adm. #</label>
                    <input type="text" class="form-control" id="student_name" value="<?php echo $addmission_no ?>" name="student_name" tabindex="1" placeholder="" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group ml-2 mr-2">
                    <label for="for_month" class="form-label ">For month(s):</label>
                    <input type="text" class="form-control" id="for_month" name="for_month" value="<?php echo $for_month_fee; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6  ">
                      <div class="row">
                                   <div class="col-8" >
                                         <label >Fee Head:</label>
                                         <?php echo"<br>"; foreach ($fee_type as $val): ?>
                                                    <td>
                                                      <?php echo $val->fee_type; echo"<br>"; ?>
                                                    </td>
                                                  <?php endforeach; ?>
                                    </div>
                                    <div class="col-4">
                                        <label >Actual Fee:</label>
                                               <?php echo"<br>";
                                                $sum = 0;
                                               $j = 0; 
                                              foreach ($package_payable as $data) {
                                               $value = floatval($data->package_payable);
    
                                                // Add the value to the sum
                                                $sum += $value;
                                              ?>
                                              <td class="pkg com_<?php echo $j; ?> package_<?php echo $i;  ?>" rownum="<?php echo $i; ?>">
                                              <?php echo $data->package_payable; echo"<br>";?></td>
                                              
                                              <?php $j++;}?>
                                    </div>
                        </div>
                        <div class="row">
                              <div class="col-8 bg-dark" ><label >Toal Payable due:</label></div>
                              <div class="col-4"> <strong><?php echo  $sum; ?></strong></div>
                        </div>
                         <div class="row">
                             <div class="col-8 bg-dark" ><label >Note: Voucher Valid till</label></div>
                             <div class="col-4 "><strong><?php echo $valid_date; ?></strong> </div>
                        </div>
                 </div>


                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group text-center">
                    <h5><?php echo $campus_name; ?></h5> 
                  </div>

                  <div class="col-lg-12 col-md-4 col-sm-6 border ">
                    <img src="image\britain-school.png" class="img-fluid img-thumbnail w-100" alt="britainschool">
                  </div>

    
                  <div class="col-lg-12 border border-1 border-dark mt-3">
                    <h6>Symbols Bill Payment Screen (TS319) <br>Institution Code = BRITN-FEES </h6>
                  </div>

                  <div class="mt-3 mb-5">

                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                  <div class=" d-flex justify-content-end  ">
                     <span class="border-top border-dark "><h6 class="mt-1">Bank Cashier Officer</h6></span>
                    </div>


                </div>

              </div>


            </div>
          <!-- </form> -->
        </div>
      </div>



    </div>
    <div class="col-lg-3">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <!-- <form action="" method="post"> -->
            <div class="card-body">


              <div class="row">
                <div class="col-lg-12 col-md-4 col-sm-6 d-flex">
                  <div class="form-group w-75">
                    <h6>FEE DEPOSIT SLIP</h6>
                  </div>
                  <div class="form-group bg-dark text-white text-center w-50 ">
                    <h6>HEAD office</h6>
                  </div>

                </div>
                <div class="col-lg-12 col-md-4 col-sm-6">
                  <img src="image\png-clipart-logo-faysal-bank-islamic-faysal-bank-islamic-vip-membership-card-purple-blue.png" class="img-fluid img-thumbnail" alt="faysalbanks">
                </div>
                <div class="col-lg-12" style="font-size:13px; text-align:center;">
                  <h5><?php echo  $account_no; ?></h5>
                  </div>
                <div class="col-lg-12" style="font-size:13px; text-align:center;">
                  <h6>Symbols Bill Payment Screen (TS319) <br>Institution Code = BRITN-FEES </h6>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group text-center  border border-dark ">
                    <label for="fee_slip" class="form-label ">FEE VOUCHER</label>
                    <input type="text" class="form-control text-center  bg-black " id="fee_slip" name="fee_slip" tabindex="1" placeholder="CHALLAN # 618603920110" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                  <div class="ml-2">
                    <label for="issue_date" class="form-label ">Issue on</label>
                    <input type="Date" id="issue_date" name="issue_date" value="<?php echo $issue_date; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>

                  <div>
                    <label for="valid_date" class="form-label">Valid Till</label>
                    <input type="Date" id="valid_date" name="valid_date" value="<?php echo $valid_date; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group ml-2 mr-2">
                    <label for="student_name" class="form-label ">Student:</label>
                    <input type="text" class="form-control" id="student_name" value="<?php echo $std_name ?>" name="student_name" tabindex="1" placeholder="" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6  d-flex ">
                  <div class="ml-2 w-50">
                    <label for="issue_date" class="form-label ">Class:</label>
                    <input type="text" class="form-control" id="class_name" value="<?php echo $std_class ?>" name="class_name"  tabindex="2" placeholder="" required>
                  </div>

                  <div class="ml-2">
                    <label for="valid_date" class="form-label">Adm. #</label>
                    <input type="text" class="form-control" id="student_name" value="<?php echo $addmission_no ?>"  name="student_name" tabindex="1" placeholder="" required="">
                  </div>
                </div>


                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group ml-2 mr-2">
                    <label for="for_month" class="form-label ">For month(s):</label>
                    <input type="text" class="form-control" id="for_month" name="for_month" value="<?php echo $for_month_fee; ?>" tabindex="1" placeholder="" required="" readonly>
                  </div>
                </div>

                <div class="col-lg-12 col-md-4 col-sm-6  ">
                      <div class="row">
                                   <div class="col-8" >
                                         <label >Fee Head:</label>
                                         <?php echo"<br>"; foreach ($fee_type as $val): ?>
                                                    <td>
                                                      <?php echo $val->fee_type; echo"<br>"; ?>
                                                    </td>
                                                  <?php endforeach; ?>
                                    </div>
                                    <div class="col-4">
                                        <label >Actual Fee:</label>
                                               <?php echo"<br>";
                                                $sum = 0;
                                               $j = 0; 
                                              foreach ($package_payable as $data) {
                                               $value = floatval($data->package_payable);
    
                                                // Add the value to the sum
                                                $sum += $value;
                                              ?>
                                              <td class="pkg com_<?php echo $j; ?> package_<?php echo $i;  ?>" rownum="<?php echo $i; ?>">
                                              <?php echo $data->package_payable; echo"<br>";?></td>
                                              
                                              <?php $j++;}?>
                                    </div>
                        </div>
                        <div class="row">
                              <div class="col-8 bg-dark" ><label >Toal Payable due:</label></div>
                              <div class="col-4"> <strong><?php echo  $sum; ?></strong></div>
                        </div>
                         <div class="row">
                             <div class="col-8 bg-dark" ><label >Note: Voucher Valid till</label></div>
                             <div class="col-4 "><strong><?php echo $valid_date; ?></strong> </div>
                        </div>
                 </div>

                <div class="col-lg-12 col-md-4 col-sm-6">
                  <div class="form-group text-center">
                    <h5><?php echo $campus_name; ?></h5> 
                  </div>

                  <div class="col-lg-12 col-md-4 col-sm-6 border ">
                    <img src="image\britain-school.png" class="img-fluid img-thumbnail w-100" alt="britainschool">
                  </div>



                  <div class="col-lg-12 border border-1 border-dark mt-3">
                    <h6>Symbols Bill Payment Screen (TS319) <br>Institution Code = BRITN-FEES </h6>
                  </div>

                  <div class="mt-3 mb-5">

                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                  <div class=" d-flex justify-content-end  ">
                  <span class="border-top border-dark "><h6 class="mt-1">Bank Cashier Officer</h6></span>
                    </div>


                </div>
                       
              </div>


            </div>
          <!-- </form> -->
        </div>
      </div>



    </div>
  </div><!-- /.container-fluid -->
</div>