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
//echo $url;
	header('Location: '.$url);exit;
exit;
	}else{

		$msg = "Please enter a valid username and password!";	

	} // loads one result row as associative array

}
?>

<!DOCTYPE html>
<html lang="en" >

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


<head>
  <meta charset="UTF-8">
  <title>CodePen - A Pen by mohamed hedfi</title>
  <link rel="stylesheet" href="./css/style_signup.css">

</head>
<body>
<? include("menu.php");?>
<!-- partial:index.partial.html -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Accès</title>



    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="css/index.css">

</head>

<body>





    <div class="wrapper">
        <div class="container">

            <div class="signup-form">

			<? if($msg!="") {?>
    <div class="alert alert-danger" role="alert"><?=$msg?></div>
    <? }?>

                <form name="login_form" id="login_form" action="" method="POST" enctype="multipart/form-data"><br>
                    <center> <i class="fa fa-sign-in ab" aria-hidden="true"></i></center>
                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="text" id="materialFormLoginEmailEx" name="username" class="form-control" placeholder="Enter Username / Email Address" required>
                    </div>

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="pass" name="password" class="form-control" placeholder="Mot de passe" required>
                    </div>

                    <br>
                    <center> <input type="submit" class="btn btn-primary bb" name="submit" value="Connexion" id="submit">
                    </center>
                    <br>
                    <span><a href="forget.php" style="color: blue;">I forgot my username or password.</a></span> <br>
                    <span>If you don't have an account already then click on <a href="signup.php" style="color: red;">signup</a></span>

                </form>


            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
  
</body>



</html>
<!-- partial -->
  <script  src="./js/script_signup.js"></script>

</body>
</html>
