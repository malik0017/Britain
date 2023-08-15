<?php
// require 'setup/config.php';

//delete record
if (isset($_POST['deleteid'])) {
    $deleteid = $_POST['deleteid'];
    //delete From Database
    //$flagmain = $conf->delme( CLASStbl, $deleteid, "id" );
    //delete From Frontened
    $table = ATTENDANCE . " set `is_deleted`=1  where id='" . $deleteid . "'";
    $flagmain = $conf->updateValue($table);
    if ($flagmain) {
        $success = "<p>Record   <strong>Deleted</strong> Successfully</p>";
    }
}
$results = $conf->fetchall(ATTENDANCE . " where is_deleted = 0");
// $results=$conf->QueryRun("SELECT at.* , c.campus_type as c_type FROM " . ATTENDANCE . " at INNER JOIN " . CAMPUSTYPE . " c  ");



//  $campus_type=$conf->fetchall( CAMPUSTYPE . " WHERE is_deleted=0" );


//  $campus_type=$conf->fetchall( CAMPUStbl . " WHERE is_deleted=0" );
//  $class_name=$conf->fetchall( CLASSNAME . " WHERE is_deleted=0" );
// $session_year=$conf->fetchall( SESSIONYEAR . " WHERE is_deleted=0" );
// $section_title=$conf->fetchall( SECTION . " WHERE is_deleted=0" );
// $results=$conf->fetchall(Student." where  is_deleted = 0");

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
                                    <a class="btn btn-warning float-right" href="attendance-add.php"> Create New
                                        Attendance</a>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="tabledata" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead class="btn-warning">
                                        <tr>
                                            <th style="width:15%">Campus </th>
                                            <th style="width:15%">Class Name</th>
                                            <th style="width:15%">Session Name</th>
                                            <th style="width:15%">Section Name</th>
                                            <th style="width:15%">Attendance Date</th>
                                            <th style="width:1%">View</th>
                                            <th style="width:1%">Edit</th>
                                            <th style="width:1%">Delete</th>


                                            <!-- <th class="no-sort" style="width:13%">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($results as $data) {
                                            $campusName = CAMPUStbl . " where id='" . $data->campus . "'";
                                            $cat = $conf->singlev($campusName);

                                            $ClassName = CLASStbl . " where id='" . $data->class_name . "'";
                                            $com = $conf->singlev($ClassName);


                                            $sessionName = SESSIONYEAR . " where id='" . $data->session_name . "'";
                                            $session = $conf->singlev($sessionName);

                                            $sectionName = SECTION . " where id='" . $data->section_name . "'";
                                            $section = $conf->singlev($sectionName);
                                        ?>
                                            <tr>

                                                <td> <?= $cat->campus_name ?></td>
                                                <td><?= $com->class_name ?></td>
                                                <td><?= $session->session_year ?></td>
                                                <td><?= $section->section_title ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($data->attendance_date)); ?></td>





                                                <td class="">

                                                    <form action="attendance-show.php?CD=<?php echo $data->id; ?>" method="post">
                                                        <button type="submit" class="btn btn-primary">Show</button>

                                                    </form>

                                                </td>
                                                <td>
                                                    <form action="attendance-edit.php?CD=<?php echo $data->id; ?>" method="post">

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
        </div>
    </div><!-- /.container-fluid -->
</div>