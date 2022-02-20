<?php 
session_start();
if(isset($_SESSION['admusername']))
			{
				
			}
else
	{
		header('location:index.php');
	}			
//require '../dbconfig/config.php';
include "../includes/class-autoload.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Employees</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
<body style="background-color: #deefde">
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/jquery.min.js"></script>-->
<script src="../js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />

    </head>
	<div class="clearfix"> </div>
<!--- top-nav ----->
        <!----- script-for-nav ---->
<script>
        $( "span.menu" ).click(function() {
          $( ".top-nav ul" ).slideToggle( "slow", function() {
            // Animation complete.
          });
        });
</script>
<!----- script-for-nav ---->
        </div>
    </div>
<!---- header ----->
<!------ about ---->
<div class="about">
    <!--- bradcrumbs ---->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-left">
                <h1>Welcome, <?php 
                            $un=$_SESSION['admusername'];    
                            echo $un;
                            ?></h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Admin</a> <label>:</label></li>
                    <li>Home</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<div class="about-top-grids">
    <div class="container">
        <!---- about-grids ---->
        <div class="about-grids">
            <div class="about-grids-row1">
            
	                   <div id="abc">
							<center><h2>Manage Employees</h2></center>
							<center><img class="avatar" src="../images/avatar.jpg"></center>
                            <form  action="manageemp.php" method="post"> 
                                        
						</div>
            </div>
        </div><br>
        <!---- about-grids ---->
        
    </div>
    <div class="container">                        
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Emp Id</th>
                                        <th>Username</th>
                                        <th>PhoneNo</th>
                                        <th>Email</th>                              
                                        <th>Action</th>
                                        
                                    </tr>
                                    <?php
                                       $listEmployees=new AdminView();
                                       $resultList=$listEmployees->DisplayEmployees();

                                
                                    if($resultList){
                                        foreach($resultList as $rows){ 
                                            ?>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $rows["id"]?></td>
                                        <td><?php echo $rows["username"]?></td>
                                        <td><?php echo $rows["phoneNo"]?></td>
                                        <td><?php echo $rows["email"]?></td>
                                        <td><?php echo $rows["phoneNo"]?></td>

                                        <?php if($rows["status"]==0): ?>
                                       <td><button type="submit"  class="btn btn-success" name="active" value="<?php echo $rows["id"];?>"  >Active</button></td>
                                            <?php elseif($rows["status"]==1): ?>
											 <td><button type="submit"  class="btn btn-danger" name="deactive" value="<?php echo $rows["id"];?>"  >Deactive</button></td>
                                        
                                            <?php else:?>
                                           
                                        <?php endif;?>  
                                                                
                                    
                                    </tr>
                                    <?php
                            }
                        
                        } ?>
                      
                                    
                                    </tbody>
                                </table>
                                
                                
                              
                                </div>
								<?php
									if(isset($_POST['active'])){
										$statusUpdate=new AdminContro();
										
			
										$statusResults=$statusUpdate->UpdateEmployeeStatus($status=1,$_POST['active']);

										if($statusResults){
										echo '<script type="text/javascript"> alert("Employee activated succesfully....") </script>';									
									}else{
										echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
										}
								
									}

									if(isset($_POST['deactive'])){
										$statusUpdate=new AdminContro();
										
			
										$statusResults=$statusUpdate->UpdateEmployeeStatus($status=0,$_POST['deactive']);

										if($statusResults){
										echo '<script type="text/javascript"> alert("Employee deactivated succesfully....") </script>';									
									}else{
										echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
										}
								
									}
												?>
<!------ about ---->
</div>
</body>
</html>