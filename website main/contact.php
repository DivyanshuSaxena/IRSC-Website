<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IRSC</title>
    <!-- Bootstrap CSS -->    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Normalize Style -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <!-- Color Switcher -->
    <link rel="stylesheet" href="assets/css/color-switcher.css" type="text/css">

    <link rel="stylesheet" href="assets/css/added.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/extras/animate.css" type="text/css">
    <script src="assets/js/wow.js"></script>
      <script>
        new WOW().init();
      </script>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
    <!-- Rev Slider Css -->
    <link rel="stylesheet" href="assets/extras/settings.css" type="text/css">
    <!-- Nivo Lightbox Css -->
    <link rel="stylesheet" href="assets/extras/nivo-lightbox.css" type="text/css">
    <!-- Slicknav Css -->
    <link rel="stylesheet" href="assets/css/slicknav.css" type="text/css">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="assets/css/colors/sky.css" media="screen" />

  </head>

  <body>
    
    <?php include './header.php' ?>
    <!-- Header area wrapper End -->

    <!-- Page Header Start -->
    <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Collaborate</h2>
              <a href="index.html">Home</a>
              <span>/</span>
              <span class="current">Collaborate</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <div class="section">
      <div class="container">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Individual</a></li>
          <li><a data-toggle="tab" href="#menu1">School/College</a></li>
          <li><a data-toggle="tab" href="#menu2">NGO</a></li>
          <li><a data-toggle="tab" href="#menu3">Corporate</a></li>
        </ul>

        <?php
        $name = $email = $msg = $num = "";
        $err_name = $err_email = "";
        $from_email = "akhtar@road-safety.co.in";

        if($_SERVER['REQUEST_METHOD']=="POST"){
          //Validation
          $name = $_POST["name"];
          $email = $_POST["email"];
          $num = $_POST["num"];
          $msg = $_POST["msg"];
          $headers = "From: $from_email\r\n";
           $email_to = 'info@road-safety.co.in,deepanshu@road-safety.co.in,dssaxena2011@gmail.com';
    		$email_subject = "Collaboration || IRSC Website";
			$email_body = "You have received a new message from the user:\nName: ".$name."\nEmail Id: ".$email."\nContact No.: ".$num."\nMessage: ".$msg."\n";

          if(!empty($_POST["ngo"])) {
            $ngo = $_POST["ngo"]; 
            $email_body = $email_body.$ngo;
            $email_to = 'info@road-safety.co.in,mamta@road-safety.co.in,sonali@road-safety.co.in';           
          }
          if(!empty($_POST["company"])) {
            $company = $_POST["company"];  
            $email_body = $email_body.$company; 
             $email_to = 'info@road-safety.co.in,sonali@road-safety.co.in,ujjwal@road-safety.co.in,deepanshu@road-safety.co.in,akhtar@road-safety.co.in';  
                    
          }
          if(!empty($_POST["college"])) {
            $college = $_POST["college"];
            $email_body = $email_body.$college; 
             $email_to = 'info@road-safety.co.in,samarth@road-safety.co.in,ujjwal@road-safety.co.in,deepanshu@road-safety.co.in,akhtar@road-safety.co.in';           
          }
        }
        ?>

        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <h3>Individual</h3>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <p><label>Name:</label><input type="text" name="name" value="<?php echo $name; ?>"></p><br/>
              <p><label>Email id:</label><input type="text" name="email" value="<?php echo $email; ?>"></p><br/>
              <p><label>Contact No.:</label><input type="text" name="num" value="<?php echo $num; ?>"></p><br>
              <p><label>Message:</label><textarea name="msg" rows="5" cols="30"></textarea></p><br>
            <input type="submit" class="btn btn-primary" value="Submit">
            </form>
          </div>
          <div id="menu1" class="tab-pane fade">
            <h3>College</h3>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <p><label>Name:</label><input type="text" name="name" value="<?php echo $name; ?>"></p><br/>
              <p><label>Email id:</label><input type="text" name="email" value="<?php echo $email; ?>"></p><br/>
              <p><label>Contact No.:</label><input type="text" name="num" value="<?php echo $num; ?>"></p><br/>
              <?php $college = "" ?>
              <p><label>School/College:</label><input type="text" name="college" value="<?php echo $college; ?>"></p><br/>
              <p><label>Message:</label><textarea name="msg" rows="5" cols="30"></textarea></p><br/>
            <input type="submit" value="Submit" class="btn btn-primary">
            </form>
          </div>
          <div id="menu2" class="tab-pane fade">
            <h3>NGO</h3>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <p><label>Name:</label><input type="text" name="name" value="<?php echo $name; ?>"></p><br/>
              <p><label>Email id:</label><input type="text" name="email" value="<?php echo $email; ?>"></p><br/>
              <p><label>Contact No.:</label><input type="text" name="num" value="<?php echo $num; ?>"></p><br/>
              <?php $ngo = "" ?>
              <p><label>NGO:</label><input type="text" name="ngo" value="<?php echo $ngo; ?>"></p><br/>
              <p><label>Message:</label><textarea name="msg" rows="5" cols="30"></textarea></p><br/>
            <input type="submit" value="Submit" class="btn btn-primary">
            </form>
          </div>
          <div id="menu3" class="tab-pane fade">
            <h3>Corporate</h3>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <p><label>Name:</label><input type="text" name="name" value="<?php echo $name; ?>"></p><br/>
              <p><label>Email id:</label><input type="text" name="email" value="<?php echo $email; ?>"></p><br/>
              <p><label>Contact No.:</label><input type="text" name="num" value="<?php echo $num; ?>"></p><br/>
              <?php $company = "" ?>
              <p><label>Company:</label><input type="text" name="company" value="<?php echo $company; ?>"></p><br/>
              <p><label>Message:</label> <textarea name="msg" rows="5" cols="30"></textarea></p><br/>
            <input type="submit" class="btn btn-primary" value="Submit">
            </form>
          </div>
        </div>    
      </div>
    </div>

    <div style="width: 30vw; min-width: 300px; margin: auto; text-align: center; padding: 10px; font-family: Calibri; font-size: 1em;">
      <?php

      if($_SERVER['REQUEST_METHOD']=="POST"){
        //Validation
        if(empty($_POST["name"])) {
          $err_name = "Name is required. Please re-enter.";
          echo $err_name;
        }
        elseif(!preg_match("/^[a-zA-z ]*$/", $name)) {
          $err_name = "Name can contain only letters. Please re-enter.";
          echo $err_name;
        }
        elseif(!preg_match("/^[0-9]*$/", $num)) {
          $err_name = "Contact No. should only contain digits. Please re-enter.";
          echo $err_name;
        }
        elseif(empty($_POST["email"])) {
          $err_email = "Email is required. Please re-enter.";
          echo $err_email;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $err_email = "Email id is not correct. Please re-enter.";
          echo $err_email;
        }
        else {
          echo "Hi ".$name."!<br/>";
          echo "Thanks for your interest. We shall soon be contacting you.";
          // $dir = "uploads/";
          // $targetfile = $dir.basename($_FILES["uploadedFile"]["name"]);
          // move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $targetfile);
          // $buffer = fopen("uploadinfo.txt", "ab");
          // fwrite($buffer, $fname." ".$lname." uploaded ".$_FILES["uploadedFile"]["name"]." on ".date("d-m-y")." and with description: ".$brief."\r\n");
          mail($email_to,$email_subject,$email_body,$headers);
        }
      }
      ?>
    </div>

    <?php include './footer.php' ?>

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-arrow-up"></i>
    </a>

 

    <!-- jQuery  -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/color-switcher.js"></script>
    <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <script type="text/javascript" src="assets/js/nivo-lightbox.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.countdown.js"></script>  
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>   
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script> 
    <script type="text/javascript" src="assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="assets/js/contact-form-script.js"></script>  
    
    <script type="text/javascript" src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>
