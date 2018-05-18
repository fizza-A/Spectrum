<!DOCTYPE html>
<html>
   <head>
      <title>Search Results from Map</title>
      <meta charset="UTF-8">
   </head>

   <body>
   <div><h1>Results</h1></div>
   <form method="post" action="map.php">
      State: <input type="text" name="state"><br>
      <input type="submit" name="submit" value="Submit">
   </form>

   <?php

      if ($_SERVER["REQUEST_METHOD"]=="POST") {
      $con =     mysqli_connect("localhost","root","","db_bands");

      // Check connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else {
      	echo "connection established <br>";
        }

      // $region=$_POST["State"];
      //
      //
      // echo "Search Criteria <br>";
      // echo "Region name: $region <br>";
      //
      // echo "<br> Results <br>";
      //
      // $sql = sprintf("SELECT * FROM bands_info WHERE State='%s'",
      //    mysqli_real_escape_string($con, $region));
      //
      // $results=mysqli_query($con,$sql);
      //
      // if(mysqli_num_rows($results)>0) {
      // 	while($row=mysqli_fetch_array($results)) {
      // 		echo $row[1]. " ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5];
      // 		echo "<br>";
      // 	}
      // }
      //
      // mysqli_close($con);
      // }
   ?>
   </body>
</html>
