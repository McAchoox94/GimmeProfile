<?
ob_start();
session_start();
require_once 'common.php'; 

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: index.php');
	}
extract(getHttpVars());	
?>
<!DOCTYPE html>
<!-- saved from url=(0044)examples/inline/ -->
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="80ccd26071aaeb29d1fa0a62660f69b6">
	<link href="assets/img/favicon.png" rel="icon">

    <title>Professional Profile</title>
    
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
    <link href="xcrud/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/css/bootstrap-custom.css" rel="stylesheet"> -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- <link href="assets/css/flat.css" rel="stylesheet"> -->
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
    <link href="css/dark.css" rel="stylesheet" id="color_scheme">
     <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://www.keenthemes.com/preview/conquer/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/easylogin.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body cz-shortcut-listen="true" class="">

	<!-- DEMO ONLY -->
	<style>.customizer {position: absolute;z-index: 1;right: 0;margin-right: 25px;background: #F1F1F1;padding: 10px 15px 0;border: 2px solid #C4C4C4;border-radius: 3px;}</style><script>$(function(){var e="assets/css/";$("#customizer_color").on("change",function(){if($(this).val().length)$("#color_scheme").attr("href",e+"colors/"+$(this).val()+".css")});$("#customizer_flat").on("click",function(){if($(this).prop("checked"))$("head").append('<link href="'+e+'flat.css" rel="stylesheet" id="flat_css">');else $("head #flat_css").remove()})})</script>

<div role="navigation" class="header navbar navbar-inverse navbar-fixed-top ">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
          <!--  <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="230"></a>
            <a class="navbar-brand" href="index.php">Electspace</a>-->
			</div>
			<?php 
			$demo_url = explode("/",  $_SERVER['REQUEST_URI']);
			$uri = end( $demo_url ); 
			?>
			<div class="collapse navbar-collapse">
				
<?
if(isset($_SESSION['logged_in'])){

 
 ?>                
 
<ul class="nav navbar-top-links navbar-right">
             
                 
                <!-- /.dropdown -->
                 
                <!-- /.dropdown -->
                 
                <!-- /.dropdown -->
<?
	if($_SESSION['picture']!="" || $_SESSION['picture']!=NULL){
		$picture="images/".$_SESSION['picture'];
		$picture_url=$_SESSION['picture'];
		if (file_exists($picture)) {
			$picture="images/".$_SESSION['picture'];
		}else if(file_exists($picture_url)) {
			$picture=$picture_url;
		}else{
		$picture="images/placeholder.png";
		
		}
	}else{
		$picture="images/placeholder.png";
	}

?>                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                        <img src="<?=$picture?>" width="30" height="30" alt="" class="img-rounded"> Welcome <?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['FullName']; ?> 
							<span class="caret"></span> <? } ?>  
                    </a>
                    <ul class="dropdown-menu dropdown-user sub-menu">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a></li>
                        <li><a href="inbox.php"><i class="fa fa-envelope"></i>&nbsp;&nbsp;My Inbox <? if($count>0){ ?><span class="badge badge_danger"> <?=$count?> </span><? } ?></a></li>
                        <li><a href="manifestos.php"><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;<?=$_SESSION['user_type']=='User'?'Manifestos':'My Manifestos'?> </a></li>
                        <li><a href="account.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>                
               
<? } ?>               
				
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>


	<div class="navbar navbar-fixed-top navbar-top">
    	<div class="container">
        	<div class="navbar-header">
         		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a href="index.php" class="navbar-brand">vCard Resume</a>
        	</div>
			<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-pull-right">
			<li><a href="login.php" >Log in</a></li>
		   <!-- <li><a href="signup.php">Sign up</a></li>-->
		         </ul> 		
			</div>
        	 
      	</div>
    </div>

 