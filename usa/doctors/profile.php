<? session_start(); 
include("common.php");
extract(getHttpVars());


$emp = $db->query("select * from employment where uid = '". $userID ."' && active=1");
$edu = $db->query("select * from education where uid = '". $userID ."' && active=1");
$sprofile = $db->query("select * from social_profiles where uid = '". $userID ."' && active=1");
$background = $db->query("SELECT * FROM  `custom_background` INNER JOIN  `user_background` ON custom_background.id = user_background.background_id WHERE uid = '". $userID ."'");
if($background){
	$bg_style='style="background-image: url('.$link.'images/'.$background[0]['background_preview'].');"';
}else{
	$bg_style="";
}
$skill_cat = $db->query("select * from skills_category where uid = '". $userID ."' && active=1");
$theme = $db->query("SELECT * FROM  `theme_settings` INNER JOIN  `user_theme` ON theme_settings.id = user_theme.theme_id WHERE uid =  '". $userID ."'");
if(count($theme)<1) $theme_file="style_default.css";
else $theme_file=$theme[0]['style_filename'];






//$templt = $db->query("SELECT * from template where uid='".$userID."' ");
//
//if(count($templt)==0){
//
//$db->query("INSERT into template set uid = '".$userID."' , template = 'default' , active='1'");
//}
//$temp = $db->query("select * from template WHERE uid = '". $userID ."'");
//
//foreach($temp as $tp)
//if($tp['template'] =='default'){ 
//
//error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<? include("head.php");

 
if($row[0]['profile_template'] ==1){ 

?>

    <link rel="stylesheet" type="text/css" href="css/<?=$theme_file?>"/>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <script type="text/javascript" src="js/jquery.easytabs.min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/jquery.adipoli.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
    <script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlcn3CQTXfUyL1LsBqr6JlcWYtfcT43A0"> </script>
    
    <script type="text/javascript" src="js/gmaps.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/general.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery.bootstrap-growl.js"></script>
    <script type="text/javascript" src="js/sweet-alert.js"></script>
    
    <body <?=$bg_style?>>
        <? include("menu.php");?>
		
		<!-- Container -->
      
        <div id="container">
		
             <!-- Top -->
			<div class="top"> 
            	<!-- Logo -->
            	<div id="logo">
                	<h2><?=$row[0]['name']?></h2>
                    <h4><?=strtoupper($row[0]['title'])?></h4>
                </div>
                <!-- /Logo -->
                
                <!-- Social Icons -->
            <div  class="socialicons">
            <? foreach ($sprofile as $sp){?>
                <a href="<?=$sp['social_link']?>" target="_blank" class="<?=strtolower($sp['social_name'])?>" title="<?=$sp['social_name']?>"></a>
              <? } ?>  
            </div>
                <!-- /Social Icons -->
            </div>
            <!-- /Top -->
            
            <!-- Content -->
            <div id="content" >
            
                <!-- Profile -->
                <div id="profile"> 
                 	<!-- About section -->
                	<div class="col-md-3">
<?
	if($row[0]['picture']!="" || $row[0]['picture']!=NULL){
	 	$picture=$link."images/".$row[0]['picture'];
		if ( !is_url_exist($picture)) {
 			$picture=$link."images/placeholder.png";
 		}
		
	}else{
		$picture=$link."images/placeholder.png";
	}

?>                    
                    	<img src="<?=$picture?>" class="img-thumbnail" />
                        </div>
                         <div class="about col-md-5">
                        <h1><?=$row[0]['name']?></h1>
                        <h3><?=strtoupper($row[0]['title'])?></h3>
                        <p><?=$row[0]['about']?><? if(isset($_SESSION['logged_in']) && $_SESSION['username']==$username){ ?> 

                        <a class="btn btn-primary" style="margin-top:0px"  href="manage.php">Edit Account</a>
                        <? } ?></p>
                    </div>
                    <!-- /About section -->
                     <div class="col-md-4">
                    <!-- Personal info section -->
                	<ul class="personal-info">
						<li><label><?=NAME?></label><span><?=$row[0]['name']?></span></li>
                        <li><label><?=DOB?></label><span><?=$row[0]['date_of_birth']?></span></li>
                        <li><label><?=ADDRESS?></label><span><?=$row[0]['address']?></span></li>
                        <li><label><?=EMAIL?></label><span><?=$row[0]['email']?></span></li>
                        <li><label><?=PHONE?></label><span><?=$row[0]['phone']?></span></li>
                        <li><label><?=WEBSITE?></label><span><a href="<?=$row[0]['website']?>" target="_blank"><?=$row[0]['website']?></a></span></li>
						<?php if(isset($row[0]['shop_now'])) {
							echo ' <a class="btn btn-primary" style="margin-top:5px;margin-left:50px;"  href="'.$row[0]['shop_now'].'">Shop Now!</a>';
						}?>
                    </ul>
                    </div>
                    <!-- /Personal info section -->
                </div>        
                <!-- /Profile --> 

                <!-- Menu -->
                <div class="menu">

                	<ul class="tabs">
                    	<li><a href="#profile" class="tab-profile"><?=PROFILE_TAB?></a></li>
                    	<!--<li><a href="#resume" class="tab-resume"><?=RESUME_TAB?></a></li>-->
							<li><a href="#resume" class="tab-resume">About-us</a></li>
                    	<li><a href="#portfolio" class="tab-portfolio">Specials +</a></li>
                    	<li><a href="#contact" class="tab-contact"><?=CONTACT_TAB?></a></li>
						<?php if(isset($row[0]['book_now'])) {
							echo  '<a class="btn btn-primary" style="margin-top:50px;margin-left:70px;"  href="'.$row[0]['book_now'].'" target="_blank"> Take Appointment!</a>';
					
						}
						
							?>
						
						
                    </ul>
                </div>
                <!-- /Menu --> 
                
                <!-- Resume -->
                <div id="resume">
                	 <div class="timeline-section col-md-8">
                        <!-- Timeline for Employment   
                        <h3 class="main-heading"><span><?=EMPLOYMENT?></span></h3> --> 
                   <h3 class="main-heading"><span>Our Speciality</span></h3>						
                        <ul class="timeline">
                       <?php echo $row[0]['Our Speciality'];?>
                        </ul> 
                        <!-- /Timeline for Employment  -->

                        <!-- Timeline for Education  -->   
                        <h3 class="main-heading"><span>Our experiences & History</span></h3>   
                         <ul class="timeline">
						 <?php echo $row[0]['Our experiences - History'];?>
                        </ul> 
                        <!-- /Timeline for Education  -->              
                    </div>
                    <div class="skills-section col-md-4">
                        <!-- Skills -->
                        <? foreach ($skill_cat as $scat){ ?>
                        <h3 class="main-heading"><span><?=$scat['name']?></span></h3> 
                        <? $skills = $db->query("select * from skills where uid = '".$userID."' && category=".$scat['id']); 
						foreach ($skills as $skill){ 
						?>
                            <div class="skillbar clearfix " data-percent="<?=$skill['rating']?>">
                            <div class="skillbar-title"><span><?=$skill['skill_name']?></span></div>
                            <div class="skillbar-bar"></div>
                            <div class="skill-bar-percent"><?=$skill['rating']?></div>
                            </div> <!-- End Skill Bar -->
                         <? }  } ?>
                      <!-- /Skills -->
                     </div>
                </div>
                <!-- /Resume --> 
                                        
                <!-- Portfolio -->
                <div id="portfolio">
					<div class="row">
                     <ul id="portfolio-filter">
                        <li><a href="" class="current" data-filter="*">All</a></li>
						<? $portfolio_cat = $db->query("select * from portfolio_category where uid = '". $userID ."' &&  active=1"); 
						foreach ($portfolio_cat as $pcat){ 
						?>                        
                        <li><a href="" data-filter=".<?=str_replace(" ","_",strtolower($pcat['name']))?>"><?=$pcat['name']?></a></li>
                        <? } ?>
                    </ul>
                    </div>
                   <!-- <div class="extra-text"><?=PORTFOLIO_TOP?></div>-->
                    <ul id="portfolio-list" class="row">
					<? $portfolio= $db->query("select * from portfolio where uid = '". $userID ."' &&  active=1"); 
						foreach ($portfolio as $pfolio){ 
						$search_char = array(" ", ",");
						$replace_char   = array("_", " ");
 						 $cats="";
						 if($pfolio['category']!=""){
						 $sql="select name from portfolio_category where id in (".$pfolio['category'].") and  active=1";
						 $portfolio_cat = $db->query($sql);
						 foreach ($portfolio_cat as $pcat){ 
						 $cats.=$pcat['name'].", ";
						 }
						 }
						?>                        
                        <li class="<?=str_replace($search_char,$replace_char,strtolower($cats))?> col-md-4">
                            <a href="<?=$link?>images/portfolio/<?=$pfolio['picture']?>" title="<?=$pfolio['project_name']?>" rel="portfolio" class="folio">
                                <img src="<?=$link?>images/<?=$pfolio['picture']?>"  alt="">
                                <h2 class="title"><?=$pfolio['project_name']?></h2>
                                <span class="categorie"><?=substr($cats, 0, -2);?></span> 
                            </a>
                    	</li>
                        <? } ?>                    
                    </ul>
                </div>
                <!-- /Portfolio -->   
                
                <!-- Contact -->
                <div id="contact">
                	<div id="map"></div>
                	<!-- Contact Info -->
                    <div class="contact-info">
                    <h3 class="main-heading"><span><?=CONTACT_INFO?></span></h3>
                	<ul>
                        <li><?=$row[0]['address']?><br /><br /></li>
                        <li><?=NAME?>: <?=$row[0]['email']?></li>
                        <li><?=PHONE?>: <?=$row[0]['phone']?></li>
                        <li><?=WEBSITE?>: <?=$row[0]['website']?></li>
                    </ul>
                    </div>
                    <!-- /Contact Info -->
                    
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <h3 class="main-heading"><span><?=CONTACT_TOP?></span></h3>
                        <div id="contact-status"></div>
                        <form name="contactform"  action="" method="POST" enctype="multipart/form-data" id="contactform">
                          <div class="form-group">
                             	<input type="text" name="name" id="name" class="input-lg form-control" placeholder="Your Name*" tabindex="1" >
                                <span class="help-block"></span>
            </div>
 			<div class="form-group">

                            	<input type="text" name="email" id="email" class="input-lg form-control" placeholder="Your Email*" tabindex="2">
                               <span class="help-block"></span>
            </div>
 			<div class="form-group">
                            	
                            	<input type="text" name="phone" id="phone" class="input-lg form-control" placeholder="Your Phone" tabindex="3">
                               <span class="help-block"></span>
            </div>
 			<div class="form-group">
                            	 
                                <textarea name="message" cols="100" rows="6" class="input-lg form-control" placeholder="Your Message" tabindex="4" ></textarea>
                                <span class="help-block"></span>
            </div>
 			<div class="form-group">
            <input type="hidden" id="useremail" name="useremail" value="<?=$row[0]['email']?>" />
            <input type="hidden" id="userID" name="userID" value="<?=$row[0]['id']?>" />
            <input type="hidden" id="userName" name="userName" value="<?=$row[0]['name']?>" />
                                        <input type="submit" name="submit" id="submit" value="Send your message" class="btn btn-primary btn-block btn-lg"  />
                            </div>
                            <hr class="colorgraph">
                        </form>
                    </div>
                    <!-- /Contact Form -->
                </div>
                <!-- /contact 
 <div id="booknow" style="height: 750px;">
<iframe src="<?echo $row[0]['book_now'];?>" width="100%" height="100%"></iframe>
</div>-->  
           
            <!-- /Content -->
            
            <!-- Footer -->
		
            <!-- /Footer --> 
            
        </div>
<? $addr_pt=explode(",",$row[0]['address_point'])?>        
		<!-- /Container -->
    <script>
    jQuery(document).ready(function(){
	// Needed variables
	var $content 		= $("#content");
	var $map 				= $('#map'),
		$tabContactClass 	= ('tab-contact')
	
	$content.bind('easytabs:after', function(evt,tab,panel) {
		
		
		if ( tab.hasClass($tabContactClass) ) {

     var map;
      map = new GMaps({
		   scrollwheel: false,
        div: '#map',
        lat: <?=$addr_pt[0]?>,
        lng: <?=$addr_pt[1]?>
      });
      map.addMarker({
        lat: <?=$addr_pt[0]?>,
        lng: <?=$addr_pt[1]?>
//        title: 'Marker with InfoWindow',
//        infoWindow: {
//          content: '<p>HTML Content</p>'
//        }
      });
 		}
  	});
	
	});
    </script>

    </body>
	</html>
	
	<?php
///########################## single page view


	} 
	
