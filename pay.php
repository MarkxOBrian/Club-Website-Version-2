<?php
session_start();
include 'dbconnect.php';
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>cit club</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">


<!--css for button-->
<style type="text/css">

        .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    background-color: brown;
}

 .bg{
    	background-image: url('assets/images/bg2.jpg');
    	width: 100%;
    	height: 600px;
    }
</style>





    </head>
    <body class="bg">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> <img src="img/logo.png" height="50" width="70" alt="" /> </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li><a href="">WELCOME, <?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="logout.php">  <div class="glyphicon glyphicon-log-out"></div> LOG OUT</a></li>
                        
                        

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!--Home page style-->
        <header id="hom" class="hom">
        	<br><br><br><br><br>
            <div class="container">

                <div class="row">
                    <br><br><br><br><br><br><br><br><br>

                        <div class="col-md-4 col-sm-6 col-xs-12">
  						
                        </div>


                        <div class="col-md-4 col-sm-6 col-xs-12">
                        
  						<center><button class="button button2" href="#pay" data-toggle="modal">Click here to pay</button></center>
  						
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
  						
                        </div>

                    </div>
                </div><br><br><br><br><br><br><br><br>
        </header>






                <!--pay fee modal form-->
<div class="modal fade" id="pay" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<form class="form-horizontal" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<div class="modal-header">
<h4><center> <span> <img src="img/logo.png" height="50" width="70" alt="" /> </span> REGISTRATION FEE PAYMENT</center></h4>
</div>

<div class="modal-body">

<div class="form-group">
<label for="adm number" class="col-lg-3 control-label">Registration number:</label>
<div class="col-lg-9">
<input type="text" class="form-control" name="adm" placeholder="Registration number" required>
</div>
</div>

<div class="form-group">
<label for="name" class="col-lg-3 control-label">Amount:</label>
<div class="col-lg-9">
<input type="number" class="form-control" name="amount" placeholder="Amount" required>
</div>
</div>


<div class="form-group">
<!--<div class="modal-footer">-->
<center><button type="button" class="btn btn-primary contact-btn" onclick="location.reload()" style="width: 150px;">BACK</button>
<button class="btn btn-primary" type="submit" name="submit" style="width: 150px;">PAY!</button></center>
<!--</div>-->
</div>


</div>
</div>
</form>

</div>
</div>
</div>

<!--end of pay fee form-->



<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$adm=$_POST['adm'];
$amt=$_POST['amount'];
$check_adm="0";


$result=mysqli_query($db_connect,"SELECT * FROM signup WHERE reg_fee=0 AND adm_number='$adm' ");
$verify_result=mysqli_query($db_connect,"SELECT * FROM signup");


while($extract=mysqli_fetch_assoc($verify_result)){
	if($extract['adm_number']==$adm){
		$check_adm=$extract['adm_number'];
		break;	
	}
	else{
		$check_adm="";
	}
	
}



$rows=mysqli_num_rows($result);

if($adm==$check_adm){
    if($rows==1){
	mysqli_query($db_connect,"UPDATE `signup` SET `reg_fee`='$amt',`paid`='YES' WHERE `adm_number`='$adm' ");
	echo "<script>alert('Payment successful!');</script>";
}
else if($rows==0){
	echo "<script>alert('The person has already paid!') </script>";
}

}
else{
	echo "<script>alert('The admission number you entered is not registered!') </script>";
    //header("Refresh:0;url=pay.php");

?>



<?php

}	




}

?>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- Javascripts
    ================================================== --> 
<script type="text/javascript" src="js/main.js"></script>

    </body>
</html>
