<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$password=md5($password);

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
		
			$query = "insert into table1 (user_name,password) values ('$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Register_form</title>
</head>
<body>
<form method="post"> 
   <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <div>
    <label ><b>Username</b></label>
    <input type="text" placeholder="Enter your user name" name="user_name"  required>
    </div> <div>
    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"   required>
    </div>
    <hr>
    <p>By creating an account you agree to our Terms & Privacy.</p>
    <button type="submit" class="registerbtn" value="Signup">Register</button>
    <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
  </div>
  
</form> 
</body>
</html>
