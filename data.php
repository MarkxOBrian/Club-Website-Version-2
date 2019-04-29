<?php
session_start();
include 'dbconnect.php';

//getting data from the login form
$adm_number=$_POST['adm'];
$password=$_POST['password'];
$result=mysqli_query($db_connect,"SELECT * FROM signup WHERE adm_number='$adm_number' && password='$password'");

$rows=mysqli_num_rows($result);

if($rows>0){
	while($extract=mysqli_fetch_assoc($result)){
		$_SESSION['adm']=$extract['adm_number'];
		$_SESSION['fname']=$extract['first_name'];
		$_SESSION['lname']=$extract['last_name'];
		$_SESSION['faculty']=$extract['faculty'];
		$_SESSION['course']=$extract['course'];
		$_SESSION['email']=$extract['email'];
		$_SESSION['cellphone']=$extract['cellphone'];
	}
	echo "Admission number".$_SESSION['adm']."<br>";
	echo "Admission number".$_SESSION['fname']."<br>";
	echo "Admission number".$_SESSION['lname']."<br>";

}

else{
	echo "<script>alert('Invalid admission number or password!');</script>";
	header("Refresh:0; url=index.php");
}


?>