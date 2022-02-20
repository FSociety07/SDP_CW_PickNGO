<?php 


include "includes/class-autoload.inc.php";

if(!empty($_GET['file'])){
    $fileName  = basename($_GET['file']);
    $filePath  = "files/".$fileName;
    
    if(!empty($fileName) && file_exists($filePath)){
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        //read file 
        readfile($filePath);
        exit;
    }
    else{
        echo '<script>alert("file not exit")</script>'; 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
        <title>Welcome User</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/jquery.min.js"></script>-->
<script src="js/jquery-1.8.3.js"></script>
 <!-- Custom Theme files -->
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />
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
        <li ><a href="register.php">Register</a></li>
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
                <h1>Welcome, User</h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="#">User</a> <label>:</label></li>
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
							<center><h2>Track Item</h2></center>
							<center><img class="avatar" src="images/avatar.jpg"></center>
							<form class="myform" action="tracking.php" method="post">
								<br>
								<div align="center"><input type="text" name="track" placeholder="Enter the tracking Reference ID"></div>
                                <br>
                                <input type="submit" name="track_submit" id="register-button" value="Track" />
								<br>
									</form>
                                    <?php 
                                if(isset($_POST['track_submit']))
                                { 
                                    $cid=$_POST['track'];

                                $status=new PickupRequestContro();
                                $statusResults=$status->DisplayTrackingStatus($cid);
                              if($statusResults){
                                
                            ?>
    
</div>

<!---- banner --->
    
        <br/>
        <div class="form_cont">                        
                                <table  style="margin: 0px auto;">
                                    <thead>
                                    <tr>                         
                                        <th width="15%">TrackingCode</th>
                                        <th width="15%">Sender</th>
                                        <th width="15%">Pickup Driver</th>
                                        <th width="15%">Pickup Contact</th>
                                        <th width="15%">Receiver</th>
                                        <th width="15%">Request</th>
                                        <th width="15%">Delivery Proof</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>                                  
                                        <td><?php echo $statusResults["tracking"]?></td>
                                        <td><?php echo $statusResults["Sender"]?></td>
                                        <td><?php echo $statusResults["Deliver"]?></td>
                                        <td><?php echo $statusResults["phoneNo"]?></td>
                                        <td><?php echo $statusResults["Receiver"]?></td>

                                        <?php if($statusResults["status"]==-1): ?>
                                       <td><button type="submit" class="btn btn-danger" name="accept">Pending</button></td>
                                            <?php elseif($statusResults["status"]==1): ?>
                                            <td><button type="submit" class="btn btn-success" name="accepted" >Accpeted</button></td>
                                            <?php elseif($statusResults["status"]==2): ?>
                                            <td><button type="submit" class="btn btn-info" name="accepted" >Pickedup</button></td>
                                            <?php elseif($statusResults["status"]==3): ?>
                                            <td><button type="submit"  class="btn btn-success" name="accepted" >Delivered</button></td>
                                            <?php else:?>
                                           
                                        <?php endif;?>  
                                                                
                                        <td><a  href="tracking.php?file=<?php echo $statusResults["deliveryProof"];?> " class="btn btn-info">Download</a> </td>
                                    </tr>   
                                    </tbody>
                                </table>
                                                             
                                </form>
                                <?php }else{
                            
                                echo '<script>alert("Sorry, item not destined here")</script>';                         
                                             
                                }
                            } ?>
                                </div>
    </div>
</div>

    <!----//End-bottom-footer---->
</div>
	</body>
</html>