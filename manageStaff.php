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

$name =$email= $mobile=$address="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(isset($_POST["sname"])){
       
         
        
            $name = $_POST["sname"];
     $email = $_POST["semail"];
   
     $address = $_POST["sAdd"];
      $agencyId = $_SESSION['aid'];
    $sql = "INSERT INTO staff (name,agency,email,address)
VALUES ('$name', '$agencyId','$email','$address')";
    echo '/n'.$sql;
if ($conn->query($sql) === TRUE) {
    header("Location:manageStaff.php");
}
    }
    
    
    if(isset($_POST['sid'])){
    
    include 'connect.php';
    $staffId = $_POST['sid'];
    $agency = $_SESSION["aid"];
    $sql = "delete from staff where id = '$staffId' and agency = '$agency'";
    
    if ($conn->query($sql) === TRUE) {
    header("Location:manageStaff.php");
}else{
        echo 'error deleting staff';
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
                        Thanks for filling out the form!
                    </div>
            <h2>Add New Staff</h2>
                <form class="mbr-form" action="manageStaff.php" method="post" >
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Name</label>
                                    <input type="text" class="form-control" name="sname" data-form-field="Name" required="" id="name-form1-4t">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4t">Email</label>
                                    <input type="email" class="form-control" name="semail"  required="" >
                                </div>
                            </div>
                           
                        </div>
                    
                        <div class="form-group" data-for="address">
                            <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Address</label>
                            <textarea type="text" class="form-control" name="sAdd" rows="7"  ></textarea>
                        </div>
            
                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">Add Staff</button>
                        </span>
                    </form>
            </div>
        </div>
    </div>
                </div>
                <div class="col-md-6">
                    <div class="" style="margin-top:5%; width: 100%; background-color: rgba(225,225,225,0.6);">
        <h1> My Staff Members</h1>
<table class="table " >
	<thead>
		<tr>
			<th><h4>ID</h4></th>
			<th><h4>name</h4></th>
			<th><h4>Email</h4></th>
			
                        <th><h4>Address</h4></th>
			<th><h4>Remove Staff</h4></th>
		</tr>
	</thead>
	<tbody>
               <?php 
                        include 'connect.php';
               $bid = $_SESSION["aid"];
                             $sql="select * from staff where agency = '$bid'"; 
                                 $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                             while($row = $appresult->fetch_assoc()) 
                                 {
                                 $id = $row['id'];
                                $email=$row['email'];
                                $name=$row['name'];
                                $address=$row['address'];
                                
                                $mobile = $row['mobile'];

                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                  
                                    <td><?php echo $address;?></td>
                                    <td><form method="post" action="manageStaff.php">
                                        
                                                    <input type="hidden" value="<?php echo $id;?>" name="sid">
                                                    <button type="submit" class="btn btn-danger" ><span class="fa fa-trash" ></span></button>
                                        </form></td>
                                    
                                    
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
