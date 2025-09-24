<?php
// เรียกใช้งานไฟล์ connectdb.php
require_once "connectdb.php";

// ตรวจสอบว่ามีการ submit ฟอร์มหรือยัง
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_id      = $_POST['s_id'];
    $s_name    = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_gpax    = $_POST['s_gpax'];
    $f_id      = $_POST['f_id'];

    // เตรียม SQL สำหรับเพิ่มข้อมูล
    $sql = "INSERT INTO student (s_id, s_name, s_address, s_gpax, f_id)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdi", $s_id, $s_name, $s_address, $s_gpax, $f_id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>เพิ่มข้อมูลนิสิตเรียบร้อยแล้ว</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>เกิดข้อผิดพลาด: " . $conn->error . "</div>";
    }
    $stmt->close();
}

// ดึงข้อมูลคณะจากฐานข้อมูล
$faculty = [];
$result = $conn->query("SELECT f_id, f_name FROM faculty ORDER BY f_name ASC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $faculty[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
  <!-- Bootstrap v5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
      <h4>ฟอร์มเพิ่มข้อมูลนิสิต Chatgpt อนันตยศ อินทราพงษ์ (โน๊ต)</h4>
    </div>
    <div class="card-body">
      <form method="POST" action="">
        <div class="mb-3">
          <label class="form-label">รหัสนิสิต</label>
          <input type="text" name="s_id" class="form-control" required maxlength="11">
        </div>
        <div class="mb-3">
          <label class="form-label">ชื่อนิสิต</label>
          <input type="text" name="s_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">ที่อยู่</label>
          <textarea name="s_address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">เกรดเฉลี่ย (GPAX)</label>
          <input type="number" step="0.01" name="s_gpax" class="form-control" min="0" max="4" required>
        </div>
        <div class="mb-3">
          <label class="form-label">คณะ</label>
          <select name="f_id" class="form-select" required>
            <option value="">-- เลือกคณะ --</option>
            <?php foreach ($faculty as $f): ?>
              <option value="<?= $f['f_id'] ?>"><?= $f['f_name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
