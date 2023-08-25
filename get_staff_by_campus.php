<?php
include_once 'setup/config.php';
include('setup/General.php');
$conf = new config();

  
  if (isset($_POST['loancheck']) && ($_POST['loancheck'] == '123196hkqwg311271tg1')) {
      $empId = $_POST['empId'];
    // echo "malik".$campusId;
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
  else{
    $campusId = $_POST['campusId'];
     echo "malik".$campusId;
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
