<?php
$exam_id =  $_REQUEST['CD'];

$results = $conf->singlev(EXAMPROMOTION . " WHERE id='" . $exam_id . "'");


?>




<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title btn1 float-left">
              <!-- <i class="fas fa-text-width"></i> -->
              Show Student Exam Promotion
            </h3>
            <div class="float-right">
              <a class="btn btn-warning" href="student-exam-promotion-view.php"> Back</a>
            </div>
          </div>



          <!-- /.card-body -->

          <!-- /.card-header -->
          <div class="card-body f-flex">
            <div class="row ">
              <div class="col-lg-6 ">
                <div class="d-flex">
                  <dt class="col-sm-6">Session:</dt>
                  <dd class="col-sm-6"><?php echo $results->session_name; ?></dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6">Class:</dt>
                  <dd class="col-sm-6"><?php echo $results->class_name; ?></dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6"> Section:</dt>
                  <dd class="col-sm-6"><?php echo $results->section_name;  ?> </dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6">Exam:</dt>
                  <dd class="col-sm-6"> <?php echo $results->exam;  ?> </dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6"> Student:</dt>
                  <dd class="col-sm-6"> <?php echo $results->name;  ?> </dd>
                </div>

                <div class="d-flex">
                  <dt class="col-sm-6"> Exam:</dt>
                  <dd class="col-sm-6"><?php echo $results->exam_name;  ?> </dd>
                </div>

              </div>
              <div class="col-lg-6 ">

                <div class="d-flex">
                  <dt class="col-sm-6">Subject:</dt>
                  <dd class="col-sm-6"><?php echo $results->subject; ?></dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6">Passed:</dt>
                  <dd class="col-sm-6"><?php echo $results->passed;  ?> </dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6">Total Marks:</dt>
                  <dd class="col-sm-6"> <?php echo $results->total_marks;  ?> </dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6">Obtained Marks:</dt>
                  <dd class="col-sm-6"> <?php echo $results->obtained;  ?> </dd>
                </div>

                <div class="d-flex">
                  <dt class="col-sm-6">Result:</dt>
                  <dd class="col-sm-6">
                  <?php echo $results->result;  ?>
                  </dd>
                </div>
                <div class="d-flex">
                  <dt class="col-sm-6">Promoted:</dt>
                  <dd class="col-sm-6"><?php echo $results->promoted;  ?> </dd>
                </div>



              </div>

            </div>
            <!-- /.card-body -->
          </div>

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>