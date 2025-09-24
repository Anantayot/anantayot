<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
</head>

<body>
<h1>เพิ่มข้อมูลนิสิต -- อนันตยศ อินทราพงษ์ (โน๊ต)</h1><hr>

<form method="post" action="">
	รหัสนิสิต <input type="text" name="sid" autofocus required><br>
    ชื่อนิสิต <input type="text" name="sname" required ><br>
	ที่อยู่  <br>
    <textarea name="saddress" required> </textarea><br>
    เกรดเฉลี่ย <input type="text" name="sgpax" required><br>
    
   	<select name="fid">
    <?php
	include("connectdb.php");
	$sql2 = "SELECT * FROM faculty";
	$re = mysqli_query($conn,$sql2);
	while ($data2 = mysqli_fetch_array($re)) {
		?>
    	<option value="<?php echo $data2['f_id'];?>"><?php echo $data2['f_name'];?></option>
		<?php } ?>
 	</select>
    <br><br>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<hr>

<?php
if(isset ($_POST['Submit'])){
	$sid = $_POST['sid'];
	$sname = $_POST['sname'];
	$saddress = $_POST['saddress'];
	$sgpax = $_POST['sgpax'];
	$fid = $_POST['fid'];
	$sql = "INSERT INTO student (s_id,s_name,s_address,s_gpax,f_id) VALUES ('{$sid}' , '{$sname}' ,'{$saddress}' ,'{$sgpax}','{$fid}');";
	mysqli_query($conn, $sql) or die ("insert error");
	
	echo "<script>";
	echo "alert('บันทึกข้อมูลสำเร็จ');";
	echo "window.location='select_student.php';";
	echo "</script>";
}
?>
</body>
</html>