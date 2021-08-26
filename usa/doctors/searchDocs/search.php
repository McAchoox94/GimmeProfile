<?php 
    $location = "etsbelbarakacom.ipagemysql.com";
    $user = "etsbelbarakacom";
    $pass = "@@AchrafBj94!!";
    $link ='https://gimmeprofile.com/usa/doctors/';

    //function to verify a url exists
    function is_url_exist($url){
        $ch = curl_init($url);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        if($code == 200){
           $status = true;
        }else{
          $status = false;
        }
        curl_close($ch);
       return $status;
    }
    //Database Selection
    $link = mysql_connect($location, $user, $pass); 
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    //Database Selection
    mysql_select_db('profile_doctors_usa') or die(mysql_error());

    //verify that a value is inserted 
    if (empty($_POST["name"])and empty($_POST["specialty"])and empty($_POST["city"])) {
        $num = 0;
    }
    else{
        if (empty($_POST["name"])){
            if (empty($_POST["specialty"])){
                //we have the city or state
                $searchsql = "SELECT * FROM `profile` WHERE `address` LIKE '%".$_POST["city"]."%'";
            }
            else if (empty($_POST["city"])){
                //we have the speciality 
                $searchsql = "SELECT * FROM `profile` WHERE `title` LIKE '%".$_POST["specialty"]."%'";
            }
            else {
                //we have the speciality and the city or state
                $searchsql = "SELECT * FROM `profile` WHERE `title` LIKE '%".$_POST["specialty"]."%' AND `address` LIKE '%".$_POST["city"]."%'";
            }
        }
        else if (empty($_POST["specialty"])){
            if (empty($_POST["city"])){
                //we have the name
                $searchsql = "SELECT * FROM `profile` WHERE `name` LIKE '%".$_POST["name"]."%'";
            }
            else {
                // we have name and city or state
                $searchsql = "SELECT * FROM `profile` WHERE `address` LIKE '%".$_POST["city"]."%' AND `name` LIKE '%".$_POST["name"]."%'";
    
            }
        }
        else if (empty($_POST["city"])){
            //we have specialty and name
            $searchsql = "SELECT * FROM `profile` WHERE `title` LIKE '%".$_POST["specialty"]."%' AND `name` LIKE '%".$_POST["name"]."%'";
        }
        else {
            //we have all the three of them
            $searchsql = "SELECT * FROM `profile` WHERE `title` LIKE '%".$_POST["specialty"]."%' AND `name` LIKE '%".$_POST["name"]."%' AND `address` LIKE '%".$_POST["city"]."%'";
        }
    

    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="./plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="./plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="./plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="./plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">


    <link href="img/favicon.png" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
    <!-- Font Awesome -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="index.php">
                            <img src="images/logo.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Dashboard<span><i class="fa fa-angle-down"></i></span>
                                    </a>
    
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="dashboard.html">Dashboard</a>
                                        <a class="dropdown-item" href="dashboard-my-ads.html">Dashboard My Ads</a>
                                        <a class="dropdown-item" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a>
                                        <a class="dropdown-item" href="dashboard-archived-ads.html">Dashboard Archived Ads</a>
                                        <a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="about-us.html">About Us</a>
                                        <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                        <a class="dropdown-item" href="user-profile.html">User Profile</a>
                                        <a class="dropdown-item" href="404.html">404 Page</a>
                                        <a class="dropdown-item" href="package.html">Package</a>
                                        <a class="dropdown-item" href="single.html">Single Page</a>
                                        <a class="dropdown-item" href="store.html">Store Single</a>
                                        <a class="dropdown-item" href="single-blog.html">Single Post</a>
                                        <a class="dropdown-item" href="blog.html">Blog</a>
    
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Listing <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="category.html">Ad-Gird View</a>
                                        <a class="dropdown-item" href="ad-listing-list.html">Ad-List View</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="ad-listing.html"><i class="fa fa-plus-circle"></i> Add Listing</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form method="post" action="search.php">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" name="name" class="form-control my-2 my-lg-0" value ="<?if(!empty($_POST["name"])){echo$_POST["name"];}?>" id="inputtext4" placeholder="Search doctor">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="specialty" class="form-control my-2 my-lg-0" value ="<?if(!empty($_POST["specialty"])){echo$_POST["specialty"];}?>" id="inputCategory4" placeholder="Specialty">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="city" class="form-control my-2 my-lg-0" value ="<?if(!empty($_POST["city"])){echo$_POST["city"];}?>" id="inputLocation4" placeholder="City, state or zip Code">
                                </div>
                                <div class="form-group col-md-2">
                                    
                                    <button type="submit" class="btn btn-primary">Search Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					
<?
    if (empty($_POST["name"])and empty($_POST["specialty"])and empty($_POST["city"])) {
        $str = "";
    }
    else{
        if (empty($_POST["name"])){
            if (empty($_POST["specialty"])){
                //we have the city or state
                $str = $_POST["city"];
            }
            else if (empty($_POST["city"])){
                //we have the speciality 
                $str = $_POST["specialty"];
            }
            else {
                //we have the speciality and the city or state
                $str = $_POST["specialty"]." and ".$_POST["city"];
            }
        }
        else if (empty($_POST["specialty"])){
            if (empty($_POST["city"])){
                //we have the name
                $str = $_POST["name"];
            }
            else {
                // we have name and city or state
                $str = $_POST["name"]." and ".$_POST["city"];
            }
        }
        else if (empty($_POST["city"])){
            //we have specialty and name
            $str = $_POST["name"]." and ".$_POST["specialty"];
        }
        else {
            //we have all the three of them
            $str = $_POST["name"]." and ".$_POST["specialty"]." and ".$_POST["city"];
        }

    }
    
    date_default_timezone_set('Africa/Casablanca');
    $date = date('Y/m/d H:i:s',time());
    if (empty($_POST["name"])and empty($_POST["specialty"])and empty($_POST["city"])) {
        $num = 0;
    }
    else{
    $searchquery = mysql_query($searchsql)or die('Invalid query: ' . mysql_error());
    $num = mysql_num_rows($searchquery);
    if ($num !=0){
        $searchres = mysql_fetch_assoc($searchquery);
    }
}

?>                    
					<h2>Results For <?echo $str ?></h2>
                    <p><?echo $num ?> Results on <?echo $date ?></p>
                    
				</div>
			</div>
		</div>
        
                    
                   
                   
                   

						
						
						
						
			</div>
		</div>
	</div>
</section>

   
    <div id="main-wrapper">

     
        <div class="content-body">

            
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                <?php if ($num !=0) {
                        do { 
                      
                            
                            ?>
                    <div class="col-12">
                    
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0"><?echo $searchres['name']?></h3>
                                        <p class="text-muted mb-0"><?echo $searchres['title']?></p>
                                    </div>
                                </div>
                                

                            </div>

                            <div class="row mb-5">
                                   

                                   <div class="card-body">
                                      
                                       <div class="row form-material">
                                       
                                       <div class="col-md-6">

                                       <h4>About Me</h4>
                                <p class="text-muted"><?echo $searchres['about']?></p>
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span><?echo $searchres['phone']?></span></li>
                                    <li><strong class="text-dark mr-4">Adresse</strong> <span><?echo $searchres['address']?></span></li>
                                    
                                </ul>
                             
                               
                                     
                                    </div>
       
                                           <div class="col-md-3">
                                               <div class="text-center">
                                                   <h5 class="box-title m-t-30">schedules</h5>
                                                   <div>
                                                       <div id="datepicker-inline"></div>
                                                   </div>
                                               </div>
                                          
                                           </div>
                                           <div class="col-12 text-center">
                                        <button class="btn btn-transparent" onClick="window.location.href='appointment.html'">Book an Appointment</button>
                                    </div>
                                           
                                          
                                         
                                       </div>
                                   </div>
       
                               </div>


                        </div>  


                       
                    
                     
                      
                     
                    </div>
                </div>

                <?php }while($searchres = mysql_fetch_assoc($searchquery));
                    }
                    ?>
            </div>
            <!-- #/ container -->
        </div>
       
        <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>

    </div>

    
  

    <footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="images/logo-footer.png" alt="">
          <!-- description -->
          <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Site Pages</h4>
          <ul>
            <li><a href="#">Boston</a></li>
            <li><a href="#">How It works</a></li>
            <li><a href="#">Deals & Coupons</a></li>
            <li><a href="#">Articls & Tips</a></li>
            <li><a href="terms-condition.html">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Admin Pages</h4>
          <ul>
            <li><a href="category.html">Category</a></li>
            <li><a href="single.html">Single Page</a></li>
            <li><a href="store.html">Store Single</a></li>
            <li><a href="single-blog.html">Single Post</a>
            </li>
            <li><a href="blog.html">Blog</a></li>



          </ul>
        </div>
      </div>
      <!-- Promotion -->
      <div class="col-lg-4 col-md-7">
        <!-- App promotion -->
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              <!-- Icon -->
              <img src="images/footer/phone-icon.png" alt="mobile-icon">
            </a>
            <p>Get the Dealsy Mobile App and Save more</p>
          </div>
          <div class="download-btn d-flex my-3">
            <a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
            <a href="#" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. All Rights Reserved, theme by <a class="text-primary" href="https://themefisher.com" target="_blank">themefisher.com</a></p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-vimeo" href=""></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/moment/moment.js"></script>
    <script src="./plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="./plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="./plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="./plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="./plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="./plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="./plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="./js/plugins-init/form-pickers-init.js"></script>


    <script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>

</html>