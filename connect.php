<? 

$inputuser = $_POST['user'];
$inputpass = $_POST['pass'];

$connect = mysql_connect("localhost", $call_sign, $Licensee, $Radio_Service, $latitude, $longitude);

@mysql_select_db($bands_info) or ("Database not found");

$query = 