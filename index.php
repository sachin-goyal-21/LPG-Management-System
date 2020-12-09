<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if(isset($_SESSION["aid"])){
    header('Location:AgencyPage.php');
    
}
if(isset($_SESSION["uid"])){
    header('Location:UserPage.php');
    
}
?>

<html>
    <head>
        <meta charset="UTF-8">
 
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
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
    </head>
    <body>
        <?php
        // put your code here
        include 'navBar.php';
        include 'signinModals.php';
        ?>
        
        <div class="container-fluid" style="background-image:url(images/bg1.jpg); height: 100vh; background-size: cover; background-position: center;">
               
					
                    <div id="cd-login" style=" padding: 15%  25% ; height: 100%;">
                        
                        <!-- log in form -->
                        <h1 style="color: #fff;">Sign In</h1>
                        <form class="cd-form" method="post" action="signin.php">
					
            
                <p class="fieldset">
						<label class="image-replace cd-email" for="eemail">E-mail</label>
                                                <input class="full-width has-padding has-border" id="email" name="email"  placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="epass">Password</label>
                                                <input class="full-width has-padding has-border" id="password" name="password" type="password"  placeholder="Password">
						<a href="#0" class="hide-password">Show</a>
						<div id="loginresult" style="display:none;">Error message here!</div>
					</p>

					
                                        <input type="hidden" id="currentPage" name="currentPage" value="<?php echo $_SERVER['PHP_SELF']; ?>"
					<p class="fieldset">
                                            <input id="loginsubmit" class="full-width" type="submit" name="loginsubmit" id="login" value="Login">
					</p>
                                        
				</form>
				<p class="pull-right">
                <button id="regNowBtn" class="btn btn-default"  data-toggle="modal" data-target="#empsignup"  style="color: brown;" >
                                Register Now</button></p>
            
<button id="regEmpModalBtn" style="display:none;"  data-toggle="modal" data-target="#empsignup" >
                                </button>                                
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div>
      
                
            
        </div>
        
       
        
        
    </body>
</html>


