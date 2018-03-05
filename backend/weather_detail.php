<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'weather247';
$conn = mysqli_connect($host, $user, $pass, $db);
//time now
date_default_timezone_set('Asia/Jakarta');
$minute=date("i");
//untuk menghasilkan time yang tepat kelipatan 5
$result=fmod($minute, 5);
$date=date("Y-m-d");
if($result==1){
  $minute=$minute-1;
}
else if($result==2){
  $minute=$minute-2;
}
else if($result==3){
  $minute=$minute-3;
}
else if($result==4){
  $minute=$minute-4;
}
if($result==0){
$waktu= date("G:i");
$waktu= $waktu.':';
}
$waktu= date("G");
$waktu= $waktu.':'.$minute;


$datas=array();
if (isset($_GET['duration'])&isset($_GET['date'])){
	 $duration=$_GET['duration'];
   $tanggal=$_GET['date'];
    //data 1 jam
     if($duration==60)
    {
      $sql = "
      SELECT a.*,DATE_FORMAT((SELECT time ORDER BY id 
      DESC LIMIT 1), '%H:%i') as 'dtime',b.weather
      FROM sensor a INNER JOIN cuaca b ON a.weatherID=b.weatherID 
      WHERE date='$tanggal' and  
      (HOUR(time)*60+MINUTE(time))%$duration='0' 
      ORDER BY time DESC";
    }

else 
   //data 5,15,30,60 menit
   {
     $sql = "
     SELECT a.*,DATE_FORMAT((SELECT time ORDER BY id 
      DESC LIMIT 1), '%H:%i') as 'dtime',b.weather 
     FROM sensor a INNER JOIN cuaca b WHERE date='$tanggal' and  
     (MINUTE(time))%$duration='0' 
     ORDER BY time DESC";	
   }
} 
else
  //data jam dan tanggal sekarang(now)
 {
   $sql="SELECT a.*,DATE_FORMAT((SELECT time ORDER BY id 
         DESC LIMIT 1), '%H:%i') as 'dtime',b.weather 
         FROM sensor a INNER JOIN cuaca b 
         WHERE time='$waktu'
         AND date='$date'";
 }
$rs = mysqli_query($conn, $sql);


$datas = array();
while($row = mysqli_fetch_array($rs)){
   $data = [
      'id'  => $row['id'],
      'day' => $row['day'],
      'date'=> $row['date'],
      'time'=> $row['dtime'],
      'temperature'=> intval($row['temperature']),
      'humidity'=>intval($row['humidity']),
      'pressure'=>intval($row['pressure']),
      'weather'=>$row['weather']
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