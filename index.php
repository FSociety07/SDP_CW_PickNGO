<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:customer');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:employee');
			}	
else
	{
		#	echo '<script type="text/javascript"> alert("All in vain") </script>';
	}			
include "includes/class-autoload.inc.php";
?>

<!DOCTYPE HTML>
<html>
<head>
        <title>Home | TYC</title>
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
<link href="css/custom.css" rel='stylesheet' type='text/css' />

<script type='text/javascript' src="js/jquery.validate.js"></script>
<script type='text/javascript' src="js/common.js"></script>
<script type="text/javascript">
$(function() {
   $("#login_form").validate();
});
</script>

    </head>
    <body>
    <!---- container ---->
<!---- header ----->
<div class="header "   style="min-height: 660px;" >
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
        <li class="active" ><a href="index.php">Home</a></li>
        <!--<li ><a href="faq.php">FAQ</a></li>-->
        <li ><a href="contact.php">Contact</a></li>
                <li ><a href="#login_form">Login</a></li>
        <li ><a href="register.php">Register</a></li>
        <li ><a href="tracking.php" name="tracking">Track</a></li>

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
<div class="banner text-center">
    
    <div class="form_cont">
        <form name="login_form" id="login_form" method="post" autocomplete="off" action="index.php" >
            <div class="row1"><select name="user_type" class="required">
                           <option value="">Select Account Type</option>
                           <option value="customer"  >Customer</option>
                           <option value="employee" >Employee</option>
                        </select></div>
            <div class="row1"><input type="text" name="username" placeholder="Type Your username" class="required"/></div>
            <div class="row1"><input type="password" name="password" maxlength="40" value="" class="required" placeholder="Password" /></div>
            <div class="row1"><input type="submit" Value="Login" name="login_submit" /></div>
            <div class="row1"><a href="forgot-password.php">Forgot Password?</a></div>
        </form>

       
        
 <?php 
                                if(isset($_POST['login_submit']))
                                {
                         
                                    $username=preg_replace('/[^A-Za-z0-9\-]/', '',$_POST['username']);
                                    
                                    //echo $username;
                                    $password=$_POST['password'];
                                    $user_type=$_POST['user_type'];
                                    if($user_type=="employee")
                                        {

                                            $EmployeeLogin=new UserView();
                                            $results=$EmployeeLogin->CheckEmployeeLogin($username);
                                            $no=$results->rowCount();
                     
                                            if($no>0)
                                            {
                                                while ($row= $results->fetch() ) {  
                                                 if(password_verify($password,$row['password'])){
                                                     $username=$row['username'];
                                                     header('location:employee');
                                                $_SESSION['empusername']=$username;

                                                }
                                                else{
                                                    
                                                    echo '<script type="text/javascript"> alert("Invalid UserName or Password!!!") </script>';
                                                }
                                            }
                                                
                                            }
                                            else
                                            {
                                                //wrong credentials
                                                echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                            }
                                        }
                                    else
                                        {
                                            $CustomerLogin=new UserView();
                                            $results=$CustomerLogin-> CheckCustomerLogin($username);
                                            $no=$results->rowCount();
                     
                                            if($no>0)
                                            {
                                                while ($row= $results->fetch() ) {  
                                                 if(password_verify($password,$row['password'])){
                                                    $_SESSION['username']=$username;
                                                    header('location:customer');

                                                }
                                                else{
                                                    
                                                    echo '<script type="text/javascript"> alert("Invalid UserName or Password!!!") </script>';
                                                }
                                            }
                                                
                                            }
                                            else
                                            {
                                                //wrong credentials
                                                echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                            }
                                        }
                                     
                                }
                            ?>
    </div>

    
</div>

<!---- banner --->
        </div>
    </div>
<!---- header ----->
        <!---- welcome-Note ---->
<!--		<div class="welcome-note">
			<div class="container">
				<div class="wel-head text-center">
					<h3>WE Are <span>M</span>oto</h3>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
				</div>
			</div>
		</div>-->
		<!---- welcome-Note ---->
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
