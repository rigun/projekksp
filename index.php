<?php
include("konek.php");
session_start();
if(strcasecmp(date("l"),"Sunday") == 0)
{
    $sql = mysqli_query($con, "SELECT * FROM data2 ");
    $row = mysqli_fetch_assoc($sql);
    $star= $row['Star'];
    if($star>=10)
    {
       mysqli_query($con, "UPDATE data2 SET Star=0");
   }
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
      <br/>
      <br/>
     <center><img src="image/logo.png" style="width: 250px;"> <h2 style="color: blue;">Kelompok Studi Pemrograman</h2></center>
    <div class="container">

      <form action="" method="get" class="form-signin">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" name="kirim" type="submit">Sign in</button>

      </form>
    </div> <!-- /container -->
    <?php
    if(isset($_GET['kirim']))
    {
        $email = $_GET['email'];
        $pass = $_GET['pwd'];
        $hash = mysqli_query($con, "SELECT * FROM data2 WHERE username='$email'");
        $row = mysqli_fetch_assoc($hash);
        if(password_verify($pass,$row['Password']))
        {
            $sql = mysqli_query($con, "SELECT * FROM data2 WHERE username='$email'");
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['npm'] = $row['NPM'];
            header("location: beranda.php");
        }else{
            echo '<div class="alert alert-warning"> Password dan Username anda tidak sesuai</div>';
        }

      }
     ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ksp.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
