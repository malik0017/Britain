<?php


 	class General {
		function __constract()
		{	
			//$db = new dbConnect();
		}
	public function PageName()
		{
			$filename = baseName($_SERVER['REQUEST_URI']);
			$ipos = strpos($filename, "?");
			if ( !($ipos === false) )   $filename = substr($filename, 0, $ipos);
			return $filename;
		}

	// public function filter($data){
	// 	return trim(stripslashes($data));
	// }
			
	public function LoginCookieCreate($cookie_name)
		{
				if(!isset($_COOKIE[$cookie_name])) {
				$cookie_value = "1-". $_SERVER['REMOTE_ADDR'];
				setcookie($cookie_name, $cookie_value, time() + (15 * 60), "/");
				} else {
				$authfailval = $_COOKIE[$cookie_name];
				$authfailCount = explode("-",$authfailval);
				//print_r($authfailCount);
				if($authfailCount[0]>=1)
				$cookie_value = $authfailCount[0]+1;
				$cookie_value =$cookie_value ."-". $_SERVER['REMOTE_ADDR'];
				setcookie($cookie_name, $cookie_value, time() + (15 * 60), "/");
				//	echo "Cookie '" . $cookie_name . "' is set!<br>";
				//	echo "Value is: " . $_COOKIE[$cookie_name];
				}
		}

		public function LoginCookieDestroy($cookie_name)
		{
			setcookie($cookie_name, $cookie_value, time() - (3600), "/");
			}
		public function LoginFailRedirect($cookie_name)
		{
			$authfailval = $_COOKIE[$cookie_name];
				$authfailCount = explode("-",$authfailval);
				//print($authfailCount[0]);
				if($authfailCount[0]>3)
				{
					 header("location:http://google.com");
				}
			}
			
	/*Encode*/		
	public function IDencode($id)
	{
	return base64_encode($id.'--'.mt_rand(1000,999999));
	}
	
	/*Decode*/
	public static function IDdecode($id)
	{
	$id = base64_decode($id);
	$jdid_arr = explode('--',$id);
	$id = $jdid_arr[0];
	return $id;
	}
	
	/*Check email*/
	public function validateEmail($email)
	{
 		if ( eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email) ) {
  		return true;
 		} else {
  		return false;
 		}
	}
	
	/*Rape words*/
	public function whole_word($content,$limit)
	{
 		if(strlen($content) > $limit)
			{
 				$pos=strpos($content, ' ', $limit);
				 $short_content = substr($content,0,$pos )." ...";
			}else{
  			$short_content = $content;
			}
		return $short_content;
	}
	
	/*Current page active*/
	public function currentpage($str){
			$url = explode("/",$_SERVER["PHP_SELF"]);
		if($url[count($url)-1]==$str) echo ' class="active" ';
	}
	
	/*Redirect*/
	public function redirect($url)
	{
 		if(!empty($url)){echo '<script type="text/javascript">window.location = "'.$url.'"</script>';  }
	
	}
	
	/*Redirect After Some Time*/
	public function redirecttime($url, $second)
	{
 		if(!empty($url)){echo '<script type="text/javascript">setTimeout(function () { window.location.href= "'.$url.'" },'.$second.');</script>';}
	
	}
	
	/*SlugToID*/
	public function SlugToID($tablename, $slugtoid, $idfield)
	{
		$sqlslug = mysql_query("select ".$idfield." from ".$tablename." where slug = '".$slugtoid."' and lang_code = '".lang."'");
		$rowslug = mysql_fetch_array($sqlslug);
		return $rowslug[$idfield];
	 }

	/*IDToSlug*/
	public function IDToSlug($tablename, $idtoslug, $idfield)
	{
		$sqlslug = mysql_query("select slug from ".$tablename." where ".$idfield." = '".$idtoslug."' and lang_code = '".lang."'");
		$rowslug = mysql_fetch_array($sqlslug);
		return $rowslug['slug'];
	}
	
	/*Date Formate*/
	public function date_to_display($date)
	{
		$date = str_replace("/","-", $date);
		$only_date = explode(" ", $date);
		$date = $only_date[0];
		$date = str_replace(".","-", $date);
		list($year, $month, $day) = explode("-", $date);
		// $date=$month."/".$day."/".$year;
		$date=$day."-".$month."-".$year;
		return $date;
	}
			public function datetime_to_display2($date)
	{
			return date("D M j", strtotime($date));
		
	}
	/*Date and Time Formate*/
	public function datetime_to_display($date)
	{
		//date_default_timezone_set('Asia/Karachi');
			return date("F j, Y, g:i a", strtotime($date));
	}
	
	public function date_for_user($date)
	{
		$date = date('d-m-Y',strtotime($date));
		return $date;
	}
		public function date_for_db($date)
	{
		$date = date('Y-m-d H:i:s',strtotime($date));
		return $date;
	}
		
		public function date_for_upd_db($date)
	{
		$date = date('m/d/Y',strtotime($date));
		return $date;
	}

	/*pagination*/
	public function pagination($totalNumRows, $pagename="", $start_paging=0, $limit_paging=12)
	{
		if($pagename=="")$pagename = $this->getPagename();

	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	$total_pages = $totalNumRows;
	$targetpage = $pagename;
	$srtposition = strpos($targetpage,'?');
	if($srtposition>0)
		$targetpage.='&page';
	else
		$targetpage.='?page';
	
	$limit = $limit_paging;
	/* Setup vars for query. */
	//$targetpage = "product.php"; 	//your file name  (the name of this file)
	
	//$limit = 5; 								//how many items to show per page
	 $page = (int)$_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = $start_paging;								//if no page var is given, set start to 0
	
	$pagin_limit=  " LIMIT $start, $limit" ;
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<ul class=\"pagination pagination-custom\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a class=\"pagination previous\" href=\"$targetpage=$prev\">previous</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a class=\"pagination previous\" href=\"\">previous</a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><a href=\"$targetpage=$counter\" >$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$targetpage=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"$targetpage=$counter\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage=$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href='#' > ... </a></li>";
				$pagination.= "<li><a href=\"$targetpage=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage=2\">2</a></li>";
				$pagination.= "<li><a href='#' > ... </a></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"$targetpage=$counter\">$counter</a></li></li>";
					else
						$pagination.= "<li><a href=\"$targetpage=$counter\">$counter</a></li></li>";					
				}
				$pagination.= "<li><a href='#' > ... </a></li>";
				$pagination.= "<li><a href=\"$targetpage=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage=2\">2</a></li>";
				$pagination.= "<li><a href='#' > ... </a></li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"$targetpage=$counter\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a class=\"pagination next\" href=\"$targetpage=$next\">next</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a class=\"pagination next\" href=\"\">next</a></li>";
		
		$pagination.= "</ul>\n";		
	}

	return array($pagin_limit,$pagination);
	}
		
		/*pagination Rewirght*/
		function pagination_rw($totalNumRows, $pagename="", $start_paging=0, $limit_paging=12)
{
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
//	$query = "SELECT COUNT(*) as num FROM products ORDER BY `id` ";
//	$total_pages = mysql_fetch_array(mysql_query($query));
//	$total_pages = $total_pages[num];
	$total_pages = $totalNumRows;
	$targetpage = $pagename;
//	$srtposition = strpos($targetpage,'?');
//	if($srtposition>0)
//		$targetpage.='&page';
//	else
//		$targetpage.='?page';
	$targetpage.='/page';
	$limit = $limit_paging;
	/* Setup vars for query. */
	//$targetpage = "product.php"; 	//your file name  (the name of this file)
	
	//$limit = 5; 								//how many items to show per page
	 $page = (int)$_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = $start_paging;								//if no page var is given, set start to 0
	
	$pagin_limit=  "LIMIT $start, $limit" ;
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<ul class=\"pagination pagination-custom\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a class=\"pagination previous\" href=\"$targetpage/$prev\">previous</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a class=\"pagination previous\" href=\"#\">previous</a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><a href=\"$targetpage/$counter\" class=\"current\">$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$targetpage/$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"$targetpage/$counter\" class=\"current\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage/$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href='#' > ... </a></li>";
				$pagination.= "<li><a href=\"$targetpage/$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage/$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage/1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage/2\">2</a></li>";
				$pagination.= "<li><a href='#' > ... </a></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a href=\"$targetpage/$counter\" class=\"current\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage/$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href='#' > ... </a></li>";
				$pagination.= "<li><a href=\"$targetpage/$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage/$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage/1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage/2\">2</a></li>";
				$pagination.= "<li><a href='#' > ... </a></li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a href=\"$targetpage/$counter\" class=\"current\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$targetpage/$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a class=\"pagination next\" href=\"$targetpage/$next\">next</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a class=\"pagination next\" href=\"#\">next</a></li>";
		
		$pagination.= "</ul>\n";		
	}

	return array($pagin_limit,$pagination);
	}
		
		public function slug_create($string)
{
 $text = strip_tags($string);
 $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
 $text = trim($text, '-');
 $text = strtolower($text);
 $text = preg_replace('~[^-\w]+~', '', $text);

 return $text;
}
public function attendanceUpload($date)
	{
		$fh = fopen('upload/attendance/'.$date, 'r');
$attenData=array();
while ($line = fgets($fh)) {
    $col = preg_split('/[\s]+/', trim($line));

    // Find the start of the name columns
    $name_start_index = -1;
    for ($i = 0; $i < count($col); $i++) {
        if (preg_match('/[A-Za-z]/', $col[$i])) {
            $name_start_index = $i;
            break;
        }
    }
    // $col = array("Column1Data", "Column2Data", "Column3Data","Column4Data", "Column5Data", "Column6Data"); 
    // Combine the name columns
    $name = "";
    if ($name_start_index !== -1) {
        $name = implode(" ", array_slice($col, $name_start_index));
    }

    // Output other columns and the combined name
    for ($i = 0; $i < $name_start_index; $i++) {
          echo "----" . $col[$i];
          $attenData[$i] =$col[$i];   
      }
       
      //  echo "----" . $name;
     
      $namestd=substr_replace($name ,"",-6);
       echo "----".$namestd;
      $attenData[6]=$namestd;
    $lastdigit = substr($name, -5);
    //  echo "==========".$lastdigit;
    $j=7;
    $datawithoutname=explode(' ',$lastdigit);
    foreach($datawithoutname as $data){
      $attenData[$j]=$data;
      echo "---------------".$data;
      $j++;
    }
    echo "<br>";
    //   foreach($name as $k){
    // $lastElement = end(explode("-", $k));
    // echo "-----".$lastElement;
    //   }
    print_r($attenData);


	
    echo "<br>";
}
fclose($fh);

	}


}

?>