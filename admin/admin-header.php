<!doctype html>
<html>

  <head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ramos DC Admin</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">  
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css"> 
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--For Development Only. Not required -->
    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

  </head>

  <body class="menu-affix">

    <div class="bg-dark dk" id="wrap">
      <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <header class="head">
                <div class="main-bar">

                  <div class="same-line">
                    <h3><img src="assets/img/logo-symbol.png"> Ramos DC Admin</h3>
                  </div>
                  
                  <div class="topnav same-line">
                    <div class="btn-group mobile-hide">
                      <a data-placement="bottom" data-original-title="Users" data-toggle="tooltip" class="btn btn-default" id="goToUsers" href="users.php">
                          <i class="fa fa-user"></i>
                      </a>
                    </div>
                    <div class="btn-group mobile-hide">
                      <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default" id="toggleFullScreen">
                          <i class="glyphicon glyphicon-fullscreen"></i>
                      </a>
                    </div>
                    <div class="btn-group">
                      <a href="logout.php" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1">
                          <i class="fa fa-power-off"></i>
                      </a>
                    </div>
                    <div class="btn-group">
                      <a data-placement="bottom" data-original-title="Menu" data-toggle="tooltip" class="btn btn-primary toggle-left" id="menu-toggle">
                          <i class="fa fa-bars"></i>
                      </a>
                    </div>
                  </div>
                  <!-- /.main-bar -->
                </div>

                
              </header>
              <!-- /.head -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->                        
            
      </div>
      <!-- /#top -->
      <div id="left">

        <div class="media user-media bg-dark dker">
            <div class="user-media-toggleHover">
                <span class="fa fa-user"></span>
            </div>
            <div class="user-wrapper bg-dark">
              <div class="media-body">
                <h5 class="media-heading"><?php echo getUser($_SESSION["user_id"]); ?></h5>
                <ul class="list-unstyled user-info">
                  <li><a href="users.php">Administrator</a></li>
                  <li>Last Access : <br>
                    <small><i class="fa fa-calendar"></i>&nbsp;<?php echo getUserActivity($_SESSION["user_id"]); ?></small>
                  </li>
                </ul>
              </div>
            </div>
        </div>

        <!-- #menu -->
        <div id="left-menu">
          <div class="navbar navbar-inverse navbar-fixed-left">
            
            <ul class="nav navbar-nav">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-film"></i> Slides <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="slide1.php">Slide 1</a></li>
                  <li><a href="slide2.php">Slide 2</a></li>
                  <li><a href="slide3.php">Slide 3</a></li>
               </ul>
             </li>
             <li><a href="content.php"><i class="fa fa-pencil-square-o"></i> General Content</a></li>
             <li><a href="overlay.php"><i class="fa fa-photo"></i> Image Overlay</a></li>
             <li><a href="checklists.php"><i class="fa fa-check-square-o"></i> Checklists</a></li>
             <li><a href="treatments.php"><i class="fa fa-medkit"></i> Treatments</a></li>
             <li><a href="hours.php"><i class="fa fa-clock-o"></i> Office Hours</a></li>
            </ul>

          </div>
        </div>
          
      </div>
      