<?php
require 'vendor/autoload.php';
class Qli{
    public $db;
    public function __construct(){
       $this->db = new Database();
    }

    // lấy dữ liệu 2 c
    public function getAll(){
        $sql = "SELECT * FROM employees";
        $result = $this->db->getAll($sql);
        return $result;
    }
    public function search($searchKeyword) {
        $sql = "SELECT * FROM employees WHERE employee_id LIKE ? OR name LIKE ?";
        $stmt = $this->db->conn->prepare($sql); // Chuẩn bị truy vấn
        $stmt->execute(['%' . $searchKeyword . '%', '%' . $searchKeyword . '%']); // Thực thi truy vấn
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về kết quả

        
    }
     // thêm
    public function insert($name, $image, $email, $phone, $address, $position){
        $sql = "INSERT INTO employees (name, image, email, phone, address, position) VALUES ('$name','$image','$email','$phone','$address','$position')";
        $this->db->execute($sql);
    }
        
     public function delete($employee_id ){
        $employee_id =$_GET['employee_id'];
        $sql =" DELETE FROM employees WHERE  employee_id = $employee_id";
        $this->db->execute($sql);
    }



//    // lấy dữ liệu 1 chiều cho sửa
//    public function getOne($employee_id) {
//     $sql = "SELECT * FROM employees WHERE employee_id = :employee_id";
//     return $this->db->getOne($sql, [$employee_id]);  // Pass parameters as an array
// }

//    // sửa
//    public function update($employee_id, $name, $image, $email, $phone, $address, $position) {
//     $sql = "UPDATE employees SET name = ?, image = ?, email = ?, phone = ?, address = ?, position = ? WHERE employee_id = ?";
//     $this->db->execute( $name, $image, $email, $phone, $address, $position, $employee_id);  // Bind parameters
// }

}
