<?php
include 'dbconnect.php';
$to="tysonosore1@gmail.com";
$subject="work";
$body="working";

if(mail($to,$subject,$body)){
	echo "mail sent successfully!";
}

else{
	echo "mail not sent";
}



?>