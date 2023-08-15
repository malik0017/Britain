<?php
$conf = new config();
$conf->site_settings();
   if ($conf->session()==false)  
   {  
	   echo "<script>window.location='login.php';</script>";
   } 
?>