<?php

include 'connect.php';
session_start();
if(!isset($_SESSION["uid"])){
    header('Location:index.php');
}


$quantity =$agencyId= $userId = $addToD ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["address"])){
       
        $userId = $_SESSION['uid'];
            $quantity = $_POST["quantity"];
     $agencyId = $_POST["agency"];
     $addToD = $_POST["address"];
     $csql = "select * from orders where orderedBy = '$userId' and status = 0;";
    
                                 $appresult = $conn->query($csql);
                        if ($appresult->num_rows > 0) {
                            ?>
<script>
            alert("You Already have order Pending for Deliver ,Sorry Order not registered");
        window.open("self");</script>
                                <?php
                        }else{
    $sql = "INSERT INTO orders (quantity,agencyId,orderedBy,addressToD)
VALUES ('1', '$agencyId', '$userId', '$addToD')";
    echo '/n'.$sql;
if ($conn->query($sql) === TRUE) {
    header("Location:viewMyOrders.php");
}
}}}


?>


<html>
    <head>
        <meta charset="UTF-8">
 
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title> Gas Agency</title>
	<meta name="author"	content="Audenberg Technologies (www.audenberg.com)" />
<link href="css/new.css" rel="stylesheet" type="text/css">
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
               
             <div class="wrap-contact100" style=" margin-left: 25%; margin-top: 5%; background-color: rgba(0,0,100,0.6); padding: 50px; box-shadow: 0px 2px 15px #000">
                 <form class="contact100-form validate-form" method="post" action="makeOrders.php">
                            <span class="contact100-form-title" style="color:#fff">
					One Cylinder Per Order
				</span>

				<div class="wrap-input100 validate-input" >
                                    <textarea class="input100" id="name"  name="address" placeholder="address To Deliver"></textarea>
					<label class="label-input100" for="name">
						
					</label>
				</div>
                     <h4 style="color: #fff;">Select Your Agency</h4>
				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					
                                   
                                    
                                    <select class="btn btn-success btn-lg" style="width: 100%;" name="agency" >
  
                                <?php
                                   
               
                             $sql="select * from agency"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                        {
                                 ?>
                                <option value="<?php echo $row['id'];?>"> <?php echo $row['name']?> </option>
                                  <?php
                                 
                                 
                        }}
                          
                                ?>
                                
                                
 
</select>
					
				</div>

				

				

				<div class="container-contact100-form-btn ">
					<div class="wrap-contact100-form-btn ">
						<div class="contact100-form-bgbtn "></div>
						<button class="contact100-form-btn ">
							Place Order
						</button>
					</div>
				</div>
			</form>
		</div>				
                    
      
                
            
        </div>
        
       
        
        
    </body>
</html>


