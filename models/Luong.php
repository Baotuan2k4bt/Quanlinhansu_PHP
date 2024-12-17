<?php
class Luong{
    public $db;
    public function __construct(){
        $this->db = new Database();
     }
    // public function getAll(){
    //     $sql = "SELECT s.*, e.name FROM salary as s 
    //     JOIN employees as e ON s.employee_id  = e.employee_id";
    //     return $this->db->getAll($sql);
    // }
    public function getAll(){
       $sql = "SELECT s.*, e.name, 
    COALESCE(a.clock_in, 'N/A') as clock_in, 
    COALESCE(a.clock_out, 'N/A') as clock_out 
FROM salary as s 
JOIN employees as e ON s.employee_id = e.employee_id
LEFT JOIN attendance as a ON s.employee_id = a.employee_id";
return $this->db->getAll($sql);


     }
     public function add($employee_id,$month,$basic_salary,$hours_worked,$overtime_hours,$overtime_pay,$total_salary,$payment_date){
        $sql = "INSERT INTO `salary`(`employee_id`, `month`, `basic_salary`, `hours_worked`, `overtime_hours`, `overtime_pay`, `total_salary`, `payment_date`) VALUES ('$employee_id','$month','$basic_salary','$hours_worked','$overtime_hours','$overtime_pay','$total_salary','$payment_date')";
        $this->db->execute($sql);
    }
   
    public function delete($salary_id){
        $sql = "DELETE FROM `salary` WHERE salary_id=$salary_id";
        $this->db->execute($sql);
    }
  
    public function getOne($salary_id) {
        $sql = "SELECT s.*, e.name, a.clock_in, a.clock_out 
                FROM salary AS s 
                JOIN employees AS e ON s.employee_id = e.employee_id
                JOIN attendance AS a ON s.employee_id = a.employee_id
                WHERE s.salary_id = :salary_id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':salary_id', $salary_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$record) {
            echo "Salary record not found!";
            return false; // or handle the error in a different way
        }
        return $record;
    }
    
    public function update($salary_id, $employee_id, $month, $basic_salary, $hours_worked, $overtime_hours, $overtime_pay, $total_salary, $payment_date) {
        $sql = "UPDATE salary SET 
                employee_id = :employee_id,
                month = :month,
                basic_salary = :basic_salary,
                hours_worked = :hours_worked,
                overtime_hours = :overtime_hours,
                overtime_pay = :overtime_pay,
                total_salary = :total_salary,
                payment_date = :payment_date
                WHERE salary_id = :salary_id";
    
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':salary_id', $salary_id, PDO::PARAM_INT);
        $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_STR);
        $stmt->bindParam(':basic_salary', $basic_salary, PDO::PARAM_STR);
        $stmt->bindParam(':hours_worked', $hours_worked, PDO::PARAM_INT);
        $stmt->bindParam(':overtime_hours', $overtime_hours, PDO::PARAM_INT);
        $stmt->bindParam(':overtime_pay', $overtime_pay, PDO::PARAM_STR);
        $stmt->bindParam(':total_salary', $total_salary, PDO::PARAM_STR);
        $stmt->bindParam(':payment_date', $payment_date, PDO::PARAM_STR);
    
        $stmt->execute();
    }
    
    
}

