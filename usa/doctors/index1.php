<?php
ob_start();
session_start();
require_once ("config.php");
require_once 'lib/Db.class.php';
$db = new Db();
require_once ("lib/function.php");
if(isset($_SESSION['logged_in']) && isset($_SESSION['userid'])){
	header('Location: '.$link.$_SESSION['username']);
}
//echo "<br><br><br><br>";
//d($_SESSION);
?>
<!DOCTYPE html>
<!-- saved from url=(0044)examples/inline/ -->
<html lang="en">
<?php include("head.php");?>
<?php /*?><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="80ccd26071aaeb29d1fa0a62660f69b6">
	<link href="assets/img/favicon.png" rel="icon">

    <title>VCard Manager</title>
    
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
    <link href="xcrud/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/css/bootstrap-custom.css" rel="stylesheet"> -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- <link href="assets/css/flat.css" rel="stylesheet"> -->
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
    <link href="css/dark.css" rel="stylesheet" id="color_scheme">

     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!--  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">-->

        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/easylogin.js"></script>
    <script src="assets/js/main.js"></script>
    </head><?php */?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="assets/style.css" rel="stylesheet" type="text/css" />
     <link href="css/owl.carousel.css" rel="stylesheet">
<body cz-shortcut-listen="true" class="">

	<!-- DEMO ONLY -->
	<style>.customizer {position: absolute;z-index: 1;right: 0;margin-right: 25px;background: #F1F1F1;padding: 10px 15px 0;border: 2px solid #C4C4C4;border-radius: 3px;}</style><script>$(function(){var e="assets/css/";$("#customizer_color").on("change",function(){if($(this).val().length)$("#color_scheme").attr("href",e+"colors/"+$(this).val()+".css")});$("#customizer_flat").on("click",function(){if($(this).prop("checked"))$("head").append('<link href="'+e+'flat.css" rel="stylesheet" id="flat_css">');else $("head #flat_css").remove()})})</script>

	 <? include("menu.php");?>
	 
     
    <div class="container">
<div class="jumbotron">
	<h2 style="text-align:center; font-size:40px;">Welcome to your Professional Profile Maker!</h2>
	<h4 style="text-align:center;">Impressive and professional online Profile Manager, a beautiful Portfolio with sliding effect, resume, online booking,  contact information with Google map.
</h4>

 	<div style="margin-top: 50px;">
    <p class="col-md-offset-4 bold" style="margin-bottom:5px; margin-left: 40%;" >
            <a href="signup.php" class="btn btn-lg" style="color:white; padding: 14px 28px; font-size:20px; background-color:#664242;"><i class="fa fa-group"></i> Build your Profile Now!</a></p>


					<!-- Owl carousel block starts -->
						<!-- Owl navigation -->
						<div class="owl-nav">
							<a class="owl-nav-prev"><i class="fa fa-chevron-left"></i></a>
							<a class="owl-nav-next"><i class="fa fa-chevron-right"></i></a>
						</div>
						<!-- Change values of data-items, data-auto-play, data-pagination & data-single-item  based on your needs -->
						<div class="owl-carousel" data-items="4" data-auto-play="true" data-pagination="false" data-single-item="false">
							<!-- Carousel item -->
<?
$qry="SELECT * FROM profile where home_page=1";
$cand_arr	=	$db->query($qry);
foreach ($cand_arr as $candidate){
	if($candidate['picture']!="" || $candidate['picture']!=NULL){
		$picture="images/".$candidate['picture'];
	}else{
		$picture="images/placeholder.png";
	}
?>							<div class="owl-content"> 
								<a href="<?=$link.$candidate['username']?>" class="lightbox"><img src="<?=$picture?>" alt="" class="img-responsive img-thumbnail" /></a>
								<h4><a href="<?=$link.$candidate['username']?>"><?=$candidate['name']?></a></h4>
								<h5><strong><?=$candidate['title']?></strong></h5>
 							</div>
<? } ?>                            
						</div>
					<!-- Owl carousel block ends -->


		 	</div>


<p class="col-md-offset-4 bold" style="margin-bottom:5px; margin-left: 36%;" >
	 <a href="./searchDoc/search.php" class="btn btn-lg" style="color:white; 
	                                                padding: 14px 28px; 
													font-size:20px; 
													background-color:#51878c;">
					   <i class="fa fa-search"></i> Trouver votre plus proche médecin</a></p>

</div>

	</div>
</div>
    <script src="js/owl.carousel.min.js"></script>
<script>
/* ************ */
/* Owl Carousel */
/* ************ */

$(document).ready(function() {	
	/* Owl carousel */
	$(".owl-carousel").owlCarousel({
		slideSpeed : 500,
		rewindSpeed : 1000,
		mouseDrag : true,
		stopOnHover : true
	});
	/* Own navigation */
	$(".owl-nav-prev").click(function(){
		$(this).parent().next(".owl-carousel").trigger('owl.prev');
	});
	$(".owl-nav-next").click(function(){
		$(this).parent().next(".owl-carousel").trigger('owl.next');
	});
});


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body></html>