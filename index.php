<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="ru">

<head>
 
    <!-- Basic -->  
    <title>Главная</title>

    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Page Description and Author -->
    <meta name="description" content="Online Education System">
    <meta name="author" content="iThemesLab">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

    <!-- Margo CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

    <!-- Responsive CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">

    

    <!-- Margo JS  -->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.migrate.js"></script>
 
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>

    <script type="text/javascript" src="js/count-to.js"></script>
    <script type="text/javascript" src="js/jquery.textillate.js"></script>
    <script type="text/javascript" src="js/jquery.lettering.js"></script>

    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>

    <script type="text/javascript" src="js/script.js"></script>

    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <style type="text/css">
      .jumbotron {
          border-radius: 0; 
          padding: 10px;
          margin: 0;
      }
      .copyright-section {
          padding: 5px;
          margin: 40px, 15px, 15px, 40px; 
      }
      .pager {
        border-radius: 0; 
          padding: 10px;
          margin: 0;
      }
    </style>

</head>

<body>
<?php
  require_once "controller.php";
    session_start();
?>
    <!-- Full Body Container -->
    <div id="container" class="boxed-page">
        
        
        <!-- Start Header Section --> 
        <div class="hidden-header"></div>
        <header class="clearfix">
            
            
            
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="index.php">
                            <img width="100" height="100" alt="" src="images/margo.png">
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Stat Search -->
                        <ul class="nav navbar-nav navbar-right">
                          <?php
                            if(!User::IsLogin()) {
                              $text = "Войти";
                              $page = "login";
                              echo '<li> <a href="index.php?page=registration"><p class="text-info">Регистрация</p><span class="sr-only">(current)</span></a></li>';
                            }
                            else {
                              $text = "Выйти";
                              $page = "logout";
                              echo '<li> <a>Здравствуйте, '.User::getName().'<span class="sr-only">(current)</span></a></li>';
                            }
                              echo '<li><a href="index.php?page='.$page.'">'.$text.' <span class="sr-only">(current)</span></a></li>'; 
                          ?> 
                        </ul>
                        <!-- End Search -->
                        <!-- СТОРОКА МЕНЮ -->
                        <ul class="nav navbar-nav navbar-left"> 
                        <?php
       $menuItems = array("Предметы");
       $subjectReq = array("subjects");
       if(User::IsLogin()) {
        $menuItems[] = "Мои предметы";
        $subjectReq[] = "my_subjects";
       }

       for ($i = 0; $i < sizeof($menuItems); $i++) {
          if ($_GET["page"] == $subjectReq[$i])
            $active = 'class="active"';
          else
            $active = "";
          echo '<li '.$active.'><a href="index.php?page='.$subjectReq[$i].'&set=1">'.$menuItems[$i].'</a></li>';
       }

       ?>

                            
                        </ul>
                        <!-- КОНЕЦ МЕНЮ -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header> 
        <!-- Тут началасть секция -->
        <section id="home">
        <!-- End Header Section -->
        <?php  
          if (isset($_GET["page"])) {
            if(is_file('pages/'.$_GET["page"].'.php')) {
              echo '<div class="jumbotron" id="MainInfo"><div class="container">';
                include 'pages/'.$_GET["page"].'.php'; 
              echo '</div></div>';
            }
            else {
              include 'pages/error.php';
            }
          }
          else {
            include 'pages/start.php';
          }

       ?>

       </section>
        <!-- Тут закончилась секция --> 
        
        
        
       
        <!-- Start Footer Section -->
        <footer>
                <!-- Start Copyright -->
                <div  class="copyright-section">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; 2014 OEC -  Все права защищены <a href="#">Система Онлайн Обучения</a> </p>
                        </div><!-- .col-md-6 -->
                        <div class="col-md-6">  
                            <ul class="footer-nav">
                                <li><a href="#">Карта сайта</a>
                                </li>
                                <li><a href="#">Лицензионные соглашения</a>
                                </li>
                                <li><a href="#">Контакты</a> 
                                </li>
                            </ul>
                        </div><!-- .col-md-6 -->
                    </div><!-- .row -->
                </div>
                <!-- End Copyright -->

        </footer>
        <!-- End Footer Section -->
        
        
    </div>
    <!-- End Full Body Container -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    

</body>

</html>