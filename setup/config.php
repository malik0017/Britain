<?php
session_start();
date_default_timezone_set('Asia/Karachi');
include_once 'db-tables.php';
error_reporting(-1);
$cDateTime = date("Y-m-d H:i:s");

$_SESSION['$cDateTime'] = date("Y-m-d H:i:s");
$_SESSION['cDate'] = date("Y-m-d");

class config
{
    private $link;
    private $cDateTime;
    public $cDate;
    private $checkCount;

    function __construct()
    {
        $this->checkCount = 0;
        $this->cDateTime = date("Y-m-d H:i:s");
        $this->cDate = date("Y-m-d");
       // $conect_pagename = $_SESSION['checkdb'];
        require_once('config_access.php');
        $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE);
        if (!$this->link) {
            echo "Error: Unable to sconnect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        // if ($this->getMac()) {

        // } else {
        //      include "access.php";
        //      exit();
        // }

    }

    //Select all from table.
    function fetchall($table)
    {
        $sql = "select * from $table";
         // echo $sql;
        $result = mysqli_query($this->link, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_object($result)) {
            //echo $sql;
            $arr[] = $rs;
        }
        return $arr;
    }

    // select all with limit 100 records ...
    function fetchalllimit($table, $limit = 100)
    {
        $sql = "select * from $table Order by id desc limit $limit";
       
       
        $result = mysqli_query($this->link, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_object($result)) {
            // echo $sql;
            $arr[] = $rs;
        }
        return $arr;
    }

    //function for total joining at that level.
    function getotUser($table, $userid, $level)
    {
        $sql = "select count(*) as cnt from $table where refrenceid='$userid' and level='$level'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->cnt;
    }

    //function for total joining from refrence.
    function joining($table, $userid)
    {
        $sql = "select count(*) as cnt from $table where refrenceid='$userid'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->cnt;
    }

    function insertValue($table, $column, $value)
    {
        $sql = "insert into $table ($column) values($value)";
        $result = mysqli_query($this->link, $sql);
        $val = mysqli_insert_id($this->link);
        return $val;
        // echo "sadddddddddddaddddddd".$sql;
    }

    function checkAvailablity($table)
    {
        $sql = "select count(*) as cnt from $table";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->cnt;
    }

    function updateValue($table)
    {
       $sql = "update $table";
        if (mysqli_query($this->link, $sql)) {

            return true;
        } else {
            return false;
        }
    }

    function updateRecords($table, $fields, $where = '')
    {
        if ($where != '') $where = " WHERE $where";
        $query =
            mysqli_query($this->link, "UPDATE $table SET $fields" . $where) or
        die("Update Error - UPDATE $table SET $fields" . $where . " - " . mysqli_error($this->link));
//		echo "Update Error - UPDATE $table SET $fields" . $where;
        if ($query) {
            return true;
        }
        return false;
    }

    function updateme($table, $value, $where = null)
    {
        $sql = "update $table set $value $where";
        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
    }

    //getting single value
    function single($table, $column)
    {
        $sql = "select $column from $table";
       //echo"<br>---". $sql;
        
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        //return $rs->$column;
        return $rs;
    }

    function singlev($table)
    {
        $sql = "select * from $table";
        // echo"---". $sql;
        $result = mysqli_query($this->link, $sql);
        $rs= mysqli_fetch_object($result);
        return $rs;
    }

    function salerate($customer)
    {  
    
    // echo $sql="SELECT sd.item_id, sd.price FROM " . SALES_INVOICE_DETAILS . " sd INNER JOIN " . SALES_INV . " sv ON sd.invoice_id = sv.id where sv.clien_id = '".$customer."' AND sd.id IN (SELECT max(id) as rowid from " . SALES_INVOICE_DETAILS . " group by item_id)";
     $sql="SELECT sd.item_id, sd.price FROM sales_invoice_details sd where sd.id IN (SELECT max(id) as rowid from sales_invoice_details where clien_id = '".$customer."'  AND scheme != 1 group by item_id) ORDER BY `clien_id` DESC";


    $result = mysqli_query($this->link, $sql);
    $arr = array();
    while ($rs = mysqli_fetch_object($result)) {
        $arr[$rs->item_id] = $rs->price;
    }
    return $arr;




        // $result = mysqli_query($this->link, $sql);
        // $arr = array();
        // while ($rs = mysqli_fetch_object($result)) {
        //     $arr[] = $rs->item_id;
        // }
        // return $arr;
    }
    function scheme($id){
        $schemes=$this->QueryRun("SELECT * FROM " .SCHEME. " WHERE id=".$id." ");
       $schemedata=$this->QueryRun("SELECT sum(quantity) as qty FROM `sales_invoice_details` WHERE invoice_id in( SELECT invoice_no from sales_invoice WHERE date  >'".$schemes[0]->start_date."'  AND clien_id='".$schemes[0]->party_id."' )AND item_id='".$schemes[0]->product_id."'");
            
        return$schemedata[0]->qty;

    }
    function purchaserate($customer)
    {  
    
    // echo $sql="SELECT sd.item_id, sd.price FROM " . SALES_INVOICE_DETAILS . " sd INNER JOIN " . SALES_INV . " sv ON sd.invoice_id = sv.id where sv.clien_id = '".$customer."' AND sd.id IN (SELECT max(id) as rowid from " . SALES_INVOICE_DETAILS . " group by item_id)";
     $sql="SELECT pd.item_id, pd.price FROM purchase_invoice_details pd where pd.id IN (SELECT max(id) as rowid from purchase_invoice_details where clien_id = '".$customer."' group by item_id) ORDER BY `clien_id` DESC";
        echo $sql;
        

    $result = mysqli_query($this->link, $sql);
    $arr = array();
    while ($rs = mysqli_fetch_object($result)) {
        $arr[$rs->item_id] = $rs->price;
    }
    return $arr;
    }
    function orderDetails($order_id){
        
        $sql="SELECT * FROM  order_invoice where id = $order_id";
        $result = mysqli_query($this->link, $sql);
        $order = array();
        $row = mysqli_fetch_object($result);
        $order['order']=$row;
        $sql2 ="SELECT * FROM  order_invoice_details where invoice_id = $order_id";
        $result2  = mysqli_query($this->link, $sql2); 
        //$orderDetail = array();
        while ($rs2 = mysqli_fetch_object($result2)) {
           // print_r($rs2);
           $order['orderDetails'][] = $rs2;
            
            //$order[$rs->item_id] = $rs->price;
        }
        // echo $orderDtail[$order];
        // exit();
           //print_r($order); 
            
        
        return $order;
        
    }
    function getAccounts($type=''){
        if(empty($type) || $type=='all'){
        $allAaccounts = $this->QueryRun("(SELECT c.id, c.code, CONCAT(c.name, ' (', ct.city,')') as name FROM customers c INNER JOIN tbl_city ct on c.city = ct.id WHERE c.id!=1 AND c.is_deleted = 0 ORDER BY c.name ASC) UNION (Select b.id, b.code, CONCAT(b.account_name, ' ', b.account_number) FROM banks b WHERE  b.is_deleted = 0  ORDER BY b.account_name ASC)");       
        return $allAaccounts;
        }
        elseif($type=='Bank'){
            $allAaccounts = $this->QueryRun("Select b.id, b.code, CONCAT(b.account_name, ' ', b.account_number) as bank FROM banks b WHERE b.account_type=1 AND b.id!=1 AND b.is_deleted = 0");       
            return $allAaccounts; 
        }
        elseif($type=='Bank-cash'){
            $allAaccounts = $this->QueryRun("Select b.id, b.code, CONCAT(b.account_name, ' ', b.account_number) as bank FROM banks b WHERE b.account_type in (1,2) AND b.is_deleted = 0");       
            return $allAaccounts; 
        }
        elseif($type=='Party'){
            $allAaccounts = $this->QueryRun("(SELECT c.id, c.code, CONCAT(c.name, ' (', ct.city,')') as name FROM customers c INNER JOIN tbl_city ct on c.city = ct.id WHERE c.id!=1 AND c.is_deleted = 0 ORDER BY c.name ASC)");       
            return $allAaccounts; 
        }
        elseif($type=='Party-Cash'){
            $allAaccounts = $this->QueryRun("(SELECT c.id, c.code, CONCAT(c.name, ' (', ct.city,')') as name FROM customers c INNER JOIN tbl_city ct on c.city = ct.id WHERE c.id!=1 AND c.is_deleted = 0 ORDER BY c.name ASC) UNION Select b.id, b.code, CONCAT(b.account_name, ' ', b.account_number) FROM banks b WHERE b.id=1 AND b.is_deleted = 0");       
            return $allAaccounts; 
        }


    }