if($row[0]['profile_template'] ==3){ 
$theme_file=str_replace(".css","_classic.css",$theme_file);
?>

    <link rel="stylesheet" type="text/css" href="css/<?=$theme_file?>"/>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <script type="text/javascript" src="js/jquery.easytabs.min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/jquery.adipoli.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
    <script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlcn3CQTXfUyL1LsBqr6JlcWYtfcT43A0"> </script>
    
    <script type="text/javascript" src="js/gmaps.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/general.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery.bootstrap-growl.js"></script>
    <script type="text/javascript" src="js/sweet-alert.js"></script>
    
    <body <?=$bg_style?>>
        <? include("menu.php");?>
		
		<!-- Container -->
      
        <div id="container">
		
             <!-- Top -->
			<div class="top"> 
            	<!-- Logo -->
            	<div id="logo">
                	<h2><?=$row[0]['name']?></h2>
                    <h4><?=strtoupper($row[0]['title'])?></h4>
                </div>
                <!-- /Logo -->
                
                <!-- Social Icons -->
            <div  class="socialicons">
            <? foreach ($sprofile as $sp){?>
                <a href="<?=$sp['social_link']?>" target="_blank" class="<?=strtolower($sp['social_name'])?>" title="<?=$sp['social_name']?>"></a>
              <? } ?>  
            </div>
                <!-- /Social Icons -->
            </div>
            <!-- /Top -->
            
            <!-- Content -->
            <div id="content" >
            
                <!-- Profile -->
                <div id="profile"> 
                 	<!-- About section -->
                	<div class="col-md-3">
<?
	if($row[0]['picture']!="" || $row[0]['picture']!=NULL){
	 	$picture=$link."images/".$row[0]['picture'];
		if ( !is_url_exist($picture)) {
 			$picture=$link."images/placeholder.png";
 		}
		
	}else{
		$picture=$link."images/placeholder.png";
	}

?>                    
                    	<img src="<?=$picture?>" class="img-thumbnail" />
                        </div>
                         <div class="about col-md-5">
                        <h1><?=$row[0]['name']?></h1>
                        <h3><?=strtoupper($row[0]['title'])?></h3>
                        <p><?=$row[0]['about']?><? if(isset($_SESSION['logged_in']) && $_SESSION['username']==$username){ ?> 

                        <a class="btn btn-primary" style="margin-top:0px"  href="manage.php">Edit Account</a>
                        <? } ?></p>
                    </div>
                    <!-- /About section -->
                     <div class="col-md-4">
                    <!-- Personal info section -->
                	<ul class="personal-info">
						<li><label><?=NAME?></label><span><?=$row[0]['name']?></span></li>
                        <li><label><?=DOB?></label><span><?=$row[0]['date_of_birth']?></span></li>
                        <li><label><?=ADDRESS?></label><span><?=$row[0]['address']?></span></li>
                        <li><label><?=EMAIL?></label><span><?=$row[0]['email']?></span></li>
                        <li><label><?=PHONE?></label><span><?=$row[0]['phone']?></span></li>
                        <li><label><?=WEBSITE?></label><span><?=$row[0]['website']?></span></li>
                    </ul>
                    </div>
                    <!-- /Personal info section -->
                </div>        
                <!-- /Profile --> 

                <!-- Menu -->
                <div class="menu">

                	<ul class="tabs">
                    	<li><a href="#profile" class="tab-profile"><?=PROFILE_TAB?></a></li>
                    	<li><a href="#resume" class="tab-resume"><?=RESUME_TAB?></a></li>
                    	<li><a href="#portfolio" class="tab-portfolio"><?=PORTFOLIO_TAB?></a></li>
                    	<li><a href="#contact" class="tab-contact"><?=CONTACT_TAB?></a></li>
                    </ul>
                </div>
                <!-- /Menu --> 
                
                <!-- Resume -->
                <div id="resume">
                	 <div class="timeline-section col-md-8">
                        <!-- Timeline for Employment  -->   
                        <h3 class="main-heading"><span><?=EMPLOYMENT?></span></h3>   
                        <ul class="timeline">
                        <?
                         foreach ($emp as $employment){
						?>
                            <li>
                                                   
                                <div class="timelineUnit">
                                    <h4><?=$employment['designation']?><span class="timelineDate"><?=date("M Y",strtotime($employment['date_from']))?> - <?=($employment['present'])?'Present':date("M Y",strtotime($employment['date_to']))?></span></h4>
                                    <h5><?=$employment['company_name']?></h5>
                                    <p><?=$employment['about_experience']?></p>
                                </div>
                            </li>
                            <? } ?>
                            <div class="clear"></div>
                        </ul> 
                        <!-- /Timeline for Employment  -->

                        <!-- Timeline for Education  -->   
                        <h3 class="main-heading"><span><?=EDUCATION?></span></h3>   
                         <ul class="timeline">
						<?
                         foreach ($edu as $education){
						?>                         
                            <li>            
                                <div class="timelineUnit">
                                    <h4><?=$education['degree_name']?><span class="timelineDate"><?=date("M Y",strtotime($education['date_start']))?> - <?=date("M Y",strtotime($education['date_end']))?></span></h4>
                                    <h5><?=$education['university_name']?></h5>
                                    <p><?=$education['about_degree']?></p>
                                </div>
                            </li>
                         <? } ?>   
                            <div class="clear"></div>
                        </ul> 
                        <!-- /Timeline for Education  -->              
                    </div>
                    <div class="skills-section col-md-4">
                       
                        <? foreach ($skill_cat as $scat){ ?>
                        <h3 class="main-heading"><span><?=$scat['name']?></span></h3> 
                        <? $skills = $db->query("select * from skills where uid = '".$userID."' && category=".$scat['id']); 
						foreach ($skills as $skill){ 
						?>
                            <div class="skillbar clearfix " data-percent="<?=$skill['rating']?>">
                            <div class="skillbar-title"><span><?=$skill['skill_name']?></span></div>
                            <div class="skillbar-bar"></div>
                            <div class="skill-bar-percent"><?=$skill['rating']?></div>
                            </div> <!-- End Skill Bar -->
                         <? }  } ?>
                      <!-- /Skills -->
                     </div>
                </div>
                <!-- /Resume --> 
                                        
                <!-- Portfolio -->
                <div id="portfolio">
					<div class="row">
                     <ul id="portfolio-filter">
                        <li><a href="" class="current" data-filter="*">All</a></li>
						<? $portfolio_cat = $db->query("select * from portfolio_category where uid = '". $userID ."' &&  active=1"); 
						foreach ($portfolio_cat as $pcat){ 
						?>                        
                        <li><a href="" data-filter=".<?=str_replace(" ","_",strtolower($pcat['name']))?>"><?=$pcat['name']?></a></li>
                        <? } ?>
                    </ul>
                    </div>
                   <!-- <div class="extra-text"><?=PORTFOLIO_TOP?></div>-->
                    <ul id="portfolio-list" class="row">
					<? $portfolio= $db->query("select * from portfolio where uid = '". $userID ."' &&  active=1"); 
						foreach ($portfolio as $pfolio){ 
						$search_char = array(" ", ",");
						$replace_char   = array("_", " ");
 						 $cats="";
						 if($pfolio['category']!=""){
						 $sql="select name from portfolio_category where id in (".$pfolio['category'].") and  active=1";
						 $portfolio_cat = $db->query($sql);
						 foreach ($portfolio_cat as $pcat){ 
						 $cats.=$pcat['name'].", ";
						 }
						 }
						?>                        
                        <li class="<?=str_replace($search_char,$replace_char,strtolower($cats))?> col-md-4">
                            <a href="<?=$link?>images/portfolio/<?=$pfolio['picture']?>" title="<?=$pfolio['project_name']?>" rel="portfolio" class="folio">
                                <img src="<?=$link?>images/<?=$pfolio['picture']?>"  alt="">
                                <h2 class="title"><?=$pfolio['project_name']?></h2>
                                <span class="categorie"><?=substr($cats, 0, -2);?></span> 
                            </a>
                    	</li>
                        <? } ?>                    
                    </ul>
                </div>
                <!-- /Portfolio -->   

                
                <!-- Contact -->
                <div id="contact">
                	<div id="map"></div>
                	<!-- Contact Info -->
                    <div class="contact-info">
                    <h3 class="main-heading"><span><?=CONTACT_INFO?></span></h3>
                	<ul>
                        <li><?=$row[0]['address']?><br /><br /></li>
                        <li><?=NAME?>: <?=$row[0]['email']?></li>
                        <li><?=PHONE?>: <?=$row[0]['phone']?></li>
                        <li><?=WEBSITE?>: <?=$row[0]['website']?></li>
                    </ul>
                    </div>
                    <!-- /Contact Info -->
                    
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <h3 class="main-heading"><span><?=CONTACT_TOP?></span></h3>
                        <div id="contact-status"></div>
                        <form name="contactform"  action="" method="POST" enctype="multipart/form-data" id="contactform">
                          <div class="form-group">
                             	<input type="text" name="name" id="name" class="input-lg form-control" placeholder="Your Name*" tabindex="1" >
                                <span class="help-block"></span>
            </div>
 			<div class="form-group">

                            	<input type="text" name="email" id="email" class="input-lg form-control" placeholder="Your Email*" tabindex="2">
                               <span class="help-block"></span>
            </div>
 			<div class="form-group">
                            	
                            	<input type="text" name="phone" id="phone" class="input-lg form-control" placeholder="Your Phone" tabindex="3">
                               <span class="help-block"></span>
            </div>
 			<div class="form-group">
                            	 
                                <textarea name="message" cols="100" rows="6" class="input-lg form-control" placeholder="Your Message" tabindex="4" ></textarea>
                                <span class="help-block"></span>
            </div>
 			<div class="form-group">
            <input type="hidden" id="useremail" name="useremail" value="<?=$row[0]['email']?>" />
            <input type="hidden" id="userID" name="userID" value="<?=$row[0]['id']?>" />
            <input type="hidden" id="userName" name="userName" value="<?=$row[0]['name']?>" />
                                        <input type="submit" name="submit" id="submit" value="Send your message" class="btn btn-primary btn-block btn-lg"  />
                            </div>
                            <hr class="colorgraph">
                        </form>
                    </div>
                    <!-- /Contact Form -->
                </div>
                <!-- /contact -->  

            </div>
            <!-- /Content -->
            
            <!-- Footer -->
			<div class="footer">
            	<div class="copyright">Copyright © 2021 <?=$row[0]['name']?></div>
            </div>
            <!-- /Footer --> 
            
        </div>
<? $addr_pt=explode(",",$row[0]['address_point'])?>        
		<!-- /Container -->
    <script>
    jQuery(document).ready(function(){
	// Needed variables
	var $content 		= $("#content");
	var $map 				= $('#map'),
		$tabContactClass 	= ('tab-contact')
	
	$content.bind('easytabs:after', function(evt,tab,panel) {
		
		
		if ( tab.hasClass($tabContactClass) ) {

     var map;
      map = new GMaps({
		   scrollwheel: false,
        div: '#map',
        lat: <?=$addr_pt[0]?>,
        lng: <?=$addr_pt[1]?>
      });
      map.addMarker({
        lat: <?=$addr_pt[0]?>,
        lng: <?=$addr_pt[1]?>
//        title: 'Marker with InfoWindow',
//        infoWindow: {
//          content: '<p>HTML Content</p>'
//        }
      });
 		}
  	});
	
	});
    </script>

    </body>
	</html>
	
	<?php
///########################## single page view


	} 
	
