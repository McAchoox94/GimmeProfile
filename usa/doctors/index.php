<!-- Add your content of head and header -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  <link href="./assets/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="./assets/favicon.ico" rel="icon">

  <title>Doctors - USA</title>  

<link href="./main.97292821.css" rel="stylesheet"></head>

<body>

 <!-- Add your content of header -->
<header>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-collapse">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="./index.php#contact-section-container" title="" class="anchor-link">Contact Us</a></li>
            <li>
                <p>
                    <a href="login.php" class="btn btn-default navbar-btn" >Login</a>
                </p>
            </li>


        </ul>

      </div>
    </div>
  </nav>
</header>



<!-- Add your site or app content here -->
<div class="background-image-container white-text-container" style="background-image: url('./images/doctors.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Welcome to USA  doctors profile search</h1>
                <p class="">Extended details on  the best of USA health professionals</p>
                <a href="signup.php" class="btn btn-primary btn-lg">Build Your Profile Now</a>
                <a href="./searchDocs/index.php" class="btn btn-primary btn-lg">Find Doctors Near You</a>
            </div>
        </div>
    </div>
</div>


<div class="section-container" id="contact-section-container">
    <div class="container contact-form-container">
        <div class="row">
            <div class="col-xs-12 col-md-offset-2 col-md-8">
                <div class="section-container-spacer">
                    <h2 class="text-center">Contact Us</h2>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter your message"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="option1">Email me a copy
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox2" value="option2">I am a human
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Send message</button>
                    <a href="" class="btn btn-default">Reset</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class='container-fluid'>
        <div class="row map-container">
            <div id="map"></div>
            <div class="col-xs-10 col-md-4 contact-block-container reveal">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h3>Phone</h3>
                        <p>+1 7185 699 826</p>

                        <h3>E-mail</h3>
                        <p>legsai@businessmanagementplus.com</p>

                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <h3>Address</h3>
                        <p>7511 fort Hamilton parkway 
                            Brooklyn NY 11228</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function (event) {
    
  googleMapInit(); 
  scrollToAnchor();
  scrollRevelation('reveal');
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function (event) {
  navbarToggleSidebar();
});
</script>


<script type="text/javascript" src="./main.faaf51f9.js"></script>