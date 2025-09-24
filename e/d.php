<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>อนันตยศ อินทราพงษ์ (โน๊ต)</h1><br>

<form method="post" action="">
กรอกข้อมูล <input type="text" name="a" autofocus>
<input type="submit" name="Submit" value="OK">
<hr>

<?php
if(isset($_POST['Submit'])){
	$m = $_POST['a'];
	switch ($m ){
		case'1':echo "มกราคม "; break ;
		case'2':echo "กุมภาพันธ์ "; break ;
		case'3':echo "มีนาคม "; break ;
		case'4':echo "เมษายน "; break ;
		case'5':echo "พฤษภาคม "; break ;
		case'6':echo "มิถุนายน "; break ;
		case'7':echo "กรกฎาคม "; break ;
		case'8':echo "สิงหาคม "; break ;
		case'9':echo "กันยายน "; break ;
		case'10':echo "ตุลาคม "; break ;
		case'11':echo "พฤศจิกายน "; break ;
		case'12':echo "ธันวาคม"; break ;
		default:echo "กรอกข้อมูลไม่ถูกต้อง";
	}
}
?>
</body>
</html>