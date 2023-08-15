<?php
class accounts extends config {	
	
	function AccountHeadTree($parent=0, $spacing = '', $category_tree_array = '') {
		if (!is_array($category_tree_array))
			$category_tree_array = array();
		$sqlCategory = "SELECT * FROM ".ACCOUNT_CHART." WHERE parent_id = '".$parent."' ORDER BY title ASC";
		$resCategory=$this->QueryRun($sqlCategory);
		
		if (count($resCategory) > 0) {
		   foreach($resCategory as $rowCategories) {
				if($rowCategories->parent_id==0)
					$pid = null;
				else
				$pid = $rowCategories->parent_id;
			   
				$category_tree_array[] =array("acct_no"=> $rowCategories->acct_no ,"acc_id" => $rowCategories->acc_id, "title" => $spacing .$rowCategories->acct_no.' ' . $rowCategories->title, "parentId" => $rowCategories->parent_id);
				$category_tree_array = $this->AccountHeadTree($rowCategories->acc_id, '&nbsp;&nbsp;&nbsp;&nbsp;'.$spacing . '-&nbsp;', $category_tree_array);
			}
		}
		return $category_tree_array;
	}
		
	function AccountHeads($parent, $Accounts = '') {
		if (!is_array($Accounts))
			$Accounts = array();
		$sqlCategory = "SELECT * FROM ".ACCOUNT_CHART." WHERE parent_id = '".$parent."' ORDER BY title ASC";
		$resCategory=$this->QueryRun($sqlCategory);
		
		if (count($resCategory) > 0) {
		   foreach($resCategory as $rowCategories) {
			   $Accounts[] =  $rowCategories->acc_id;
			  // print_r($Accounts);
			  // echo "<br>";
				$Accounts = $this->AccountHeads($rowCategories->acc_id, $Accounts);
			}
		}
		return $Accounts;
	}
	
	function DeleteAccounts($parent) {
		
		$deleteAccounts = $this->AccountHeads($parent);
		if(count($deleteAccounts)>0){
			$deleteit = $parent.', '.implode(',',$deleteAccounts);
			$sqlDelete = "DELETE FROM ".ACCOUNT_CHART." WHERE `acc_id` IN (".$deleteit.")";
			$resCategory=$this->QueryRunsimple($sqlDelete);
		}
		else
		{
			$sqlDelete = "DELETE FROM ".ACCOUNT_CHART." WHERE `acc_id` = '".$parent."'";
			$resCategory=$this->QueryRunsimple($sqlDelete);
		}
	}
	
    function get_new_account_value($iID){
        

  $rsDETAIL=$this->single(tbl_chart_accounts." WHERE acc_id = ".$iID."",'acct_no, title, acct_type, transaction_acct, in_active, parent_id');
    if(count($rsDETAIL)==0) { $err[]	=	"no record found";}
  		else{
  				$rowDETAIL			=	$rsDETAIL;
  $iACCT_NO=$this->single(tbl_chart_accounts."  WHERE parent_id = ".$iID."",'CASE WHEN ISNULL(MAX(acc_id)) THEN 0 ELSE MAX(acc_id) END AS acct_id');
  if(count($iACCT_NO)==0 ){
  					$sNEW_ACCT_NO	=		$rowDETAIL->acct_no."-1";
  				}else{
  				    $sSQL=$this->single(tbl_chart_accounts."  WHERE acc_id = ".$iACCT_NO->acct_id."",'acct_no');
                      $iNEW_ACCT_NO	=	intval(substr(strrchr($sSQL->acct_no,'-'),1));
  					$iNEW_ACCT_NO++;
  					$sNEW_ACCT_NO	=	$rowDETAIL->acct_no."-".$iNEW_ACCT_NO;
 				}
 			return $sNEW_ACCT_NO;
  		}
 }
}
?>