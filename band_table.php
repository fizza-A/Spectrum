<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <link href="main.css" rel="stylesheet" type="test/css"/>
      <link href="util.css" rel="stylesheet" type="test/css"/>
      <link href="ccs/bootstrap.min1.css" rel="stylesheet" type="text/css"/>
      <link href="ccs/tableexport.min.css" rel="stylesheet" type="test/css"/>
      <style>
         body {
         background-color: lavender;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <table id="result" class="table table-bordered" style="font-size: 12px; ">
            <thead>
               <tr>
                  <th>Call_sign</th>
                  <th>Licensee name</th>
                  <th>Location</th>
                  <th>state</th>
               </tr>
            </thead>
            <tbody>
               <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "daniel", "HX7eCGaYG9yTQuen", "db_bands");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        //echo "connection established <br>";

    }
    $RS = $_POST["Radio_Service"];
    $start_freq = $_POST["freqInputLower"];
    $end_freq = $_POST["freqInputUpper"];
    $company = $_POST["Licensee"];
    $sql = sprintf("SELECT * FROM bands_info WHERE (`Licensee` LIKE '%%%s%%') AND (Radio_Service='%s' AND freqInputLower='%f' AND freqInputUpper='%f')", mysqli_real_escape_string($con, $company), mysqli_real_escape_string($con, $RS), $start_freq, $end_freq);
    #$sql = sprintf("SELECT * FROM bands_info WHERE (Radio_Service='%s' AND freqInputLower='%f' AND freqInputUpper='%f')",
    #mysqli_real_escape_string($con, $RS), $start_freq, $end_freq);
    $results = mysqli_query($con, $sql);
    if (!$results) {
        die('SQL Error: ' . mysqli_error($con));
    }
    while ($row = mysqli_fetch_array($results)) {
        echo '<tr>
                  				<td>' . $row[0] . '</td>
                  				<td>' . $row[4] . '</td>
                  				<td>' . $row[5] . '</td>
                  				<td>' . $row[6] . '</td>
                  			</tr>';
        $Lic = $row[7];
        $fed = $row[8];
        $DD = $row[9];
        $usage = $row[10];
        $link = $row[11];
        echo "<br>";
    }
    echo "<b>Search Criteria</b><br>";
    echo "Radio Service: ";
    echo $RS;
    echo "<br>";
    echo "Upper Frequency: ";
    echo $start_freq;
    echo "<br> Lower Frequency: ";
    echo $end_freq;
    echo "<br> Licensee Status: ";
    echo $Lic;
    echo "<br> Federal/Non-Federal: ";
    echo $fed;
    echo "<br>  Division Duplex: ";
    echo $DD;
    echo "<br> Usage: ";
    echo $usage;
    echo "<br> 3GPP Association: ";
    echo $link;
    echo "<br> Link:  ";
    echo "<br>";
}
?>
            </tbody>
         </table>
      </div>
      <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
      <script src="js/bootstrap.min_1.js" type="text/javascript"></script>
      <script src="js/FileSaver.min.js" type="text/javascript"></script>
      <script src="js/tableexport.min.js" type="text/javascript"></script>
      <?php
if (isset($con)) {
    mysqli_close($con);
}
?>
      <script>
         $('#result').tableExport();
      </script>
   </body>
</html>
