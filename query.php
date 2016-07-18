<?php error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<?php
include_once 'models/Bus.php';

$Bus = new Bus();
$busArray = $Bus->findAll();
$jsonString = json_encode($busArray);
echo $jsonString;

?>