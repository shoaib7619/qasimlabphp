<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:login.php');
}
include_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Qasim Center</title>
    <link rel="shortcut icon" href="<?=$baseurl?>/images/favicon1.ico" type="image/x-icon">
    <link rel="icon" href="<?=$baseurl?>/images/favicon1.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="<?=$baseurl?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=$baseurl?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
<!-- Custom Theme Style -->
    <!-- Custom Theme Style -->
    <link href="<?=$baseurl?>/build/css/custom.min.css" rel="stylesheet">
     <link rel="stylesheet" href="<?=$baseurl?>/build/css/alertify.min.css">
	<!-- Datatables -->
    <link href="<?=$baseurl?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=$baseurl?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=$baseurl?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=$baseurl?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=$baseurl?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

	
	<Style>
	.nav-md .container.body .right_col{
		    margin-left: 0px !important;
	}
	.main_container .top_nav{margin-left: 0px !important;}

footer {
    margin-left: 0px !important;
}
.loader {
      display:    block ;
      position:   fixed !important;
      z-index:    9000000 !important;
      top:        0 !important;
      left:       0 !important;
      height:     100% !important;
      width:      100% !important;
      background: rgba( 225, 225, 225, .8 ) 
            url('img/ajax-loader.gif') 
            50% 50% 
            no-repeat !important;
    }
	</style>
	
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav style="text-align: center;">
               <!--<div class="nav toggle">
               <img height="120px" src="<?=$baseurl?>/images/logo.png"> 

              </div>-->
               <span ><font size="10px">QASIM CLINICAL LAB</font></span>

              <ul class="nav navbar-nav navbar-right">
                
          <li><a href="<?=$siteurl?>/logout.php"><i class="glyphicon glyphicon-off"></i>Logout</a></li>
          <li><a href="<?=$siteurl?>/report.php"><i class="fa fa-search"></i>Sales</a></li>
           <li><a href="<?=$siteurl?>/records/return_list.php"><i class="fa fa-search"></i>Return</a></li>
				  <li><a href="<?=$siteurl?>/records"><i class="fa fa-search"></i>Normal</a></li>
				  <li><a href="<?=$siteurl?>/records/approvals_list.php"><i class="fa fa-search"></i>Approvals</a></li>
				  <li><a href="<?=$siteurl?>/"><i class="fa fa-plus-square"></i>Add New</a></li>
              </ul>
            </nav>
          </div>
        </div>
          <div class="loader" style="display: none;"></div>
        <!-- /top navigation -->