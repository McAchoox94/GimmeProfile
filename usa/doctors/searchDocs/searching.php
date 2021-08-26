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
    $link = mysqli_connect($location, $user, $pass); 
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    //Database Selection
    mysqli_select_db($link,'profile_doctors_usa') or die(mysql_error());
if (isset($_GET['page'])) {
    # code...
    $page = $_GET['page'];
} else{
    $page = 1;
}
if (isset($_GET['per_page'])) {
    # code...
    $per_page = $_GET['per_page'];
} else{
    $per_page = 10;
}
$start= $per_page * $page - $per_page;
$end= $per_page;

    //verify that a value is inserted 
    if (empty($_GET["name"])and empty($_GET["specialty"])and empty($_GET["city"])) {
        $num = 0;
    }
    else{
        if (empty($_GET["name"])){
            if (empty($_GET["specialty"])){
                //we have the city or state
                $searchsql = "SELECT DISTINCT * FROM `profile` WHERE `address` LIKE '%".$_GET["city"]."%' LIMIT $start,$end";
            }
            else if (empty($_GET["city"])){
                //we have the speciality 
                $searchsql = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%' LIMIT $start,$end";
            }
            else {
                //we have the speciality and the city or state
                $searchsql = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%' AND `address` LIKE '%".$_GET["city"]."%' LIMIT $start,$end";
            }
        }
        else if (empty($_GET["specialty"])){
            if (empty($_GET["city"])){
                //we have the name
                $searchsql = "SELECT DISTINCT * FROM `profile` WHERE `name` LIKE '%".$_GET["name"]."%' LIMIT $start,$end";
            }
            else {
                // we have name and city or state
                $searchsql = "SELECT DISTINCT * FROM `profile` WHERE `address` LIKE '%".$_GET["city"]."%' AND `name` LIKE '%".$_GET["name"]."%' LIMIT $start,$end";
    
            }
        }
        else if (empty($_GET["city"])){
            //we have specialty and name
            $searchsql = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%' AND `name` LIKE '%".$_GET["name"]."%' LIMIT $start,$end";
        }
        else {
            //we have all the three of them
            $searchsql = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%' AND `name` LIKE '%".$_GET["name"]."%' AND `address` LIKE '%".$_GET["city"]."%' LIMIT $start,$end";
        }
    

    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gimmeprofile - search platform</title>
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
<style type="text/css">
    div.scroll {
                margin:4px, 4px;
                padding:4px;
                height: 300px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }
    div.scroll2 {
                margin:4px, 4px;
                padding:4px;
                height: 200px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }
    div.scroll3 {
                margin:4px, 4px;
                padding:4px;
                height: 200px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }   
  </style>

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


    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
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
                                        <a class="dropdown-item" href="single-blog.html">Single post</a>
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
                            
                          <!--  <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="ad-listing.html"><i class="fa fa-plus-circle"></i> Add Listing</a>
                                </li>
                            </ul>-->
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
                        <form method="get" action="searching.php">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" name="name" class="form-control my-2 my-lg-0" value ="<?php if(!empty($_GET["name"])){echo$_GET["name"];}?>" id="inputtext4" placeholder="Search doctor">
                                    <div class="list-group scroll" id="show-list" style="display: none;"></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="specialty" class="form-control my-2 my-lg-0" value ="<?php if(!empty($_GET["specialty"])){echo$_GET["specialty"];}?>" id="inputCategory4" placeholder="Specialty">
                                    <div class="list-group scroll" id="show-list2" style="display: none;"></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="city" class="form-control my-2 my-lg-0" value ="<?php if(!empty($_GET["city"])){echo$_GET["city"];}?>" id="inputLocation4" placeholder="City, state or zip Code">
                                    <div class="list-group scroll3" id="show-list3" style="display: none;"></div>
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
                    
<?php 
    if (empty($_GET["name"])and empty($_GET["specialty"])and empty($_GET["city"])) {
        $str = "";
    }
    else{
        if (empty($_GET["name"])){
            if (empty($_GET["specialty"])){
                //we have the city or state
                $str = $_GET["city"];
            }
            else if (empty($_GET["city"])){
                //we have the speciality 
                $str = $_GET["specialty"];
            }
            else {
                //we have the speciality and the city or state
                $str = $_GET["specialty"]." and ".$_GET["city"];
            }
        }
        else if (empty($_GET["specialty"])){
            if (empty($_GET["city"])){
                //we have the name
                $str = $_GET["name"];
            }
            else {
                // we have name and city or state
                $str = $_GET["name"]." and ".$_GET["city"];
            }
        }
        else if (empty($_GET["city"])){
            //we have specialty and name
            $str = $_GET["name"]." and ".$_GET["specialty"];
        }
        else {
            //we have all the three of them
            $str = $_GET["name"]." and ".$_GET["specialty"]." and ".$_GET["city"];
        }

    }
    
    date_default_timezone_set('Africa/Casablanca');
    $date = date('Y/m/d H:i:s',time());
    if (empty($_GET["name"])and empty($_GET["specialty"])and empty($_GET["city"])) {
        $num = 0;
    }
    else{
    $searchquery = mysqli_query($link,$searchsql)or die('Invalid query: ' . mysql_error());
    $num = mysqli_num_rows($searchquery);
    if ($num !=0){
        $searchres = mysqli_fetch_assoc($searchquery);
    }
}

?>                    
                    <h2>Results For <?php echo $str ?></h2>
                    <p><?php echo $num ?> Results on <?php echo $date ?></p>
                    
                </div>
            </div>
        </div>
        
                    
                   
                   
                   

                        
                        
                        
                        
            </div>
        </div>
    </div>
</section>

   
  
<div class="container-fluid">

<?php if ($num !=0) {
    $select_query = mysqli_query($link,$searchsql);
                        while ($data=mysqli_fetch_assoc($select_query)) {
                             # code...
                         
                      
                            
                            ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 mt-4">

                                    <div class="media align-items-center mb-4">
                                    <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0"><?php echo $data['name']?></h3>
                                        <p class="text-muted mb-0"><?php echo $data['title']?></p>
                                    </div>
                                </div>

                                <h4>About Me</h4>
                                <p class="text-muted"><?php echo $data['about']?></p>
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span><?php echo $data['phone']?></span></li>
                                    <li><strong class="text-dark mr-4">Addresse</strong> <span><?php echo $data['address']?></span></li>
                                </ul>



                                <?php 
                         echo '<a href="appointment.php?id='.$data["id"].'">
                         <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline settings-row-btn" data-toggle="tooltip" data-original-title="Book"><i class="ti-marker-alt" ></i></button></a>
                        '; 
                        ?>
                                    
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card-box m-b-20" style="margin-top: 60px">
                                        <div class="col-12 text-center">
                                        <button class="btn btn-transparent" onClick="window.location.href='appointment.html'" style="margin: 10px;">Book an Appointment</button> <br>
                                        <a href="https://gimmeprofile.com/usa/doctors/<?php echo $data['username'] ?>" target="_blank" style="color: white;"><button class="btn btn-transparent">View full profile</button></a>  
                                    </div>
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>

                <?php }
                    }
                    ?>

            </div>

           
<?php 
            if (empty($_GET["name"])and empty($_GET["specialty"])and empty($_GET["city"])) {
        $num = 0;
    }
    else{
        if (empty($_GET["name"])){
            if (empty($_GET["specialty"])){
                //we have the city or state
                $select_all = "SELECT DISTINCT * FROM `profile` WHERE `address` LIKE '%".$_GET["city"]."%'";
            }
            else if (empty($_GET["city"])){
                //we have the speciality 
                $select_all = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%'";
            }
            else {
                //we have the speciality and the city or state
                $select_all = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%' AND `address` LIKE '%".$_GET["city"]."%'";
            }
        }
        else if (empty($_GET["specialty"])){
            if (empty($_GET["city"])){
                //we have the name
                $select_all = "SELECT DISTINCT * FROM `profile` WHERE `name` LIKE '%".$_GET["name"]."%'";
            }
            else {
                // we have name and city or state
                $select_all = "SELECT DISTINCT * FROM `profile` WHERE `address` LIKE '%".$_GET["city"]."%' AND `name` LIKE '%".$_GET["name"]."%'";
    
            }
        }
        else if (empty($_GET["city"])){
            //we have specialty and name
            $select_all = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%' AND `name` LIKE '%".$_GET["name"]."%'";
        }
        else {
            //we have all the three of them
            $select_all = "SELECT DISTINCT * FROM `profile` WHERE `title` LIKE '%".$_GET["specialty"]."%' AND `name` LIKE '%".$_GET["name"]."%' AND `address` LIKE '%".$_GET["city"]."%'";
        }
    

    }

        
        $query_all = mysqli_query($link,$select_all);
        $rows=mysqli_num_rows($query_all);

        $pages = ceil($rows/$per_page);
 ?>
            <div class="pagination justify-content-center">
                    <nav aria-label="Page navigation example">
                        
                        <ul class="pagination">
                            <li class="page-item">
                                <?php 
                                if ($page!=1) {
                                $prev=$page-1;
                                } else { 
                                $prev=$page;
                                }
                                ?>
                                <a class="page-link" href="searching.php?name=<?php echo $_GET["name"]; ?>&specialty=<?php echo $_GET["specialty"]; ?>&city=<?php echo $_GET["city"]; ?>&page=<?php echo $prev; ?>&per_page=<?php echo $per_page; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
<?php  
                                if ($page+3<$pages-1) {     
                                $p=$page; $p3= $page+3;                           
                                 }
                                else {
                                    $p=$pages-3; $p3= $page-2;  }
if ($p>0) {
    # code...

                                for ($x=$p; $x <= $p3 ; $x++){ 
                                    
                          ?>
                            <li class="page-item"><a class="page-link" href="searching.php?name=<?php echo $_GET["name"]; ?>&specialty=<?php echo $_GET["specialty"]; ?>&city=<?php echo $_GET["city"]; ?>&page=<?php echo $x; ?>&per_page=<?php echo $per_page; ?>"><?php echo $x; ?></a></li>
                            <?php 
                    }}
                         ?>
                          
                         
                            <li class="page-item">
                                 <?php 
                                 if ($page!=$pages) {
                                $next=$page+1;
                                } else { 
                                $next=$pages;
                                } 
                                ?>
                                <a class="page-link" href="searching.php?name=<?php echo $_GET["name"]; ?>&specialty=<?php echo $_GET["specialty"]; ?>&city=<?php echo $_GET["city"]; ?>&page=<?php echo $next; ?>&per_page=<?php echo $per_page; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul> 
                    </nav>
                </div>
  

                <footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container" style="max-width: 1400px;">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="images/logo-footer.png" alt="">
          <!-- description -->
          <p class="alt-color">DOCS NETWORK is revolutionising the global healthcare market, enabling patients to search, book and review clinics and hospitals online.</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-3 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Our other websites</h4>
          <ul>
            <li><a href="http://eatingnearme.com/" href="_blank">Eatingnearme</a></li>
            <li><a href="https://gimmeprofile.com/" href="_blank">Gimmeprofile</a></li>
            <li><a href="https://businessmanagementplus.com/" href="_blank">Businessmanagementplus</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-3 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>À propos de Docs Networks</h4>
          <ul>
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="contact-us.html">Contact Us</a></li>
            <li><a href="terms-condition.html" href="_blank">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <!-- Promotion -->
      <div class="col-lg-2 col-md-6">
        <!-- App promotion -->
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              <!-- Icon -->
              <img src="images/footer/phone-icon.png" alt="mobile-icon">
            </a>
            <p>Mobile App</p>
          </div>
          <div class="download-btn d-flex my-3">
            <a href="https://play.google.com/store/apps/details?id=com.gimme.number" href="_blank"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
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
            </script>. All Rights Reserved, theme by <a class="text-primary" href="https://icvachrafboujjou.web.app/" target="_blank">_BA</a></p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-twitter" href="https://twitter.com/boujjouachraf" target="_blank"></a></li>
          <li><a class="fa fa-linkedin" href="https://www.linkedin.com/in/achrafboujjou/" target="_blank"></a></li>
          <li><a class="fa fa-github" href="https://github.com/McAchoox94" target="_blank"></a></li>
		  <li><a class="fa fa-facebook" href="https://www.facebook.com/McAchoox94" target="_blank"></a></li>
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


<script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    
    <script src="./plugins/jqueryui/js/jquery-ui.min.js"></script>
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/fullcalendar/js/fullcalendar.min.js"></script>
    <script src="./js/plugins-init/fullcalendar-init.js"></script>
    <script>
    $(document).ready(function () {
  // Send Search Text to the server
  $("#inputtext4").keyup(function () {
    $("#show-list").show();
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "search_auto.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
      $("#show-list").hide();
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "#a2", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});
        $(document).ready(function () {
  // Send Search Text to the server
  $("#inputCategory4").keyup(function () {
    $("#show-list2").show();
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "search_auto.php",
        method: "post",
        data: {
          query2: searchText,
        },
        success: function (response) {
          $("#show-list2").html(response);
        },
      });
    } else {
      $("#show-list2").html("");
      $("#show-list2").hide();
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "#a3", function () {
    $("#my_field").val($(this).text());
    $("#show-list2").html("");
  });
});
$(document).ready(function () {
  // Send Search Text to the server
  $("#inputLocation4").keyup(function () {
  	$("#show-list3").show();
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "search_auto.php",
        method: "post",
        data: {
          query3: searchText,
        },
        success: function (response) {
          $("#show-list3").html(response);
        },
      });
    } else {
      $("#show-list3").html("");
      $("#show-list3").hide();
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "#a3", function () {
    $("#inputLocation4").val($(this).text());
    $("#show-list3").html("");
  });
});
  </script>
</body>

</html>