    function delme($table, $del, $field = 'id', $limit = NULL)
    {
       
        if (!empty($del)) {
             $sql = "delete from $table where $field='$del' $limit";
            if (mysqli_query($this->link, $sql))
                return true;
            else
                return false;
        } else
            return false;
    }

    function countme($table)
    {
        $sql = "select count(*) as cnt from $table";
        //echo "<br>".$sql;
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->cnt;
    }

    function joinme($column, $table1, $table2, $where = null)
    {
        $sql = "select $column from $table1 join $table2 $where";
        $result = mysqli_query($this->link, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_object($result)) {
            $arr[] = $rs;
        }
        return $arr;
    }

    //------------Special DB functions--------------
    public function insert($values, $table)
    {
        if (empty($values) || empty($table)) {
            // Noting to do
            return "";
        }
        $list = array();
        foreach ($values as $k => $v)
            if ($v == 'NOW()')
                $list[] = "`" . $k . "` = " . $v;
            else
                $list[] = "`" . $k . "` = '" . $v . "'";
               
        $list = implode(",", $list);
       
        $query = "INSERT INTO `" . $table . "` SET " . $list;
    //   echo $query;
    //     echo "<br>".$query;
        if (mysqli_query($this->link, $query))
            return mysqli_insert_id($this->link);
        else {
            echo mysqli_error($this->link);
            return false;
        }
    }

    public function select($fields, $table, $where = '', $orderby = '', $limit = '')
    {
        if ($where != '') $where = " WHERE $where";
        if ($orderby != '') $orderby = " ORDER BY $orderby";
        if ($limit != '') $limit = " LIMIT $limit";
    "SELECT $fields FROM $table" . $where . $orderby . $limit;
        $recordSet =
            mysqli_query($this->link,
                "SELECT $fields FROM $table" . $where . $orderby . $limit // Set the SELECT for the query
            ) or die(
            "Error - SELECT $fields FROM $table" . $where . $orderby . $limit .
            " - " . mysqli_error()
        );
        if (!$recordSet) // A quick check to see if the query failed. This is a backup to the previos die()
            return "Record Set Error";
        else
            while ($rs = mysqli_fetch_object($recordSet)) {
                $arr[] = $rs;
            }
        return $arr;
        //return $recordSet; // Return the $recordSet whether it passed or now.
    }

    public function update($table, $fields, $where = '')
    {
        if ($where != '') $where = " WHERE $where";
        $query =
            mysqli_query($this->link,
                "UPDATE $table SET $fields" . $where
            ) or die(
            "Update Error - UPDATE $table SET $fields" . $where . " - " . mysqli_error()
        );
        if ($query) {
            return true;
        }
        return false;
    }

    // This function gets the last mysql insert Id.
    public function getInsertId()
    {
        return mysqli_insert_id($this->link);
    }

    //------------New Functions by UST--------------
    public function QueryRun($sql, $prnt = '')
    {
        //  echo $sql;
        if ($prnt == 1)
            echo "<br>" . $sql;
           
        $result = mysqli_query($this->link, $sql);       
        if ($result) {
            while ($rs = mysqli_fetch_object($result)) {
                $arrray[] = $rs;
            }
            return $arrray;
        } else {
            return $arrray;
        }

    }

    //function for total joining from refrence.
    public function CountRecords($table, $where = '')
    {
        $sql = "select count(*) as cnt from $table $where";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->cnt;
    }

    public function delete($table, $where)
    {
       
        $query = mysqli_query($this->link, "DELETE FROM $table WHERE $where") or
        die("Delete Error - DELETE FROM $table WHERE $where" . " - " . mysqli_query($this->link));
       
        if ($query)
        
            return true;
        return false;
    }

    public function QueryRunArray($sql, $prnt = '')
    {
        if ($prnt == 1)
            echo "<br>" . $sql;
        $result = mysqli_query($this->link, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_object($result)) {
            $arr[] = $rs;
        }
        return $arr;
    }

    public function QueryRunsimple($sql, $prnt = '')
    {
        if ($prnt == 1)
            echo "<br>" . $sql;
        $result = mysqli_query($this->link, $sql);
        return $result;
    }

    /*User Registration check email*/
    public function user_reg_ch_email($user_email, $uid = '')
    {
        $sql = "SELECT email FROM " . USER . " WHERE email = '" . $user_email . "'";
        $result = mysqli_query($this->link, $sql);
        $rows = $result->num_rows;
        if ($rows > 0)
            return false;
        else
            return true;
    }

    /*User Registration check username*/
    public function user_reg_ch_username($username, $uid = '')
    {
        $sql = "SELECT username FROM " . USER . " WHERE username = '" . $username . "'";
        $result = mysqli_query($this->link, $sql);
        $rows = $result->num_rows;
        if ($rows > 0)
            return false;
        else
            return true;
    }

    /*Admin Registration check email*/
    public function admin_reg_ch_email($admin_email, $uid = '')
    {
        $sql = "SELECT email FROM " . MANAGER . " WHERE email = '" . $admin_email . "'";
        $result = mysqli_query($this->link, $sql);
        $rows = $result->num_rows;
        if ($rows > 0)
            return false;
        else
            return true;
    }

    /*Admin Registration check username*/
    public function admin_reg_ch_username($username, $uid = '')
    {
        $sql = "SELECT login FROM " . MANAGER . " WHERE login = '" . $username . "'";
        $result = mysqli_query($this->link, $sql);
        $rows = $result->num_rows;
        if ($rows > 0)
            return false;
        else
            return true;
    }

    /*Staff Registration check email*/
    public function staff_reg_ch_email($user_email, $uid = '')
    {
        $sql = "SELECT email FROM " . USER . " WHERE email = '" . $user_email . "'";
        $result = mysqli_query($this->link, $sql);
        $rows = $result->num_rows;
        if ($rows > 0)
            return false;
        else
            return true;
    }

    /*Staff Registration check username*/
    public function staff_reg_ch_username($username, $uid = '')
    {
        $sql = "SELECT username FROM " . MANAGER . " WHERE login = '" . $username . "'";
        $result = mysqli_query($this->link, $sql);
        $rows = $result->num_rows;
        if ($rows > 0)
            return false;
        else
            return true;
    }

    /*Un-set post*/
    public function unset_post()
    {
        foreach ($_POST as $k => $v) {
            unset($_POST[$k]);
        }
    }

    /*SMTP*/
    public static function SendSMTP_admin($from_name, $from_address, $to_name, $to_address, $subject_admin, $message_admin)
    {
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "X-MSMail-Priority: Normal\n";
        $headers .= "X-Mailer: php\n";
        $headers .= "From: \"" . $from_name . "\" <" . $from_address . ">\n";
        return mail($to_address, $subject_admin, $message_admin, $headers);
    }

    /*Email Conformation*/
    public function account_verified($id)
    {
        $sql = "SELECT * FROM " . USER . " WHERE id = '" . $id . "'";
        $results = mysqli_query($this->link, $sql);
        $user_data = mysqli_fetch_object($results);
        $no_rows = $results->num_rows;
        if ($no_rows == 1) {
            //, `account_info_status`='active'
            $fields = "`status`='active'";
            $sql_update = "update " . USER . " set " . $fields . " where id = '" . $id . "'";
            mysqli_query($this->link, $sql_update) or die(mysqli_error());
            return true;
        } else {
            return false;
        }
    }

