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
              <h2 class="page-title">Join Us</h2>
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
      <div class="container wow fadeIn">
        <div class="panel panel-default rounded">

        <?php
        $name = $email = $msg = $num = $org = "";
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

          if(!empty($_POST["org"])) {
            $org = $_POST["org"]; 
            $email_body = $email_body."\nOrganistion: ".$org;
            $email_to = 'info@road-safety.co.in,mamta@road-safety.co.in,sonali@road-safety.co.in';           
          }
        }
        ?>

        <div class="panel-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <p><label>Name:</label><input type="text" name="name" value="<?php echo $name; ?>" style="width: 300px;"></p><br/>
              <p><label>Email id:</label><input type="text" name="email" value="<?php echo $email; ?>" style="width: 300px;"></p><br/>
              <p><label>Contact No.:</label><input type="text" name="num" value="<?php echo $num; ?>" style="width: 300px;"></p><br/>
              <p><label>Organisation/College:</label><input type="text" name="org" value="<?php echo $org; ?>" style="width: 300px;"></p><br/>
              <p><label>Message:</label><textarea name="msg" rows="5" cols="30" style="width: 300px;"></textarea></p><br>
              <p><label>Resume:</label><input type="file" name="cv"></p>
            <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
      </div>
    </div>

    <div style="width: 30vw; min-width: 300px; margin: auto; text-align: center; padding: 10px; font-family: Calibri; font-size: 1em;">
      <?php

      if($_SERVER['REQUEST_METHOD']=="POST"){
        $file_ext=strtolower(end(explode('.',$_FILES['cv']['name'])));
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
          $err_name = "Contact number should contain only digits. Please re-enter.";
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
        elseif ($file_ext!=".pdf" && $file_ext!=".docx" && $file_ext!=".doc") {
          $err_name = "Please upload your cv in .pdf or .docx/.doc format only.";
          echo $err_name;
        }
        else {
          echo "Hi ".$name."!<br/>";
          echo "Thank you for your interest. We shall soon be contacting you.";
          $dir = "uploaded_cv/";
          $targetfile = $dir.basename($_FILES["cv"]["name"]);
          move_uploaded_file($_FILES["cv"]["tmp_name"], $targetfile);
          $url = "https://www.road-safety.co.in/IRSC/".$targetfile;
          $email_body = $email_body."\nFind the uploaded cv on this link: ".$url;
          mail($email_to,$email_subject,$email_body,$headers);
        }
      }
      ?>
    </div>
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
