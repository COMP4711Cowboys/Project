<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * view/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Template-description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="Template-author" content="GeeksLabs">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>{pageTitle}</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/xcharts.min.css" rel=" stylesheet">	
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- Bootstrap switch -->
    <link href="css/bootstrap-switch.min.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="welcome" class="logo">
            <div class = "logo-div"><img class="logo-image" src="{logo}"></img></div>
            The Dallas Cowboys
             <span class="lite">Prediction Engine</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span>                            
                                <i class="icon_cogs"></i>
                            </span>
                            <span class="username">Settings</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <span class="setting-title">Player:<span>
                            <li class="eborder-top">
                                <span class="menuItem">
                                    <i class="icon_pens"></i>
                                    <input type="checkbox" id="edit-switch" name="edit-switch" 
                                           class="make-switch" data-label-text="EDIT MODE" 
                                           data-size="mini" data-handle-width=90>
                                </span>
                            </li>
                            <li class="eborder-top">
                                <span class="setting-title">Team:<span>
                            <li>
                                <span class="menuItem">
                                    <i class="icon_piechart"></i>
                                    <input type="checkbox" id="layout-switch" name="layout-switch" 
                                           class="make-switch" data-label-text="LAYOUT MODE"
                                           data-size="mini" data-on-text="GALLERY" data-off-text="TABLE" 
                                           data-handle-width=90>
                                </a>
                            </li>
                        </ul>
                    </li> 
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      {sidebar}
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              {content}                
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- bootstrap switch plugin -->
    <script src="js/bootstrap-switch.min.js"></script>
    <!-- jquery cookie plugin -->
    <script src="js/jquery.cookie.js"></script>
    <!--custom script for all page-->
    <script src="js/scripts.js"></script>
    

  </body>
</html>
