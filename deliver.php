<?php
include 'connect.php';

session_start();
if(!isset($_SESSION['aid'])){
    header("Location:index.php");
}
$Dto =$Dby= $date=$agencyId=$cId="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["oId"])){
         $agencyId = $_SESSION['aid'];
        
        
     $Dby = $_POST["dBy"];
    $date = $_POST["dOn"];
   
     $oId = $_POST["oId"];
     
     $quantity = $_POST["quantity"];
     
     $sql = "select stock from Inventory where agencyId = '$agencyId'";
     
     
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                        {
                          $stock = $row['stock'];
                          
                          if($stock >= $quantity){
                             $sql ="update orders set status = '1',deliveredOn = '$date',deliveredBy = '$Dby' where id = '$oId';";
    $conn->query($sql);
  $sqlU = "update inventory set stock = stock-$quantity where agencyId = '$agencyId'";
    if($conn->query($sqlU)){
        header("Location:makeDelivery.php");
    }else{
        $output = "ERROR while Inserting Data";
    }
                              
                          }else{
                              $output = "Need More Stock to complete Order";
                          }
                                 
                        }}else{
                            $output = "no Stock Found";
                        }
    
    
    

//    header("Location:makeDelivery.php");

    }}?>
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
        
      <h3 ><?php echo $output; ?></h3>
     <br>
     <a href="makeDelivery.php">try Again</a>
    </div>
    </div>
</div>
    
    <script>
     $('#modalBtn').trigger("click");
    </script>
    </body>
</html>

?>