<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost","daniel","HX7eCGaYG9yTQuen","db_bands");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        //echo "connection established <br>";
    }

    $RS         = $_POST["Radio_Service"];
    $start_freq = $_POST["freqInputLower"];
    $end_freq   = $_POST["freqInputUpper"];
    $company    = $_POST["Licensee"];

    $sql = sprintf("SELECT * FROM bands_info WHERE (`Licensee` LIKE '%%%s%%') AND (freqInputLower='%f' AND freqInputUpper='%f')", mysqli_real_escape_string($con, $company),  $start_freq, $end_freq);

    $results = mysqli_query($con, $sql);
    if (!$results) {
        die('SQL Error: ' . mysqli_error($con));
    }

    while ($row = mysqli_fetch_array($results)) {
      echo  $row[0]." ".$row[1]. " ".$row[2]." ".$row[3]." ".$row[4]." ".$row[6];
      echo "<br>";
    }
}
?>