if($row[0]['profile_template'] ==2){ 



//$row = $db->query("select * from profile profile where id = '".$userID."'");
//$emp = $db->query("select * from employment where uid = '".$userID."' && active=1");
//$edu = $db->query("select * from education where uid = '".$userID."' && active=1");
//$sprofile = $db->query("select * from social_profiles where active=1");
//$background = $db->query("select * from custom_background where active=1");
//$skill_cat = $db->query("select * from skills_category where uid = '".$userID."' && active=1");
$color = $db->query("select * from colors where active=1");
$color = $db->query("SELECT * FROM  `colors` INNER JOIN  `user_color` ON colors.id = user_color.color_id WHERE uid =  '". $userID ."'");
if(count($color)<1) $color_file="color1.css";
else $color_file=$color[0]['file_name'];

$background = $db->query("SELECT * FROM  `custom_background` INNER JOIN  `user_background` ON custom_background.id = user_background.background_id WHERE uid = '". $userID ."'");
if($background){
	$bg_style='style="background-image: url('.$link.'images/'.$background[0]['background_preview'].');"';
}else{
	$bg_style="";
}

?>
 <!-- Site Css -->
<link rel="stylesheet" type="text/css" href="assets/css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/push_menu.css" />
<link rel="stylesheet" type="text/css" href="assets/css/portfolio.css">
<link rel="stylesheet" type="text/css" href="assets/css/flexslider.css" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/color/<?=$color_file?>" id="color"/>
<link rel="stylesheet" type="text/css" href="assets/css/swipebox.css"> 
<link rel="stylesheet" type="text/css" href="assets/css/animate-custom.css" />
  <link rel="stylesheet" href="css/sweet-alert.css">

<link rel="stylesheet" type="text/css" href="assets/css/banner-style2.css">
 <!--// Site Css -->

<!-- Font Css -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<!-- // Font Css -->

<link rel="icon" type="image/png" href="images/favicon.ico.png">


<link href='http://fonts.googleapis.com/css?family=Grand+Hotel|Clicker+Script|Sacramento' rel='stylesheet' type='text/css'>
<!--<script type="text/javascript" src="js/jquery.quick.pagination.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("ul.progress_bars").quickPagination({pagerLocation:"both",pageSize:"1"});
});
</script>-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
 
