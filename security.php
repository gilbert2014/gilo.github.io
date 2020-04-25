<?php
session_start();
include('database/dbconfig.php');
if($dbconfig)
{
	
}
else
{
	header("Location:login.php");
}
 // if (!$_SESSION['username'])
 // {
	
	// header("Location:login.php");
 //  }




?>