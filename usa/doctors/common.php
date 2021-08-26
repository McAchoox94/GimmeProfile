<?
require_once ("config.php");
require_once 'lib/Db.class.php';
$db = new Db();
require_once ("lib/function.php");
$page=basename($_SERVER['PHP_SELF']);
//echo "<br><br><br><br>";
//d($_SESSION);

if($page!="profile.php"){
if(!isset($_SESSION['logged_in']) && !isset($_SESSION['userid'])){
	header('Location: index.php');
}
}
if($page=="profile.php"){
	$getName = explode("/",$_SERVER['REQUEST_URI']);
	$sql="select * from profile where username = '".$getName[count($getName)-1]."'";
	$row = $db->query($sql);
//extract($row[0]);
//echo $email;

if(count($row)<1){ header('Location: index.php'); }
if(isset($_SESSION['logged_in']) && $getName[2]==$_SESSION['username']){
 	$userID=$_SESSION['userid'];
	$username=$_SESSION['username'];
	$userrole=$_SESSION['userrole'];
	$useremail=$_SESSION['email'];
 }else{
	
	$userID=$row[0]['id'];
	$username=$row[0]['username'];
	$userrole=$row[0]['role'];
	$useremail=$row[0]['email'];

	
} 
	
	}

	$language = $row[0]['language'];
	if($language=="" || $language==NULL){
		$captions = $db->query("SELECT * FROM  `captions` where language = 1");
	}else{
		$captions = $db->query("SELECT * FROM  `captions` where language =".$language);
	}
	foreach ($captions as $cap){ 
		define($cap['CAPTION'],$cap['VALUE']); 
	}
?> 