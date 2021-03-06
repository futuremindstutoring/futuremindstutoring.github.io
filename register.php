<?php
// define variables and set to empty values
$firstname = $lastname = $email = "";
$reg_page = "register.html";
$error_msg=array(); 

if (!isset($_POST['submit'])) {
    header( "Location: $reg_page" );
  }

if (isset($_POST["submit"])) {
  if(empty($_POST[firstname])){
    $error_msg = "Error: Name is required";
  }
  else{
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $error_msg = "Error: Only letters and white space allowed";
    }

  }
  
  if(empty($_POST[firstname])){
    $error_msg = "Error: Name is required";
  }
  else{
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $error_msg = "Only letters and white space allowed";
    }
  }
  
  if(empty($_POST[firstname])){
    $error_msg = "Error: Name is required";
  }
  else{
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_msg = "Error: Invalid email format";
    }
  }

  if(!($error_msg)) {
    $formcontent=
    "First Name: $firstname\n" .
    "Last Name: $lastname\n\n" .
    "Email: $email\n\n"  . ;
    $recepient="asanjay@umich.edu";
    $subject="FutureMinds Registration";
    mail($recepient,$subject,$formcontent);
    header ("Location: thanks.html");
    exit();
  }
  
  else {
      if ($error_msg) {
        echo '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta name="format-detection" content="telephone=no">
                <meta charset="utf-8">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">

                <title>FutureMinds</title>
                <meta content="" name="descriptison">
                <meta content="" name="keywords">

                <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
                <meta property="og:title" content="">
                <meta property="og:image" content="">
                <meta property="og:url" content="">
                <meta property="og:site_name" content="">
                <meta property="og:description" content="">

                <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
                <meta name="twitter:card" content="summary">
                <meta name="twitter:site" content="">
                <meta name="twitter:title" content="">
                <meta name="twitter:description" content="">
                <meta name="twitter:image" content="">

                <!-- Favicons -->
                <link href="assets/img/favicon.png" rel="icon">
                <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

                <!-- Google Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

                <!-- Vendor CSS Files -->
                <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
                <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
                <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

                <!-- Template Main CSS File -->
                <link href="assets/css/style.css" rel="stylesheet">

                <!-- =======================================================
                * Template Name: Imperial - v2.0.0
                * Template URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
                * Author: BootstrapMade.com
                * License: https://bootstrapmade.com/license/
                ======================================================== -->
            </head>

            <body>
                <!-- ======= Header ======= -->
                <header id="header">
                    <div class="container">

                        <div id="logo" class="pull-left">
                            <a href="index.html"><img src="assets/img/logo2.png" alt=""></a>
                            <!-- Uncomment below if you prefer to use a text image -->
                            <!--<h1><a href="index.html">Header 1</a></h1>-->
                        </div>

                        <div class= "pull-right">
                            <a href="index.html"> <img src="assets/img/home4.png" alt="" style = "float:right; padding: 4px;margin: 10px;max-height: 30px;"></a>
                        </div>
                    </div>
                </header><!-- End Header -->

                <!-- ======= Registration Form ======= -->
                <section id="registration">
                    <div class="container wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="section-title">Register</h3>
                                <div class="section-title-divider"></div>
                                <p class="section-description"><i>Fill out the form below to the best of your ability. Were looking forward to meeting you!</i></p>
                            </div>
                        </div>
		                <p>Unfortunately, your message could not be sent. The form as you filled it out is displayed below. Make sure each field completed, and please also address any issues listed below:</p>
		                <ul class="err">';

                            foreach ($error_msg as $err) {
                            echo '<li>'.$err.'</li>';
                            }
                            echo '</ul>

                            <form method="post"  action="', $_SERVER['PHP_SELF'], '">
                            First Name: <input type="text" name="firstname" />
                            <span class="error">* </span>
                            <br /> <br />
                            Last Name: <input type="text" name="lastname" />
                            <span class="error">* </span>
                            <br /> <br />
                            Email: <input type="text" name="email" />
                            <span class="error">* </span>
                            <br /><br />
                            <input type="hidden" name="form_submitted" value="1" />
                            <input type="submit" value="Submit" />
                        </form> 
                    </div>
                </section>
                    <!-- ======= Footer ======= -->
                <footer id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    &copy; FutureMinds 2020
                                </div>
                                <div class="credits">
                                    futuremindstutoring@gmail.com
                                </div>

                                <div class="credits">
                                    <!--
                                      All the links in the footer should remain intact.
                                      You can delete the links only if you purchased the pro version.
                                      Licensing information: https://bootstrapmade.com/license/
                                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
                                    -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer><!-- End Footer -->

                <div id="preloader"></div>
                <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

                <!-- Vendor JS Files -->
                <script src="assets/vendor/jquery/jquery.min.js"></script>
                <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
                <script src="assets/vendor/php-email-form/validate.js"></script>
                <script src="assets/vendor/wow/wow.min.js"></script>
                <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
                <script src="assets/vendor/superfish/superfish.min.js"></script>
                <script src="assets/vendor/hoverIntent/hoverIntent.js"></script>
                <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
                <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
                <script src="assets/vendor/venobox/venobox.min.js"></script>
                <script src="assets/vendor/morphext/morphext.min.js"></script>

                <!-- Template Main JS File -->
                <script src="assets/js/main.js"></script>

            </body>

            </html>'
        exit();
      }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>