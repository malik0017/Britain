<?php
$assig_id = $_REQUEST['CD'];
$arry=array();
$assignsection = $conf->fetchall(ASSIGNSECTION . " WHERE class_name = $assig_id");
if(!empty($assignsection)){
  foreach($assignsection as $data){
    $arry[$data->section_title]=$data->section_title;

  }
}
// print_r($arry);
if (isset($_POST['submit'])) {

  $class_name = $_POST['class_name'];
  $assignsection = $_POST['assignsection'];
  
  // $val->name('Campus')->value($campus)->pattern('text')->required();

  if (!$val->isSuccess()) {
    $error = $val->displayErrors();
  }
  
  if (empty($error)) {

    $conf->delete( ASSIGNSECTION, "class_name=".$class_name );
   
    foreach ($assignsection as $data) {
     
      $data_post = array(
        'class_name' => $class_name, 'section_title' => $data
      );
      $recodes = $conf->insert($data_post, ASSIGNSECTION);
      

    }
    
   
    $success = "Data <strong>Added</strong> Successfully";
    //$gen->redirecttime( 'class', '2000' );
  }
}

$section_title = $conf->fetchall(SECTION . " WHERE is_deleted=0");
$class_name = $conf->fetchall(CLASStbl . " WHERE is_deleted=0");

?>

<div class="content">
  
      <div class="container">
        
        <div class="row">
          <div class="col-lg-12"><?php include('includes/messages.php')?>
          
            <div class="card card-primary card-outline">
              <div class="card-body">
              <form action="" method="POST">
                
                <div class="card-body">
                  
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                          
                          <div class="form-group">
                          <label for="class" class="form-label ">Class</label>
                    <select class="form-select form-control" id="class" tabindex="1" name="class_name" required>  
                        <?php foreach($class_name as $data){ ?> 
                          <option value="<?php echo $data->id; ?>" <?php if($data->id==$assig_id){ echo "selected";} ?>>
                          <?php echo $data->class_name; ?></option>
                         <?php  }?>                                     
                                
                            </select>
                    </div>
                        </div><div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table w-50 ">
                  <thead>
                    <tr class="col-lg-4 col-md-4 col-sm-12">
                    <th width="3px"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                      <th class="">Section</th>
                    
                      
                    </tr>
                  </thead>
                    <tbody>
                        <?php 
                        foreach($section_title as $data){
                          
                          ?>
                          <tr>
                          <td class=""><input class=""  type="checkbox" name="assignsection[]"
                           value="<?php echo $data->id; ?>"
                           <?php  if(array_search($data->id,$arry)) echo  "checked";?> />
                        </td>
                          <td><?php echo $data->section_title ?></td>
                         
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
                       
                            
                          
                             