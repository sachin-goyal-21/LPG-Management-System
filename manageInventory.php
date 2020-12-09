<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include 'connect.php';
session_start();
if(!isset($_SESSION["aid"])){
    header('Location:index.php');
}


if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["quantity"])){
       
         
        
   
     $quantity = $_POST["quantity"];
      $agencyId = $_SESSION['aid'];
      $sql = "select * from inventory where agencyId = '$agencyId'";
       $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            $sqlU = "update inventory set stock = stock+$quantity where agencyId = '$agencyId'";
                            if ($conn->query($sqlU) === TRUE) {
    header("Location:manageInventory.php");
}
                            
                        }else{
                             $sql = "INSERT INTO inventory (agencyId,stock)
VALUES ( '$agencyId','$quantity')";
    echo '/n'.$sql;
if ($conn->query($sql) === TRUE) {
    header("Location:manageInventory.php");
}
                        }
   
    }
    
    
    
}


?>
<html>
    <head>
        <meta charset="UTF-8">
 
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title> Gas Agency Management</title>
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
    <body style="background-image: url(images/bg3.jpg); background-size: cover;">
        <?php
        // put your code here
        include 'navBar.php';
         ?>
       
        
        <div class="container-fluid" style="margin-top:5%; ">
            
            <div class="row" style="width:100%;"> 
                <div class="col-md-6">
                    <div class="container-fluid" style="margin-top: 10%;">
        <div class="row justify-content-center">
            
            <div class="media-container-column col-lg-8" data-form-type="formoid" style=" color:#1f1f1f;">
                    <div data-form-alert="" hidden="">
                       
                    </div>
            <h2>Add Stock</h2>
            <form class="mbr-form" action="manageInventory.php" method="post" >
                <div class="form-group" >
                            <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Quantity</label>
                            <input type="text" class="form-control" name="quantity"  >
                        </div>
                        
                        
            
                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">Add Stock</button>
                        </span>
                    </form>
            </div>
        </div>
    </div>
                </div>
                <div class="col-md-6">
                    <div class="" style="margin-top:5%; width: 100%; background-color: rgba(225,225,225,0.6);">
        <h1> Inventory</h1>
<table class="table " >
	<thead>
		<tr>
			<th><h4>Inventory ID</h4></th>
			<th><h4>AgencyId</h4></th>
                        <th><h4>AgencyName</h4></th>
			<th><h4>Stock</h4></th>
			
		</tr>
	</thead>
	<tbody>
               <?php 
                        include 'connect.php';
               $bid = $_SESSION["aid"];
                             $sql="select * from inventory where agencyId = '$bid'"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $id = $row['id'];
                                $agency=$row['agencyId'];
                                $stock=$row['stock'];
                               $sql="select name from agency where id = '$agency'"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                $aname=$row['name'];
                        }}
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $agency;?></td>
                                    <td><?php echo $aname;?></td>
                                    <td><?php echo $stock;?></td>
                                   
                                    
                                    
                                    
                                </tr>
                                <?php
                                 }}  
                              ?>
	</tbody>
</table>
        </div>
                </div>
            </div>
        </div>
        

        
        
        
    </body>
   
</html>
