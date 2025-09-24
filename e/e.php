<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>อนันตยศ อินทราพงษ์ (โน๊ต)</h1><br>

<form method="post" action="">
กรอกชื่อสัตว์ <input type="text" name="a" autofocus>
<input type="submit" name="Submit" value="OK">
<hr>

<?php
if(isset($_POST['Submit'])){
	$animal = $_POST['a'];
	if ($animal == "dog" or $animal == "หมา" or $animal == "สุนัข"){
		echo "<img src='dog.jpg' width='540'>";
	}
	else if($animal == "cat" || $animal == "แมว" ){
		echo "<img src='cat.jpg' width='540'>";
	}
	else if($animal == "tiger" || $animal == "เสีย" || $animal == "เสือ"){
		echo "<img src='tiger.jpg' width='500'>";
	}
}
?>
</body>
</html>