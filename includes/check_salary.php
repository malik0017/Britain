<?php 
$staff_id='1';
$numberOfLeave='1';
$other_allowanc='1500';
$installment_no= 0;
$loan= 0;
$sm_posted=$_POST['salary_month'];
$sm_arr=explode('-',$sm_posted);
$salary_month=$sm_arr[0];
$salary_year=$sm_arr[1];

 $basic_salary=$conf->BasicSalary($staff_id);
// months pass in this function after 
$leave_amount=round($conf->LeaveAmount($staff_id,$numberOfLeave));
$lunch_amount=$conf->LunchAmount($staff_id);
// echo "= basic===".$basic_salary."<br>";
// echo "=Leave===".$leave_amount."<br>";
// echo "=lunch===".$lunch_amount."<br>";

$gross_sal=$basic_salary+$lunch_amount+$other_allowanc;
  
$staff_kids=$conf->KidsStaff($staff_id);
$income_tax=$conf->IncomeTax($gross_sal);
$pfunds=$conf->ProvidentFunds($staff_id);
$security_data=$conf->securityCheck($staff_id);
$loans_check=$conf->LoansCheck($staff_id);
$security_total=0;
$loan_total=0;
if (count($security_data)>0){
	$security_total=$security_data['total'];
}
if (count($loans_check)>0){
	$loan_total=$loans_check['total'];
}



// echo "= Gross Salary===".$gross_sal."<br>";
// echo "= Staff kids===".$staff_kids."<br>";
// echo "=Income Tax===".$income_tax."<br>";
// echo "=Security===".$security_data['total']."<br>";
// echo "=provident Funds===".$pfunds."<br>";
// echo "=loan Check===".$loans_check."<br>";
$net_salary= $gross_sal - $security_data['total'] - $pfunds - $income_tax -$loans_check;

// echo "<br>"."the net salary is:".$net_salary;
    $data_post = array( 'emp_id' => $staff_id, 'leaves' =>$numberOfLeave ,'basic_salary' => $basic_salary,'net_salary' => $net_salary,'d_loan' => $loan,'d_leave_amount' => $leave_amount,'a_lunch' => $lunch_amount,'free_kids' => $staff_kids,'d_income_tax' => $income_tax,'d_security' => $security_total,'d_provident_funds' => $pfunds,'installment_no' => $installment_no,'user_id' => $_SESSION[ 'user_reg' ],'salary_month' => $salary_month,'salary_year' => $salary_year,'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

		$recodes = $conf->insert( $data_post, STAFFSALARY );

		if (count($security_data)>0){
		foreach ($security_data as $key => $value) {
	
			if($key!= 'total'){
					$data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => $security_data[$key],'security_id' => $key,'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

				$recodes1 = $conf->insert( $data_post, SALARYSECURITY );
						}
						
		}
		}
		if (count($loans_check)>0){
			foreach ($loans_check as $key => $value) {
		
				if($key!= 'total'){
						$data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => $loans_check[$key],'loan_id' => $key,'user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);
	
					$recodes2 = $conf->insert( $data_post, SALARYlOAN );
							}
							
			}
			}



    // $data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => '100','allowance_id' => '100','user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

	// 	$recodes2 = $conf->insert( $data_post, SALARYALLOWANCE );

    // $data_post = array( 'emp_id' => $staff_id, 'salary_id' =>$recodes ,'amount' => '100','deduction_id' => '100','user_id' => $_SESSION[ 'user_reg' ],'created_at' => $_SESSION['cDate'],'updated_at' => $_SESSION['cDate']);

	// 	$recodes3 = $conf->insert( $data_post, SALARYDEDUCT );

   
		if ( $recodes == true ) {
			$success = "Data <strong>Added</strong> Successfully";

			//$gen->redirecttime( 'campus', '2000' );
		}


?>