<body class="cbp-spmenu-push">


<nav class="cbp-spmenu cbp-spmenu-vertical1 cbp-spmenu-right" id="cbp-spmenu-s4">
      <a  href="#home"><h2><?=$row[0]['name']?></h2></a>
            <ul class="nav">
            <li><a href="#port"><i class="fa fa-suitcase menu_icon"></i><?=PORTFOLIO_TAB?></a></li>
      <li><a href="#aboutme"><i class="fa fa-user menu_icon"></i><?=PROFILE_TAB?></a></li>
      <li><a href="#experience"><i class="fa fa-wrench menu_icon"></i><?=RESUME_TAB?></a></li>
      <li><a href="#education"><i class="fa fa-book menu_icon"></i>Education</a></li>
      <li><a href="#contactus"><i class="fa fa-envelope menu_icon"></i><?=CONTACT_TAB?></a></li>
	  <li><a href="<?=$link?>manage.php"><i class="fa fa-wrench menu_icon"></i>Settings</a></li>
	  <li><a href="<?=$link?>logout.php"><i class="fa fa-book menu_icon"></i>Log out</a></li>
           </ul> 
            
</nav>

<style>
.home_bg2{
	background: url(images/<?=$row[0]['background_image']?>) 50% 0 no-repeat fixed;
	background-size: cover;
	background-position: 100% top;
	overflow: hidden;
	height: 900px;
	margin-top: -110px;
}

