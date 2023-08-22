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



//         $campusId = $_REQUEST['campusId'];
//         // echo "malik".$campusId;
//         // return;
//         $sql = $conf->fetchall(STAFF . " WHERE is_deleted=0 AND campus = " . $campusId );
//         // echo "====".$sql;
       
//         $results = $conf->QueryRun($sql);
//         echo "malik";
//         // $class= $conf->fetchall( ASSIGNSECTION ." WHERE class= $class " );
//         $html;
//         foreach($results as $data){
// $html .='<option value="'. $data->id.'">'. $data->employel_name.'</option>';
        
//         }
//         echo $html;

        
?>
