<?php 
session_start();
	if(isset($_SESSION['username']))
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
        <title>Welcome <?php echo $_SESSION['username']; ?></title>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/jquery.min.js"></script>-->
<script src="../js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link href="../css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
<!---//webfonts--->
    </head>
    
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
        <li ><a href="tracking.php">Track</a></li>
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
                            $un=$_SESSION['username'];
                           
                            echo $un;
                     
                            ?>
                            </h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Customer</a> <label>:</label></li>
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
<<<<<<< HEAD
	<center><h2>Request Transit</h2></center>

	<center><img class="avatar" src="../images/avatar.jpg"></center>
=======
	<center><h2>Request Pickup</h2></center>

	<center><img class="avatar" src="../images/customer.jpg"></center>
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
	<form class="myform" action="request.php" method="post">
        <fieldset >
        <legend>Receiver Information</legend>
        <div>
            <span>Name</span><br>
            <input type="text" name="rname" maxlength="10" minlength="2" value="" class="required" required />
        </div>
		<span>Full Address of Desitination</span>
		<br>
        <textarea name="address" maxlength="100" cols="5" style="width: 100%;"></textarea>
        <br>
        <div>
            <span>Phone No</span><br>
            <input type="text" name="phone" maxlength="10" minlength="10" value="" class="required digits" required  />
        </div>

        <div>
            <span>Email</span><br>
            <input type="email" name="email" maxlength="50" value="" class="required"required  />
        </div>
         <div id="areas">
                        <span>Area</span><br>
                        <select  name="area" class="required" required  >
                        <?php          
                        $area=new Areaview ();
                        $areaResults=$area->ViewAreas();
                        
                                     foreach( $areaResults as $myarea){                                        
                                      echo '<option value="'. $myarea["id"].'">'. $myarea["area"].'</option>';
                                  }      
                                ?>
                        </select>
                    </div>
         </fieldset ><br>
         <fieldset >
         <legend>Pickup Availability</legend>
         <div>
            <span>DateTime</span>
            <input type="datetime-local" name="picktime" maxlength="50" value="" class="required"required  />
        </div>
        <fieldset >
		 <input type="submit" name="submit_button" id="register-button" value="Schedule Pick Up" />
		 <a href="index.php"><input type="button" id="back-button" value="<<Back to Home" /></a>
		 </form>
		 </div>

		 <?php 
										if(isset($_POST['submit_button']))
										{
										
											$un=$_SESSION['username'];
                                             
                                            $name=$_POST['rname'];
											$address=$_POST['address'];
											$phone=$_POST['phone'];
											$email=$_POST['email'];
											$area=$_POST['area'];
                                            $pickAvailability=$_POST['picktime'];
                                            $requestDateTime = date('Y-m-d h:i:s', time());
											//echo $user_type ;
                                            $customerId=new UserView();
                                            $results=$customerId->CheckCustomerLogin($un);
                                            while ($resultById= $results->fetch()) {  
                                            $Id=$resultById['id'];
                                            $Email=$resultById['email'];
                                            $randomCode=mt_rand(0,99999);

                                            }
                                             $receiver=new UserContro();
                                             $ReceiverResults=$receiver->CreateReceiver($name,$address,$phone,$email,$area);

                                             $receiverId=new UserView();
                                             $LastId=$receiverId->ReceiverLastId();                                            
                                             $myId = implode($LastId);


                                             $opcenter=new UserView();
                                             $opcenterId= $opcenter->CenterArea($un);
                                             $centerId = implode($opcenterId); 

                                             $dstOpcenter=new UserView();
                                             $dstOpcenterId= $dstOpcenter->dstCenterArea($area);
                                             $dstCenterId = implode($dstOpcenterId); 
                                          
                                             $newPickupRequest=new PickupRequestContro();
                                             $pickupResults=$newPickupRequest->CreatePickupRequest($requestDateTime,$pickAvailability,$Id,$centerId,$dstCenterId,$myId,$status=-1,$randomCode);

                                             $lastPickupId=$newPickupRequest->LastPickupRequestId();
                                             $orderId = implode($lastPickupId);                                             
                                         
                                           
														if($pickupResults)
															{																
																$sub='PicK Up Request';
																$msg="Hi ". $un.", your item pickup request has been added successfully.\n ID:". $orderId.". Kindly keep it for future reference";
																$hed='from: no-reply';
																$sent=mail($Email,$sub,$msg,$hed);
																if($sent)
																	{
																		echo '<script type="text/javascript"> alert("Request added successfully,check your mail") </script>';				
																	}
																else
																{
																	echo '<script type="text/javascript"> alert("Request added successfully,error:mail not sent") </script>';
																}



															}
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														
													}
												
												?>

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