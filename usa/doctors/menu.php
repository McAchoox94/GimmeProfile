<div class="navbar navbar-fixed-top navbar-top">
    	<div class="container">
        	<div class="navbar-header">
         		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<!--<a href="<?=$link?>" class="navbar-brand"><img src="images/logo.png"></a>-->
        	</div>
			
        	<div class="navbar-collapse collapse">
                <? if(isset($_SESSION['logged_in'])){?>
                <ul class="nav navbar-nav navbar-pull-right">

	          	<? if($_SESSION['userrole']=="admin"){?>			          				
                <li>
                	<a href="<?=$link?>manage.php" class="nav-btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Admin Dashboard">
	          		<span class="glyphicon glyphicon-cog"></span>
	          		</a>
					
	          	</li>
                <? } ?>
				
<?
	if($_SESSION['user_pic']!="" || $_SESSION['user_pic']!=NULL){
		$picture=$link."images/".$_SESSION['user_pic'];
		if ( !is_url_exist($picture)) {
 			$picture=$link."images/placeholder.png";
 		}
		
	}else{
		$picture=$link."images/placeholder.png";
	}

?> 				<li class="dropdown">
  						<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"><?=$_SESSION['FullName']?>
						<img src="<?=$picture?>" class="avatar"> <b class="caret"></b></a>
					
					<ul class="dropdown-menu">
						<? if($_SESSION['userrole']=="admin"){?>
						<li><a href="<?=$link?><?=$_SESSION['username']?>">Profile</a></li>
						<li><a href="<?=$link?>logout.php">Log out</a></li>
						<? } else { ?>
						<li><a href="<?=$link?><?=$_SESSION['username']?>">Profile</a></li>
						<li><a href="<?=$link?>manage.php">Settings</a></li>
						<li><a href="<?=$link?>logout.php">Log out</a></li>
						<?php } ?>
					</ul>
				</li>
 				</ul>
                                    <? } else { ?>
                                    
                                    
                            <ul class="nav navbar-nav navbar-pull-right">
                            <li><a href="login.php" >Log in</a></li>
                            <!--<li><a href="signup.php">Sign up</a></li>-->
                            </ul>
                                    <? } ?>
        	</div>
      	</div>
    </div>