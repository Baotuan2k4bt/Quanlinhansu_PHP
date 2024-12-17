<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  class ChamcongController {
      public $chamcong;
  
      // Constructor: Khởi tạo đối tượng Chamcong để làm việc với dữ liệu
      public function __construct() {
          // Khởi tạo đối tượng Chamcong để sử dụng các phương thức trong model Chamcong
          $this->chamcong = new Chamcong();  
      }
  
      // Phương thức liệt kê tất cả các bản ghi chấm công
         
        public function list() {
            try {
                // Gọi phương thức getAll từ Model để lấy danh sách chấm công
                $data = $this->chamcong->getAll();
    
                // Lấy thông tin start_date và end_date từ bảng settings
                $settings = $this->chamcong->getSettings(); // Phương thức getSettings từ Model
    
                if ($settings) {
                    $start_date = $settings['start_date'];
                    $end_date = $settings['end_date'];
                } else {
                    throw new Exception("Không tìm thấy thông tin ngày trong bảng settings.");
                }
    
                // Tính số tuần làm việc trong tháng
                $startDate = new DateTime($start_date);
                $endDate = new DateTime($end_date);
                $interval = $startDate->diff($endDate);
                $weeks = ceil($interval->days / 7); // Số tuần làm việc trong tháng
    
                // Tạo biến để theo dõi số tuần (tăng tuần tự)
                $week_number = 1;

                // Phân chia các tuần làm việc từ start_date đến end_date
        $weekRanges = [];
        for ($i = 0; $i < $weeks; $i++) {
            $weekStart = clone $startDate; // Sao chép đối tượng DateTime để tính toán
            $weekEnd = clone $startDate;
            $weekStart->modify('+' . ($i * 7) . ' days'); // Ngày bắt đầu của tuần
            $weekEnd->modify('+' . (($i + 1) * 7 - 1) . ' days'); // Ngày kết thúc của tuần
            $weekRanges[] = [
                'week_start' => $weekStart->format('Y-m-d'), // Định dạng ngày bắt đầu tuần
                'week_end' => $weekEnd->format('Y-m-d') // Định dạng ngày kết thúc tuần
            ];
        }   // Lấy số tuần hiện tại từ tham số URL (mặc định là tuần 1 nếu không có tham số)
        $currentWeekIndex = isset($_GET['week']) ? (int)$_GET['week'] : 0;

        // Nếu tuần hiện tại ngoài phạm vi, mặc định trở lại tuần đầu tiên hoặc tuần cuối cùng
        if ($currentWeekIndex < 0) {
            $currentWeekIndex = 0;
        } elseif ($currentWeekIndex >= count($weekRanges)) {
            $currentWeekIndex = count($weekRanges) - 1;
        }

        // Lấy tuần hiện tại
   
                // Chuyển dữ liệu đến View
                require_once './views/chamcong/list.php';
            } catch (Exception $e) {
                // Xử lý lỗi nếu có
                echo 'Error: ' . $e->getMessage();
            }
        }

    
  
      // Phương thức xóa bản ghi chấm công của nhân viên
      public function delete() {
        if (isset($_GET['attendance_id'])) {
            $attendance_id = (int)$_GET['attendance_id']; // Ép kiểu để tránh lỗi
            $this->chamcong->delete($attendance_id);  
            header('Location: ?act=chamcong');  // Chuyển hướng sau khi xóa
            exit;
        } else {
            echo "Error: Không có attendance_id được truyền.";
        }
    }
      public function add() {
        // Biến chứa thông báo lỗi và thành công
        $error = "";
        $success = "";
    
        // Kiểm tra nếu form đã được gửi
        if (isset($_POST['sbm'])) {
            
            // Lấy dữ liệu từ form
            $attendance_id = $_POST['attendance_id'];
            $employee_id = $_POST['employee_id'];
            $work_date = $_POST['date'];
            $clock_in = $_POST['clock_in'];
            $clock_out = $_POST['clock_out'];
    //         echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // // Kiểm tra các giá trị quan trọng
    // echo "Attendance ID: $attendance_id<br>";
    // echo "Employee ID: $employee_id<br>";
    // echo "Work Date: $work_date<br>";
    // echo "Clock In: $clock_in<br>";
    // echo "Clock Out: $clock_out<br>";
    
    //         // Debug: Kiểm tra dữ liệu form
    //         echo "Work Date: $work_date<br>";
    
            // Kiểm tra nếu tất cả các trường bắt buộc đều có giá trị
            if (empty($employee_id) || empty($work_date) || empty($clock_in) || empty($clock_out)) {
                $error = "Tất cả các trường đều là bắt buộc.";
            } else {
                // Kiểm tra xem work_date có hợp lệ không
                if (strtotime($work_date) === false) {
                    $error = "Ngày làm việc không hợp lệ.";
                }
            }
    
            // Nếu không có lỗi
            if (empty($error)) {
                // Tính toán day_of_week từ work_date
                $day_of_week = date('l', strtotime($work_date)); // Ví dụ: "Friday"
                $day_of_week = ucfirst(strtolower($day_of_week)); // Chuyển thành chữ hoa chữ cái đầu (ví dụ: "Monday")
    
                // // Debug: Kiểm tra giá trị của day_of_week
                // echo "Day of Week: $day_of_week<br>";  // Kiểm tra giá trị của day_of_week
    
                // Gọi phương thức getSchedule từ model Chamcong để lấy lịch làm việc
                $schedule = $this->chamcong->getSchedule($employee_id, $work_date);
    
                // Kiểm tra nếu lịch làm việc tồn tại
                if (is_array($schedule)) {
                    $start_time = $schedule['start_time'];
                    $end_time = $schedule['end_time'];
    
                    // Chuyển đổi giờ vào và giờ ra thành thời gian chuẩn
                    $clock_in = date('H:i:s', strtotime($clock_in));
                    $clock_out = date('H:i:s', strtotime($clock_out));
    
                     // Tính giờ làm việc
                        $working_hours = $this->calculateWorkingHours($clock_in, $clock_out);
                        // echo "Clock In: $clock_in<br>";
                        // echo "Clock Out: $clock_out<br>";
                        // echo "Working Hours: $working_hours<br>";

  // Kiểm tra nếu nhân viên làm việc ngoài giờ chính thức
  $overtime_hours = $this->calculateOvertime($clock_in, $clock_out, $start_time, $end_time);

//   echo "Clock In: $clock_in<br>";
//   echo "Clock Out: $clock_out<br>";
//   echo "Working Hours: $working_hours<br>";
//   echo "Overtime Hours: $overtime_hours<br>";
                    // Tính toán trạng thái chấm công (Present, Late, Absent, Left Early)
                    $status = $this->calculateStatus($clock_in, $clock_out, $start_time, $end_time);
                     
                    // echo "Start Time: $start_time<br>";
                    // echo "End Time: $end_time<br>";
                    // echo "Calculated Status: $status<br>";
                    // Thêm chấm công vào cơ sở dữ liệu
                    $result = $this->chamcong->addAttendance($attendance_id, $employee_id, $work_date, $clock_in, $clock_out, $status,$working_hours, $overtime_hours );
                    if ($result) {
                        echo "Attendance added successfully.<br>";
                    } else {
                        echo "Failed to add attendance.<br>";
                    }
                    // Nếu chấm công thành công
                    if ($result) {
                        $success = "Chấm công thành công cho nhân viên $employee_id vào ngày $work_date ($day_of_week).";
                        // Chuyển hướng đến trang danh sách chấm công sau khi thêm thành công
                        header("Location: ?act=chamcong"); 
                        exit(); // Dừng thực thi tiếp theo
                    } else {
                        $error = "Lỗi khi thêm chấm công.";
                    }
                } else {
                    $error = "Không tìm thấy lịch làm việc cho nhân viên vào ngày: $work_date ($day_of_week).";
                }
            }
        }
    
        // Hiển thị thông báo lỗi hoặc thành công
        if ($error) {
            echo "<p class='text-danger'>$error</p>";
        }
        if ($success) {
            echo "<p class='text-success'>$success</p>";
        }
    
        // Gọi view để hiển thị form
        require_once './views/chamcong/add.php';
    }
    
    // Hàm tính toán trạng thái chấm công
    private function calculateStatus($clock_in_time, $clock_out_time, $start_time, $end_time) {
        // Kiểm tra tình trạng chấm công
        if (empty($clock_in_time) || empty($clock_out_time)) {
            return 'Absent';  // Vắng nếu không có giờ vào hoặc giờ ra
        }
    
        // Kiểm tra giờ vào có trễ hay không
        if (strtotime($clock_in_time) > strtotime($start_time)) {
            return 'Late';  // Trễ nếu giờ vào muộn hơn giờ quy định
        }
    
        // Kiểm tra giờ ra có đúng không (giờ ra sớm hơn giờ kết thúc)
        if (strtotime($clock_out_time) < strtotime($end_time)) {
            return 'Left Early';  // Ra sớm nếu giờ ra trước giờ kết thúc
        }
         // Kiểm tra nếu có tăng ca (giờ ra sau giờ kết thúc
    
        return 'Present';  // Có mặt nếu đúng giờ
    }
    public function calculateWorkingHours($clock_in, $clock_out) {
        // Chuyển giờ vào và giờ ra thành timestamp
        $clock_in_time = strtotime($clock_in);
        $clock_out_time = strtotime($clock_out);
    
        // Kiểm tra tính hợp lệ
        if ($clock_in_time === false || $clock_out_time === false) {
            return 0; // Thời gian không hợp lệ
        }
        if ($clock_out_time <= $clock_in_time) {
            return 0; // Giờ ra không được nhỏ hơn giờ vào
        }
    
        // Tính số giờ làm việc (chuyển từ giây sang giờ)
        $working_hours = ($clock_out_time - $clock_in_time) / 3600;
    
        return round($working_hours, 2); // Làm tròn 2 chữ số
    }
    public function calculateOvertime($clock_in, $clock_out, $start_time, $end_time) {
        // Chuyển đổi các thời gian thành dạng timestamp để tính toán
        $clock_in = strtotime($clock_in); // Thời gian vào
        $clock_out = strtotime($clock_out); // Thời gian ra
        $start_time = strtotime($start_time); // Thời gian bắt đầu làm việc
        $end_time = strtotime($end_time); // Thời gian kết thúc làm việc
    
        // Khởi tạo biến giờ làm thêm
        $overtime_hours = 0;
    
        // Nếu nhân viên vào muộn hơn giờ làm việc
        if ($clock_in > $start_time) {
            $overtime_hours += ($clock_in - $start_time) / 3600; // Tính giờ làm thêm từ lúc vào
        }
    
        // Nếu nhân viên ra muộn hơn giờ kết thúc làm việc
        if ($clock_out > $end_time) {
            $overtime_hours += ($clock_out - $end_time) / 3600; // Tính giờ làm thêm từ lúc ra
        }
    
        // Trả về số giờ làm thêm (tính theo đơn vị giờ)
        return $overtime_hours;
    }
    
    
    public function edit() {
        // Nếu nhận POST request để cập nhật
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            // Lấy dữ liệu từ form
            $attendance_id = $_POST['attendance_id'];
            $clock_in = $_POST['clock_in'];
            $clock_out = $_POST['clock_out'];
            $status = $_POST['status'];
    
            // Cập nhật dữ liệu
            $message = $this->chamcong->update($attendance_id, $clock_in, $clock_out, $status);
    
            // Kiểm tra kết quả và chuyển hướng
            if (strpos($message, 'thành công') !== false) {
                // Nếu cập nhật thành công, chuyển về danh sách
                header("Location: ?act=chamcong"); // Thay bằng đường dẫn thực tế đến trang danh sách
                exit();
            } else {
                // Nếu có lỗi, lưu thông báo để hiển thị
                $error = $message;
            }
        }
    
        // Kiểm tra xem có nhận được attendance_id từ GET không
        if (isset($_GET['attendance_id'])) {
            $attendance_id = $_GET['attendance_id'];
    
            // Lấy thông tin chấm công
            $attendance = $this->chamcong->getAttendanceById($attendance_id);
    
            // Nếu không tìm thấy dữ liệu
            if (!$attendance) {
                $error = "Không tìm thấy thông tin chấm công với ID $attendance_id.";
                $attendance = ['clock_in' => '', 'clock_out' => '', 'status' => ''];
            }
        }
    
        // Chuyển dữ liệu đến View
        require_once './views/chamcong/edit.php';
    }

    // Phương thức xuất dữ liệu chấm công ra file Excel
    public function exportExcel()  {
        try {
            // Lấy tất cả dữ liệu chấm công từ model
            $data = $this->chamcong->getAll();
        
            // Tạo đối tượng Spreadsheet mới từ PhpSpreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Danh sách Chấm Công');
    
            // Đặt tiêu đề cho các cột
            $sheet->setCellValue('A1', 'Mã Chấm Công')
                  ->setCellValue('B1', 'Mã Nhân Viên')
                  ->setCellValue('C1', 'Tên Nhân Viên')
                  ->setCellValue('D1', 'Ngày Làm')
                  ->setCellValue('E1', 'Giờ Vào')
                  ->setCellValue('F1', 'Giờ Ra')
                  ->setCellValue('G1', 'Thứ')
                  ->setCellValue('H1', 'Trạng Thái');
    
            // Điền dữ liệu vào file Excel
            $row = 2; // Bắt đầu từ dòng thứ 2
            foreach ($data as $cc) {
                // Giả sử bạn có tên nhân viên trong bảng chấm công
                $name = htmlspecialchars($cc['name']);  // Lấy tên nhân viên từ dữ liệu
                $sheet->setCellValue('A' . $row, $cc['attendance_id'])
                      ->setCellValue('B' . $row, $cc['employee_id'])
                      ->setCellValue('C' . $row, $name) // Thêm tên nhân viên
                      ->setCellValue('D' . $row, $cc['date'])
                      ->setCellValue('E' . $row, $cc['clock_in'])
                      ->setCellValue('F' . $row, $cc['clock_out'])
                      ->setCellValue('G' . $row, $cc['day_of_week'])
                      ->setCellValue('H' . $row, $cc['status']);
                $row++;
            }
    
            // Thiết lập định dạng cho các cột
            foreach (range('A', 'H') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
    
            // Xuất file Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="chamcong.xlsx"');
            header('Cache-Control: max-age=0');
            
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            exit();
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
            echo 'Error: ' . $e->getMessage();
        }
    }
    
               }
    
