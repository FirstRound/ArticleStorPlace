
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
  
  <!-- Basic -->
  <title>ASP</title>
  
  <!-- Define Charset -->
  <meta charset="utf-8">
  
  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/rating.css" type="text/css" media="screen">

    <!-- Margo CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

    <!-- Responsive CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/colors/red.css" title="red" media="screen" />

    

    <!-- Margo JS  -->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/rating.js"></script>
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
  </style>
  
</head>
<body>

  <!-- Container -->
  <div id="container" class="boxed-page">
    
        <!-- Start Header -->
        <div class="hidden-header"></div>
        <header class="clearfix">
          
          

<!-- Start Header ( Logo & Naviagtion ) -->
<div class="navbar navbar-default navbar-top">
  <div class="container" >
     <div class="navbar-header">
        <!-- Stat Toggle Nav Link For Mobiles -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
           <i class="fa fa-bars"></i>
       </button>
       <!-- End Toggle Nav Link For Mobiles -->
       <a class="navbar-brand" href="index.html"><img alt="" src="images/margo.png"></a>
   </div>
   <div class="navbar-collapse collapse">
      <!-- Stat Search -->

<!-- End Search -->
<!-- Start Navigation List -->
<ul class="nav navbar-nav navbar-right">
<ul class="nav navbar-nav navbar-right">
 <li>
    <a 
    %if page == "index":
    class="active" 
    %end
    href="index?page=index">Home</a>
    <ul class="dropdown">
   </ul>
</li>
<li>
  <a 
  %if page == "articles" or page == "article":
    class="active" 
  %end
  href="index?page=articles&tab=0">Articles</a>
</li>
<li>
    <a href="index?page=conferences&tab=0">Conferences</a>
</li>

%from models.user import User
%if (User.is_login() == False):
<li><a  
  %if page == "login":
    class="active" 
  %end
   href="index?page=login">Sign in</a></li>
<li><a 
  %if page == "register":
    class="active" 
  %end
   href="index?page=register">Sign up</a></li>
%else:
%name = User.get_name()
  <li><a class="active" style="color: red"><b><i>Hello, {{name}}</i></b></a></li>
  <li><a href="index?page=logout">Logout</a></li>
%end

</ul>
<!-- End Navigation List -->
</div>
</div>
</div>
<!-- End Header ( Logo & Naviagtion ) -->

</header>
<!-- End Header -->
