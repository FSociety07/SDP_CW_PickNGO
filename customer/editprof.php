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
$cname="";
$phone="";
$email="";
$password="";
$cpassword="";					
$address="";		
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
                            $EmployeeLogin=new UserView();
                            $results=$EmployeeLogin->CheckCustomerLogin($un);
                            while ($resultById= $results->fetch()) {  
                            $Username=$resultById['cName'];
                            $Password=$resultById["password"];
                            $CName=$resultById["cName"];
                            $PhoneNo=$resultById["phoneNo"];
                            $Email=$resultById["email"]; 
                            $Address=$resultById["address"];   
                            $areas=$resultById["areaId"];   
                          
                            }
                            echo $un;
                            
                            ?></h1>
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



<div class="about-top-grids">
    <div class="container">
        <div class="contact-grids">
            <div class="contact-right">
                <h2>Edit Your Details</h2>
                <form name="register" id="register" method="post" action="editprof.php">
                            <div>
                            <span>Name</span>
                            <input type="text" name="pname" maxlength="30"value="<?php echo $Username;?>" class="required" />
                            </div>
                            <div>
                            <span>Mobile</span>
                            <input type="text" name="phone" maxlength="10" minlength="10" value="<?php echo $PhoneNo;?>" class="required digits" />
                            </div>
                            <div>
                          <span>Email</span>
                            <input type="email" name="email" maxlength="50" value="<?php echo $Email;?>" class="required" />
                                            </div>
                                            <div>
                                                <span>Password</span>
                                                <input type="password" name="password" maxlength="40"  class="required" />
                                            </div>
                                            <div>
                                                <span>Confirm Password</span>
                                                <input type="password" name="cpassword" maxlength="40"  class="required" />
                                            </div>
                                            <div>
                                                <span>Address</span>
                                              
                                                <textarea name="address" class="required"><?php echo $Address; ?></textarea>
                                            </div>
                                            
                                            <!-- <div>
                                                <span>City</span>
                                                <select name="city" id="city" class="input_long required" >
                                                    <option value="">--Select--</option>
                                                    <?php 
                                                        // $query="select * from city";
                                                        //         $query_run=mysqli_query($con,$query);
                                                        //             while($row = mysqli_fetch_array($query_run)){
                                                        //                 if($row['constat']==1)
                                                        //                 echo "<option value='" . $row['cityname'] . "'>" . $row['cityname'] . "</option>";}
                                                     ?>
                                                     </select>
                                            </div> -->
                                            <div id="areas">
                                                <span>Area</span>
                                                <select  name="area" class="required" value="<?php echo $areas;?>">
                                                <?php          
                                                $area=new Areaview ();
                                                $areaResults=$area->ViewAreas();
                                                
                                                            foreach( $areaResults as $myarea){                                        
                                                            echo '<option value="'. $myarea["id"].'">'. $myarea["area"].'</option>';
                                                        }      
                                                        ?>
                                                </select>
                                             </div>
                                            <input type="submit" Value="Save" name="save_submit" />
                                        </form>                
                                    <?php 
                                        if(isset($_POST['save_submit'])){                                    
										
                                         
                                            $cname=$_POST['pname'];
                                            $phone=$_POST['phone'];
                                            $email=$_POST['email'];
											$password=$_POST['password'];
											$cpassword=$_POST['cpassword'];					
											$address=$_POST['address'];	
                                            $area=$_POST['area'];
                                            								
											//echo $user_type ;	
                                            if(!(empty($password) && empty($cpassword))){												
													if($password==$cpassword)
													{                                                      
                                                        $ppassword=password_hash($password,PASSWORD_DEFAULT);
                                                        $newCustomer=new  UserContro();
                                                        $results=$newCustomer->editCustomer($cname,$phone,$email,$ppassword,$address,$area,$un);
														if($results)
															echo '<script type="text/javascript"> alert("Customer Profile Updated Successfully!! ") </script>';
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														
														
														
													}
													else
														echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
											
												
										}else{
                                                   $newCustomer=new  UserContro();
                                                   $results=$newCustomer->editCustomer($cname,$phone,$email,$Password,$address,$area,$un);
														if($results)
															echo '<script type="text/javascript"> alert("Customer Profile Updated Successfully!!") </script>';
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';

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