.funfacts_bg {
background: url(images/<?=$row[0]['background_image']?>) no-repeat 50% 0 fixed;
background-size: cover;
background-position: 100% top;
}
</style>


<div id="page">       
<div class="main" id="boxed">

<!-- BANNER STARTS
===============================================================================================-->


<div class="container">
<div class="row banners">
<div class="menu_mar">
<div class="menu_right toggle-menu menu-right push-body" >
<img src="assets/images/menu_line.png" alt=""/></div>
</div>
</div>


</div>

<!-- Home Banner -->
<div class="banner_background home_bg2 standard_bg">
<div class="ban_pat2">	
<div class="container">
        <div class="row">
        <div class="home_bg2_content">
			  <div class="content2_text1">
			  <span>I'm <?=$row[0]['name']?> can check out Some Of</span>
			  <span class="content2_text2"><br/>my work</span>
			  <span><br/>here by clicking through the Arrow</span>                  
			  </div>
                  
        <div class="col-md-12 center"><div class="down-arrow"><a href="#port"><img src="assets/images/down-arrow.png" alt=""/></a></div></div>
		
        </div>
        </div>
        
</div>
</div>
</div>

	

<!-- Banner End -->

<!-- PORTFOLIO STARTS
===============================================================================================-->
<div id="port" class="grey_colour">
<div class="clr">
<div class="container" >
<div class="row col-md-12">
  <div class="social-icon element_from_bottom"><div class="center">
  <ul><li class="fa fa-suitcase"><a href="#"></a></li></ul>
  </div></div>
</div></div></div>

<div class="clr container">
<div class="row col-md-12 text-center">
  <h1>My <span>Portfolio</span></h1>
  <div class="tag">We build <span>great sites </span>, thanks for visiting this section. Here’s a collection of some of <span> my favs </span>works.</div>
</div></div>


