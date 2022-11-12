<?php
$baseurl = "http://localhost/qasimlab";
$siteurl = "http://localhost/qasimlab";
date_default_timezone_set('asia/karachi');
$connection=mysqli_connect("localhost","root","","lab_legder") or die(mysqli_connect_error()) ;
if($connection){
		//echo "OKKKKK";
	}
	else{
		echo "NOT OK";
	}
?>