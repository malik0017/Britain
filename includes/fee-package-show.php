<?php
$package_id =  $_REQUEST['CD'];

// $results = $conf->singlev( FEEDEFAULTPACKAGE . " WHERE id='" . $package_id . "'" );


$sql = "SELECT a.*, c.class_name, p.campus_name, y.session_year

FROM " . FEEDEFAULTPACKAGE . " as a


INNER JOIN " . CLASStbl . " as c ON a.class = c.id

INNER JOIN " . SESSIONYEAR . " as y ON a.session_id = y.id
INNER JOIN " . CAMPUStbl . " as  p ON a.campus = p.id


WHERE a.id = $package_id";
// echo $sql;
$results1 = $conf->QueryRun($sql);
$results = $results1[0];


$sql2 = "SELECT d.* , c.fee_type
         FROM " . FEEDEFAULTPACKAGEDETAIL . " as d
        INNER JOIN " . FEETYPE . " as c ON d.fee_type = c.id
         WHERE d.fee_default_pkg_id = $results->id";

//  echo $sql2;
$results2 = $conf->QueryRun($sql2);
// $resulpt2 = $results2[0];
//  echo($sql2);
print_r($resulpt2);



?>




<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><?php include('includes/messages.php') ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title btn1 float-left">
                            <!-- <i class="fas fa-text-width"></i> -->
                            Show Fee Package
                        </h3>
                        <div class="float-right">
                            <a class="btn btn-warning" href="fee-package-view.php"> Back</a>
                        </div>
                    </div>



                    <!-- /.card-body -->

                    <!-- /.card-header -->
                    <div class="card-body f-flex">
                        <div class="row ">
                            <div class="col-6 ">

                                <div class="d-flex">
                                    <dt class="col-sm-6"> Session :</dt>
                                    <dd class="col-sm-6"><?php echo $results->session_year;  ?> </dd>
                                </div>
                                <div class="d-flex">
                                    <dt class="col-sm-6">Campus:</dt>
                                    <dd class="col-sm-6"><?php echo $results->campus_name; ?></dd>
                                </div>
                                <div class="d-flex">
                                    <dt class="col-sm-6"> Class:</dt>
                                    <dd class="col-sm-6"><?php echo $results->class_name;  ?> </dd>
                                </div>
                                <!-- <div class="d-flex">
                       <dt class="col-sm-6"> Actual Fee:</dt>
                       <dd class="col-sm-6"><?php echo $result2->actual_fee;  ?>  </dd>
                    </div>
                   
                    <div class="d-flex">
                       <dt class="col-sm-6"> Fee Head:</dt>
                       <dd class="col-sm-6"><?php echo $result2->fee_type;  ?>  </dd>
                    </div> -->
                                <div class="col-lg-12 col-md-4 col-sm-6  ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Fee Head</th>
                                                <th>Actual</th>
                                                <!-- <th>Concession</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 0;
                                            foreach ($results2 as $data) { ?>
                                                <tr>
                                                    <td><?php echo $data->fee_type;  ?></td>
                                                    <td><?php echo $data->actual_fee;  ?></td>

                                                </tr>
                                            <?php

                                                $i++;
                                            } ?>

                                        </tbody>
                                    </table>







                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>