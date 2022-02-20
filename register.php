<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:index.php');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:index.php');
			}	
else
	{
		
	}	
    
include "includes/class-autoload.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
        <title>Register | TYC</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!----webfonts--->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />-->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
<!---//webfonts--->
<link rel="stylesheet" type="text/css" href="css/validate.css" />
<script type='text/javascript' src="js/jquery.validate.js"></script>
<script src="js/common.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
   $("#register").validate();
});
</script>
    </head>
<body>
    <!---- container ---->
<!---- header ----->
<div class="header  about-head "  >
        <div class="container">
                <!--- logo ----->
                <div class="logo">
                    <img src="images/logo.png" alt="Logo"  /> <a href="index.php"><span></span>Pick & Go</a>
                </div>
                <!--- logo ----->
<!--- top-nav ----->
<div class="top-nav">
    <span class="menu"> </span>
    <ul>
        <li ><a href="index.php">Home</a></li>
        <!--<li ><a href="faq.php">FAQ</a></li>-->
        <li ><a href="contact.php">Contact</a></li>
                <li ><a href="login.php">Login</a></li>
        <li class="active" ><a href="register.php">Register</a></li>
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
                <h1>Register</h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Home</a> <label>:</label></li>
                    <li>Register</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--- bradcrumbs ---->
</div>
<div class="about-top-grids">
    <div class="container">
        <div class="contact-grids">
            <div class="contact-right">
                <h2>Registration</h2>
                
               
                <form name="register" id="register" method="post" action="register.php">
                    <div>
                        <span>I Am</span>
                        <select id="user_type" name="user_type" class="required" onchange="areaDisplay()">
                            <option value="">Select Account Type</option>
                            <option value="customer"  >Customer</option>
                            <option value="employee" >Employee</option>
                        </select>
                    </div>
                    <div>
                    	<span>User Name</span>
                        <input type="text" name="username" maxlength="30" value="" class="required" />
                        <span>Full Name</span>
                        <input type="text" name="name" maxlength="30" value="" class="required" />
                    </div>
                    <div>
                        <span>Mobile</span>
                        <input type="text" name="phone" maxlength="10" minlength="10" value="" class="required digits" />
                    </div>
                    <div>
                        <span>Email</span>
                        <input type="email" name="email" maxlength="50" value="" class="required" />
                    </div>
                    <div>
                        <span>Password</span>
                        <input type="password" name="password" maxlength="40" value="" class="required" />
                    </div>
                    <div>
                        <span>Confirm Password</span>
                        <input type="password" name="cpassword" maxlength="40" value="" class="required" />
                    </div>
                    <div>
                        <span>Address</span>
                        <textarea name="address" maxlength="100" cols="5" ></textarea>
                    </div>
                    <div style='display:none' id="areas">
                        <span>Area</span>
<<<<<<< HEAD
                        <select  name="area" class="required" >
=======
                        <select  name="area" >
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
                        <?php          
                        $area=new Areaview ();
                        $areaResults=$area->ViewAreas();
                        
                                     foreach( $areaResults as $myarea){                                        
                                      echo '<option value="'. $myarea["id"].'">'. $myarea["area"].'</option>';
                                  }      
                                ?>
                        </select>
                    </div>
<<<<<<< HEAD
=======
                    <div style='display:none' id="op">
                        <span>Opeational Center</span>
                        <select  name="opcenter">
                        <?php          
                        $opcenters=new Areaview ();
                        $opResults=$opcenters->ViewListOPCenters();

                        
                                     foreach($opResults as $myop){            
                                                                   
                                      echo '<option value="'. $myop["id"].'">'. $myop["centerName"].'</option>';
                                  }      
                                ?>
                        </select>
                    </div>
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
                    <script> 
                    function areaDisplay(){
                    var area = document.getElementById('areas');
                    var user_type = document.getElementById('user_type').value;
<<<<<<< HEAD
                      if(user_type=="customer"){
                          area.style.display='block';
                      }else{
                        area.style.display='none';
=======
                    var op = document.getElementById('op');
                      if(user_type=="customer"){
                          area.style.display='block';
                      }else if(user_type=="employee"){
                        op.style.display='block';
                       
                      }else{
                        area.style.display='none';
                        op.style.display='none';
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
                      }
                    }
                    </script>
                    
                     <input type="submit" Value="Register" name="register_submit" />
                </form>                
									<?php 
										if(isset($_POST['register_submit']))
										{
										
											$user_type=$_POST['user_type'];
                                            $username=preg_replace('/[^A-Za-z0-9\-]/', '',$_POST['username']);
											$password=$_POST['password'];
											$cpassword=$_POST['cpassword'];
											$phoneno=$_POST['phone'];
											$cname=$_POST['name'];
											$email=$_POST['email'];
											$address=$_POST['address'];	
<<<<<<< HEAD
                                            $area=$_POST['area'];							
=======
                                            $area=$_POST['area'];	
                                            $opcenter=$_POST['opcenter'];						
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
											//echo $user_type ;
											if($user_type=="employee")
												{
													
													if($password==$cpassword)
													{
                                                        $newCustomer=new UserView();
                                                        $results=$newCustomer->EmployeeUserName($username);
														if($results)
														{
															//Already a user
															echo '<script type="text/javascript"> alert("User Already Exists... Try another username") </script>';
														}
														else
														{
                                                       
                                                        $ppassword=password_hash($password,PASSWORD_DEFAULT);
                                                        $newCustomer=new  UserContro();
                                                        $results=$newCustomer->CreateEmployee($username,$ppassword,$cname,$phoneno,$email,$address,$opcenter);
														if($results)
															echo '<script type="text/javascript"> alert("Registration Successful!!, Go to Login Page") </script>';
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														}
														
														
													}
													else
														echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
												}
											else
												{
													if($password==$cpassword)
													{
                                                        $newCustomer=new UserView();
                                                        $results=$newCustomer->CutomerUserName($username);
														
														if($results)
														{
															//Already a user
															
															echo '<script type="text/javascript"> alert("User Already Exists... Try another username") </script>';
														}
														else
														{
                                                        $ppassword=password_hash($password,PASSWORD_DEFAULT);
													
                                                        $newCustomer=new  UserContro();
                                                        $results=$newCustomer->CreateCustomer($username,$ppassword,$cname,$phoneno,$email,$address,$area);
                                                    
                                                        if($results)
															echo '<script type="text/javascript"> alert("Registration Successful!! Go to Login Page") </script>';
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														}
													}
													else
														echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
												}
										}
									?>
            </div>
            <div class="clearfix"> </div>
        </div>
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
