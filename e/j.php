<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>อนันตยศ อินทราพงษ์ (โน๊ต) </h1><hr>

<form method="post" action="">
รหัสนิสิต <input type="number" name="a" autofocus>
<input type="submit" name="Submit" value="OK">
<br>
<?php
if(isset($_POST['Submit'])){
	$id = $_POST['a'];
	echo "รหัสนิสิต ".$id."<br>";
	$y = substr($id, 0, 2);
	echo "<img src='http://202.28.32.211/picture/student/{$y}/{$id}.jpg' width='700'>";
}
?>
</body>
</html>