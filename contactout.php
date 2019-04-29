<?php
session_start();
include 'dbconnect.php';
?>

<?php
$result=mysqli_query($db_connect,"SELECT * FROM contact");
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CIT CLUB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

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
                    <a class="navbar-brand" href="#"><img src="img/logo.png" height="50" width="70" alt="" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li><a href="">WELCOME, <?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="logout.php">  <div class="glyphicon glyphicon-log-out"></div> LOG OUT</a></li>
                        <li><a href="#" onclick="window.print();">PRINT</a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!--Home page style-->
            <br><br><br><br><br>
            <div class="container">

                <div class="row">
                    <table class="table"> 
   <caption>SENT MESSAGES</caption> 
   <thead> 
      <tr> 
         <th>Username</th> 
         <th>E-mail</th> 
         <th>Message</th>  
      </tr> 
   </thead> 
   <tbody> 
<?php
//checking if the username exists
if(isset($_SESSION['username'])){ 

    while($extract=mysqli_fetch_assoc($result)){

echo "<tr>"."<td>".$extract['user_name']."</td>"."<td>".$extract['email']."</td>"."<td>".$extract['message']."</tr>"; 
  }

}

else{
    echo "<script>alert('Cannot view contacts.No such admin user!');</script>";
    //header("Location:reg_members.php");

?>
    <script type="text/javascript">
        window.location.assign("index.php");
    </script>


<?php
}
//end of validation check

?>




   </tbody> 
</table> 

                    </div>
                </div><br><br><br><br><br><br><br><br>
        


    </body>
</html>
