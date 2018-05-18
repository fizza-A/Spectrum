<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="main.css" rel="stylesheet" type="test/css"/>
<link href="util.css" rel="stylesheet" type="test/css"/>
<link href="bootstrap.min1.css" rel="stylesheet" type="text/css"/>
<link href="tableexport.min.css" rel="stylesheet" type="test/css"/>
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
if ($_SERVER["REQUEST_METHOD"]=="POST") {
$con =     mysqli_connect("localhost","root","pizza","db_bands");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else {
	//echo "connection established <br>";
  }  
  
$RS=$_POST["Radio_Service"];
$start_freq=$_POST["freqInputLower"];
$end_freq=$_POST["freqInputUpper"];
$company=$_POST["Licensee"];

$sql = sprintf("SELECT * FROM bands_info WHERE (`Licensee` LIKE '%%%s%%') AND (Radio_Service='%s' AND freqInputLower='%f' AND freqInputUpper='%f')", 
  mysqli_real_escape_string($con, $company), mysqli_real_escape_string($con, $RS), $start_freq, $end_freq);

#$sql = sprintf("SELECT * FROM bands_info WHERE (Radio_Service='%s' AND freqInputLower='%f' AND freqInputUpper='%f')", 
#mysqli_real_escape_string($con, $RS), $start_freq, $end_freq);

$results=mysqli_query($con,$sql);

if (!$results) {
	die ('SQL Error: ' . mysqli_error($con));
}
		while($row=mysqli_fetch_array($results)) {
		echo .$row[1].;
		echo '.$row[2].';
		echo '.$row[3].';
		echo '.$row[7].';
		echo '.$row[8].';
		echo '.$row[9].';
		echo '.$row[10].';
		
		echo '<tr> 
				<td>'.$row[0].'</td>
				<td>'.$row[4].'</td>
				<td>'.$row[5].'</td>
				<td>'.$row[6].'</td>
			</tr>';
		echo "<br>";
		
		}
		}
		?>
		</tbody>
	</table>
</div>
 <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap.min_1.js" type="text/javascript"></script>
<script src="FileSaver.min.js" type="text/javascript"></script>
<script src="tableexport.min.js" type="text/javascript"></script>

<?php
if(isset($con)) {
		mysqli_close($con);
}
?>
		<script>
		$('#result').tableExport();
		</script>
</body>		
	</html>		
		