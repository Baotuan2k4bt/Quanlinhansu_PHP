<?php
// Xử lý khi form sửa được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['employee_id'])) {
    // Lấy dữ liệu từ form
    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    
    // Kiểm tra xem có ảnh mới không
    $image = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : (isset($_POST['current_image']) ? $_POST['current_image'] : '');

    // Kiểm tra mã nhân viên có tồn tại trong cơ sở dữ liệu
    $sql_check = "SELECT * FROM employees WHERE employee_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->execute([$employee_id]);

    if ($stmt_check->rowCount() > 0) {
        // Mã nhân viên hợp lệ, tiếp tục cập nhật
        // Xử lý upload ảnh nếu có
        if (!empty($_FILES['image']['name'])) {
            // Kiểm tra file ảnh (kích thước và định dạng)
            $target_dir = 'uploads/';
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Kiểm tra loại file ảnh
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                echo "Chỉ hỗ trợ file ảnh JPG, JPEG, PNG, GIF.";
                exit;
            }

            // Kiểm tra kích thước file (ví dụ: tối đa 2MB)
            if ($_FILES['image']['size'] > 2000000) {
                echo "File ảnh quá lớn. Kích thước tối đa là 2MB.";
                exit;
            }

            // Di chuyển ảnh vào thư mục uploads
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true); // Tạo thư mục nếu không tồn tại
            }

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "Lỗi khi tải ảnh lên.";
                exit;
            }
        }
// Cập nhật thông tin nhân viên
$sql_update = "UPDATE employees SET name = ?, email = ?, phone = ?, address = ?, position = ?, image = ? WHERE employee_id = ?";
$stmt_update = $conn->prepare($sql_update);

if ($stmt_update->execute([$name, $email, $phone, $address, $position, $image, $employee_id])) {
    echo "Cập nhật thành công!";
    // Quay trở lại trang danh sách nhân viên
    header("Location:index.php?act=product"); // Thay 'list.php' bằng URL thực tế của trang danh sách
    exit(); // Đảm bảo không chạy tiếp mã sau lệnh header
} else {
    echo "Cập nhật không thành công. Lỗi: " . $stmt_update->errorInfo()[2]; // Lấy thông tin lỗi
}
    }
}
