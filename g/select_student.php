<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>แสดงข้อมูลนิสิต -- อนันตยศ อินทราพงษ์ (โน๊ต)</h1><hr>

<?php
	include("connectdb.php");
	$sql = "SELECT * FROM student";
	$re = mysqli_query($conn,$sql);
	while ($data = mysqli_fetch_array($re)) {
		$y = substr($data['s_id'], 0, 2);
		echo "<img src='http://202.28.32.211/picture/student/{$y}/{$data['s_id']}.jpg' width='200'><br>";
		echo $data['s_id']."<br>";
		echo $data['s_name']."<br>";
		echo $data['s_address']."<br>";
		echo $data['s_gpax']."<br>";
		echo $data['f_id']."<hr>";
	}
	mysqli_close($conn)
?>
</body>
</html>