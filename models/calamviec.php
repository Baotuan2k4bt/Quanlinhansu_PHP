<?php
// require 'vendor/autoload.php';
class Calamviec{
    public $db;
    public function __construct(){
       $this->db = new Database();
    }

    // lấy dữ liệu 2 c
    public function getAll() {
        $sql = "
        SELECT 
            e.employee_id,
            e.name,
            ws.work_date,
            ws.day_of_week,
            ws.start_time,
            ws.end_time
        FROM 
            employees e
        LEFT JOIN 
            work_schedule ws ON e.employee_id = ws.employee_id;
        ";
    
        // Thực thi truy vấn và trả về kết quả
        $result = $this->db->getAll($sql);
        return $result;
    }
     // thêm
     // Kiểm tra ca làm việc có trùng không
     public function checkDuplicate($employee_id, $work_date, $start_time, $end_time) {
        $sql = "SELECT * FROM work_schedule 
                WHERE employee_id = :employee_id 
                AND work_date = :work_date 
                AND start_time = :start_time 
                AND end_time = :end_time";

        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':work_date', $work_date);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->bindParam(':end_time', $end_time);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // Thêm ca làm việc
    public function insert($employee_id, $work_date, $day_of_week, $start_time, $end_time) {
        // Sử dụng prepared statement để tránh lỗi SQL Injection
        $sql = "INSERT INTO work_schedule (employee_id, work_date, day_of_week, start_time, end_time) 
                VALUES (:employee_id, :work_date, :day_of_week, :start_time, :end_time)";
        
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':work_date', $work_date);
        $stmt->bindParam(':day_of_week', $day_of_week);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->bindParam(':end_time', $end_time);
        $stmt->execute();
    }

   
    public function delete( $employee_id ){
        $employee_id =$_GET['employee_id'];
        $sql =" DELETE FROM work_schedule WHERE  employee_id =$employee_id";
        $this->db->execute($sql);
    }



//    // lấy dữ liệu 1 chiều cho sửa
//    public function getOne($employee_id) {
//     $sql = "SELECT * FROM work_schedule WHERE employee_id = ?";
//     return $this->db->getOne($sql, [$employee_id]);  // Pass parameters as an array
 
// }
//    // sửa
//    public function update($employee_id, $work_date, $day_of_week, $start_time, $end_time) {
//     $sql = "UPDATE work_schedule 
//     SET work_date = ?, day_of_week = ?, start_time = ?, end_time = ? 
//     WHERE employee_id = ?";
// $stmt = $this->db->conn->prepare($sql); // Sử dụng kết nối từ lớp db

// try {
// // Thực thi truy vấn
// if ($stmt->execute([$work_date, $day_of_week, $start_time, $end_time, $employee_id])) {
//     // Chuyển hướng về trang danh sách
//     header("Location: index.php?act=list&status=success"); 
//     exit(); // Kết thúc để ngăn chạy mã tiếp
// }
// } catch (PDOException $e) {
// echo "Lỗi khi cập nhật: " . $e->getMessage();
// }
// }
// }
    
}

