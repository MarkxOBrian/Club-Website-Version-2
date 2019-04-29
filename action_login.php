<?php
session_start();
include 'dbconnect.php';
?>


<?php
if(isset($_POST['submit'])){
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

    
     


}

else{
   // echo "<script>alert('Invalid admission number or password!');</script>";
   //header("Refresh:0, url=index.php");
    //header("Location:invalid_message.php");

?>

  <script type="text/javascript">
    window.location.assign("invalid_message.php");
  </script>



<?php
}
}

?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
   <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CIT CLUB</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>



    <body>
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
                        <li></li>
                        
                        <li><a href="">WELCOME, <?php echo $_SESSION['adm'];  ?></a></li>
                        <li><a href="logout.php">  <div class="glyphicon glyphicon-log-out"></div> LOG OUT</a></li>
                        

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>




        <!--Home page style-->
        
            <div class="container">

                <div class="row">
                    <br><br><br><br><br><br>
                     <div class="col-md-7 col-sm-6 col-xs-12" style="border-right: 1px solid lightgrey">  
                        

                      <table class="table table-hover"> 
   <thead> 
      <tr> 
         <th colspan="2">SUPPORTIVE TUTORIALS AND E-BOOKS</th> 
      </tr> 
   </thead> 
   <tbody> 
      <tr> 
         <td>INTRODUCTION TO LINUX</td> 
         <td> <a href="assets/docs/linux.pdf"><button class="btn btn-info">Download</button>  </a></td> 
      </tr> 
      <tr> 
         <td>INTRODUCTION TO GIT</td> 
         <td> <a href="assets/docs/git.pdf"><button class="btn btn-info">Download</button>  </a></td> 
      </tr> 
      <tr> 
         <td>INTRODUCTION TO PYTHON</td> 
         <td> <a href="assets/docs/python.pdf"><button class="btn btn-info">Download</button>  </a></td> 
      </tr> 
      <tr> 
         <td>INTRODUCTION TO PHP</td> 
         <td> <a href="assets/docs/php.pdf"><button class="btn btn-info">Download</button>  </a></td> 
      </tr> 
       
   </tbody> 
</table> 




                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
    <table class="table table-hover"> 
   <thead> 
      <tr> 
         <th colspan="2">USER BASIC INFORMATION</th> 
      </tr> 
   </thead> 
   <tbody> 
      <tr> 
         <td>FIRST NAME:</td> 
         <td> <?php echo $_SESSION['fname']."<br>";  ?></td> 
      </tr> 
      <tr> 
         <td> LAST NAME:</td> 
         <td><?php echo $_SESSION['lname']."<br>";  ?></td> 
      </tr> 
      <tr> 
         <td> FACULTY: </td> 
         <td><?php echo $_SESSION['faculty']."<br>";  ?></td> 
      </tr> 
      <tr> 
         <td> COURSE: </td> 
         <td><?php echo $_SESSION['course']."<br>";  ?></td> 
      </tr> 
       <tr> 
         <td> E-MAIL: </td> 
         <td><?php echo $_SESSION['email']."<br>";  ?></td> 
      </tr> 
       <tr> 
         <td>CELLPHONE: </td> 
         <td><?php echo $_SESSION['cellphone']."<br>";  ?></td> 
      </tr> 
   </tbody> 
</table> 


                         
                        </div>         
                </div>

            </div>
        








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


