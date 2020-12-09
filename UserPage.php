<?php
session_start();
if(!isset($_SESSION["uid"])){
    header('Location:index.php');
}
?>

<html>
    <head>
        <meta charset="UTF-8">
 
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title> Gas Agency</title>
	<meta name="author"	content="Audenberg Technologies (www.audenberg.com)" />
<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
   
<style>
    .myBtn{
        box-shadow: 0px 0px 5px #000; 
        background-color: #008080;
        color:whitesmoke;
    }
     .myBtn:hover{
        box-shadow: 5px 5px 15px #000; 
        background-color: #1f1f1f;
        color: #fff;
    }
</style>
    </head>
    <body>
        <?php
        // put your code here
        include 'navBar.php';
        
        ?>
        
        <div class="container-fluid" style="background-image:url(images/bg2.png); height: 100vh; background-size: cover; background-position: center;">
            <div class="row" style="width: 100%;">
                <div class="col-md-6">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel" style=" box-shadow: 0px 0px 25px #B9121B; margin: 10%;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/slide1.jpg" alt="slide1">
    </div>

    <div class="item">
      <img src="images/slide2.jpg" alt="slide2">
    </div>

    <div class="item">
      <img src="images/slide3.jpg" alt="slide3">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 		
                
     
                </div>
                <div class="col-md-6">
                 		
                    <a class="btn btn-default btn-lg myBtn" href="makeOrders.php" style=" font-family: sans-serif;  width: 50%; font-size: 40px; margin: 25%; "><span class="fa fa-bolt"></span>        Order LPG</a> 
                    <a class="btn btn-default btn-lg myBtn"  href="viewMyOrders.php"  style=" font-family: sans-serif; width: 50%; font-size: 40px;  "><span class="fa fa-book"></span>        My Orders</a> 
    
                </div>
            </div>
            		
                
            
        </div>
        
       
        
        
    </body>
</html>