    /*User Login*/
    public function user_Login($username, $password)
    {
        $sql = "SELECT * FROM " . USER . " WHERE user_password = '" . md5($password) . "' AND username = '" . $username . "' ";
        $results = mysqli_query($this->link, $sql);
        $user_data = mysqli_fetch_object($results);
        $no_rows = $results->num_rows;
        if ($no_rows > 0) {
            if ($user_data->status == 'de-active') {
                return "de-active";
                $this->unset_post();
            }
            $ip = addslashes($_SERVER['SERVER_ADDR']);
            $data_post = array('user_id' => $user_data->id, 'login_time' => 'NOW()', 'ip' => $ip);
            $recodes = $this->insert($data_post, USER_LOGS);
            $_SESSION['login'] = true;
            $_SESSION['reg_id'] = $user_data->id;
            $_SESSION['username'] = $user_data->username;
            return true;
            $this->RedirectUser();
        } else {
            return false;
            $this->unset_post();
        }
    }

    //image upload size and format check
    public function image_upload_check($filename)
    {
        $maxsize = 2097152; //1048576;//1097152;
        $format = array('image/jpg', 'image/jpeg', 'image/png');
        if ($_FILES[$filename]['size'] >= $maxsize) {
            return 'File Size too large upload limit only 2 MB';
        } elseif ($_FILES[$filename]['size'] == 0) {
            return 'Invalid File';
        } elseif (!in_array($_FILES[$filename]['type'], $format)) {
            return 'Format Not Supported Only .jpeg files are accepted ' . $_FILES[$filename]['type'];
        } else {
            return "OK";
        }
    }

    /*Check User Session*/
    public function SessionCheck()
    {
        if ($_SESSION['login'] == true and isset($_SESSION['reg_id']))
            return true;
        else
            return false;
    }

    /*Check User suspended or not*/
    public function Check_account_info_status()
    {
        $table_fetch = USER . " where id='" . $_SESSION['reg_id'] . "'";
        $row = $this->singlev($table_fetch);
        if ($row->account_info_status == "suspended")
            return true;
        else
            return false;
    }

    /*Get site settings*/
    public function site_settings()
    {
        $sqlset = "SELECT * FROM " . SITE_SETTINGS . " WHERE id = '1'";
        $results_set = mysqli_query($this->link, $sqlset);
        $get_setting = mysqli_fetch_object($results_set);
        $rows_set = $results_set->num_rows;
        if ($rows_set == 1) {
            define("SITE_NAME", $get_setting->site_name);
            define("SITE_TAGLINE", $get_setting->site_tagline);
            define("SITE_URL", $get_setting->site_url);
            define("SITE_EMAIL", $get_setting->site_email);
            define("SITE_PHONE", $get_setting->site_phone);
            define("SITE_SKYPE", $get_setting->site_skype);
            define("SITE_ADDRESS", $get_setting->site_address);
            define("SITE_COPY_RIGHTS", $get_setting->site_copyrights);
            define("SITE_LOGO", $get_setting->site_logo);
            define('SITE_FAVICON', $get_setting->site_favicon);
            define("SITE_HEADER_CODE", $get_setting->site_header_code);
            define("SITE_FOOTER_CODE", $get_setting->site_footer_code);
           // define( "SET_DATE",  $_SESSION['user_system_date'] );
          
        } else {
            define("SITE_FAVICON", "");
        }
    }

    /*Session*/
    public function session()
    {
        if (isset($_SESSION['MngLogin'])) {
            return $_SESSION['MngLogin'];
        } else {
            return false;
        }
    }

    public function AdminSession()
    {
        if (isset($_SESSION['MngLogin'])) {
            return $_SESSION['MngLogin'];
        } else {
            return false;
        }
    }

    /*Logout*/
    public function logout()
    {
        unset($_SESSION['MngLogin']);
        unset($_SESSION['login']);
        session_destroy();
        return true;
    }

    /*User Registration*/
    public function insert_user_reg($data_post)
    {
        $full_name = $data_post['full_name'];
        $username = $data_post['username'];
        $user_password = $data_post['user_password'];
        $sql = "INSERT INTO " . MANAGER . " (full_name, username, user_password, registeration_date) values('" . $full_name . "','" . $username . "','" . $user_password . "',NOW())";
        $result = mysqli_query($this->link, $sql);
        return true;
    }

    /*froget password*/
    public function frogetpassword($email)
    {
        $sql = "SELECT * FROM " . USER . " WHERE email = '" . $email . "'";
        $results = mysqli_query($this->link, $sql);
        $user_data = mysqli_fetch_object($results);
        $no_rows = $results->num_rows;
        if ($no_rows == 1) {
            $fields = "`p_request`='active',`p_req_date`=NOW()";
            $sql_update = "update " . USER . " set " . $fields . " where email = '" . $email . "'";
            mysqli_query($this->link, $sql_update) or die(mysqli_error());
            $id = $user_data->id;
            $password = $a_rand;
            $newemail = $user_data->email;
            $username = $user_data->full_name;
            $prid = base64_encode($id . '--' . mt_rand(100000, 999999));
            $from_name = "Quality Foods � Password Update";
            $from_address = "web@qfoods.com.au";
            $to_name = $username;
            $to_address = $newemail; //	ADMIN MAIL ADDRESS IS REQUIRED...!
            $subject_admin = "Account Recovery";
            $message_admin = "
		<table cellpadding='5' cellspacing='5'>
			<tr>
				<td colspan='100%' align='center'><h3>Password Change Request</h3></td>
			</tr>
			<tr>
				<td>For changing your password </td>
				<td><a href='http://www.fyi.net.au/changepassword.php?jd=" . $prid . "'>Click Here</a></td>
			</tr>
		</table>";
            $this->SendSMTP_admin($from_name, $from_address, $to_name, $to_address, $subject_admin, $message_admin);
            return true;
        } else {
            return FALSE;
        }
    }

    /*Update password*/
    public function updatepassword($password, $id)
    {
        $sql = "SELECT * FROM " . USER . " WHERE id = '" . $id . "' and p_request='active' and p_req_date > NOW() - INTERVAL 1 HOUR";
        $results = mysqli_query($this->link, $sql);
        $user_data = mysqli_fetch_object($results);
        $no_rows = $results->num_rows;
        if ($no_rows == 1) {
            $password = md5($password);
            $fields = "`user_password`='$password',`p_request`='de-active'";
            $sql_u = "update " . USER . " set $fields where id='" . $id . "'";
            mysqli_query($this->link, $sql_u) or die(mysqli_error());
            return true;
        } else {
            return false;
        }
    }

    /*Update old password*/
    public function update_old_password($old_password, $user_password, $id)
    {
        $sql = "SELECT * FROM " . USER . " WHERE id = '" . $id . "' and user_password='" . $old_password . "'";
        $results = mysqli_query($this->link, $sql);
        $user_data = mysqli_fetch_object($results);
        $no_rows = $results->num_rows;
        if ($no_rows == 1) {
            $sql_u = "update " . USER . " set `user_password`='" . $user_password . "' where id='" . $id . "'";
            mysqli_query($this->link, $sql_u) or die(mysqli_error());
            return true;
        } else {
            return false;
        }
    }

    /* Redirect User */
    public function RedirectUser()
    {
        General::redirect("dashboard");
    }

    /* Redirect User */
    public function PinVerify($uid, $pin)
    {
        $table_fetch = USER . " where user_id='" . $uid . "'";
        $chk_pin = $this->single($table_fetch, pin_no);
        if ($chk_pin->pin_no != hash('ripemd160', $pin))
            return false;
        else
            return true;
    }

    /* Slug*/
    public function slug_create($string)
    {
        $text = strip_tags($string);
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        return $text;
    }

