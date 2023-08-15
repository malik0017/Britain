<?php

include('setup/config.php'); 

include('setup/Authenticate.php');

include 'layout/header.php'; 

$config = new config(); 

   if ($config->logout())  

   {  

      		header('Location: login.php');	  

   } 



?>