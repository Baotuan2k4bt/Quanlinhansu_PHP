<?php
// Thông tin kết nối
const _HOST = '127.0.0.1'; // Hoặc 'localhost'
const _DB = 'quanlinhansu';
const _USER = 'root';
const _PASS = ''; // Cập nhật mật khẩu nếu có
const _PORT = 3306; // Thêm cổng vào DSN

try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST . ';port=' . _PORT; // Tạo DSN cho PDO
        $options =[
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
      ];
        $conn = new PDO($dsn, _USER, _PASS,$options); // Chỉ cần sử dụng 3 tham số ở đây
    
    
    }
    
} catch (Exception $exception) {
    echo '<div style ="color:red;padding :5px 15px;border :1px solid red;">';
    echo $exception->getMessage(). '<br>'; // Hiển thị thông báo lỗi
    echo '</div';
    die();
}