    function SlugToID($tablename, $slugtoid, $idfield)
    {
        $sql = "select " . $idfield . " from " . $tablename . " where slug = '" . $slugtoid . "'";
        $result = mysqli_query($this->link, $sql);
        $rowslug = mysqli_fetch_array($result);
        return $rowslug[$idfield];
    }

    function IDToSlug($tablename, $idtoslug, $idfield)
    {
        $sqlslug = "select slug from " . $tablename . " where " . $idfield . " = '" . $idtoslug . "'";
        $result = mysqli_query($this->link, $sqlslug);
        $rowslug = mysqli_fetch_array($result);
        return $rowslug['slug'];
    }

    function get_max($tablename, $get_colom, $get_max_id)
    {
        $max_id = $this->single($tablename . " where id = (select MAX($get_max_id) as max_id from " . $tablename . ")", "'.$get_colom.'");

        return $max_id->max_id;
    }

    function product_stock($product_id)
    {
        $pstock = $this->single(STOCK_HISTORY . " where stock_id = (select MAX(stock_id) as max_id from " . STOCK_HISTORY . " where cache=0  AND product_id = " . $product_id . ")", "total_Stock_qty");

        return $pstock->total_Stock_qty;
    }

    function current_product_stock($qty_zero = 0)
    {

        $sql = "SELECT stock_id, `product_id`, `total_Stock_qty` FROM " . STOCK_HISTORY . " WHERE `stock_id` IN (SELECT MAX(stock_id) FROM " . STOCK_HISTORY . " WHERE `cache`=0 GROUP BY product_id )";
        if ($qty_zero == 0) {
            $sql .= " AND total_Stock_qty>0";
        }

        $result = mysqli_query($this->link, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_object($result)) {
            $arr[$rs->product_id] = $rs->total_Stock_qty;
        }
        return $arr;
    }


    function get_max_in_stock($tablename, $get_colom, $get_max_id, $product_id)
    {
        $max_id = $this->single($tablename . " where stock_id = (select MAX(stock_id) as max_id from " . $tablename . " where product_id = " . $product_id . ")", $get_colom);

        return $max_id->stock_id;
    }


    function pcode_to_id($code)
    {
        $sql = "select id from " . ITEMS . " WHERE item_code='$code'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->id;
    }

    public function CustomerFunds($des, $usd, $uid, $crdb, $invoiceID = 0, $type = 1)
    {
        $previous_balance = 0;
        $parent_id = 0;
        $current_blance = 0;
        $pbalance_type = '';
//		if ( $crdb == 'db' ) {
//			$usd = -1 * $usd;
//		}
        $where = " id = (SELECT MAX(id) from " . CUSTOMER_FUNDS . " where customer_id = '" . $uid . "')";
        $preRecord = $this->singlev(CUSTOMER_FUNDS . " WHERE " . $where);
        if (count((array)$preRecord) > 0) {
            $previous_balance = $preRecord->current_balance;
            $pbalance_type = $preRecord->cbalance_type;
            $parent_id = $preRecord->id;

//			echo "<br> previous balance ".$preRecord->current_balance; 
//			echo "<br> current amount ".$usd; 
//			echo "<br> previous type ".$preRecord->cbalance_type; 
//			echo "<br> current type ".$crdb; 

            if ($preRecord->cbalance_type == 'cr' && $crdb == 'cr') {
                $current_blance = $preRecord->current_balance + $usd;
                $cbalance_type = 'cr';
            } elseif ($preRecord->cbalance_type == 'db' && $crdb == 'cr') {
                $current_blance = $usd - $preRecord->current_balance;

            } elseif ($preRecord->cbalance_type == 'cr' && $crdb == 'db') {
                $current_blance = $preRecord->current_balance - $usd;

            } elseif ($preRecord->cbalance_type == 'db' && $crdb == 'db') {
                $current_blance = -($preRecord->current_balance + $usd);
            }


            if ($current_blance < 0) {
                $cbalance_type = 'db';
                $current_blance = -1 * $current_blance;
            } else
                $cbalance_type = 'cr';

            if ($usd < 0)
                $usd = -1 * $usd;

        } else {
            if ($usd < 0)
                $usd = -1 * $usd;

            $current_blance = $usd;
            $cbalance_type = $crdb;
        }
        if (empty($pbalance_type)) {
            $pbalance_type = 'cr';
        }
        $data_post = array("reference_type" => $type, 'Description' => $des, 't_amount' => $usd, 'customer_id' => $uid, 'parent_id' => $parent_id, 'previous_balance' => $previous_balance, 'pbalance_type' => $pbalance_type, 'current_balance' => $current_blance, 't_type' => $crdb, 'cbalance_type' => $cbalance_type, 't_datetime' => $_SESSION['$cDateTime'], 'invoice_id' => $invoiceID);
        $recodes = $this->insert($data_post, CUSTOMER_FUNDS);
     
        return $recodes;
    }

    public function CustomerBalance($uid)
    {
        $where = " id = (SELECT MAX(id) from " . CUSTOMER_FUNDS . " where customer_id = '" . $uid . "')";
        $preRecord = $this->singlev(CUSTOMER_FUNDS . " WHERE " . $where);
        $balance = $preRecord->current_balance;
        if (empty($balance))
            return 0;
        if ($preRecord->cbalance_type == 'db')
            $balance = -1 * $balance;
        return $balance;
    }
    public function AdditionAccountBalance($uid)
    {
        $where = " id = (SELECT MAX(id) from " . ADDITIONAL_ACCOUNT_FUNDS . " where customer_id = '" . $uid . "')";
        $preRecord = $this->singlev(ADDITIONAL_ACCOUNT_FUNDS . " WHERE " . $where);
        $balance = $preRecord->current_balance;
        if (empty($balance))
            return 0;
        if ($preRecord->cbalance_type == 'db')
            $balance = -1 * $balance;
        return $balance;
    }
    public function AllAccountsBalance($acode, $aid=0)
    {
        
        
        if($aid==0)
        $aid =  $this->AccountCodeToID($acode);

        $table = $this->AccountCodeToTableName($acode, 'Funds');

        if($table!=''){
          $balance = $this->currentBalance($table, $aid);
          return $balance;
        }
        else{
            return false;
        }
    } 
    
    
	public function SystemDefaults($val){
		if($val=='CashAccount') return 1001;
        if($val=='CashAccountID') return 1;
		
	}


    public function AccountCodeToID($acode){
        $table = $this->AccountCodeToTableName($acode);

        if(!empty($table)){
            $record = $this->single($table ." WHERE code = '".$acode."'", "id");
            $AccountID = $record->id;
            return $AccountID;
        }
        else
            return false;
    }

    public function IDtoAccountCode($table, $id){

            $record = $this->single($table ." WHERE id = '".$id."'", "code");
            $Account_code = $record->code;
            return $Account_code;
    }

    public function AccountCodeToTableName($acode, $funds=''){
        $starting_number = substr($acode, 0, 1);
        if($starting_number == 1){$table = BANKS; $funds_table = ACCOUNT_FUNDS;}
        if($starting_number == 2){$table = CUSTOMERS; $funds_table = CUSTOMER_FUNDS; }
        if($starting_number == 3){$table = ASSET; $funds_table = ASSET_FUNDS; }
        if($starting_number == 4){$table = ""; }
        if($starting_number == 5){$table = ""; }
        if($starting_number == 6){$table = ""; }
        if($funds!=''){
            return $funds_table;
          }
          else{
              return $table;
          }
        }


    public function labourerate($uid)
    { 
        $labour_rate = $this->single(LAbOUR_REG . " where id=$uid", "rate");
        return $labour_rate->rate;
        // $sql ="SELECT * from " . LAbOUR_REG . " where id = '" . $uid . "'";
        // $result = mysqli_query($this->link, $sql);
        // $rs = mysqli_fetch_object($result) ;
        // return $rs;
    }