<!-- Portfolio Section -->    
  <section id="portfolio" class="section">
      <div class="container">
      <!-- Portfolio Filters -->
      <ul id="filters">
          <li class="filter" data-filter="all">All</li>
      <? $portfolio_cat = $db->query("select * from portfolio_category where uid = '".$userID."' && active=1"); 
            foreach ($portfolio_cat as $pcat){ 
            ?>                        
                       <li class="filter" data-filter="<?=str_replace(" ","_",strtolower($pcat['name']))?>"><?=$pcat['name']?></li>
                        <? } ?>
      </ul>
      <!-- End Portfolio Filters -->
    </div>
    <div class="portfolio-top"><?=PORTFOLIO_TOP?></div> 
    <!-- Portfolio Grid -->
    <ul id="portfolio-grid">
  <? $portfolio= $db->query("select * from portfolio where uid = '".$userID."'&& active=1"); 
	foreach ($portfolio as $pfolio){ 
	$search_char = array(" ", ",");
	$replace_char   = array("_", " ");
	$cats="";
						 if($pfolio['category']!=""){
						 $sql="select name from portfolio_category where id in (".$pfolio['category'].") and  active=1";
						 $portfolio_cat = $db->query($sql);
						 foreach ($portfolio_cat as $pcat){ 
						 $cats.=$pcat['name'].", ";
						 }
						 }
	
	?> 
      <li class="mix <?=str_replace($search_char,$replace_char,strtolower($cats))?> graphicmix_all">
        <img src="<?=$link?>images/thumbs/<?=$pfolio['picture']?>" alt="">
        <a href="<?=$link?>images/portfolio/<?=$pfolio['picture']?>" class="swipebox-isotope" title="<?=$pfolio['project_name']?>">
          <div class="project-overlay">
            <h3><?=$pfolio['project_name']?></h3>
        <span class="categorie"><?=substr($cats, 0, -2);?></span> 
          </div>
        </a>
      </li>
    <?  } ?> 
      
   </ul>
    <!-- End Portfolio Grid -->
  </section>
  <!-- End Portfolio Section -->
<div class="pad_top40">&nbsp;</div>
<div class="pad_top50">&nbsp;</div>
</div>
<!-- Portfolio end -->

<!-- ABOUT ME STARTS
===============================================================================================-->
<div class="gray_bg" id="aboutme" <?=$bg_style?> >

<div class="clr">
<div class="container" >
<div class="row col-md-12">
  <div class="social-icon element_from_bottom"><div class="center">
  <ul><li class="fa fa-user"><a href="#"></a></li></ul>
  </div></div>
</div></div></div>

<div class="clearfix">
<div class="clr container">
<div class="row col-md-12 text-center">
  <h1>Personal <span>Profile </span></h1>
    
</div></div>

<div class="clr container pad_top60">
<div class="row">

<div class="col-md-12 clearfix about_mar_left">


<div class="col-md-8 color_bg padleft0">
<div class="clr">
<div class="about_img element_fade_in">
<img src="<?=$link?>images/thumbs_single/<?=$row[0]['picture']?>" class="img-responsive" alt=""/>
<div class="color_bg2">
<div class="about-text2">
<blockquote class="style1"><?=$row[0]['about']?> <span>&nbsp;</span></blockquote></div>
</div>
</div>
<div class="about_content about-text1">
<div class="about-title">I am <span><?=$row[0]['name']?></span>, <?=$row[0]['title']?>.</div><br>
      <ul>
            <li class="phone-txt"><label><?=NAME?></label>  <span><?=$row[0]['name']?></span></li>
                        <li class="phone-txt"><label><?=DOB?></label>   <span><?=$row[0]['date_of_birth']?></span></li>
                        <li class="phone-txt"><label><?=ADDRESS?></label>   <span><?=$row[0]['address']?></span></li>
                        <li class="phone-txt"><label><?=EMAIL?></label>   <span><?=$row[0]['email']?></span></li>
                        <li class="phone-txt"><label><?=PHONE?></label>   <span><?=$row[0]['phone']?></span></li>
                        <li class="phone-txt"><label><?=WEBSITE?></label>   <span><?=$row[0]['website']?></span></li>
                    </ul>
    <div class="sgn"><?=$username?></div>
    </div>
  </div>
  </div>
  
  <div id="personal" class="col-md-4 color_bg1 pad_top15 hold">
  <div class="about-text">My<span>Skills</span></div>
  <ul class="paging2">
    <? foreach ($skill_cat as $scat){ ?>
    
    <li>
      <h3 id="content"><span><?=$scat['name']?></span></h3>
      <ul class="progress_bars">
        <? $skills = $db->query("select * from skills where uid = '".$userID."' && category=".$scat['id']); 
                foreach ($skills as $skill){ 
                ?>
                 <li>
                 <div class="progress_heading"><?=$skill['skill_name']?></div>
                 <div class="bar-wrap">
                  <span data-width="<?=$skill['rating']?>"></span>
                  </div>
                </li> 
       <? }?>

      </ul>
     </li>
    <?php }?>
  </ul>
    </div>   
  </div>
  </div>
</div>
</div>


</div></div>
<!-- About me end -->

<!-- MY SKILLS STARTS


<!-- My Skills end -->


<!-- Fun Facts -->
<div class="slider_background">
<div class="funfacts_bg">
<div class="parallax-overlay"></div>
<div class="container">
        <div class="row funfacts_top">
            <div class="col-md-12">
