<?php

  if($_POST && isset($_POST['request-submit'])){
    session_cache_limiter( 'nocache' );
    header( 'Expires: ' . gmdate( 'r', 0 ) );
    header( 'Content-type: application/json' );

    $to         = 'info@ramosdc.com'; 

    $email_template = 'request.html';
    
    $email      = strip_tags($_POST['email']);
    $phone      = strip_tags($_POST['phone']);
    $name       = strip_tags($_POST['name']);
    $date       = $_POST['desired-date'];
    $time       = $_POST['desired-time'];
    $message    = nl2br( htmlspecialchars($_POST['message'], ENT_QUOTES) );
    $result     = array();
    $subject    = 'Appointment Requested';

    $headers  = "From: " . $name . ' <' . $email . '>' . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $templateTags =  array(
        '{{subject}}' => $subject,
        '{{email}}'=>$email,
        '{{message}}'=>$message,
        '{{name}}'=>$name,
        '{{phone}}'=>$phone,
        '{{desired-date}}'=>$date,
        '{{desired-time}}'=>$time
        );
    
    $templateContents = file_get_contents( dirname(__FILE__) . '/email-templates/'.$email_template);

    $contents =  strtr($templateContents, $templateTags);

    if ( mail( $to, $subject, $contents, $headers ) ) {
      header("Location: thankyou.html");
    }

  } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Improving Movement. Elevating Health. Your Kennewick, Richland, Pasco Chiropractor.">
  <meta name="keywords" content="Kennewick, Richland, Pasco, Tri-cities, Tri cities, chiropractor, back pain, therapy, sports therapy, spine, ache">
  <meta name="author" content="Tyler Jaquish">
  <link rel="shortcut icon" href="assets/images/logo-symbol.ico">

  <meta property="og:title" content="Ramos Spine &amp; Sports Therapy" />
  <meta property="og:description" content="Improving Movement. Elevating Health. Your Kennewick, Richland, Pasco Chiropractor." />
  <meta property="og:url" content="http://ramosdc.com" />
  <meta property="og:image" content="http://ramosdc.com/assets/images/logo-symbol.png" />

  <title>Ramos Spine &amp; Sports Therapy</title>

  <!-- Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

  <!-- Font Awesome CSS -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
  <!-- Animate css -->
  <link href="assets/css/animate.css" rel="stylesheet">
  <!-- Magnific css -->
  <link href="assets/css/magnific-popup.css" rel="stylesheet">
  <!-- Custom styles CSS -->
  <link href="assets/css/style.css" rel="stylesheet" media="screen">
  <!-- Responsive CSS -->
  <link href="assets/css/responsive.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

</head>


