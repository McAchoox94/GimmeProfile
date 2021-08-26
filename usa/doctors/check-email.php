<?php
require_once ("config.php");
require_once 'lib/Db.class.php';
$db = new Db();
require_once ("lib/function.php");





if( isset( $_POST['password'] ) && !empty($_POST['password'])){
	$password =md5( trim( $_POST['password'] ) );
	$email = $_POST['email'];
	
	if( !empty( $email) && !empty($password) ){
		$query = " SELECT count(email) cnt FROM profile where password = '$password' and email = '$email' ";
		$result = $db->query($query);
		//$data = mysqli_fetch_assoc($result);
		if(count($result==1)){
			echo 'true';
		}else{
			echo 'false';
		}
	}else{
		echo 'false';
	}
	exit;
}
if( isset( $_POST['username'] ) && !empty($_POST['username'])){
	$username = $_POST['username'];
	$query = " SELECT count(username) cnt FROM profile where username = '$username' ";
		$result = $db->query($query);
	if($result[0]['cnt']>0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}


if( isset( $_POST['username'] ) && !empty($_POST['username'])){
	$username = $_POST['username'];
	$query = " SELECT count(username) cnt FROM profile where username = '$username' ";
		$result = $db->query($query);
	if($result[0]['cnt']==1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}


if( isset( $_POST['email'] ) && !empty($_POST['email'])){
	$email = $_POST['email'];
	$query = " SELECT count(email) cnt FROM profile where email = '$email' ";
		$result = $db->query($query);
		//$data = mysqli_fetch_assoc($result);
		if($result[0]['cnt']>0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}

if( isset( $_GET['email'] ) && !empty($_GET['email'])){
	$email = $_GET['email'];
	$query = " SELECT count(email) cnt FROM profile where email = '$email' ";
		$result = $db->query($query);
		//$data = mysqli_fetch_assoc($result);
	if($result[0]['cnt']==1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}