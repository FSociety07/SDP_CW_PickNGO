<?php 
session_start();
	if(isset($_SESSION['empusername']))
				{
					//echo "okey stay";
				}
			else
				{
					header('location:../');
				}
include "../includes/class-autoload.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
        <title>Welcome <?php echo $_SESSION['empusername']; ?></title>
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

<body>

<div class="header  about-head "  >
        <div class="container">

                <div class="logo">
                    <img src="../images/logo.png" alt="Logo"  /> <a href="../index.php"><span></span>Pick & Go</a>
                </div>
                
<div class="top-nav">
    <span class="menu"> </span>
    <ul>
        <li ><a href="index.php">Home</a></li>
        <!--<li ><a href="faq.php">FAQ</a></li>-->
        <li ><a href="../contact.php">Contact</a></li>
                <li ><a href="../login.php">Login</a></li>
        <li ><a href="../register.php">Register</a></li>

            </ul>
</div>
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
                            $un=$_SESSION['empusername'];
                            
                            echo $un;
                            ?></h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Employee</a> <label>:</label></li>
                    <li>Home</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--- bradcrumbs ---->
</div>
<div class="about-top-grids">
    <div class="container">
        <!---- about-grids ---->
        <div class="about-grids">
            <div class="about-grids-row1">
            
	                   <div id="abc">
							<center><h2>View Requests</h2></center>
							<center><img class="avatar" src="../images/avatar.jpg"></center>
                            <form  action="acceptreq.php" method="post"> 
                                        
						</div>
            </div>
        </div><br>
        <!---- about-grids ---->
        
    </div>
    <div class="container">                        
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Requested Id</th>
                                        <th>Pickup Time</th>
                                        <th>Customer Name</th>
                                        <th>Customer Address</th>
                                        <th>Customer PhoneNo</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    <?php
                                       $empOPcenter=new UserView();
                                       $empOPcenterID=$empOPcenter->CheckEmployeeLogin($un);
       
                                   while ($resultById= $empOPcenterID->fetch()) {  
                                 
                                       $opCenter=$resultById["opCenterId"];
                                     
                                     // echo "<option value=".$PhoneNo['id'].">". $PhoneNo."</option>";
                                   }
                                    $request=new PickupRequestContro();
                                    $requestDetails=$request->acceptReq($opCenter,$status=3);
                                
                                    if($requestDetails){
                                        foreach($requestDetails as $rows){ 
                                            ?>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $rows["id"]?></td>
                                        <td><?php echo $rows["pickupAvailability"]?></td>
                                        <td><?php echo $rows["username"]?></td>
                                        <td><?php echo $rows["address"]?></td>
                                        <td><?php echo $rows["phoneNo"]?></td>

                                        <?php if($rows["status"]==-1): ?>
                                       <td><button type="submit" class="btn btn-danger" name="accept" value="<?php echo $rows["id"];?>"  >Pending</button></td>
                                            <?php elseif($rows["status"]==1): ?>
                                             <td> <a href="pickupreq.php?edit=<?php echo $rows["id"];?>"  name="accepted" class="btn btn-success">Accepted</a></td>
                                            <td><a href="" class="btn btn-success" data-toggle="modal" data-target="#modalLoginForm" name="schedule" value="<?php echo $rows["id"];?>">Schedule Time</a></td>
                                            <?php elseif($rows["status"]==2): ?>
                                            <td><button type="submit" class="btn btn-info" name="pickedup" >Pickedup</button></td>
                                            <?php elseif($rows["status"]==3): ?>
                                            <td><button type="submit" class="btn btn-success" name="delivered" >Delivered</button></td>
                                            <?php else:?>
                                           
                                        <?php endif;?>  
                                                                
                                    
                                    </tr>
                                    <?php
                            }
                        
                        } ?>
                      
                                    
                                    </tbody>
                                </table>
                                
                                
                              
                                </div>
