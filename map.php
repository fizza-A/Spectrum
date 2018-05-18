
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
   $con = mysqli_connect("localhost","daniel","HX7eCGaYG9yTQuen","db_bands");

   // Check connection
   if (mysqli_connect_errno())
   {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   else {
      echo "connection established <br>";
   }

   $region=$_POST["subject"];
   echo "Region name: $region <br>";
   $sql = sprintf("SELECT * FROM bands_info WHERE State='%s'",
   mysqli_real_escape_string($con, $region));


         echo "<br> Results <br>";


         $results=mysqli_query($con,$sql);

         if(mysqli_num_rows($results)>0) {
         	while($row=mysqli_fetch_array($results)) {
         		echo  $row[0]." ".$row[1]. " ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." ".$row[6];
         		echo "<br>";
         	}
         }

         mysqli_close($con);
         }
?>
