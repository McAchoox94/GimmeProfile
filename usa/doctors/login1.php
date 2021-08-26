<?php 
session_start();
require_once ("config.php");
require_once 'lib/Db.class.php';
$db = new Db();
require_once ("lib/function.php");
extract(getHttpVars());	
//d($_REQUEST);
$msg="";
if(isset($submit)){
	$password = md5( $password );
if(strpos($username,"@")){
 $result=$db->query("SELECT * FROM profile WHERE email ='".$username."' AND password = '". $password ."' and active=1"); // executes query, returns count of affected rows
}else{
 $result=$db->query("SELECT * FROM profile WHERE username ='".$username."' AND password = '". $password ."' and active=1"); // executes query, returns count of affected rows
	
}

//echo "<br><br><br><br>"; 
//d($result);
 	$count = count($result);
 	if($count > 0){ 

	

	$_SESSION['FullName'] = $result[0]['name'];
	$_SESSION['adminName'] = $result[0]['username'];
	$_SESSION['userid'] = $result[0]['id'];
	$_SESSION['userrole'] = $result[0]['role'];
	$_SESSION['username'] = $result[0]['username'];
	$_SESSION['user_pic'] = $result[0]['picture'];
	$_SESSION['email']	= $result[0]['email'];
	$_SESSION['logged_in'] = true;	
	 $url= $link.$result[0]['username'];
	header('Location: '.$url);
 	exit;

	}else{

		$msg = "Please enter a valid username and password!";	

	} // loads one result row as associative array

}
?>
<!DOCTYPE html>
<!-- saved from url=(0044)examples/inline/ -->
<html lang="en">
<?php /*?><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="80ccd26071aaeb29d1fa0a62660f69b6">
	<link href="assets/img/favicon.png" rel="icon">

	<title>VCard Manager</title>
	

    <link href="xcrud/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  
  	<!-- <link href="assets/css/bootstrap-custom.css" rel="stylesheet"> -->
	<link href="assets/css/main.css" rel="stylesheet">
	<!-- <link href="assets/css/flat.css" rel="stylesheet"> -->
	<link href="assets/style.css" rel="stylesheet" type="text/css" />
	<link href="css/dark.css" rel="stylesheet" id="color_scheme">

<!--	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://www.keenthemes.com/preview/conquer/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/easylogin.js"></script>
    <script src="assets/js/main.js"></script>

</head><?php */?>
	<? include("head.php");?>
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
    <script src="js/general.js"></script>
    <script src="js/jquery.validate.min.js"></script>
<body cz-shortcut-listen="true" class="">

	<!-- DEMO ONLY -->
	<style>.customizer {position: absolute;z-index: 1;right: 0;margin-right: 25px;background: #F1F1F1;padding: 10px 15px 0;border: 2px solid #C4C4C4;border-radius: 3px;}</style><script>$(function(){var e="assets/css/";$("#customizer_color").on("change",function(){if($(this).val().length)$("#color_scheme").attr("href",e+"colors/"+$(this).val()+".css")});$("#customizer_flat").on("click",function(){if($(this).prop("checked"))$("head").append('<link href="'+e+'flat.css" rel="stylesheet" id="flat_css">');else $("head #flat_css").remove()})})</script>
        <? include("menu.php");?>

    <div class="container" style="margin-top:80px">
    <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <? if($msg!="") {?>
    <div class="alert alert-danger" role="alert"><?=$msg?></div>
    <? }?>

		 <form name="login_form" id="login_form" action="" method="POST" enctype="multipart/form-data">
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Enter Username / Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>
				<span class="button-checkbox">
					<a href="forget.php" class="btn btn-link pull-right">Forgot Password?</a>
				</span>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="submit" id="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<!--<a href="signup.php" class="btn btn-lg btn-primary btn-block">Register</a>-->
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
 </div>

</body>
</html>