<!------ about ---->
</div>
<?php

                            $employeeId=new UserView();
                            $getEmpId=$employeeId->CheckEmployeeLogin($un);

                            while ($resultById= $getEmpId->fetch()) {  

                            $empID=$resultById["id"];
                        
                            }

                           if(isset($_POST['accept'])){
                            $statusUpdate=new PickupRequestContro();
                            

                           $statusResults=$statusUpdate->UpdateRequestStatus($status=1,$_POST['accept']);
                           $statusUpdat=new PickupRequestContro();
                           $empActReq = $statusUpdat->setAcceptedreq($_POST['accept'],$empID);
                           $Emails= $statusUpdat->ctrlGetEmail($_POST['accept']);

                           $requests=new PickupRequestContro();
                           $requestDetailss=$requests->ctrlgetTracking($_POST['accept']);
        
                           $myId = implode($requestDetailss);
                            
                                       
                                  
                           $empActReq = $statusUpdate->setAcceptedreq(19,10);
                           if($Emails){
                            echo '<script type="text/javascript"> alert("You Have to go to pickup item and Email sent to customer") </script>';
                                $sub='Pickup request accepted';
                                $msg="Hi, your item pickup request is accepted.\n You can track with the ID:". $myId.". Kindly keep it for future reference";
                                $hed='from: no-reply';
                                foreach($Emails as $Emailrow){
                                $sent=mail($Emailrow['customerEmail'],$sub,$msg,$hed);
                                $sent=mail($Emailrow['ReceiverEmail'],$sub,$msg,$hed);
                                }
                               
                        
                        }else{
                            echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
                           }
                    
                        }
                    
                        
                        
                        
                        
                        ?>
                        
                        <div class="footer">
    <div class="top-footer">
            <div class="container">
                    <div class="top-footer-grids">
                            <div class="top-footer-grid">
                                    <h3>Contact us</h3>
                                    <ul class="address">
                                        <li><span class="map-pin"> </span><label>Pick & Go <br>No.12, Galle Road, <br>Colombo 03, Sri Lanka </label></li>
                                        <li><span class="mob"> </span>Ph & Fax no - 011-2625877, Mob- 0765853625</li>
                                        <li><span class="msg"> </span><a href="#">www.pickngo.lk</a></li>
                                    </ul>
                            </div>
                            <div class="top-footer-grid">
                                    <h3>Important Links</h3>
                                    <ul class="latest-post">
                                        <li><a href="index.php">Home</a> </li>
                                         
                                        <li><a href="register.php">Register</a> </li>
                                        <li><a href="login.php">Login</a> </li>
                                    </ul>
                            </div>
                            <div class="top-footer-grid">
                                    <h3>Other Links</h3>
                                    <ul class="latest-post">
                                        <li><a href="#">About Us</a> </li>
                                        <li><a href="#">Privacy Policy</a> </li>
                                        <li><a href="#">Terms & Conditions</a> </li>
                                        <li><a href="#">Help & FAQs</a> </li>
                                        <li><a href="#">Contact Us</a> </li>
                                    </ul>
                            </div>
                            <div class="clear"> </div>
                    </div>
            </div>
    </div>
    <!----start-bottom-footer---->
    <div class="bottom-footer">
            <div class="container"> 
                    <div class="bottom-footer-left">
                        
                             <p> &copy; 2022 pick&go.in. All rights reserved | <a href="admin">admin</a></p>

                    </div>
                    <div class="clear"> </div>
            </div>
    </div>
    <!----//End-bottom-footer---->
</div>



  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Schedule Pickup Time</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-email">Pickup Time</label>
          <input type="datetime-local" name="pickuptime" id="pickupTime" class="form-control validate">

        </div>

        

      </div>
      <div class="modal-footer d-flex justify-content-center">
      <input type="submit" name="submitPick" id="register-button" value="Submit" />
        <?php 
      
      $request=new PickupRequestContro();
      $requestDetails=$request->acceptReq($opCenter,$status=3);
  
          foreach($requestDetails as $rows){ 
      if(isset($_POST['submitPick'])){
          $pickupDateTime=$_POST['pickuptime'];
           $pickTime = new PickupRequestContro();
           $pickDateTime=$pickTime->ctrlPickupTIme($pickupDateTime,);
      
           if($pickDateTime){
               echo '<script type="text/javascript"> alert("Pickup schedule updated successfully...") </script>';
           }else{
               echo '<script type="text/javascript"> alert("Some Error...") </script>';
           }

           }
        }
        ?>
      </div>
    </div>
  </div>
</div>
                    </form>

	</body>
</html>