    public function department($uid)
    {
      $sql ="SELECT * from " . DEPARTMENTS . " where id = '" . $uid . "'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result) ;

         return $rs->dept_name;
    }

    public function CustomerName($uid)
    {
         $sql ="SELECT * from " . CUSTOMERS . " where id = '" . $uid . "'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result) ;
         return $rs->name;
    }
    public function BankName($uid)
    {
         $sql ="SELECT account_name,account_number from " . BANKS . " where id = '" . $uid . "'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result) ;
         return $rs->account_name." ".$rs->account_number ;
    }

    public function VendorFunds($des, $usd, $uid, $crdb, $invoiceID = '')
    {
        $previous_balance = 0;
        $parent_id = 0;
        $current_blance = 0;
        $pbalance_type = '';
//		if ( $crdb == 'db' ) {
//			$usd = -1 * $usd;
//		}
        $where = " id = (SELECT MAX(id) from " . VENDOR_FUNDS . " where customer_id = '" . $uid . "')";
        $preRecord = $this->singlev(VENDOR_FUNDS . " WHERE " . $where);
        if (count($preRecord) > 0) {
            $previous_balance = $preRecord->current_balance;
            $pbalance_type = $preRecord->cbalance_type;
            $parent_id = $preRecord->id;

//			echo "<br> previous balance ".$preRecord->current_balance; 
//			echo "<br> current amount ".$usd; 
//			echo "<br> previous type ".$preRecord->cbalance_type; 
//			echo "<br> current type ".$crdb; 

            if ($preRecord->cbalance_type == 'cr' and $crdb == 'cr') {
                $current_blance = $preRecord->current_balance + $usd;
                $cbalance_type = 'cr';
            } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'cr') {
                $current_blance = $usd - $preRecord->current_balance;

            } elseif ($preRecord->cbalance_type == 'cr' and $crdb == 'db') {
                $current_blance = $preRecord->current_balance - $usd;

            } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'db') {
                $current_blance = -($preRecord->current_balance + $usd);
            }

            if ($current_blance < 0) {
                $cbalance_type = 'db';
                $current_blance = -1 * $current_blance;
            } else
                $cbalance_type = 'cr';

            if ($usd < 0)
                $usd = -1 * $usd;

        } else {
            if ($usd < 0)
                $usd = -1 * $usd;

            $current_blance = $usd;
            $cbalance_type = $crdb;
        }

        $data_post = array('Description' => $des, 't_amount' => $usd, 'customer_id' => $uid, 'parent_id' => $parent_id, 'previous_balance' => $previous_balance, 'pbalance_type' => $pbalance_type, 'current_balance' => $current_blance, 't_type' => $crdb, 'cbalance_type' => $cbalance_type, 't_datetime' => $_SESSION['$cDateTime'], 'invoice_id' => $invoiceID);
        $recodes = $this->insert($data_post, VENDOR_FUNDS);
    }

    public function VendorBalance($uid)
    {
        $where = " id = (SELECT MAX(id) from " . VENDOR_FUNDS . " where customer_id = '" . $uid . "')";
        $preRecord = $this->singlev(VENDOR_FUNDS . " WHERE " . $where);
        $balance = $preRecord->current_balance;
        if (empty($balance))
            return 0;
        if ($preRecord->cbalance_type == 'db')
            $balance = -1 * $balance;
        return $balance;
    }

    public function DailySale($date)
    {
        $sql = " SELECT Sum(invoice_total) AS total_sale from " . SALES_INV . " where date Like '" . $date . "%'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        if ($rs->total_sale == "")
            return 0;
        else
            return $rs->total_sale;
    }

    public function sumofdates($field, $date_to, $date_from, $table)
    {
        $sql = " SELECT Sum($field) AS sum_total_sale from " . $table . " where date between '$date_to' AND '$date_from'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        if ($rs->sum_total_sale == "")
            return 0;
        else
            return $rs->sum_total_sale;
    }


    public function sumofitems($field, $date_to, $date_from, $table, $table2, $product_id)
    {
        $sql = "SELECT Sum($field) AS sum_total_items from " . $table . " as si INNER JOIN " . $table2 . " as sid ON si.id = sid.invoice_id WHERE si.date between '$date_to' AND '$date_from' AND sid.item_code = $product_id";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        if ($rs->sum_total_items == "")
            return 0;
        else
            return $rs->sum_total_items;
    }

    public function sumofclients($field, $date_to, $date_from, $table, $client_id)
    {
        $sql = " SELECT Sum($field) AS sum_total_client from " . $table . " where date between '$date_to' AND '$date_from' AND clien_id = $client_id";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        if ($rs->sum_total_client == "")
            return 0;
        else
            return $rs->sum_total_client;
    }
    public function sumofclientsitem($field, $date_to, $date_from, $table,$table2, $client_id, $product_id)
    {
       $sql = "SELECT Sum($field) AS sum_total_items from " . $table . " as si INNER JOIN " . $table2 . " as sid ON si.id = sid.invoice_id WHERE si.date between '$date_to' AND '$date_from' AND sid.item_code = $product_id AND si.clien_id=$client_id ";
       
       
       
       
       
       
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        if ($rs->sum_total_items == "")
            return 0;
        else
            return $rs->sum_total_items;
    }


    public function DailyCash($date)
    {
        $sql = " SELECT Sum(amount_paid) AS total_cash from " . SALES_INV . " where date Like '" . $date . "%'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        if ($rs->total_cash == "")
            return 0;
        else
            return $rs->total_cash;
    }

    public function DailyExpense($date)
    {
        $sql = " SELECT Sum(total) AS total_expense from " . EXPENSE_HEAD . " where date Like '" . $date . "%'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        if ($rs->total_expense == "")
            return 0;
        else
            return $rs->total_expense;
    }


