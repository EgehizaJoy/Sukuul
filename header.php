<?php 
error_reporting(0);
session_start();?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KidzCMS</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/articlestyles.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="fontawesome-free-5.13.0-web/css/fontawesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/regular.min.css">
<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/solid.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/main.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/scroll_up_down.js" type="text/javascript"></script>
  <script src="js/loadWebPage.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
  <script src="ckeditorA/ckeditor/ckeditor.js"></script>
  </head>
  <body>
     <div class="container">
       <div class="top_bar"></div>
     <div class="top_" id="top_">
      <div class="logobar"> <!--div for the entire header-->
           <!--div for the logo-->
             <div class="logocontainer">
             <a href="about.php"><img src="assets/images/logob.png" alt="No logo" id="logoimage"/></a>
            </div>
          
             <!--div for the serach form-->
          <div class="searchlogo">
            <form method="get" action="search.php">
            <div class="searchcontainer">
            <input class="searchkeywords" type="text" name="keywords" id="keywords"
              <?php if(isset($_GET['keywords'])){
                   echo 'value="'.htmlspecialchars($_GET['keywords']).'" ';
               }
             ?>
             
             >
             <button class="btn" type="submit"><i class="fas fa-search"></i>Search</button>
            </div>
          </form>  
          </div> <!--div for the serach form-->
          
      </div> <!--div for the entire header-->
    
   <div id="LinkButtons">
   <?php 
    echo '<Button id="indexbuttons" style="background-color: rgb(0, 162, 255);" onclick="Home();">Home</Button>';
    echo '<Button id="indexbuttons" style="background-color: orangered;" onclick="Students();">Students</Button>';
    if (isset($_SESSION['access_lvl']) and $_SESSION['access_lvl']==2) {
      echo '<Button id="indexbuttons" style="background-color: rgb(0, 162, 255);;" onclick="Educators_();">Teachers</Button>';
    }
    else{
      echo '<Button id="indexbuttons" style="background-color: rgb(0, 162, 255);;" onclick="Educators();">Teachers</Button>';
    }
    echo '<Button id="indexbuttons" style="background-color: rgb(255, 0, 157);" onclick="Admin();">Admintrator</Button>';
   ?>
  </div>
  <?php 
  include 'linkbar.php';
  ?>
  </div>
<div class="container_" id="container_">
<div class="login_popup" id="login_popup"><?php include 'login.php'?></div>
<div class="signup_popup" id="signup_popup"><?php include 'useraccount.php'?></div>