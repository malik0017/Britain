<?php

include_once 'setup/config.php';

/**

 * Description of loginmodel

 *

 * @author aarohi

 */

class loginmodel extends config{

    //put your code here

    function loginme($username,$password){

         //$table = " tbl_manager where login='$username' AND password='$password'";

		 $table = USERS." WHERE `password` = '".md5($password)."' AND `username` = '$username' AND status = '1'";

        //$count = $conf->fetchall($table);

       $count=$this->countme($table);

        if($count == '1')

        {

			$sql = USERS." WHERE `password` = '".md5($password)."' AND `username` = '$username' ";

			$user_data=$this->singlev($table);

			//$results = mysqli_query($this->link, $sql);

			//$user_data = mysqli_fetch_object($results);

			//$no_rows = $results->num_rows;



			$_SESSION['MngLogin'] = true;
            $_SESSION['user_reg'] = $user_data->id;
			$_SESSION['first_name'] = $user_data->first_name;
            $_SESSION['last_name'] = $user_data->last_name;
            $_SESSION['email'] = $user_data->email;
            $_SESSION['username'] = $user_data->username;
            $_SESSION['gender'] = $user_data->gender;
            if($user_data->s_date=='')
            {
                $_SESSION['user_system_date']= $this->cDate;
            }else{
                $_SESSION['user_system_date'] = $user_data->s_date;
            }
            
            $_SESSION['role'] = $user_data->role;
			$_SESSION['timestamp'] = time();

			return $_SESSION['role'];            

        }else{

				return FALSE;

			}

    }

}

?>