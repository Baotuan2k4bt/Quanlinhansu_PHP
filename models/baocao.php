<?php
// require 'vendor/autoload.php';
class baocao{
    public $db;
    public function __construct(){
       $this->db = new Database();
    }

    // lấy dữ liệu 2 c
    public function getAll() {
        // Truy vấn SQL để lấy thông tin báo cáo nhân viên
        $sql = "
        SELECT 
            er.report_id, 
            e.name , 
            s.hours_worked, 
            s.total_salary, 
            IF(s.payment_date IS NOT NULL, 'Paid', 'Pending') AS payment_status, 
            s.payment_date, 
            er.report_month,
            er.note AS note  -- Thêm cột ghi chú vào kết quả
        FROM 
            employee_report er
        JOIN 
            employees e ON er.employee_id = e.employee_id
        LEFT JOIN 
            salary s ON er.employee_id = s.employee_id
            AND MONTH(s.month) = MONTH(er.report_month)
        ORDER BY 
            er.report_month;  -- Sắp xếp theo tháng báo cáo
        ";
        
        // Thực thi truy vấn và trả về kết quả
        $result = $this->db->getAll($sql);
        
        // Kiểm tra kết quả trả về
        return $result ?: [];  // Nếu không có dữ liệu, trả về mảng rỗng
    }
    
    public function getEmployeeOverview() {
        // Câu lệnh SQL để lấy thông tin tổng quan về nhân viên, nhân viên mới và nhân viên nghỉ việc trong tháng hiện tại
        $sql = "
            SELECT 
                (SELECT COUNT(*) FROM employees) AS total,
                (SELECT COUNT(*) FROM employees WHERE MONTH(hire_date) = MONTH(CURRENT_DATE()) AND YEAR(hire_date) = YEAR(CURRENT_DATE())) AS new_employees,
                (SELECT COUNT(*) FROM employees WHERE resignation_date IS NOT NULL AND MONTH(resignation_date) = MONTH(CURRENT_DATE()) AND YEAR(resignation_date) = YEAR(CURRENT_DATE())) AS resigned
        ";
    
        // Thực thi truy vấn và lấy kết quả
        $result = $this->db->getOne($sql);
    
        // Kiểm tra nếu không có kết quả
        if (!$result) {
            return [
                'total' => 0,
                'new' => 0,
                'resigned' => 0
            ];
        }
    
        // Trả về dữ liệu
        return [
            'total' => $result['total'],
            'new' => $result['new_employees'],
            'resigned' => $result['resigned']
        ];
    }
    
    public function delete( $report_id ){
        $report_id =$_GET['report_id'];
        $sql =" DELETE FROM employee_report WHERE  report_id =$report_id";
        $this->db->execute($sql);
    }

    // Lấy thông tin lương của nhân viên trong tháng báo cáo
    public function getSalaryInfo($employee_id, $report_month) {
        // Chuyển đổi report_month thành định dạng 'YYYY-MM-01' để lấy tháng và năm
        $report_month_start = date('Y-m-01', strtotime($report_month));
        $start_date = $report_month_start;
        $end_date = date('Y-m-t', strtotime($start_date)); // Lấy ngày cuối tháng
        
        $sql = "SELECT hours_worked, total_salary, payment_date 
                FROM salary 
                WHERE employee_id = ? AND payment_date >= ? AND payment_date <= ?";
        
        // Kiểm tra câu lệnh SQL trước khi thực thi
        echo $sql; // In ra câu lệnh SQL để kiểm tra
    
        // Thực hiện truy vấn với tham số truyền vào
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute([$employee_id, $start_date, $end_date]);
    
        // Trả về dữ liệu lương nếu có
        return $stmt->fetch();
    }
    
    public function addReport($employee_id, $report_month, $note) {
        // Lấy thông tin lương từ bảng salary
        $salary_info = $this->getSalaryInfo($employee_id, $report_month);
        
        if ($salary_info) {
            // Lưu báo cáo vào bảng employee_report
            $sql = "INSERT INTO employee_report (employee_id, hours_worked, total_salary, payment_date, report_month, note)
                    VALUES (?, ?, ?, ?, ?, ?)";
    
            $stmt = $this->db->conn->prepare($sql);
            
            // Thực thi câu lệnh với thông tin từ bảng salary
            return $stmt->execute([
                $employee_id, 
                $salary_info['hours_worked'],  // Số giờ làm việc
                $salary_info['total_salary'],  // Tổng lương
                $salary_info['payment_date'],  // Ngày thanh toán
                $report_month,                 // Tháng báo cáo
                $note                          // Ghi chú
            ]);
        }
        
        // Nếu không tìm thấy thông tin lương, trả về false
        return false;
    }
    
    
    
}