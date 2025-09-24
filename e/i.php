<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>อนันตยศ อินทราพงษ์ (โน๊ต) </h1><hr>

<form method="post" action="">
แม่สูตรคูณ <input type="number" min="2" name="a" autofocus>
<input type="submit" name="Submit" value="OK">
<br>
<?php
if(isset($_POST['Submit'])){
	$m = $_POST['a'];

	for ($i = 1; $i <=12; $i++){
		$s = $m * $i ;
		echo number_format($m, 0)." x ".$i." = ".number_format($s, 0)."<br>";
		#echo "$m x ".$i." = $s <br>";
	}
}
?>
</body>
</html>