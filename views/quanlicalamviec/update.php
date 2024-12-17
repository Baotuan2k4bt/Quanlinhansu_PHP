<?php
// Lấy các giá trị từ form
$employee_id = $_POST['employee_id'];
$work_date = $_POST['work_date'];
$day_of_week = $_POST['day_of_week'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];

// Kiểm tra mã nhân viên có tồn tại trong cơ sở dữ liệu không
$sql_check = "SELECT * FROM work_schedule WHERE employee_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->execute([$employee_id]);

if ($stmt_check->rowCount() > 0) {
    // Mã nhân viên hợp lệ, tiếp tục cập nhật
    $sql = "UPDATE work_schedule SET work_date = ?, day_of_week = ?, start_time = ?, end_time = ? WHERE employee_id = ?";
    $stmt = $conn->prepare($sql);

    // Thực thi truy vấn
    if ($stmt->execute([$work_date, $day_of_week, $start_time, $end_time, $employee_id])) {
        // Cập nhật thành công, chuyển hướng về trang danh sách nhân viên
        header("Location: index.php?act=list"); // Đảm bảo URL đúng với trang danh sách nhân viên của bạn
        exit;
    } else {
        echo "Cập nhật không thành công!";
    }
} else {
    // Mã nhân viên không tồn tại
    echo "Mã nhân viên không hợp lệ!";
}
