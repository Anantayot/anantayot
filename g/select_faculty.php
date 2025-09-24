<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>แสดงข้อมูลคณะ -- อนันตยศ อินทราพงษ์ (โน๊ต)</h1><hr>

<?php
	include("connectdb.php");
	$sql = "SELECT * FROM faculty";
	$re = mysqli_query($conn,$sql);
	while ($data = mysqli_fetch_array($re)) {
		echo $data['f_id']."<br>";
		echo $data['f_name']."<hr>";
	}
	mysqli_close($conn)
?>
</body>
</html>