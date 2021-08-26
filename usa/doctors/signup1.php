<?php 
require_once ("config.php");
require_once 'lib/Db.class.php';
$db = new Db();
require_once ("lib/function.php");
extract(getHttpVars());	
//d($_REQUEST);
$msg="";
if(isset($submit)){
	$password = md5( $password );
	$sql="INSERT INTO `profile` (`name`, `username`, `password`, `email`, `title`, `role`) 
						VALUES ('$name', '$username', '$password', '$email', '$title', 'user')";
	$result = $db->query($sql);
	if($result) {
		$msg="<strong>Well done </strong> Account Created Successfully!  <a href='login.php' class='alert-link'>Sign In to Build Resume</a> ";
		}
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
	
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
    
    <link href="xcrud/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  
  	<!-- <link href="assets/css/bootstrap-custom.css" rel="stylesheet"> -->
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="css/jquery_notification.css" rel="stylesheet">
	<!-- <link href="assets/css/flat.css" rel="stylesheet"> -->
	<link href="assets/style.css" rel="stylesheet" type="text/css" />
	<link href="css/dark.css" rel="stylesheet" id="color_scheme">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/easylogin.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/general.js"></script>
    <script src="js/jquery.validate.min.js"></script>
 
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
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <? if($msg!="") {?>
    <div class="alert alert-success" role="alert"><?=$msg?></div>
    <? }?>
		 <form name="register_form" id="register_form" action="" method="POST" enctype="multipart/form-data">
			<h2>Please Sign Up <small>It's free and always will be.</small></h2>
			<hr class="colorgraph">
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Full Name" tabindex="1">
                <span class="help-block"></span>
            </div>
 			<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Unique Username " tabindex="2">
			<span class="help-block"></span>
            </div>
			<div class="form-group">
				<input type="text" name="title" id="title" class="form-control input-lg" placeholder="Title" tabindex="3">
			<span class="help-block"></span>
            </div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			<span class="help-block"></span>
            </div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
					<span class="help-block"></span>
                    </div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
					
                    <span class="help-block"></span>
                    </div>
				</div>
			</div>
			 
					 <input type="hidden" name="action" value="add_user" />
                    <input type="hidden" name="role" value="user" />
					<input type="hidden" name="active" value="1" />
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" name="submit" id="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
			</div>
		</form>
	</div>
</div>
 </div>

</body>
</html>
