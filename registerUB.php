<?php

include 'connect.php';


$name =$email= $password=$address="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["name"])){
        
        
            $name = $_POST["name"];
     $email = $_POST["email"];
     $password = $_POST["password"];
    $address = $_POST["address"];
    $sql = "INSERT INTO user (name,email,password,address)
VALUES ('$name', '$email', '$password', '$address')";
    
if ($conn->query($sql) === TRUE) {
    
    
    ?>
<html>
    <head>
        <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="background: url(img/bgbg.png);height: 100vh;">
        <div style="">
        
        </div>
        
        <!-- Trigger the modal with a button -->
<button id="modalBtn" type="button" style="display:none" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
      <h3 >User has been registered.. Login to continue using our services</h3>
     <br>
     <a href="index.php">Login</a>
    </div>
    </div>
</div>
    
    <script>
     $('#modalBtn').trigger("click");
    </script>
    </body>
</html>

<?php
    $conn->close();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        
    }
    
    if(isset($_POST["Bname"])){
        
        
         $name = $_POST["Bname"];
     $email = $_POST["Bemail"];
     $password = $_POST["Bpassword"];
      $address = $_POST["Badd"];
        
    $sql = "INSERT INTO agency (name,email,password,address)
VALUES ('$name', '$email', '$password','$address')";

if ($conn->query($sql) === TRUE) {
    
    
    ?>
<html>
    <head>
        <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/Animate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background: url(img/bgbg.png);height: 100vh;">
        <div style="">
        
        </div>
        
        <!-- Trigger the modal with a button -->
<button id="modalBtn" type="button" style="display:none" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
      <h3 >Your Branch has been registered.. Login to continue using our services</h3>
     <br>
     <a href="index.php?msg=login">Login</a>
    </div>
    </div>
</div>
    
    <script>
     $('#modalBtn').trigger("click");
    </script>
    </body>
</html>

<?php
    $conn->close();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        
        
    }
    

     
    
//$conn->close();
}else{
    header("location : index.php");
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