//
    public function getPurchasePrice($id)
    {
        $stock = $this->product_stock($id);
        $purchaseQtyRows = array();
        $purchaseQty = 0;
        $sql = "SELECT B.* FROM " . PURCHASE_INV . " A INNER JOIN " . PURCHASE_INV_DETAILS . " B ON A.id=B.invoice_id where item_id = $id order by id DESC";
//        echo $sql;
//        $getPurchaseDetails = $this->select("*", PURCHASE_INV_DETAILS, "item_id=$id ", "id DESC");
        $getPurchaseDetails = $this->QueryRun($sql);
        $remainingStock = array();
        foreach ($getPurchaseDetails as $purchaseRow) {
            if ($stock > $purchaseRow->quantity) {
                $purchaseQty += $purchaseRow->quantity;
                $stock -= $purchaseRow->quantity;
                $purchaseQtyRows[] = $purchaseRow;

            } else {
                $purchaseQty += $stock;
                $remainingStock['qty'] = $stock;
                $remainingStock['pr'] = $purchaseRow->price;
                $purchaseRow->quantity = $stock;
                $stock -= $purchaseQty;
                $purchaseQtyRows[] = $purchaseRow;
            }
            if ($stock <= 0) {
                break;
            }
        }
        $avgPurchasePrice = 0;
        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($purchaseQtyRows as $p) {
            $priceSig = 0;
            $totalQuantity += $p->quantity;
            $priceSig = $p->price * $p->quantity;
            $totalPrice += $priceSig;
        }
        if ($totalQuantity > 0) {
            $avgPurchasePrice = $totalPrice / $totalQuantity;
        } else {
            $avgPurchasePrice = NULL;
        }

        if ($avgPurchasePrice == "" || $avgPurchasePrice == NULL || $avgPurchasePrice == 0) {
            $itemPrice = $this->single(ITEMS . " where id=$id", "purchase_amt");
            $avgPurchasePrice = $itemPrice->purchase_amt;
//            print_r($avgPurchasePrice);
            //            echo "here";
        }
//        echo $avgPurchasePrice;
        return $avgPurchasePrice;
    }


    public function expiredStock($id)
    {
        $stock = $this->product_stock($id);
        $sql = "SELECT * FROM " . PURCHASE_INV_DETAILS . " where item_id = $id AND exp_date < '" . date('Y-m-d') . "'  AND exp_date != '0000-00-00' order by id DESC";
        $purchaseInvoices = $this->QueryRun($sql);
        $productExpiredQty = 0;
        $items = array();
        foreach ($purchaseInvoices as $purchaseInvoice) {
            if ($stock > 0) {
                $productExpiredQty += $purchaseInvoice->quantity;
                $stock -= $purchaseInvoice->quantity;
            } else {
                break;
            }
        }
        return $productExpiredQty;
    }


    function customer_type()
    {
        $res = $this->fetchall(CUSTOMER_TYPE);
        $arr = array();
        foreach ($res as $rs) {
            $arr[$rs->code] = $rs->type;
        }
        return $arr;

    }

    function account_type()
    {
        $res = $this->fetchall(ACCOUNT_TYPE);
        $arr = array();
        foreach ($res as $rs) {
            $arr[$rs->id] = $rs->type;
        }
        return $arr;

    }

    function stock_type()
    {
        $res = $this->fetchall(STOCK_TYPE);
        $arr = array();
        foreach ($res as $rs) {
            $arr[$rs->id] = $rs->type_name;
        }
        return $arr;

    }

    function items_name()
    {
        $res = $this->fetchall(ITEMS . " where is_deleted=0");
        $arr = array();
        foreach ($res as $rs) {
            $arr[$rs->id] = $rs->name;
        }
        return $arr;

    }


    public function currentBalance($table, $uid)
    {

        $where = " id = (SELECT MAX(id) from " . $table . " where customer_id = '" . $uid . "')";

        $preRecord = $this->singlev($table . " WHERE " . $where);

        $balance = $preRecord->current_balance;

        if (empty($balance))

            return 0;

        if ($preRecord->cbalance_type == 'db')

            $balance = -1 * $balance;

        return $balance;

    }

    public function FundsEntry($table, $des, $usd, $uid, $crdb, $invoiceID = 0, $type = 1, $date = '', $vno = '')
    {
        if ($date == '')
            $date = $this->cDateTime;
        $previous_balance = 0;

        $parent_id = 0;

        $current_blance = 0;

        $pbalance_type = '';

//		if ( $crdb == 'db' ) {

//			$usd = -1 * $usd;

//		}

        $where = " id = (SELECT MAX(id) from " . $table . " where customer_id = '" . $uid . "')";

        $preRecord = $this->singlev($table . " WHERE " . $where);

        if (count((array)$preRecord) > 0) {

            $previous_balance = $preRecord->current_balance;

            $pbalance_type = $preRecord->cbalance_type;

            $parent_id = $preRecord->id;


//			echo "<br> previous balance ".$preRecord->current_balance;

//			echo "<br> current amount ".$usd;

//			echo "<br> previous type ".$preRecord->cbalance_type;

//			echo "<br> current type ".$crdb;


            if ($preRecord->cbalance_type == 'cr' and $crdb == 'cr') {

                $current_blance = $preRecord->current_balance + $usd;

                $cbalance_type = 'cr';

            } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'cr') {

                $current_blance = $usd - $preRecord->current_balance;


            } elseif ($preRecord->cbalance_type == 'cr' and $crdb == 'db') {

                $current_blance = $preRecord->current_balance - $usd;


            } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'db') {

                $current_blance = -($preRecord->current_balance + $usd);

            }


            if ($current_blance < 0) {

                $cbalance_type = 'db';

                $current_blance = -1 * $current_blance;

            } else

                $cbalance_type = 'cr';


            if ($usd < 0)

                $usd = -1 * $usd;


        } else {

            if ($usd < 0)

                $usd = -1 * $usd;


            $current_blance = $usd;

            $cbalance_type = $crdb;

        }
        if (empty($pbalance_type)) {
            $pbalance_type = 'cr';
        }




        $data_post = array('voucher_no' => $vno, 'reference_type' => $type, 'Description' => $des, 't_amount' => $usd, 'customer_id' => $uid, 'parent_id' => $parent_id, 'previous_balance' => $previous_balance, 'pbalance_type' => $pbalance_type, 'current_balance' => $current_blance, 't_type' => $crdb, 'cbalance_type' => $cbalance_type, 't_datetime' => $date, 'invoice_id' => $invoiceID);
//        print_r($data_post);
        $recodes = $this->insert($data_post, $table);
