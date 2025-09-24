<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>แสดงข้อมูลนิสิต Join ค้นหา -- อนันตยศ อินทราพงษ์ (โน๊ต)</h1><hr>

<form method="post" action="">
	คำค้นหา <input type="text" name="k" autofocus>
    <button type="submit" name="Submit">ค้นหา</button>
</form>
<hr>.
<?php
	$k = @$_POST['k'];
	include("connectdb.php");
	$sql = "SELECT * FROM student AS s
	INNER JOIN faculty AS f
	ON s.f_id = f.f_id
	WHERE (s.s_name LIKE '%{$k}%' OR  s.s_id LIKE '%{$k}%' || s.s_address LIKE '%{$k}%' || f.f_name LIKE '%{$k}%') ";
	$re = mysqli_query($conn,$sql);
	while ($data = mysqli_fetch_array($re)) {
		$y = substr($data['s_id'], 0, 2);
		echo "<img src='http://202.28.32.211/picture/student/{$y}/{$data['s_id']}.jpg' width='200'><br>";
		echo $data['s_id']."<br>";
		echo $data['s_name']."<br>";
		echo $data['s_address']."<br>";
		echo $data['s_gpax']."<br>";
		echo $data['f_name']."<br>";
?>

<a href="update_student.php?id=<?php echo $data['s_id'];?>">แก้ไข</a>
|
<a href="delete_student.php?id=<?php echo $data['s_id'];?>" onClick="return confirm('ยืนยันการลบ')">ลบ</a>

<?php 
echo "<hr>";
}
	mysqli_close($conn);
?>
</body>
</html>