<?php
include 'dbconnect.php';

$uname=$_POST['username'];
$email=$_POST['email'];
$message=$_POST['message'];


$sql_insert=mysqli_query($db_connect,"INSERT INTO contact(user_name,email,message) VALUES('$uname','$email','$message')");

if(!$sql_insert){
	echo "<script>alert('Message could not be sent. Please contact system admin!');</script>";
	//header("Refresh:0;url=index.php");
	?>
	<script type="text/javascript">
		window.location.assign("index.php");
	</script>



<?php
}
else{
echo "<script>alert('Message sent sucessfully!');</script>";
//header("Refresh:0;url=index.php");
?>

	<script type="text/javascript">
		window.location.assign("index.php");
	</script>



<?php
}

?>