//        echo $recodes;
        if ($recodes) {
            return $recodes;
//            echo $recodes;
        } else {
            return false;
        }
    }


    public function VoucherNo()
    { 
        $vno = $this->single(VOUCHERNO . " where id=1", 'voucher_no');
        $voucher_no = $vno->voucher_no;
        $new_voucher_no = $voucher_no+1;

        $sql = "update " . VOUCHERNO . " set voucher_no= '".$new_voucher_no."' where id = 1";
        mysqli_query($this->link, $sql);
        return $new_voucher_no;  

    }

    function VoucherNoToid($table, $vno, $type='')
    {
          $sql = "select id from " . $table . " WHERE voucher_no='$vno'";
          if(!empty($type)){
            $sql = "select id from " . $table . " WHERE voucher_no='$vno'  AND t_type = '$type'";  
          }
        //echo "<br> VoucherNoToid = ". $sql;
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->id;
    }

    function idToVoucherNo($table, $id)
    {
        $sql = "select voucher_no from " . $table . " WHERE id='$id'";
        // echo "<br> idToVoucherNo = ". $sql;
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result);
        return $rs->voucher_no;
    }

    public function AccountBalance($uid)
    {

        $where = " id = (SELECT MAX(id) from " . ACCOUNT_FUNDS . " where customer_id = '" . $uid . "')";

        $preRecord = $this->singlev(ACCOUNT_FUNDS . " WHERE " . $where);

        $balance = $preRecord->current_balance;

        if (empty($balance))

            return 0;

        if ($preRecord->cbalance_type == 'db')

            $balance = -1 * $balance;

        return $balance;

    }


    public function FundsUpdate($id, $table, $des, $usd, $crdb, $invoiceID = 0, $type = 1)
    {
         $editRecord = $this->singlev($table . " WHERE  id = '" . $id . "'" );
         $customer_id = $editRecord->customer_id;
         $parent_id = $editRecord->parent_id;
         $voucher_no = $editRecord->voucher_no;

        // $this->updateNextRows($table, $id);

        $sql = "select * from ".$table." WHERE  id = '".$id."' AND customer_id = '".$customer_id."'";
//echo "<br>".$sql;
         $nextrows = mysqli_query($this->link, $sql);
         while ($nrows = mysqli_fetch_object($nextrows))
         {
             $rowid = $nrows->id;
             $usd = $usd;
             $crdb = $crdb;
             $des = $des;
             
 
         $preRecord = $this->singlev($table . " WHERE  id = '" . $parent_id . "'" );
         $previous_balance = $preRecord->current_balance;
         $pbalance_type = $preRecord->cbalance_type;
 
         
         if ($preRecord->cbalance_type == 'cr' and $crdb == 'cr') {
             $current_blance = $preRecord->current_balance + $usd;
             $cbalance_type = 'cr';
 
         } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'cr') {
             $current_blance = $usd - $preRecord->current_balance;
         } elseif ($preRecord->cbalance_type == 'cr' and $crdb == 'db') {
             $current_blance = $preRecord->current_balance - $usd;
         } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'db') {
             $current_blance = -($preRecord->current_balance + $usd);
         }
 
         if ($current_blance < 0) {
             $cbalance_type = 'db';
             $current_blance = -1 * $current_blance;
         } else
             $cbalance_type = 'cr';
 
         if ($usd < 0)
             $usd = -1 * $usd;
 
             
 
         $updatesql = "UPDATE ".$table." SET t_amount = '".$usd."', parent_id = '".$parent_id."', previous_balance = '".$previous_balance."', pbalance_type = '".$pbalance_type."', current_balance = '".$current_blance."', t_type = '".$crdb."', cbalance_type = '".$cbalance_type."', invoice_id = '".$invoiceID."',  Description = '".$des."', update_date = '".$_SESSION['$cDateTime']."'  WHERE  id = '".$rowid."' AND customer_id = '".$customer_id."'";
           //  echo "<br>===".$updatesql;
             mysqli_query($this->link, $updatesql);
  
             $parent_id = $rowid;// loop next itration parent_id
         
         }// loop end

         $this->updateNextRows($table, $id,$customer_id, $parent_id);

        return true;
    }    

    public function FundsDelete($table, $id)
    {
        $delRecord = $this->singlev($table . " WHERE  id = '" . $id . "'" );
        $customer_id = $delRecord->customer_id;
        $parent_id = $delRecord->parent_id;
        $voucher_no = $delRecord->voucher_no;
        
        $this->updateNextRows($table, $id, $customer_id, $parent_id);

        // After all rows update, delete the row.
        $this->delme( $table, $id, "id" );  

        return true;
    }

    public function updateNextRows($table, $id, $customer_id, $parent_id)
    {
             
        $sql = "select * from ".$table." WHERE  id > '".$id."' AND customer_id = '".$customer_id."'";
       // echo "<br>".$sql;
        $nextrows = mysqli_query($this->link, $sql);
       // $arr = array();
        while ($nrows = mysqli_fetch_object($nextrows))
        {
            $rowid = $nrows->id;
            $usd = $nrows->t_amount;
            $crdb = $nrows->t_type;
            

        $preRecord = $this->singlev($table . " WHERE  id = '" . $parent_id . "'" );
        $previous_balance = $preRecord->current_balance;
        $pbalance_type = $preRecord->cbalance_type;

        
        if ($preRecord->cbalance_type == 'cr' and $crdb == 'cr') {
            $current_blance = $preRecord->current_balance + $usd;
            $cbalance_type = 'cr';

        } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'cr') {
            $current_blance = $usd - $preRecord->current_balance;
        } elseif ($preRecord->cbalance_type == 'cr' and $crdb == 'db') {
            $current_blance = $preRecord->current_balance - $usd;
        } elseif ($preRecord->cbalance_type == 'db' and $crdb == 'db') {
            $current_blance = -($preRecord->current_balance + $usd);
        }

        if ($current_blance < 0) {
            $cbalance_type = 'db';
            $current_blance = -1 * $current_blance;
        } else
            $cbalance_type = 'cr';

        if ($usd < 0)
            $usd = -1 * $usd;

            

            $updatesql = "UPDATE ".$table." SET parent_id = '".$parent_id."', previous_balance = '".$previous_balance."', pbalance_type = '".$pbalance_type."', current_balance = '".$current_blance."', t_type = '".$crdb."', cbalance_type = '".$cbalance_type."', update_date = '".$_SESSION['$cDateTime']."'  WHERE  id = '".$rowid."' AND customer_id = '".$customer_id."'";
           // echo "<br>--- ".$updatesql;
            mysqli_query($this->link, $updatesql);
 
            $parent_id = $rowid;// loop next itration parent_id
        
        }// loop end

    }

    public function getAccountid($table, $id)
    {
        $Record = $this->singlev($table . " WHERE  id = '" . $id . "'" );
        $customer_id = $Record->customer_id;
        return $customer_id;
    }


    /*Voucher Edit LInk */
    function voucher_edit_link($voucher_no){
            
        $voucher_code=substr($voucher_no, 0, 2);
    
        if($voucher_code=="CR")
        {
        $link="cash_received_update.php";
        }
        else if($voucher_code=="CP")
        {
            $link="cash_payment_update.php";
        }
        else if($voucher_code=="BD")
        {
            $link="bank_deposit_update.php";
        }
        else if($voucher_code=="BP")
        {
            $link="bank_payment_update.php";
        }
        else if($voucher_code=="OB")
        {
            $link="customers_opening_balance_update.php";
        }
        else if($voucher_code=="ZP")
        {
            $link="zakat_payment_update.php";
        }
        
        return $link;

    }
    
  /*voucher to Table */
    function voucherToTableName($voucher_no){
        include_once 'setup/General.php';

        $gen= new General();
            
        $voucher_code=substr($voucher_no, 0, 2);
       
     
        if($voucher_code=="SL")
        {
             $id= $this->VoucherNoToid('sales_invoice',$voucher_no);
        $link="view_sale_invoice.php?CD=".$gen->IDencode($id);
        }
        else if($voucher_code=="PR")
        {
           
            $id= $this->VoucherNoToid('purchase_invoice' ,$voucher_no);
            $link="view_purchase_invoice.php?CD=".$gen->IDencode($id);
          
        }
        
     
        return $link;

    }

    public function CityName($uid)
    {
         $sql ="SELECT * from " . CITY . " where id = '" . $uid . "'";
        $result = mysqli_query($this->link, $sql);
        $rs = mysqli_fetch_object($result) ;
         return $rs->city;
    }


    public function getMac()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $operating_system = 'Unknown Operating System';

        //Get the operating_system name
        if (preg_match('/linux/i', $u_agent)) {
            $operating_system = 'Linux';
        } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
            $operating_system = 'Mac';
        } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
            $operating_system = 'Windows';
        } elseif (preg_match('/ubuntu/i', $u_agent)) {
            $operating_system = 'Ubuntu';
        } elseif (preg_match('/iphone/i', $u_agent)) {
            $operating_system = 'IPhone';
        } elseif (preg_match('/ipod/i', $u_agent)) {
            $operating_system = 'IPod';
        } elseif (preg_match('/ipad/i', $u_agent)) {
            $operating_system = 'IPad';
        } elseif (preg_match('/android/i', $u_agent)) {
            $operating_system = 'Android';
        } elseif (preg_match('/blackberry/i', $u_agent)) {
            $operating_system = 'Blackberry';
        } elseif (preg_match('/webos/i', $u_agent)) {
            $operating_system = 'Mobile';
        }

        if ($operating_system == "Mac")
            $MAC = exec("ifconfig en1 | awk '/ether/{print $2}'");
        else if ($operating_system == "Windows")
            $MAC = exec("getmac");
        else {
            $MAC = "No Mac";
        }


        $MAC = strtok($MAC, ' ');
//        echo "<pre>";
        //      print_r($_COOKIE);
        $day = date('d');


        if (!isset($_COOKIE['system_info_unitedSoft']) || $day == "1") {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://www.unitedsoft.net/system_check/");
            //  curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);

            curl_setopt($ch, CURLOPT_POSTFIELDS, "mct=$MAC");
            $result = curl_exec($ch);
            //print_r($result);
            curl_close($ch);

            if (json_decode($result, false)->status == 0) {
                //auth popup
                //echo "not an eligible person try again";
                return false;
            } else {
                setcookie("system_info_unitedSoft", $result);
                //   $cookie = $_COOKIE['system_info_unitedSoft'];
                return true;
            }
        } else {
            $systemInfo = json_decode($_COOKIE['system_info_unitedSoft'], false);
            if (md5($MAC) == $systemInfo->response[0]->mac_address) {
                $response = $systemInfo->response[0];
               // print_r($_COOKIE);
                 if (date('Ymd') < $response->exp_date) {
                    return true;
                } else {
                        unset($_COOKIE['system_info_unitedSoft']);
                            //  unset($_COOKIE['HelloTest1']);
                        setcookie('system_info_unitedSoft', null, -1, '/');
                     //   print_r($_COOKIE);
                         //   setcookie('HelloTest1', null, -1, '/');
                        // return true;
                       // exit();
                         $this->getMac();
                         return false;
                }
            } else {
                //auth popup internet connection is required]
             //   echo "auth required ip changed";
                return false;
            }
        }
    }

    function UniqueMachineID($salt = "")
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        echo $ipAddress;
        $macAddr = false;

