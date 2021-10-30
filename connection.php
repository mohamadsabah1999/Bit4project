<?php
$con = mysqli_connect("localhost","root","","yos") or die ("no connection");

if (isset($_POST['save']))
{
	$name = $_POST['user_name'];
	$pass = $_POST['password'];
	
	$query = mysqli_query($con,"insert into `table1` (`user_name`,`password`) value ('$name','$pass')") or die("No record saved");
	$query2 = mysqli_query($con,"select * from `table1` where id  order by id DESC");
    $re = mysqli_fetch_array($query2);
	echo "The record saved".'<br>'.$re['id'];
	echo "".'<br>'.$re['name'];
		echo "".'<br>'.$re['pass'];
}