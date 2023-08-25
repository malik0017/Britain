<?php
include_once 'setup/config.php';
include('setup/General.php');
$conf = new config();

  $campusId = $_POST['campusId'];
  // echo "malik".$campusId;
  $staffs = $conf->fetchall(STAFF . " WHERE IsLeft=0 AND campus = " . $campusId);

  $options = '';
  foreach ($staffs as $data) {
    $options .= '<option value="' . $data->employel_id . '">' . $data->employel_name . '</option>';
  }

  echo $options;

        
?>
