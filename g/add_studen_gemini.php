<?php
// เชื่อมต่อฐานข้อมูล
require_once 'connectdb.php';

$message = '';

// ตรวจสอบว่ามีการส่งข้อมูลฟอร์มมาหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับข้อมูลจากฟอร์ม
    $s_id = $_POST['s_id'];
    $s_name = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_gpax = $_POST['s_gpax'];
    $f_id = $_POST['f_id'];

    // ตรวจสอบว่าข้อมูลครบถ้วนหรือไม่
    if (!empty($s_id) && !empty($s_name) && !empty($s_address) && !empty($s_gpax) && !empty($f_id)) {
        // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูล
        $sql = "INSERT INTO student (s_id, s_name, s_address, s_gpax, f_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdi", $s_id, $s_name, $s_address, $s_gpax, $f_id);

        if ($stmt->execute()) {
            $message = '<div class="alert alert-success" role="alert">
                          เพิ่มข้อมูลนิสิตสำเร็จ!
                        </div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">
                          เกิดข้อผิดพลาดในการเพิ่มข้อมูล: ' . $stmt->error . '
                        </div>';
        }

        $stmt->close();
    } else {
        $message = '<div class="alert alert-warning" role="alert">
                      กรุณากรอกข้อมูลให้ครบทุกช่อง
                    </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนันตยศ อินทราพงษ์ (โน๊ต)</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="text-center mb-4">ฟอร์มเพิ่มข้อมูลนิสิต Gemini อนันตยศ อินทราพงษ์ (โน๊ต)</h2>
        <?php echo $message; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="s_id" class="form-label">รหัสนิสิต</label>
                <input type="text" class="form-control" id="s_id" name="s_id" required>
            </div>
            <div class="mb-3">
                <label for="s_name" class="form-label">ชื่อ-สกุล</label>
                <input type="text" class="form-control" id="s_name" name="s_name" required>
            </div>
            <div class="mb-3">
                <label for="s_address" class="form-label">ที่อยู่</label>
                <textarea class="form-control" id="s_address" name="s_address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="s_gpax" class="form-label">GPAX</label>
                <input type="number" step="0.01" class="form-control" id="s_gpax" name="s_gpax" required>
            </div>
            <div class="mb-3">
                <label for="f_id" class="form-label">คณะ</label>
                <select class="form-select" id="f_id" name="f_id" required>
                    <option value="" selected disabled>เลือกคณะ...</option>
                    <?php
                    // ดึงข้อมูลคณะจากฐานข้อมูล
                    $sql_faculty = "SELECT f_id, f_name FROM faculty ORDER BY f_name";
                    $result_faculty = $conn->query($sql_faculty);

                    if ($result_faculty->num_rows > 0) {
                        while($row = $result_faculty->fetch_assoc()) {
                            echo '<option value="' . $row['f_id'] . '">' . htmlspecialchars($row['f_name']) . '</option>';
                        }
                    } else {
                        echo '<option value="">ไม่พบข้อมูลคณะ</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