#run the external command, break output into lines
        $arp = "arp -a $ipAddress";
        //  echo $arp;
        $lines = explode("\n", $arp);

#look for the output line describing our IP address
        foreach ($lines as $line) {
            $cols = preg_split('/\s+/', trim($line));
            if ($cols[0] == $ipAddress) {
                $macAddr = $cols[1];
            }
        }
        echo $macAddr;
        return $macAddr;
    }


//support functions
    public function insertStock()
    {
         $sql = "SELECT stock_id, `product_id`, `total_Stock_qty` , date  FROM " . STOCK_HISTORY . " WHERE `stock_id` IN (SELECT MAX(stock_id) FROM " . STOCK_HISTORY . " WHERE `cache`=0 GROUP BY product_id )";

        $result = mysqli_query($this->link, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_object($result)) {
            $sql2 = $this->insert(array("product_id" => $rs->product_id, "total_Stock_qty" => $rs->total_Stock_qty, "stock_qty" => $rs->total_Stock_qty, "tr_type_id" => 6, "date" => 'NOW()', 'previous_balance' => 0, 'previous_tr_type_id' => 0), "stock_history_copy");
        }
    }

    public function insertProductStock()
    {
        $items = $this->select("*", ITEMS);
        $cStock = $this->current_product_stock();
        foreach ($items as $item) {
            $currentStock = $cStock[$item->id];
            if (empty($currentStock)) {
                $currentStock = 0;
            }
            $sql2 = $this->insert(array("invoice_detail_id" => 0, "invoice_id" => 0, "parent_id" => 0, "product_id" => $item->id, "total_Stock_qty" => $currentStock, "stock_qty" => $currentStock, "tr_type_id" => 6, "date" => 'NOW()', 'previous_balance' => 0, 'previous_tr_type_id' => 0, "cache" => 0), "stock_history_copy");
        }
    }


    public function insertVendorToCustomer()
    {
        $vendors = $this->select("*", VENDORS);
        foreach ($vendors as $vendor) {
            $vendor->type = 2;
            $oldId = $vendor->id;
            $vendor->id = '';
            $vendorId = $this->insert($vendor, CUSTOMERS);
            if (!empty($vendorId)) {
                $currentBalance = $this->VendorBalance($oldId);
                if ($currentBalance < 0)
                    $this->CustomerFunds("Current Balance", $currentBalance, $vendorId, "cr", 2);
                else {
                    $this->CustomerFunds("Current Balance", $currentBalance, $vendorId, "db", 2);
                }

            } else {
                $this->insert(array('id' => $vendor->id, 'name' => $vendor->name, "check_point" => 2), "failed_jobs");
            }
        }
    }
    public function BasicSalary($id)
    {
       
         $basic_salary = $this->singlev( STAFF ." WHERE employel_id= $id " );
        return  $basic_salary->basic_salary;
    }
    public function LeaveAmount($staff_id,$number_leaves)
    {
       
         $basic_salary = $this->singlev( STAFF ." WHERE employel_id= $staff_id " );

         
         
            $oneday_salary=$basic_salary->basic_salary*12/365;
            $amount=$oneday_salary*$number_leaves;
            if($number_leaves==0){
               return  $oneday_salary;
             }
             else{
                return $amount;
             }
            
    }
    public function LunchAmount($staff_id)
    {
       $lunch=0;
         $staff_data = $this->singlev( STAFF ." WHERE employel_id= $staff_id " );
         
         if($staff_data->confirmation_date!=null){
            
            $employe_data = $this->singlev( EMPLOYETYE ." WHERE id= $staff_data->employel_type " );
            // $lunch=$employe_data->lunch_allowance;
            $lunch=$staff_data->lunch_allowance;
    
            return $lunch;
         }
         else return $lunch;
    }
    public function KidsStaff($staff_id)
    {
       
         $data = $this->countme( Student ." WHERE EmployeeID= $staff_id " );
           return $data;
         
        
    }
    public function IncomeTax($grosssalary)
    {
        
         $employe_data = $this->singlev( INCOMETAX ." WHERE $grosssalary  BETWEEN   range_to AND range_from" );
       
        if($employe_data->amount=='0' && $employe_data->percentage== '0'){
                return 0;
        }else if($employe_data->amount=='0' && $employe_data->percentage > '0'){
                $value=round($grosssalary*$employe_data->percentage/100);
                return $value;
        }else{
            $value=$employe_data->amount + round($grosssalary*$employe_data->percentage/100);
                return $value;

        }
         
        
    } 
    public function ProvidentFunds($id)
    {
        
        $staff_data = $this->singlev( STAFF ." WHERE employel_id= $id " );
       
         if($staff_data->confirmation_date != null){
            
            $p_fund=round($staff_data->basic_salary*0.075);
            
            return $p_fund;
         }
         return 0;
      
    }
    public function securityCheck($id)
    {
        $arr=array();
        $securitydata=$this->QueryRun("SELECT * FROM " .EMPSECURITY. " where emp_id=  ".$id."  AND is_completed = 0");
        $total=0;
        if($securitydata !== null){
        if(count($securitydata)>0)
        {
            foreach($securitydata as $key =>$data){
                $amount=$data->amount/$data->installment_no;
                $total=$total + $amount;
                $arr[$data->id]=$amount;
                $arr['total']=$total;
                // $arr[$data->id]=$data->id;
                // $arr[1]=$id;
            }
            // print_r($arr);
            // exit;
            return $arr;

        }else{
            return 0;
        }
    }else{
        return $arr;
    }

        // $paid_security=$this->QueryRun("SELECT Sum(amount) as paid_security FROM " .EMPSECURITY. " WHERE emp_id=".$id." ");
        // $staff_data = $this->BasicSalary($id);
        // if($taff_data==$paid_security){
        //     return 0;
        // }else{
        //     // echo "------===";
        //     $lastrow=$this->QueryRun("SELECT * FROM " .EMPSECURITY. " ORDER BY id DESC
        //     LIMIT 1");
        //     return $lastrow[0]->amount;

        // }
        
         
      
    }
    public function LoansCheck($id)
    {
        $total=0;
       
        $loandata=$this->QueryRun("SELECT * FROM " .EMPLOANS. " where emp_id=  ".$id."  AND is_completed = 0");
        if($loandata !== null){
        if(count($loandata)>0 )
        {
            foreach($loandata as $data){
                $amount=$data->amount/$data->installment_no;
                $total=$total + $amount;
            }
            
            return $total;

        }else{
            return false;
        }
        }
        // return $lastrow[0]->amount;


        // $paid_security=$this->QueryRun("SELECT Sum(amount) as paid_security FROM " .EMPLOANS. " WHERE emp_id=".$id." ");
        // $staff_data = $this->BasicSalary($id);
        // if($taff_data==$paid_security){
        //     return 0;
        // }else{
        //     // echo "------===";
        //     $lastrow=$this->QueryRun("SELECT * FROM " .EMPLOANS. " ORDER BY id DESC
        //     LIMIT 1");
        //     return $lastrow[0]->amount;

        
        
         
      
        }
    public function SalaryCheCreate($mon,$year,$campus)
    {
        
        $staff_salary_create=array();

       $sql = "SELECT sl.*
	FROM ".STAFFSALARY." as sl
	INNER JOIN ".STAFF. " as s ON sl.emp_id = s.employel_id
	WHERE s.campus = $campus AND s.IsActive = 1 AND s.IsLeft=0  AND sl.salary_month = $mon AND sl.salary_year = $year";
	// echo $sql;
	$staff_salary = $this->QueryRun($sql);



        // $staff_salary= $this->fetchall(STAFFSALARY . " WHERE campus= $campus AND salary_month= $mon AND salary_year = $year");
        // print_r($staff_salary);
        foreach ($staff_salary as $key => $data) {
            $staff_salary_create[$key]=$data->emp_id;
        }
       
        return $staff_salary_create;


    }
    
}

?>