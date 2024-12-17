<?php
// require 'vendor/autoload.php';
class khenthuong{
    public $db;
    public function __construct(){
       $this->db = new Database();
    }

 
    public function getAll(){
        $sql = "SELECT rda.id, name, rda.action_type, rda.category, rda.action_date, rda.reason, rda.approved_by, rda.approved_date,rda.reward_amount FROM rewards_and_disciplinary_actions rda JOIN employees ON rda.employee_id = employees.employee_id";
        $result = $this->db->getAll($sql);
        return $result;
    }
    public function delete($id ){
        $id =$_GET['id'];
        $sql =" DELETE FROM rewards_and_disciplinary_actions WHERE  id =id";
        $this->db->execute($sql);
    }
    
    public function add($employee_id, $action_type, $category, $action_date, $reward_amount, $approved_by, $approved_date, $reason) {
        $sql = "INSERT INTO rewards_and_disciplinary_actions 
                (employee_id, action_type, category, action_date, reward_amount, approved_by, approved_date, reason) 
                VALUES (:employee_id, :action_type, :category, :action_date, :reward_amount, :approved_by, :approved_date, :reason)";
        
        $stmt = $this->db->conn->prepare($sql);
    
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':action_type', $action_type);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':action_date', $action_date);
        $stmt->bindParam(':reward_amount', $reward_amount);
        $stmt->bindParam(':approved_by', $approved_by);
        $stmt->bindParam(':approved_date', $approved_date);
        $stmt->bindParam(':reason', $reason);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Lỗi khi thực thi câu lệnh: " . implode(", ", $stmt->errorInfo());
            return false;
        }
    }
    
    
    

}