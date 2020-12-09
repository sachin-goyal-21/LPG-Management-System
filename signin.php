<?php


include 'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    
  if(!isset($_POST['email']) || !isset($_POST['password'])){
     $output = 'Please enter credentials!';
     die($output);
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{ //email validation
    $output = 'Please enter a valid email!';
    die($output);
}
																																		 
if($conn->connect_error){
        $output = json_encode(array('type' => 'error', 'text' => 'Error connecting'.$conn->connect_error));
    die($output);
    }
    
    
    $sqlU = "select * from user where email = '$email' and password = '$password';";
     $sqlB = "select * from agency where email = '$email' and password = '$password';";
     
     
     
$resultU = $conn->query($sqlU);
if ($resultU->num_rows > 0) {
    // output data of each row
     if($rowE = $resultU->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["uid"]= $rowE["id"];
    $_SESSION["login_user"]= $rowE["name"];
 header('Location: UserPage.php');
     
    

}}



    $resultB = $conn->query($sqlB);
    
if ($resultB->num_rows > 0) {
    // output data of each row
     if($rowS = $resultB->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["aid"]= $rowS["id"];
    $_SESSION["login_branch"]= $rowS["name"];

     
header('Location: AgencyPage.php');

}}else{
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
        
      <h3 >Invalid Credentials</h3>
     <br>
     <a href="index.php">try Again</a>
    </div>
    </div>
</div>
    
    <script>
     $('#modalBtn').trigger("click");
    </script>
    </body>
</html>
        
        <?php
   
}

    }
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

