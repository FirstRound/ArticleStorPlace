<html lang="ru">
<html>
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тестовая система</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body  style="background-image:url(http://crop.rewalls.com/images/201008/reWalls.com_1060.jpg)"> 
 
<?php
  require_once "controller.php";
    session_start();
?>

  <div class="container">
  <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Учеба</a>
          </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
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
          echo '<li '.$active.'><a href="index.php?page='.$subjectReq[$i].'">'.$menuItems[$i].'</a></li>';
       }

       ?>
       </ul>
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
          </div><!--/.nav-collapse -->
          </nav>


      <!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron" id="MainInfo">
       <?php  
        if (isset($_GET["page"])) {
          if(is_file('pages/'.$_GET["page"].'.php')) {
            include 'pages/'.$_GET["page"].'.php'; 
          }
          else {
            include 'pages/error.php';
          }
        }
        else {
          include 'pages/start.php';
        }

       ?>
</div>

    </div> <!-- /container -->
</body>
</html>
