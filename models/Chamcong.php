<?php
// require 'vendor/autoload.php';
class Chamcong{
    public $db;

    // Constructor - khởi tạo đối tượng Database
    public function __construct(){
        $this->db = new Database();  // Khởi tạo kết nối database
    }

      // Lấy thông tin start_date và end_date từ bảng settings
      public function getSettings() {
        $sql = "SELECT start_date, end_date FROM settings LIMIT 1";
        $stmt = $this->db->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Phương thức lấy danh sách chấm công
    public function getAll() {
        $settings = $this->getSettings(); // Gọi phương thức getSettings

        // Nếu không lấy được dữ liệu start_date và end_date, ném lỗi
        if (!$settings) {
            throw new Exception("Không tìm thấy thông tin ngày trong bảng settings.");
        }

        $start_date = $settings['start_date'];
        $end_date = $settings['end_date'];

        $sql = "
            SELECT 
                a.*, 
                e.employee_id, 
                e.name, 
                DAYNAME(a.date) AS day_of_week,
                ws.start_time, 
                ws.end_time
            FROM attendance a
            JOIN employees e ON a.employee_id = e.employee_id
            JOIN work_schedule ws ON a.employee_id = ws.employee_id AND a.date = ws.work_date
            WHERE a.date BETWEEN :start_date AND :end_date
            ORDER BY a.date ASC
        ";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Lấy tất cả dữ liệu dưới dạng mảng và trả về
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

      

    }
    public function delete($attendance_id) {
        try {
            // Kiểm tra giá trị đầu vào
            if (!is_numeric($attendance_id)) {
                throw new Exception("attendance_id không hợp lệ.");
            }
    
            // Câu lệnh SQL sử dụng tham số
            $sql = "DELETE FROM attendance WHERE attendance_id = :attendance_id";
            
            // Chuẩn bị câu lệnh
            $stmt = $this->db->conn->prepare($sql);
            
            // Liên kết tham số
            $stmt->bindParam(':attendance_id', $attendance_id, PDO::PARAM_INT);
            
            // Thực thi câu lệnh
            if ($stmt->execute()) {
                echo "Xóa thành công bản ghi với attendance_id: " . $attendance_id;
            } else {
                echo "Lỗi khi xóa bản ghi.";
            }
        } catch (Exception $e) {
            // Xử lý lỗi
            echo "Error: " . $e->getMessage();
        }
    }
    


    
  // Phương thức lấy lịch làm việc của nhân viên
  public function getSchedule($employee_id, $work_date) {
    $sql = "SELECT day_of_week, start_time, end_time 
            FROM work_schedule 
            WHERE employee_id = :employee_id 
            AND work_date = :work_date";

    try {
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':work_date', $work_date);
        $stmt->execute();

        // Nếu có dữ liệu, trả về thông tin lịch làm việc
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về một mảng có đầy đủ thông tin
        } else {
            return false; // Nếu không tìm thấy lịch làm việc
        }
    } catch (PDOException $e) {
        throw new Exception("Lỗi khi lấy thông tin ca làm việc: " . $e->getMessage());
    }
}



public function addAttendance($attendance_id, $employee_id, $date, $clock_in, $clock_out, $status, $working_hours, $overtime_hours) {
    // Kiểm tra nếu tất cả các trường bắt buộc đều có giá trị
    if (empty($employee_id) || empty($date) || empty($clock_in) || empty($clock_out)) {
        return "Tất cả các trường đều là bắt buộc.";
    }

    // Câu lệnh SQL để thêm chấm công vào cơ sở dữ liệu
    $sql = "INSERT INTO attendance (attendance_id, employee_id, date, clock_in, clock_out, status, working_hours, overtime_hours) 
            VALUES (:attendance_id, :employee_id, :date, :clock_in, :clock_out, :status, :working_hours, :overtime_hours)";

    try {
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->db->conn->prepare($sql);

        // Gắn giá trị tham số vào câu lệnh
        $stmt->bindParam(':attendance_id', $attendance_id);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':clock_in', $clock_in);
        $stmt->bindParam(':clock_out', $clock_out);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':working_hours', $working_hours); // Đã loại bỏ khoảng trắng thừa ở đây
        $stmt->bindParam(':overtime_hours', $overtime_hours); // Gắn giá trị overtime_hours
        // Thực thi câu lệnh SQL
        $stmt->execute();

        return "Chấm công thành công!";
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        return "Lỗi khi thêm chấm công: " . $e->getMessage();
    }
}

 // lấy dữ liệu 1 chiều cho sửa
    public function getAttendanceById($attendance_id) {
        // Câu SQL với một tham số placeholder
        $sql = "SELECT * FROM attendance WHERE attendance_id = :attendance_id";
        
        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':attendance_id', $attendance_id, PDO::PARAM_STR); // Gắn tham số attendance_id
        $stmt->execute();
    
        // Lấy kết quả
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    


   // sửa
   public function update($attendance_id, $clock_in, $clock_out, $status) {
    // Kiểm tra dữ liệu đầu vào
    if (empty($attendance_id) || empty($clock_in) || empty($clock_out) || empty($status)) {
        return "Tất cả các trường bắt buộc phải được điền.";
    }

    // Kiểm tra logic giờ vào và giờ ra
    if (strtotime($clock_in) >= strtotime($clock_out)) {
        return "Giờ vào phải nhỏ hơn giờ ra.";
    }

    // Câu lệnh SQL cập nhật
    $sql = "UPDATE attendance 
            SET clock_in = :clock_in, 
                clock_out = :clock_out, 
                status = :status 
            WHERE attendance_id = :attendance_id";

    try {
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->db->conn->prepare($sql);

        // Gắn các tham số vào câu lệnh
        $stmt->bindParam(':clock_in', $clock_in);
        $stmt->bindParam(':clock_out', $clock_out);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':attendance_id', $attendance_id, PDO::PARAM_INT);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Kiểm tra xem có bản ghi nào được cập nhật không
        if ($stmt->rowCount() > 0) {
            return "Cập nhật chấm công thành công!";
        } else {
            return "Không tìm thấy bản ghi với mã chấm công: $attendance_id hoặc không có thay đổi.";
        }
    } catch (PDOException $e) {
        // Xử lý lỗi và trả về thông báo
        return "Lỗi khi cập nhật chấm công: " . $e->getMessage();
    }
}


}