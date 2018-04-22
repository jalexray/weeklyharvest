<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="The Daily Mug | Highlights to read over coffee">
    <meta name="author" content="The Daily Mug Team">

    <title>
    <?php
    	if(isset($pageTitle)){
    		echo $pageTitle;
    	}else{
    		echo "The Daily Mug";
    	}
    ?>
    </title>

    <!-- js libs -->
    <script type="text/javascript" src="res/js/jquery.min.js"></script>
    <script type="text/javascript" src="res/js/bootstrap.min.js"></script>
    <?php
      if(isset($includeScripts)){
        foreach($includeScripts as $href){
          echo "<script type='text/javascript' src='".$href."'></script>";
        }
      }
    ?>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="icon" type="image/png" href="favicon.png" />

    <!-- Bootstrap core CSS -->
    <link href="res/css/bootstrap.css" rel="stylesheet">
    <link href="res/css/bootstrap-theme.css" rel="stylesheet">
    <link href="res/css/font-awesome.min.css" rel="stylesheet">

    <!-- Extra CSS -->
    <link href="res/css/main.css" rel="stylesheet">
    <?php
    if(isset($includeStyles)){
      foreach($includeStyles as $href){
        echo "<link href='".$href."' rel='stylesheet'>";
      }
    }
    if(isset($fullImageBackground)){
    	echo '      
		  	<link rel="stylesheet" href="res/css/responsive-full-background-image.css">
		';
    }
    $theme1 = "#555555";
    $theme2 = "#000000";
    $theme3 = "#000000";
    //use http://hex2rgba.devoth.com to convert
    $theme1rgb = "122, 42, 42";
    $theme2rgb = "0, 0, 0";
    $theme3rgb = "0, 0, 0";
    $userIP = $_SERVER['REMOTE_ADDR'];
    ?>
    </head>
  <body>
