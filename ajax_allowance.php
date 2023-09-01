<?php
include_once 'setup/config.php';
include('setup/General.php');
include('setup/accounts.php');
$conf = new config();
$gen = new General();
$acc = new accounts();

// $account_id = 0;
// echo"--------". $conf->AllAccountsBalance(10001);
// exit;

    if (isset($_REQUEST['id'])){
        $employeeid = $_REQUEST['id'];
        
         echo $employeeid;
        $emplyee = $conf->singlev( EMPLOYETYE ." WHERE id= $employeeid " );
         echo $emplyee->lunch_allowance;
         

        }
    if(isset($_REQUEST['sid'])){
        $arr=array();
        $staffid = $_REQUEST['sid'];
        
        $staff = $conf->singlev( STAFF ." WHERE employel_id= $staffid " );
        //  exit;
        $empl_type = $conf->singlev( EMPLOYETYE ." WHERE id= $staff->employel_type" );
        // echo $staff->employel_type;
        // exit;
        // echo $empl_type->lunch_allowance;
        // echo $staff->basic_salary;
        $arr['basic_salary']=$staff->basic_salary;
        $arr['lunch']=$empl_type->lunch_allowance;
        echo json_encode($arr);

    }
    if (isset($_REQUEST['cid'])){
        $campus = $_REQUEST['cid'];
          echo $campus;
// exit;
        $sql = "SELECT a.*, c.class_name as class
                FROM ".ASSIGNCLASS." as a
                INNER JOIN ".CLASStbl. " as c ON a.class_name = c.id
                WHERE a.campus = $campus";
                // echo $sql;
        $results = $conf->QueryRun($sql);

        // $class= $conf->fetchall( ASSIGNCLASS ." WHERE campus= $campus " );
        $html;
        foreach($results as $data){
$html .='<option value="'. $data->class_name.'">'. $data->class.'</option>';
        
        }
        echo $html;

        }

        if (isset($_REQUEST['nid'])){
                $class = $_REQUEST['nid'];
        //           echo $campus;
        // exit;
                $sql = "SELECT a.*, n.section_title as section
                        FROM ".ASSIGNSECTION." as a
                        INNER JOIN ".SECTION. " as n ON a.section_title = n.id
                        WHERE a.class_name = $class";
                        echo $sql;
                $results = $conf->QueryRun($sql);
        
                // $class= $conf->fetchall( ASSIGNSECTION ." WHERE class= $class " );
                $html;
                foreach($results as $data){
        $html .='<option value="'. $data->section_title.'">'. $data->section.'</option>';
                
                }
                echo $html;
        
                }

        
?>