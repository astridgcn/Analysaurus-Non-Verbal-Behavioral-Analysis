<?php
  session_start();
?>

<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html> <!--<![endif]-->
	<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	  <meta charset="utf-8"/>
	  <meta name="description" content="">
	  <meta name="author" content="Guiochon.A">

	  <title>Analysaurus</title>

		<!-- CSS et lgoo -->
	  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	  <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
	  <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" />
		<link rel="shortcut icon" href="images/logo.ico" />
		<link rel="icon" type="image/x-icon" href="images/logo.ico" />
	  <link rel="icon" type="image/png" size="16x16" href="images/logo.png">

	<!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	</head>

  <body>
    <!-- header-wrap -->
    <div id="header-wrap">
      <header>
          <img src="images/logo.png" alt="Logo de dinosaure" top="50" left="50" width="30"height="30">
        <hgroup>
          <h2 style="font-size:36px"><a href="index.php" style="color:#FFDCC5;">Analysaurus</a></h2>
        </hgroup>
        <!-- menu -->
          <nav>
            <ul>
              <?php
                if (isset($_SESSION["pseudo"])){
                  echo '
                     <li><a href="index.php">'.$_SESSION["pseudo"].'</a></li>
                     <li><a href="index.php">Accueil</a></li>';
                }
                if (isset($_SESSION["pseudo"])){
                  echo '
                     <li><a href="index.php?suivant=deconnexion">Déconnexion</a></li>';
                }
                  else {
                      echo '<li><a href="index.php?suivant=profil">Connexion</a></li>';
                  }
              ?>
            </ul>
          </nav>
	<!-- fin menu -->
        </header>
    </div>
