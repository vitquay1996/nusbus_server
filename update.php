<?php error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<?php
function getCode(){
 $today = date('Y-m-d');
 $day = date('d', strtotime($today))+0;
 $month = date('m', strtotime($today))+0;
 $year = date('Y', strtotime($today));
 
 $code = "" + (7 * $year + 13 * $month + 378 * $day);
 echo "The server generated code is ";
 echo $code;
 //return "$y.$m.$d";
 $code = md5($code . "++");
 
 return $code;
}

?>

<?php
include_once 'models/Bus.php';
// Check the GET variable
if (!isset($_GET['phoneId']))
	$message = "No phoneId";
else if (!isset($_GET['lat']))
	$message = "No latitude";
else if (!isset($_GET['long']))
	$message = "No longitude";
else if (strcmp($_GET['code'], getCode())!=0){
	$message = "Authorisation failed. The mobile code is ";

}

// Collect data to variable
$_GET = array_map('stripslashes', $_GET);	
extract($_GET);


if (!isset($message)) {
	$Bus = new Bus();
	$Bus1 = $Bus->findByPhoneId($phoneId);
	if (!isset($Bus1)) {
		//create a new bus
		try
		{
			$NewBus = new Bus();
			$NewBus->phone_id = $phoneId;
			if (isset($bus))
				$NewBus->bus = $bus;
			$NewBus->lat = $lat;
			$NewBus->longitude = $long;
			$NewBus->time = date('Y-m-d H:i:s');
			if (isset($status))
				$NewBus->status = $status;
			$NewBus->create();
			echo "success";
		}
		catch(CreateException $e) {
			echo $e->errorMessage();
		}
	}
	else {
		try
		{
			if (isset($bus))
				$Bus1->bus = $bus;
			$Bus1->lat = $lat;
			$Bus1->longitude = $long;
			$Bus1->time = date('Y-m-d H:i:s');
			if (isset($status))
				$Bus1->status = $status;
			$Bus1->update();
			echo "success";
		}
		catch(UpdateException $e) {
			$e->errorMessage();
		}
	}
}
else 
	echo $message;
	echo $_GET['code'];
	echo " while the web code is ";
	echo getCode();
?>

