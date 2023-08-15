<?php

if (isset($_POST['submit'])) {
  $campus = $_POST['campus'];
  $assignclass = $_POST['assignclass'];

  $val->name('Campus')->value($campus)->pattern('text')->required();

  if (!$val->isSuccess()) {
      $error = $val->displayErrors();
  }

  if (empty($error)) {
      foreach ($assignclass as $data) {
        //  echo($data );
          $data_post = array(
              'campus' => $campus,
              'class_name' => $data,
              'user_id' => $_SESSION['user_reg'],
              'created_at' => $cDateTime,
          );
        print_r($data_post);
          $recodes = $conf->insert($data_post, ASSIGNCLASS);

          if ($recodes == true) {
              $success = "Data <strong>Added</strong> Successfully";
          }
      }
  }
}

$campus_name = $conf->fetchall(CAMPUStbl . " WHERE is_deleted=0");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");

?>

<div class="content">

  <div class="container">

    <div class="row">
      <div class="col-lg-12"><?php include('includes/messages.php') ?>

        <div class="card card-primary card-outline">
          <div class="card-body">

            <div class="card-body">
              <form name=" " action=" " method="POST">
                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <div class="form-group">
                      <label for="campus" class="form-label ">Campus</label>
                      <select class="form-select form-control" id="campus" tabindex="1" name="campus">
                        <?php foreach ($campus_name as $data) { ?>
                          <option value="<?php echo $data->id; ?>"><?php echo $data->campus_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                 
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table w-50 ">
                  <thead>
                    <tr class="col-lg-4 col-md-4 col-sm-12">
                    <th width="3px"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                      <th class="">Class</th>
                    
                      
                    </tr>
                  </thead>
                    <tbody>
                        <?php 
                        foreach($class_name as $data){
                          
                          ?>
                          <tr>
                          <td class=""><input class=""  type="checkbox" name="assignclass[]" value="<?php echo $data->id;?>" />
                        </td>
                          <td><?php echo $data->class_name ?></td>
                         
                          </tr>
                      <?php } ?>
                    </tbody>
              </table>
                 
              <div class=" mt-2">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning " tabindex="2" />
                  </div>
                  </form>
                </div>

            </div>

            <!-- /.card-body -->

          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->

</div>