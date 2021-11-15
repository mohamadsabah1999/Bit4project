<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

    include "connection.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);

	$oe = validate($_POST['oe']);
	$ne = validate($_POST['ne']);
	$c_ne = validate($_POST['c_ne']);
    
    if(empty($op)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = ($op);
    	$np =   ($np);
		
		$oe = ($oe);
    	$ne =   ($ne);

        $id = $_SESSION['id'];

        $sql = "SELECT password
                FROM users WHERE 
                id='$id' AND password='$op'";


$id = $_SESSION['id'];
$sql = "SELECT email
		FROM users WHERE 
		id='$id' AND email='$oe'";


        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET password='$np'
        	          WHERE id='$id'";

$sql_2 = "UPDATE users
        	          SET email='$ne'
        	          WHERE id='$id'";

        	mysqli_query($con, $sql_2);
        	header("Location: welcome.php?success=Your password has been changed successfully");
	        exit();
            

        }else {
        	header("Location: changepass.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: changepass.php");
	exit();
}

}else{
     header("Location: welcome.php");
     exit();
}