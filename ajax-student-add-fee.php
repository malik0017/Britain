<?php 
require 'setup/config.php';
//include( 'Authenticate.php' );
include( 'setup/General.php' );
require_once('setup/validation/validation.php');
include( 'pagesettings.php' );

$std_session_id =$_REQUEST['session'];
$std_campus_id = $_REQUEST['campus'];;
$std_class_id = $_REQUEST['stdclass'];;

 $sql = "SELECT fd.id, fd.fee_default_pkg_id, fd.fee_type, fd.actual_fee, ft.fee_type as fee_head FROM 
`fee_default_package_detail` fd INNER JOIN fee_type ft ON ft.id = fd.fee_type 
WHERE fee_default_pkg_id = (SELECT id FROM `fee_default_package` WHERE `session_id` = 
'" . $std_session_id . "' AND `campus` = '" . $std_campus_id . "' AND `class`= '" . $std_class_id . "');";
$fee_type = $conf->QueryRun($sql);
?>
<table id="" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead class="btn-warning">
                   
                      <tr>

                            <th style="width:5%">Fee Type </th>
                            <th style="width:8%">Actual</th>
                            <th style="width:1%">Concession</th>
                            <th style="width:10%">Package_payable</th>
                          
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $i = 1;
                      if(count($fee_type)>0){
                        
                      foreach ($fee_type as $data) { ?>
                        <?php

                        ?>
                        <tr>
                          <td><?php echo $data->fee_head; ?></td>


                          <td><input type="number" class="form-control actual_<?php echo $i; ?>" rownum="<?php echo $i; ?>"  name="actual_fee[]" value="<?php echo $data->actual_fee ?>" readonly /></td>
                          <td><input type="number" class="form-control concession com_<?php echo $i; ?>"  rownum="<?php echo $i; ?>" name="concession_fee[]" /></td>

                          <td><input type="number" class="form-control pkgpay_<?php echo $i; ?>" rownum="<?php echo $i; ?>" name="package_payable[]"readonly /></td>
                          <input type="hidden" name="fee_type[]" value="<?php echo $data->fee_type ?>" />
                        </tr>
                      <?php
                        // $package_payable[$i] = $actual_fee[$i] - $concession_fee[$i];
                        // echo "wwwwwwwwwwwwwwwwwww" . $package_payable[$i];
                        $i++;
                      }

                    }

                      ?>

                      </tr>



                    </tbody>
                  </table>