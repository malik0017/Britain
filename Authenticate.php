<?php
$conf = new config();
   if ($conf->AdminSession()==false && empty($_SESSION[ 'MngLogin' ]))  

   {  

	   echo "<script>window.location='login.php';</script>";

   } 

?>



