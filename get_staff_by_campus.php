<?php
include_once 'setup/config.php';
include('setup/General.php');
$conf = new config();

  
  if (isset($_POST['loancheck']) && ($_POST['loancheck'] == '123196hkqwg311271tg1')) {
      $empId = $_POST['empId'];
    //  echo "malik".$campusId;
    $emploan = $conf->fetchall(EMPLOANS . " WHERE  emp_id = " . $empId);
    if(empty($emploan)){
      $options = '<option >'. 'No Data Found' .'</option>';
    }
    else{
      foreach ($emploan as $data) {
        $options .= '<option value="' . $data->id . '">' . $data->amount . '</option>';
      }
      echo $options;

    }
   
    
  }
  else if (isset($_POST['securitycheck']) && ($_POST['securitycheck'] == '123sdgserdyg4rtyr6df')) {
    $empId = $_POST['empId'];
  //  echo "malik".$campusId;
  $options = '<option >'. 'Select Security' .'</option>';
  $emploan = $conf->fetchall(EMPSECURITY . " WHERE  emp_id = " . $empId);
  if(empty($emploan)){
    $options = '<option >'. 'No Data Found' .'</option>';
  }
  else{
    foreach ($emploan as $data) {
      $options .= '<option value="' . $data->id . '">' . $data->amount . '</option>';
    }
    echo $options;

  }
 
  
}
else if (isset($_POST['securitybalance']) && ($_POST['securitybalance'] == 'ewqtdhg3422dhfhet')) {
  $empId = $_POST['empId'];
//  echo "malik".$campusId;
$empsecurity = $conf->fetchall(EMPSECURITY . " WHERE  id = " . $empId);
// print_r($empsecurity);
// echo "<br>";
// echo $empsecurity[0]->installment;
if(!empty($empsecurity)){
 
  echo $empsecurity[0]->installment;
}




}
  else{
    $campusId = $_POST['campusId'];
    //  echo "malik".$campusId;
    $staffs = $conf->fetchall(STAFF . " WHERE IsLeft=0 AND campus = " . $campusId);
  
    $options = '';
    if(empty($staffs)){
      $options = '<option >'. 'No Data Found'. '</option>';
    }
    else{
    foreach ($staffs as $data) {
      $options .= '<option value="' . $data->employel_id . '">' . $data->employel_name . '</option>';
    }
  
    echo $options;
  }
  }

        
?>
