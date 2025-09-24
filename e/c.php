<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>อนันตยศ อินทราพงษ์ (โน๊ต)</h1><hr>

<form method="post" action="">
กรอกข้อมูล <input type="text" name="a" autofocus>
<input type="submit" name="Submit" value="OK">
<br>

<?php
if(isset($_POST['Submit'])){
	$gender = $_POST['a'];
	if ($gender == 1){
	echo "เพศชาย ";
}
	else if ($gender == 2){
	echo "เพศหญิง";
}else {
	echo "กรอกข้อมูลไม่ถูกต้อง";
}
}
?>
</body>
</html>