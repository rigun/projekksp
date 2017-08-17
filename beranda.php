<?php
include("konek.php");
session_start();
if($_SESSION['npm']){
 ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="favicon.png">

     <title>Beranda</title>

     <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="css/dashboard.css" rel="stylesheet">
   </head>

   <body>
     <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
       <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <a class="navbar-brand" href="#">Dashboard</a>
       <?php
       $hash = mysqli_query($con, "SELECT * FROM data2");
       $row = mysqli_fetch_assoc($hash);
       $NPM = $_SESSION['npm'];
       echo 'npm anda'.$NPM;
       $sql = mysqli_query($con, "SELECT * FROM data2 WHERE NPM='$NPM'");
       $row = mysqli_fetch_assoc($sql);
       $Uname = $row['Username'];
       $nama = $row['Nama'];
       $poin = $row['Poin'];
       $star = $row['Star'];
       $stat = $row['status'];
       if(strcasecmp(date("l"),"Monday") == 0)
       {
          if($star==0)
          {
              $masukkan = mysqli_query($con, "UPDATE data2 SET Star=13 WHERE NPM=$NPM");
          }
       }
       ?>

       <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
             <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="logout.php">log out</a>
           </li>
         </ul>
         </div>
     </nav>

     <div class="container-fluid">
       <div class="row">
         <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
           <ul class="nav nav-pills flex-column">
             <li class="nav-item">
               <p class="nav-link active">Profil Anda <span class="sr-only">(current)</span></p>
             </li>
             <li class="nav-item">
               <p class="nav-link">Nama       : <?php echo $nama?></p>
             </li>
             <li class="nav-item">
               <p class="nav-link">NPM        : <?php echo $NPM?></p>
             </li>
             <li class="nav-item">
               <p class="nav-link">Status     : <?php if($stat==1){echo "aktif";}else{echo "tidak aktif";} ?></p>
             </li>

           </ul>

         </nav>

         <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
           <h1>KSP (Kelompok Studi Pemrograman)</h1>

           <section class="row text-center placeholders">
             <div class="col-6 col-sm-3 placeholder">
               <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
               <h4>POIN</h4>
             </div>
             <div class="col-6 col-sm-3 placeholder">
               <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid Star" alt="Generic placeholder thumbnail">
               <h4>BINTANG</h4>
             </div>
            </section>

           <h2>Nama Tentor</h2>
           <div class="table-responsive">
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th>No</th>
                   <th>Nama</th>
                   <th>Bintang</th>
                   <th>Setting</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>1,001</td>
                   <td>Lorem</td>
                   <td>ipsum</td>
                   <td>dolor</td>
                 </tr>
                 <tr>
                   <td>1,002</td>
                   <td>amet</td>
                   <td>consectetur</td>
                   <td>adipiscing</td>
                 </tr>
                 <tr>
                   <td>1,003</td>
                   <td>Integer</td>
                   <td>nec</td>
                   <td>odio</td>
                 </tr>

               </tbody>
             </table>
           </div>
         </main>
       </div>
     </div>

     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
     <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
     <script src="../../dist/js/bootstrap.min.js"></script>
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
 </html>
 <?php
   }else{
     header("location: index.php");
   }
 ?>
