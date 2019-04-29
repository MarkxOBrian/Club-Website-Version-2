<?php
include_once "dbconnect.php";


$adm_number=$_POST['adm'];
$password=$_POST['password'];
$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$faculty=$_POST['faculty'];
$course=$_POST['course'];
$email=$_POST['email'];
$cellphone=$_POST['cellphone'];

$result=mysqli_query($db_connect,"SELECT * FROM signup WHERE adm_number='$adm_number' ");


$rows=mysqli_num_rows($result);

if($rows>0){
echo "<script> alert('The admission number is already registered!');</script>";
//header("Refresh:0; url=index.php");

?>

	<script type="text/javascript">
		window.location.assign("index.php");
	</script>



<?php

}

else{
$sql_insert="INSERT INTO signup (`adm_number`,`password`,`first_name`,`last_name`,`faculty`,`course`,`email`,`cellphone`) VALUES('$adm_number','$password','$first_name','$last_name','$faculty','$course','$email','$cellphone')";
mysqli_query($db_connect,$sql_insert);
echo "<script> alert('You registered successfully!');</script>";
//header("Refresh:0; url=index.php");
?>

	<script type="text/javascript">
		window.location.assign("index.php");
	</script>



<?php
}


?>