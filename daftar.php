<?php
include("konek.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>Daftar</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>
      <?php
      function kosongkan($con, $data){
          $filter = trim($data);
          $filter = mysqli_real_escape_string($con, $data);
          $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
          return $filter;
      }
      if(isset($_POST['add'])){
          $NPM = kosongkan($con,$_POST['NPM']);
          $Nama = kosongkan($con,$_POST['Nama']);
          $Email = kosongkan($con,$_POST['Email']);
          $Pass = kosongkan($con,$_POST['Pwd']);
          $cek = mysqli_query($con, "SELECT * FROM data2 WHERE NPM='$NPM' OR Username='$Email'");
          $hash = password_hash($Pass, PASSWORD_DEFAULT);
          if(mysqli_num_rows($cek) == 0)
          {
              $masukkan = mysqli_query($con, "INSERT INTO data2 (NPM, Nama, Username, Password, Poin, Star, status) VALUES ('$NPM','$Nama','$Email', '$hash', '0', '0', '1')") or die(mysqli_error());
              if($masukkan)
              {
                  echo '<div class="alert alert-success"> Pendaftaran berhasil di lakukan </div>';
              }else{
                  echo '<div class="alert alert-warning"> Pendaftaran gagal di lakukan </div>';
              }
          }else{
              echo '<div class="alert alert-warning"> Pendaftaran gagal di lakukan </div>';
          }
      }
       ?>
    <div class="container">
      <form action="" method="POST" class="form-signin">
          <label for="inputEmail" class="sr-only">Nama</label>
          <input type="text" id="inputnama" class="form-control" name="Nama" placeholder="Nama" required>
          <label for="inputPassword" class="sr-only">NPM</label>
          <input type="text" id="inputNPM" class="form-control" name="NPM" placeholder="NPM" min="9" required>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" name="Email" placeholder="Email address" required >
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" name="Pwd" placeholder="Password" required>
          <button onclick="tentor()" id="cek" class="btn btn-info btn-block" name="bukan" value="bukantentor">Bukan Tentor</button>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="text" id="inputkatakunci" class="form-control" style="display: none" placeholder="Kata Kunci">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Sign up</button>
      </form>
      <center>silahkan login <a href="index.php">disini</a></center>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/style.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
