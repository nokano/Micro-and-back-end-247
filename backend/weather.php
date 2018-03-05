<?php
require("fuzzyfix.php");
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'weather247';
$conn = mysqli_connect($host, $user, $pass, $db);

$datas=array();

$sql = "SELECT id,day,date,AVG(humidity),
        AVG(temperature),AVG(pressure),DATE_FORMAT(
        (SELECT time FROM sensor ORDER BY time
        DESC LIMIT 1), '%H:%i') as 'dtime' 
        FROM sensor 
        GROUP BY date DESC LIMIT 7";
$rs = mysqli_query($conn, $sql);

$datas = array();
while($row = mysqli_fetch_array($rs)){
        $prediksi='';
        mamdani(intval($row['AVG(temperature)']),intval($row['AVG(humidity)']),intval($row['AVG(pressure)']),$prediksi);  
		$data = [
			'id'  => $row['id'],
			'day' => $row['day'],
			'date'=> $row['date'],
			'time'=> $row['dtime'],
			'temperature'=> 
			 intval($row['AVG(temperature)']),
			'humidity'=>intval($row['AVG(humidity)']),
			'pressure'=>intval($row['AVG(pressure)']),
			'weather'=>$prediksi
		];
		array_push($datas, $data);
}

if($rs){

	$response['error'] = FALSE;
	$response['message'] = "";
	$response['data'] = $datas;
	echo json_encode($response);
}
?>