<!--<div class="col-md-3 element_from_bottom"><div class="funfacts_span3" ><div class="funfacts"><span class="fact_icon" aria-hidden="true" data-icon="&#xe005;" data-js-prompt="&amp;#xe005;"></span>
               <div class="funfacts-num timer" data-to="1697" data-speed="10000"></div><div class="funfacts-text">Happy Clients Worldwide</div></div> </div></div> 
       <div class="col-md-3 element_from_bottom"><div class="funfacts_span3"><div class="funfacts"><span class="fact_icon" aria-hidden="true" data-icon="&#xe044;" data-js-prompt="&amp;#xe044;"></span>
         <div class="funfacts-num timer" data-to="869" data-speed="10000"></div><div class="funfacts-text">Projects Completed</div></div> </div></div> 
      <div class="col-md-3 element_from_bottom"><div class="funfacts_span3"><div class="funfacts"><span class="fact_icon" aria-hidden="true" data-icon="&#xe043;" data-js-prompt="&amp;#xe043;"></span>
        <div class="funfacts-num timer" data-to="15012" data-speed="10000"></div><div class="funfacts-text">Work Hours</div></div> </div></div> 
      <div class="col-md-3 element_from_bottom"><div class="funfacts_span3"><div class="funfacts"><span class="fact_icon" aria-hidden="true" data-icon="&#xe040;" data-js-prompt="&amp;#xe040;"></span>
      <div class="funfacts-num timer" data-to="1410015" data-speed="10000"></div>
      <div class="funfacts-text">Lines Of Coding</div></div> </div></div>  
-->
</div>
        </div>
    </div>
</div>
</div>


    
<!-- // Fun Facts  -->  

<!-- WORK EXPERIENCE  STARTS
===============================================================================================-->
<div class="gray_bg" id="experience" <?=$bg_style?>>

<div class="clr">
<div class="container">
<div class="row col-md-12">
  <div class="social-icon element_from_bottom"><div class="center">
  <ul><li class="fa fa-wrench"><a href="#"></a></li></ul>
  </div></div>
</div></div></div>

<div>
<div class="clr container">
<div class="row col-md-12 text-center">
  <h1><?=EMPLOYMENT?></span></h1>
  <div class="tag"></div>
</div></div>

<div  class="container">
<div class="row">

<div class="main">
      <ul class="cbp_tmtimeline">
      <?
                 foreach ($emp as $employment){
        ?>
      <li>
      <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span><?=date("M Y",strtotime($employment['date_from']))?></span><span><?=($employment['present'])?'Present':date("M Y",strtotime($employment['date_to']))?></span></time>
      <div class="cbp_tmicon"><i class="fa fa-wrench"></i></div>
      <div class="cbp_tmlabel element_from_right">
        <h3><?=$employment['designation']?></span></h3>
        <div class="content-smalltxt"><?=$employment['company_name']?></div>
        <p class="pad_top15"><?=$employment['about_experience']?></p>
      </div>
      </li>
        <? } ?>
      </ul>
</div>
</div>
</div>
<div class="pad_top50">&nbsp;</div>
</div>
</div>

<!-- Twitter -->

<!-- // Twitter --> 
  
<!-- EDUCATION STARTS
===============================================================================================-->

<div id="education" class="gray_bg" <?=$bg_style?> >
<div class="clr">
<div class="container">
<div class="row col-md-12">
  <div class="social-icon element_from_bottom"><div class="center">
  <ul><li class="fa fa-book"><a href="#"></a></li></ul>
  </div></div>
</div></div></div>
<div class="clr container">
<div class="row col-md-12 text-center">


  <h1><?=EDUCATION?></h1>
  <div class="tag"></div>

</div></div>

<div  class="container">
<div class="row">
<div class="main">
        <ul class="cbp_tmtimeline">
        <?
                    foreach ($edu as $education){
            
        ?> 
        <li>
        <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span><?=date("M Y",strtotime($education['date_end']))?></span> <span><?=$education['degree_name']?></span></time>
        <div class="cbp_tmicon"><i class="fa fa-book"></i></div>
        <div class="cbp_tmlabel element_from_right">
          <h3><?=$education['university_name']?></h3>
          <div class="content-smalltxt"><?=$education['degree_name']?></div>
          <p class="pad_top15"><?=$education['about_degree']?></p>
        </div>
        </li>
          <? } ?>
        </ul>
</div>
</div>
</div>

<div class="pad_top50">&nbsp;</div>

</div>
<!-- Education End -->


<!-- Work Experience close -->

<div class="featured1">
<div class="team_btn_bg">
<div class="container">
<div class="row col-md-12 text-center">
</div></div>
</div>
</div>

</div>
 
<!-- BLOG STARTS


<!-- Blog end -->


<!-- CONTACT US STARTS
===============================================================================================-->
<div class="gray_bg"  id="contactus">
<div class="clr">
<div class="container">
<div class="row">
  <div class="social-icon element_from_bottom"><div class="center">
  <ul><li class="fa fa-envelope"> <a href="#"></a></li></ul>
</div></div>
</div></div></div>

<div class="clr">
<div class="clr container">
<div class="row text-center">
</div></div>

<div class="container">
 <div class="row pad_top20">
 <!-- Contact Form -->
                <div id="contact-status"  class="alert alert-danger alert-error"></div>
                <form action="" name="contactform" id="contactform" method="POST" class="horizontal-form" enctype="multipart/form-data">
				
                <div class="clearfix">
                <div class="col-md-6 text-center">
                <div class="control-group">
                            <input name="name" type="text" class="validate['required'] textbox1 element_from_left" placeholder="* Name : "
                            onfocus="this.placeholder = ''" onblur="this.placeholder = '* Name :'" />
                        <span class="help-block"></span></div>
                        
                <div class="control-group">
                            <input name="phone" type="text" class="validate['required','phone']  textbox1 element_from_left"
                            placeholder="* Phone : " onfocus="this.placeholder = ''" onblur="this.placeholder = '* Phone :'"/>
                        <span class="help-block"></span></div>
                
                 <div class="control-group">
                            <input name="email" type="text" class="validate['required','email']  textbox1 element_from_left"
                            placeholder="* Email : " onfocus="this.placeholder = ''" onblur="this.placeholder = '* Email :'"/>
                        <span class="help-block"></span></div>        
                        
                </div>
                <div class="col-md-6 text-center">
                <div class="control-group">
                            <textarea name="message" cols="" rows="" class="validate['required'] messagebox1 element_from_right"
                            placeholder="* Message : " onfocus="this.placeholder = ''" onblur="this.placeholder = '* Message :'"></textarea>
                        <span class="help-block"></span></div>
                </div>
                
                </div>
                <div class="clearfix"></div>
                <div class="clearfix">
                <div class="col-md-12">
                <div class="clearfix text-center">
                <div class="clearfix element_from_bottom">
            <input type="hidden" id="useremail" name="useremail" value="<?=$row[0]['email']?>" />
            <input type="hidden" id="userID" name="userID" value="<?=$row[0]['id']?>" />
                
                 <input type="submit" name="submit" value="Send Messages" class="btn btn-3 btn-3d" />
				
                </div>
                </div>
                </div>
                        </div>
                <input type="hidden" name="contact_form" value="contact_form" />
                </form><div id="post_message" class="post_message"></div>
        <!-- // Contact Form -->
 </div>
 

 
