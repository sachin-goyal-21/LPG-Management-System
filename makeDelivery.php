<?php
session_start();
if(!isset($_SESSION["aid"])){
    header('Location:index.php');
    
}
?>

<?php
include 'connect.php';


$Dto =$Dby= $date=$branchId=$cId="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["oId"])){
         
        
        
     $Dby = $_POST["dBy"];
    $date = $_POST["dOn"];
     $oId = $_POST["oId"];
     $agencyId =$_SESSION["aid"];
    $csql = "select * from inventory where agencyId = '$agencyId' and  stock >=(select quantity from orders where id = '$oId');";
      $appresult1 = $conn->query($csql);
                        if ($appresult1->num_rows > 0) {
                               $sql ="update orders set status = '1',deliveredOn = '$date',deliveredBy = '$Dby' where id = '$oId';";
    echo $sql ;
    if($conn->query($sql)){
        echo 'success';
        $sqlU = "update inventory set stock = stock-(select quantity from orders where id = '$oId') where agencyId = '$agencyId'";
                            if ($conn->query($sqlU) === TRUE) {
    header("Location:manageInventory.php");
}else{
       echo("Error description: " . mysqli_error($conn));
    }
    }else{
       echo("Error description: " . mysqli_error($conn));
    }
                        }else{
                            ?>
<script> alert("Not enough Stock");
    window.open("self");
</script>
             <?php
                        }
 
    

//    header("Location:makeDelivery.php");

    }}


?>


<html>
    <head>
        <meta charset="UTF-8">
 
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="images/homepage/favicon.ico" type="image/x-icon">
<title> CourierManagement</title>
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
    <body style="background-image: url(images/bg3.jpg); background-size: cover; color: #1f1f1f;">
        <?php
        // put your code here
        include 'navBar.php';
       
        
        ?>
       
       <div class="container-fluid" style="margin-top:5%;" >
            
            <div class="row" style="width:100%;"> 
                <div class="col-md-6" style="color:#1f1f1f">
                    <div class="container-fluid" style="margin-top: 10%; width: 150%;">
        <div class="row justify-content-center">
            <h2>Make Delivery</h2>
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                       
                    </div>
            
                <form class="mbr-form" action="makeDelivery.php" method="post" data-form-title="Mobirise Form">
                      <div class="form-group" data-for="address">
                            <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Select Order to deliver</label>
                            <select class="btn btn-primary btn-lg" style="width: 100%;" name="oId" id="oId">
  
                                <?php
                                   
               $agencyId = $_SESSION["aid"];
                             $sql="select * from orders where status =0 and agencyId = '$agencyId'"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                        {
                                 ?>
                                <option value="<?php echo $row['id'];?>">Ordered On : <?php echo $row['orderedOn']?> ||  Quantity : <?php echo $row['quantity']?> </option>
                                  <?php
                                 
                                 
                        }}
                          
                                ?>
                                
                                
 
</select>
                        </div>
                        
                    <div class="row row-sm-offset">
                        <div class="col-md-4 multi-horizontal"  >
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" >delivered on</label>
                                    <input type="date" class="form-control" name="dOn"  required="" id="name-form1-4t">
                                </div>
                            </div>
                         
                            <div class="col-md-4 multi-horizontal" data-for="amount">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4t">Delivered BY</label>
                                   <select  id="dBy" class="btn btn-primary " style="width: 110%;" name="dBy" >
  
                                <?php
                                   
            
                             $sql="select * from staff where agency ='$agencyId'"; 
                            
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                        {
                                 ?>
                                <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?> </option>
                                  <?php
                                 
                                 
                        }}
                          
                                ?>
                                
                                
 
</select>
                                </div>
                            </div>
                        </div>
                      
            
                        <span class="input-group-btn">
                            <button href="" type="submit" class=" pull-right btn btn-success btn-form display-4 btn-lg">deliver Order  <span class="fa fa-rocket"></span></button>
                        </span>
                    </form>
            </div>
        </div>
    </div>

                </div>
                    <div class="col-md-6">
     <div class="container-fluid" style="background-color: rgba(0,0,0,0.6); margin-top: 10%; ">
                <h1 style="color: #fff;">My Delivery</h1>
                
                <table class="table " style="color: #fff;">
	<thead>
		<tr>
			<th><h4>Order ID</h4></th>
                        <th><h4>Ordered On</h4></th>
                         <th><h4>Ordered By</h4></th>
			<th><h4>Quantity</h4></th>
                        <th><h4>Delivered By</h4></th>
			<th><h4>Delivered On</h4></th>
                        
			
                        
		</tr>
	</thead>
	<tbody>
               <?php 
                        include 'connect.php';
               $uid = $_SESSION["aid"];
                             $sql="select * from orders where agencyId = '$uid' and status = 1"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $id = $row['id'];
                                $oOn=$row['orderedOn'];
                                $quant=$row['quantity'];
                               
                               $uid = $row['orderedBy'];
                                  $dOn= $row['deliveredOn'];   
                                  $dBy = $row['deliveredBy'];
                             $sql="select name from user where id = '$uid'"; 
                                 $appresult1 = $conn->query($sql);
                        if ($appresult1->num_rows > 0) {
                            // output data of each row
                             while($row1 = $appresult1->fetch_assoc()) 
                                 {
                                $username=$row1['name'];
                        }}
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $oOn;?></td>
                                    <td><?php echo $username;?></td>
                                    <td><?php echo $quant;?></td>
                                    <td><?php echo $dBy;?></td>
                                    <td><?php echo $dOn;?></td>
                                </tr>
                                <?php
                                 }}  
                              ?>
	</tbody>
</table>		
                    
      </div>
                </div>
            </div></div>
       
        
        
    </body>
</html>
