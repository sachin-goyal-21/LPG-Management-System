<?php
session_start();
if(!isset($_SESSION["aid"])){
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
    </head>
    <body>
        <?php
        // put your code here
        include 'navBar.php';
        
        ?>
        
        <div class="container-fluid" style="background-image:url(images/bg3.jpg); height: 100vh; background-size: cover; background-position: center;">
            <div class="container-fluid" style="background-color: rgba(0,0,0,0.6); margin-top: 10%; ">
                <h1 style="color: #fff;">My Orders</h1>
                
                <table class="table " style="color: #fff;">
	<thead>
		<tr>
			<th><h4>Order ID</h4></th>
                        <th><h4>Ordered On</h4></th>
                         <th><h4>Ordered By</h4></th>
			<th><h4>Quantity</h4></th>
                        <th><h4>Address</h4></th>
                        <th><h4>Status</h4></th>
			<th><h4>Delivered On</h4></th>
                        <th><h4>Delivered By</h4></th>
			
                        
		</tr>
	</thead>
	<tbody>
               <?php 
                        include 'connect.php';
               $uid = $_SESSION["aid"];
                             $sql="select * from orders where agencyId = '$uid'"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $id = $row['id'];
                                $oOn=$row['orderedOn'];
                                $quant=$row['quantity'];
                               $add=$row['addressToD'];
                               $uid = $row['orderedBy'];
                                  $dOn= $row['deliveredOn'];   $dBy = $row['deliveredBy'];
                                  $status = $row['status'];
                             $sql="select name from user where id = '$uid'"; 
                             
                                 $appresult1 = $conn->query($sql);
                        if ($appresult1->num_rows > 0) {
                            // output data of each row
                             if($row1 = $appresult1->fetch_assoc()) 
                                 {
                                $username=$row1['name'];
                        }}
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $oOn;?></td>
                                    <td><?php echo $username;?></td>
                                    <td><?php echo $quant;?></td>
                                     <td><?php echo $add;?></td>
                                    <td><?php if($status=="0"){
                                        echo 'not Delivered';
                                    }else{
                                       echo "Delivered"; 
                                    } ?></td>
                                    
                                    <td><?php echo $dOn;?></td>
                                    <td><?php echo $dBy;?></td>
                                </tr>
                                <?php
                                 }}  
                              ?>
	</tbody>
</table>		
                    
      </div>
                
            
        </div>
        
       
        
        
    </body>
</html>