</div>
</div>
    <div class="clearfix pad_top50">&nbsp;</div>
</div>
<!-- Contact Us End -->

<!-- FOOTER STARTS
===============================================================================================-->
<div class="add_bg">
<div class="container">
<div class="row">
<div class="col-md-6 element_from_left">
 <div class="phone-txt">
    <a href="https://www.google.com/maps/place/142nd+Ct+W,+Rosemount,+MN+55068/@44.7429079,-93.0987582,18z/data=!4m2!3m1!1s0x87f63352a74e05f5:0xc4dbfe3665937476"><i class="fa fa-map-marker contact_icon"></i></a> <?=$row[0]['address']?> <br>
  <i class="fa"></i> <?=NAME?>: <?=$row[0]['name']?>
 </div>
</div>
<div class="col-md-6 align element_from_right">
 <div class="phone-txt">
                    <i class="fa fa-phone contact_icon"></i> <?=PHONE?>: <?=$row[0]['phone']?> <br>
                    <i class="fa fa-envelope contact_icon"></i>&nbsp;<?=WEBSITE?>: <?=$row[0]['website']?>
                   
  </div>
</div>

</div>
</div>
</div>


<!--blog_bg close-->

<div class="footer_bg">
<div class="container">
<div class="row">

<div class="clearfix element_from_bottom">
    <div class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
	
        <div class="hi-icon"><a href="https://www.twitter.com/sheensol" target="_blank" class="fa fa-twitter foot_icon"></a></div>
        <div class="hi-icon"><a href="https://www.facebook.com/sheensoltechnologies" class="fa fa-facebook foot_icon"></a></div>
        <div class="hi-icon"><a href="http://www.linkedin.com/in/sheensol" class="fa fa-linkedin foot_icon"></a></div>
        <div class="hi-icon"><a href="https://plus.google.com/+Sheensol" class="fa fa-google-plus foot_icon"></a></div>
		
    </div>
</div>
<div class="pad_top20 clearfix copyright">
Copyright &copy; 2021 <?=$row[0]['name']?></div>

</div></div></div>
</div>
        
</div>
        
 <script type="text/javascript" src="<?=$link?>assets/js/jquery.queryloader2.js"></script>
 <script type="text/javascript" src="<?=$link?>assets/js/appear.js"></script>
<script type="text/javascript" src="<?=$link?>assets/js/toucheffects.js"></script>
<script type="text/javascript" src="<?=$link?>assets/js/sscr.js"></script>

<!--form validation these scripts must for this kind of validation-->
    <script src="js/general.js"></script>
    <script src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=$link?>assets/js/jquery.swipebox.js"></script>
<script type="text/javascript" src="<?=$link?>assets/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="<?=$link?>assets/js/jquery.countTo.js"></script>
<script type="text/javascript" src="<?=$link?>assets/js/jPushMenu.js"></script>

<script type="text/javascript" src="<?=$link?>assets/js/jquery.parallax-1.1.3.js"></script>


<script type="text/javascript" src="<?=$link?>assets/js/jquery.flexslider-min.js"></script>

<!-- include retina js -->
<script type="text/javascript" src="<?=$link?>assets/js/retina-1.1.0.min.js"></script>

<!--Vegas Slider -->
<script type="text/javascript" src="<?=$link?>assets/js/jquery.vegas.js"></script>

<script type="text/javascript" src="<?=$link?>assets/js/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="<?=$link?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?=$link?>js/quickpager.jquery.js"></script>
<script type="text/javascript" src="js/jquery.bootstrap-growl.js"></script>
  <script type="text/javascript" src="js/sweet-alert.js"></script>

        <script type="text/javascript">
        /* <![CDATA[ */

        $(document).ready(function() {
            
            $("ul.paging2").quickPager({pagerLocation:"bottom",pageSize:"1"});
        });

        /* ]]> */
		
$(document).ready(function(){
"use strict";	
/* custom function VEGAS Home Slider */
	function loadVegas(){
		$.vegas('slideshow', {
			  backgrounds:[
				{ src:'images/<?=$row[0]['background_image']?>', fade:1000 },
				{ src:'images/<?=$row[0]['background_image']?>', fade:1000 },
				{ src:'images/<?=$row[0]['background_image']?>', fade:1000 },
			  ]
			})('overlay', {
			  src:'assets/css/style.css'
			});
			$( "#vegas-next" ).click(function() {
			  $.vegas('next');
			});
			$( "#vegas-prev" ).click(function() {
			  $.vegas('previous');
		});
	}
	
	loadVegas();
});
		
        </script>

        <style type="text/css">

.simplePagerContainer ul{
min-height: 300px;
list-style:none;
}
ul.red {
    outline:10px solid red;
}

ul.simplePagerNav li {
display: block;
floaT: left;
padding: 4px;
/* margin-bottom: 11px; */
font-family: Roboto, Arial, sans-serif;
width: 30px;
border-radius: 3px;
text-align: center;
}

ul.simplePagerNav li a {
color: #333;
text-decoration: none;
font-size: 20px;
}

li.currentPage {
    background: red;
        background: #83bd63;    
}

ul.simplePagerNav li.currentPage a {
color: #fff;
width: 30px;
}

.portfolio
{
color:inherit;
}

</style>

</body>
</html>


	<?php }

$db->CloseConnection();
ob_end_flush(); 
	?>