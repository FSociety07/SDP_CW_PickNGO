<?php 
session_start();

if(isset($_SESSION['admusername']))
			{
				header('location:admhome.php');
			}
else
	{
		#	echo '<script type="text/javascript"> alert("All in vain") </script>';
	}			
	include "../includes/class-autoload.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
	<center><h2>LOGIN</h2></center>
	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="index.php" method="post">
		<label > <b>User Name</b></label>
		<br>
		<input type="text" name="username" class="ipvalues" placeholder="Type Your Username" required/>
		<br>
		<label><b>Password</b></label>
		<br>
		<input type="password" name="password" class="ipvalues" placeholder="Type Your Password" required/>
		<br>
		<input type="submit" name="submit_btn" id="register-button" value="Submit" />
		<br>
	</form>
<?php 
	
	if(isset($_POST['submit_btn']))
	{
	
				$username=$_POST['username'];
				$password=$_POST['password'];
					  $admin=new AdminView();
					 $results= $admin->CheckAdminLogin($username);
				    $no=$results->rowCount();
				

				if($no>0)
				{
					while ($row= $results->fetch() ) {  
					 if(password_verify($password,$row['password'])){
						$_SESSION['admusername']=$username;
					
					header('location:index.php');

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
?>

</body>
</html>