<body>

	<!-- Navigation -->
  <header class="header">
    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default show-mobile row">
        <div class="col-xs-3">
          <a href="index.php#home" class="pull-left"><img src="assets/images/logo-symbol.png" alt="Ramos Spine & Sports Therapy"></a> 
        </div>

        <div class="col-xs-6">
          <div id="call" class="direct-contact">
            <a class="btn btn-info" id="call-now" data-rel="external" href="tel:509-840-0406"><i class="fa fa-phone"></i> 509.840.0406</a>
          </div>
        </div>
        <div class="col-xs-3">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php#home">Home</a></li>
              <li><a href="index.php#about">About</a></li>
              <li><a href="index.php#services">Treatment</a></li>
              <li><a href="index.php#meet">Meet Dr. Ramos</a></li>
              <li><a href="index.php#contact">Contact</a></li>
              <li>
                <div class="text-right">
                  <div id="facebook" class="direct-contact">
                    <a href="https://www.facebook.com/aramosdc/" class="facebook"><i class="fa fa-facebook social-media"></i></a>
                  </div>
                  <div id="instagram" class="direct-contact">
                    <a href="https://www.instagram.com/ramos_spine_sportstherapy/" class="facebook"><i class="fa fa-instagram social-media"></i></a>
                  </div>
                  <div id="yelp" class="direct-contact">
                    <a href="http://www.yelp.com/biz/ramos-spine-and-sports-therapy-kennewick" class="yelp"><i class="fa fa-yelp social-media"></i></a>
                  </div>
                  <div id="google" class="direct-contact">
                    <a href="https://www.google.com/#safe=active&q=ramos+dc+kennewick&lrd=0x549879ebc0ffe447:0xe4f5de6c26ec9194,1," class="google"><i class="fa fa-google social-media"></i></a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div> 

      <div class="row desktop-nav">
        <div class="intro-sub col-xs-6 pull-left">
          <a href="index.php#home"><img src="assets/images/logo3-white.png" alt="Ramos Spine & Sports Therapy"></a>
        </div>
        
        <div class="col-xs-6 text-right">
          <div id="facebook" class="direct-contact">
            <a href="https://www.facebook.com/aramosdc/" class="facebook"><i class="fa fa-facebook social-media"></i></a>
          </div>
          <div id="instagram" class="direct-contact">
            <a href="https://www.instagram.com/ramos_spine_sportstherapy/" class="facebook"><i class="fa fa-instagram social-media"></i></a>
          </div>
          <div id="yelp" class="direct-contact">
            <a href="http://www.yelp.com/biz/ramos-spine-and-sports-therapy-kennewick" class="yelp"><i class="fa fa-yelp social-media"></i></a>
          </div>
          <div id="google" class="direct-contact">
            <a href="https://www.google.com/#safe=active&q=ramos+dc+kennewick&lrd=0x549879ebc0ffe447:0xe4f5de6c26ec9194,1," class="google"><i class="fa fa-google social-media"></i></a>
          </div>
          <div id="call" class="direct-contact">
            <a class="btn btn-info" id="call-now" data-rel="external" href="tel:509-840-0406"><i class="fa fa-phone"></i> 509.840.0406</a>
          </div>
        </div>
      </div>
    
      <div class="row desktop-nav">
        <nav class="navbar navbar-custom" role="navigation">
          <div class="container text-center">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-left">
                  <li><a href="index.php#home">Home</a></li>
                  <li><a href="index.php#about">About</a></li>
                  <li><a href="index.php#services">Treatment</a></li>
                  <li><a href="index.php#meet">Meet Dr. Ramos</a></li>
                  <li><a href="index.php#contact">Contact</a></li>
                </ul>
              </div>
            </div>  
          </div><!-- .container -->
        </nav>
      </div>
    </div><!-- .container -->
  </header><!-- End Navigation -->

  <section class="services-section section-padding">
    <div class="container">
      <h2 class="section-title wow fadeInUp">Request Appointment</h2>

      <div class="row">
        <div class="col-md-6 text-center">
          <h3>Call now!</h3>
          <br />
          <div class="call-button">
            <a class="btn btn-info btn-xl" data-rel="external" href="tel:509-840-0406"><i class="fa fa-phone"></i> 509.840.0406</a>
          </div>
          <br />
          <div class="appt-text">
            - OR - <br />Simply fill out the form provided to schedule an appointment online, and click <strong>SUBMIT</strong>. Please make sure to <strong>completely</strong> fill out all fields. We will follow up with you shortly to confirm your appointment. If you do not hear from our office within 24 hours, please contact us by phone.
          </div>
        </div>

        <div class="col-md-6">
          <div class="contact-form">
            <form name="appointment-form" id="appointmentForm" action="" method="POST">

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" class="form-control" id="phone" required>
              </div>

              <div class="form-group">
                <label for="desired-date">Desired Date</label>
                <input type="date" name="desired-date" class="form-control" id="desired-date">
              </div>

              <div class="form-group">
                <label for="desired-time">Desired Time</label>
                <select name="desired-time" class="form-control" id="desired-time">
                  <option selected disabled>Select</option>
                  <option value="morning">Morning</option>
                  <option value="afternoon">Afternoon</option>
                </select>
              </div>

              <div class="form-group">
                <label for="message">Additional Comments</label>
                <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
              </div>

              <button type="submit" name="request-submit" class="btn btn-info btn-primary">Submit</button>
            </form>

          </div><!-- /.contact-form -->
        </div><!-- /.col-md-6 -->

      </div><!-- /.row -->

    </div><!-- /.container -->
  </section><!-- End Skills Section -->

	<!-- Footer Section -->
  <footer class="footer-wrapper">
    <div class="container">

      <div class="row extras">
        <div class="col-xs-12">
          <img src="assets/images/logo3-white.png" alt="Ramos Spine &amp; Sports Therapy">
          <br />
          <div class="tagline wow fadeInUp">
            <h1><span>I</span>mproving <span>M</span>ovement. <span>E</span>levating <span>H</span>ealth.</h1>
          </div>
        </div>
      </div>

      <div class="row social">
        <div class="col-xs-12">

          <div id="facebook" class="direct-contact">
            <a href="https://www.facebook.com/aramosdc/" class="facebook"><i class="fa fa-facebook social-media social2"></i></a>
          </div>
          <div id="instagram" class="direct-contact">
            <a href="https://www.instagram.com/ramos_spine_sportstherapy/" class="facebook"><i class="fa fa-instagram social-media social2"></i></a>
          </div>
          <div id="yelp" class="direct-contact">
            <a href="http://www.yelp.com/biz/ramos-spine-and-sports-therapy-kennewick" class="yelp"><i class="fa fa-yelp social-media social2"></i></a>
          </div>
          <div id="google" class="direct-contact">
            <a href="https://www.google.com/#safe=active&q=ramos+dc+kennewick&lrd=0x549879ebc0ffe447:0xe4f5de6c26ec9194,1," class="google"><i class="fa fa-google social-media social2"></i></a>
          </div>
        </div>
        <!-- <div class="col-sm-6 awards">
          <img src="assets/images/sfma.jpg" alt="SFMA Level 1 Certified">
          <img src="assets/images/patients-choice.png" alt="Opencare.com Patient's Choice Winner 2015">
        </div> -->
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="copyright text-center">
            <p>&copy; Ramos Spine &amp; Sports Therapy 2016. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer Section -->

  <!-- Javascript files -->
<!--   <script src="assets/js/jquery.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/jquery.sticky.js"></script>
  <script src="assets/js/smoothscroll.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/jquery.countTo.js"></script>
  <script src="assets/js/jquery.inview.min.js"></script> 
  <script src="assets/js/jquery.shuffle.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
  <script src="assets/js/jquery.fitvids.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdOS01JbGbEXSAAvXqw5qvX496ef8Hi-Y"></script>
  <script src="assets/js/scripts.js"></script>

 -->
</body>
</html>