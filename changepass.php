<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <form action="" method="post">
     	<h2>Change Password</h2>

     	<label>name</label>
     	<input type="text" 
     	       name="fname" 
     	       placeholder="name" requir="enter name">
     	       <br>
     	<label>Password</label>
     	<input type="password" 
     	       name="password" 
     	       placeholder="Password" require>
     	       <br>

				<label>Email</label>
     	<input type="email" 
     	       name="email" 
     	       placeholder="email" requir="enter name">
     	       <br>



     	<button name="update" type="submit">CHANGE</button>
          <a href="welcome.php" class="ca">HOME</a>
     </form>
</body>
</html>

<?php   include "connection.php";
$db=mysqli_select_db($con,'loginsystem');
if (isset($_POST['update'])) {
$id = $_SESSION['id'];
$query="UPDATE `users` SET fname='$_POST[fname]',password='$_POST[password]',email='$_POST[email]' WHERE id='$id'";

$query_run=mysqli_query($con,$query);
if ($query_run) {
	echo'<script type="text/javascript">alert("data updated successfuly")</script>';
}
else{
	echo'<script type="text/javascript">alert("data updated failed")	</script>';

}

}


?>