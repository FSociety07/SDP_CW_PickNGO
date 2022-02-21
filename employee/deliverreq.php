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
$update=false;
$id=0;
$CustomerName="";
$PhoneNo="";
$Address="";
$ReqId="";
?>
<?php
 if(isset($_GET['del'])){
    $update=true;
    $Id=$_GET['del']; 
    $request=new PickupRequestContro ();   
    $resultById= $request->DisplayRequestDetails($Id);
    $ReqId=$resultById['id'];
    $CustomerName=$resultById["customerName"];
    $PhoneNo=$resultById["phoneNo"];
    $Address=$resultById["address"];

  }

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

<link href="../css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
<!---//webfonts--->
    </head>
    <style> 
input[name=request] {
  background-color: #F7F7F7;
  border: none;
  text-decoration: none;
}
</style>
<body>
    <!---- container ---->
<!---- header ----->
<div class="header  about-head "  >
        <div class="container">
                <!--- logo ----->
                <div class="logo">
                    <img src="../images/logo.png" alt="Logo"  /> <a href="../index.php"><span></span>Pick & Go</a>
                </div>
                <!--- logo ----->
<!--- top-nav ----->
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



<div class="about-top-grids">
    <div class="container">
        <div class="contact-grids">
            <div class="contact-right">
              
                <form method="post" action="deliverreq.php" enctype="multipart/form-data">
                <fieldset >
                   <legend>Request Information</legend>
                   <input type="hidden" name="id" value="<?php echo $Id;?>">  
                            <div>
                            <span>Request ID</span>
                                 <input type="text" name="request"  class="required" value="<?php echo $ReqId;?>"  readonly/>
                            </div>
                            <div>
                            <span>Customer Name</span>
                                <input type="text" name="name"  class="required"  value="<?php echo $CustomerName;?>"disabled />
                            </div>
                            <div>
                            <span>Mobile</span>
                                <input type="text" name="phone"  class="required digits"  value="<?php echo $PhoneNo;?>"disabled  />
                            </div>
                            <div>
                                <span>Address</span>
                                <textarea name="addr" maxlength="100" cols="5" disabled ><?php echo $Address; ?></textarea>
                            </div>
                            </fieldset ><br>

                            <fieldset>
                            <legend>Delivery Proof Details</legend>
                            <div>
                            <span>Photo Proof</span>
                            <input type="file" id="file" name="file" class="file" required > 
                            </div> 
                            <div>      
                                 <input type="submit" Value="Save" name="save_submit" />
                            </form>                
                                    <?php 
                                        if(isset($_POST['save_submit'])){    
                                            $fileName = $_FILES['file']['name'];
                                            $fileTmpName = $_FILES['file']['tmp_name'];
                                            $path = "../files/".$fileName;
                                            $deliveryDateTime= date('Y-m-d h:i:s', time()); 
                                            $req=$_POST['request'];

                                            $allowed = array('jpg', 'png','jpeg');
                                            $ext = pathinfo( $fileName, PATHINFO_EXTENSION);
                                            if (!in_array($ext, $allowed)){
                                                echo '<script>alert("You can only upload Image Format File only....")</script>'; 
                                            }else{
                                                $employeeId=new UserView();
                                                $getEmpId=$employeeId->CheckEmployeeLogin($un);
                    
                                                while ($resultById= $getEmpId->fetch()) {  
                    
                                                $empID=$resultById["id"];
                                                
                                                
                                            
                                                }
                                               
                                            $delivery=new DeliveryContro();
                                      
                                            $run = $delivery->CreateDelivery($req,$deliveryDateTime,$fileName,$empID);
                                         
                                       
                                            if($run){
                                                move_uploaded_file($fileTmpName,$path);
                                                $statusUpdate=new PickupRequestContro();
                                                $statusResults=$statusUpdate->UpdateRequestStatus($status=3,$req);                                                

                                                echo '<script>alert("Delivery Proof Uploaded Successfully")</script>'; 
                                                
                                                $statusUpdat=new PickupRequestContro();                                            
                                                $Emails= $statusUpdat->ctrlGetEmail($req);

                                                $requestDetailss=$statusUpdat->ctrlgetTracking($req);
                             
                                                $myId = implode($requestDetailss);
                                                
                                                $sub='Successful Delivery';
                                                $msg="Hi ,item has been Delivered successfully.\n tracking ID:".$myId.". and giving us the opprtunity to serve you continuously...";
                                                $hed='from: no-reply';
                                              
                                                foreach($Emails as $Emailrow){
                                                    $sent=mail($Emailrow['customerEmail'],$sub,$msg,$hed);
                                                    $sent=mail($Emailrow['ReceiverEmail'],$sub,$msg,$hed);
                                                    }
                                            }
                                            else{
                                                echo '<script>alert("Error..Please try Again....")</script>'; 
                                            }
                                            }
                                            
                                          }
                                    ?>
            
						</div>
            </div>
        </div>
        <!---- about-grids ---->
        
    </div>
<!------ about ---->
</div>

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
	</body>
</html>