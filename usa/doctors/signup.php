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
<html lang="en" >

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


<head>
  <meta charset="UTF-8">
  <title>gimmeprofile - signup</title>
  <link rel="stylesheet" href="./css/style_signup.css">

</head>

<body>

<!-- partial:index.partial.html -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sign up / sign in</title>



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
               <div class="alert alert-success" role="alert"><?=$msg?></div>
            <? }?>

            <form name="register_form" id="register_form" action="" method="POST" enctype="multipart/form-data">

                <center> <i class="fa fa-user-plus ab" aria-hidden="true"></i></center>
                <!-- Material input -->
                <!-- Material input text -->
                <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="materialFormRegisterNameEx"  name="name" class="form-control" placeholder="Nom Complet"  tabindex="1" required>
                </div>

                <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="materialFormRegisterNameExLastName" name="username" class="form-control" placeholder=" Username ( unique ) "  tabindex="2" required>
                </div>

                <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="materialFormRegisterNameExLastName"  name="title" class="form-control" placeholder="title" tabindex="3" required>
                </div>

                <!-- Material input email -->
                <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="materialFormRegisterEmailEx" name="email" class="form-control" placeholder="Email Address" tabindex="4" required>
                </div>
                <!-- Material input password -->
                <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="materialFormLoginPasswordEx" name="password" class="form-control" placeholder="Mot de passe" tabindex="5" required>
                </div>
                <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="materialFormLoginPasswordEx" name="confirm_password" class="form-control" placeholder="Confirmer votre mot de passe" tabindex="6" required>
                </div>
                <br>

                <center> <input type="submit" name="submit" id="submit" class="btn btn-primary bb" value="S'inscrire" tabindex="7"></center>



                </form>

            </div>

            <p>If you already have an account, just <a href="login.php">login</a>.</p>


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
