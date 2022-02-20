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
 if(isset($_GET['edit'])){
    $update=true;
    $Id=$_GET['edit']; 
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
              
                <form name="register" id="register" method="post" action="pickupreq.php">
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
                            <legend>Package Details</legend>
                            <div>
                            <span>Weight</span>
                                <input type="text" name="weight"  minlength="1" class="required digits" required placeholder="5"/>
                            </div>
                            <div>
                            <span>Size</span>

                                <select name="size" id="size">
                                <option value="">Select</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                                </select>
                            </div>
                            <div>      
                                 <input type="submit" Value="Save" name="save_submit" />
                            </form>                
                                    <?php 
                                        if(isset($_POST['save_submit'])){    
                                            $userObj=new PackageContro();
                                            $req=$_POST['request'];
                                            $weight=$_POST['weight'];
                                            $size=$_POST['size'];
                                            $pickupTime = date('Y-m-d h:i:s', time()); 
                                         
                                            $perKg=100;
                                     

                                            $sizeCost;
                                            switch($size){
                                                case "small":
                                                    $sizeCost=100;
                                                    break;                                                
                                                case "medium":
                                                    $sizeCost=200;
                                                    break;                                                
                                                case "large":
                                                    $sizeCost=300;
                                                    break;
                                            }

                                            $rate= $weight*$perKg + $sizeCost;
                                        
                                            $newresult= $userObj->CreatePackage($weight,$size,$pickupTime,$rate,$req);
                                            
                                            
                                           if($newresult){
                                              echo '<script>alert("Package Added Successfully")</script>'; 
                                              
                                              $statusUpdate= new PickupRequestContro();
                                              $status=$statusUpdate->UpdateRequestStatus($status=2,$req);

                                           }else{
                                              
                                            echo '<script>alert("Error")</script>';
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