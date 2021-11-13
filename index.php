<?php session_start();
require_once('connection.php');

//Code for Registration 
<<<<<<< HEAD
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$enc_password','$contact')");

if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}
}

// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}

=======
if(!isset($_POST['coach']))
{
	if(isset($_POST['signup']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$contact=$_POST['contact'];
		$enc_password=$password;
	
	
	$sql=mysqli_query($con,"select id from users where email='$email'");
	$row=mysqli_num_rows($sql);
	if($row>0)
	{
		echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
	} else{
		$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$enc_password','$contact')");
	
	if($msg)
	{
		echo "<script>alert('Register successfully');</script>";
	}
	}
	}
}
elseif(isset($_POST['coach'])) 
		
	{

		if(isset($_POST['signup']))
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$contact=$_POST['contact'];
			
			$enc_password=$password;
		
		$sql=mysqli_query($con,"select id from coach where email='$email'");
		$row=mysqli_num_rows($sql);
		if($_FILES['f1']['name']){
			move_uploaded_file($_FILES['f1']['tmp_name'], "coach/images/".$_FILES['f1']['name']);
			$img="image/".$_FILES['f1']['name'];
			}
		if($row>0)
		{
			echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
		} else{
			$msg=mysqli_query($con,"insert into coach(fname,lname,email,password,contactno,image) values('$fname','$lname','$email','$enc_password','$contact','$img')");
		
		if($msg)
		{
			echo "<script>alert('Register successfully');</script>";
		}
		}
		}



















	}


// Code for login 

if (!isset($_POST['coach_login'])) {

	if(isset($_POST['login']))
	{
	$password=$_POST['password'];
	$dec_password=$password;
	$useremail=$_POST['uemail'];
	$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
	$extra="welcome.php";
	$_SESSION['login']=$_POST['uemail'];
	$_SESSION['id']=$num['id'];
	$_SESSION['name']=$num['fname'];
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
	}
	else
	{
	echo "<script>alert('Invalid username or password');</script>";
	$extra="index.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	//header("location:http://$host$uri/$extra");
	exit();
	}
	}










	
}

elseif (isset($_POST['coach_login'])) {

	if(isset($_POST['login']))
	{
	$password=$_POST['password'];
	$dec_password=$password;
	$useremail=$_POST['uemail'];
	$ret= mysqli_query($con,"SELECT * FROM coach WHERE email='$useremail' and password='$dec_password'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
	$extra="./coach/manage-users.php";
	$_SESSION['login']=$_POST['uemail'];
	$_SESSION['id']=$num['id'];
	$_SESSION['name']=$num['fname'];
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
	}
	else
	{
	echo "<script>alert('Invalid username or password');</script>";
	$extra="index.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	//header("location:http://$host$uri/$extra");
	exit();
	}
	}



















	
	











}



>>>>>>> f0df4403ad48d3658cc63a94b939cfdc8d4b6e0c
//Code for Forgot Password

if(isset($_POST['send']))
{
$femail=$_POST['femail'];

$row1=mysqli_query($con,"select email,password from users where email='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";	
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login System</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
<<<<<<< HEAD
    <div class="fadeIn first">
    </div>
<div class="main">
		<h1>Registration or Login </h1>
=======
    <!-- <div class="fadeIn first">
	</div> -->
	
	<div class="main">
		
		
>>>>>>> f0df4403ad48d3658cc63a94b939cfdc8d4b6e0c
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span>
			  	  	
				</li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>
				  <li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Forgot Password</span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="registration" method="post" action="" enctype="multipart/form-data" >    <div class="fadeIn first">

								<p>First Name </p>
								<input type="text" class="text" value=""  name="fname" required  >
							 </div>     <div class="fadeIn second">

								<p>Last Name </p>
								<input type="text" class="text" value="" name="lname"  required > </div>
								<div class="fadeIn third">

								<p>Email Address </p>
								<input type="text" class="text" value="" name="email"  > </div>
								<div class="fadeIn fourth">

								<p>Password </p>
								<input type="password" value="" name="password" required> </div>
								<div class="fadeIn five">

										<p>Contact No. </p>
								<input type="text" value="" name="contact"  required>
				                 </div>
								<div class="sign-up">
								<div class="fadeIn six">
<<<<<<< HEAD
=======
								
>>>>>>> f0df4403ad48d3658cc63a94b939cfdc8d4b6e0c

								<input type="reset" value="Reset">
								  </div>  
								  <div class="fadeIn seven">

									<input type="submit" name="signup"  value="Sign Up" >
			                        </div>
<<<<<<< HEAD
									<div class="clear"> </div>
								</div>
=======
										
									<div class="clear"> </div>
					            </div>
								<div><p style="display:contents;">coach ?</p>
								
							
							</div><br>	
								<label class="switch">
									<input type="checkbox" name="coach">
									<span class="slider round"></span>
									
									</label>
									<hr class="animated">
									
									<div class="clear"><div class="parent-div">
								<button class="btn-upload">Choose image</button>
								<input type="file" name="f1" />
								</div></div>
									
									
>>>>>>> f0df4403ad48d3658cc63a94b939cfdc8d4b6e0c
							</form>

						</div>
					</div>
				</div>		
			 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<div class="fadeIn first">
							</div>
							<form name="login" action="" method="post">
							<div class="fadeIn second">

								<input type="text" class="text" name="uemail" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>
							</div>
							<div class="fadeIn third">

								<input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>
							</div>
								<div class="p-container">
								
									<div class="submit two">
									<div class="fadeIn fourth">

									<input type="submit" name="login" value="LOG IN" >
									</div>
<<<<<<< HEAD
				               </div>
									<div class="clear"> </div>
=======
								
				               </div>
							   
									<div class="clear"> </div>
									<div><p style="display:contents; color:#69e9cf;">coach ?</p></div><br>	
								<label class="switch">
									<input type="checkbox" name="coach_login">
									<span class="slider round"></span>
									
									</label>
>>>>>>> f0df4403ad48d3658cc63a94b939cfdc8d4b6e0c
								</div>

							</form>
					</div>
				</div> 
			</div> 			        					 
				 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
							<div class="fadeIn first">

								<input type="text" class="text" name="femail" value="" placeholder="Enter your registered email" required  ><a href="#" class=" icon email"></a>
			                      </div>
										<div class="submit three"> 
										<div class="fadeIn first">

											<input type="submit" name="send" onClick="myFunction()" value="Send Email" >
										</div> </div>
									</form>
									</div>
				         	</div>           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
<<<<<<< HEAD
=======
		
		
>>>>>>> f0df4403ad48d3658cc63a94b939cfdc8d4b6e0c
	     </div>

</body>
</html>