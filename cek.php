<!DOCTYPE HTML>
<html>
<body>

  <?php
  include("konek.php");

  function fucker($i)
  {
    if(strcasecmp($i, "Monday")==0) return 1;
    else if(strcasecmp($i, "Tuesday")==0) return 2;
    else if(strcasecmp($i, "Wednesday")==0) return 3;
    else if(strcasecmp($i, "Thursday")==0) return 4;
    else if(strcasecmp($i, "Friday")==0) return 5;
    else if(strcasecmp($i, "Saturday")==0) return 6;
    else if(strcasecmp($i, "Sunday")==0) return 7;
  }
  date_default_timezone_set("Asia/Jakarta");

  $cekDate= mysqli_query($con, "SELECT * FROM counter WHERE ID=1");
  $row = mysqli_fetch_assoc($cekDate);

   $sekarang = date("l");
   $sekarang = fucker($sekarang);
   $hari = $row['Count'];


   if( ceil( (strtotime("Next Monday")-time())/60/60/24) != 7 && $row['Reset']==1)
   {
      $now = date("l");
      $nowtoint = fucker($now);
      $UpdateData = mysqli_query($con, "UPDATE counter SET Reset=0, Count=$nowtoint WHERE ID=1");
   }

   else if($row['Count']==8 && $row['Reset']==0)
   {
     $UpdateData = mysqli_query($con, "UPDATE counter SET Count=0 WHERE ID=1");
     $UpdateData = mysqli_query($con, "UPDATE data2 SET Star=3");
   }

   else if($hari!=$sekarang && $row['Reset']==0)
   {
     $howmuchcounted = $row['Count']+1;
     $UpdateData = mysqli_query($con, "UPDATE counter SET Count=$howmuchcounted WHERE ID=1");
   }

 ?>



</body>
</html>
