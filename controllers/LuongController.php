<?php
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\IOFactory;
class LuongController{
    public $luong;
    public function __construct(){
        $this->luong = new Luong();
    }
    public function list(){
        $data = $this->luong->getAll();
        require_once './views/luong/list.php';
    }
    public function delete(){
        if(isset($_GET['salary_id'])){
            $salary_id = $_GET['salary_id'];
            $this->luong->delete($salary_id);
            header('Location: ?act=luong');
        }else{
            header('Location: ?act=luong');
        }
    }
    public function add() {
        $error = [];
    
        // Kiểm tra nếu form được gửi
        if (isset($_POST['btnsend'])) {
            // Lấy dữ liệu từ form và xử lý
            $employee_id = trim($_POST['emp'] ?? '');
            if (empty($employee_id)) {
                $error['employee_id'] = "Bạn chưa nhập mã nhân viên";
            }
    
            $month = trim($_POST['mon'] ?? '');
            if (empty($month)) {
                $error['month'] = "Bạn chưa nhập tháng";
            }
    
            $hourly_rate = trim($_POST['bas'] ?? ''); // Lương theo giờ
            if (empty($hourly_rate) || !is_numeric($hourly_rate)) {
                $error['basic_salary'] = "Bạn chưa nhập lương theo giờ hoặc lương không hợp lệ";
            }
    
            $hours_worked = trim($_POST['hou'] ?? ''); // Số giờ làm việc
            if (empty($hours_worked) || !is_numeric($hours_worked)) {
                $error['hours_worked'] = "Bạn chưa nhập số giờ làm việc hoặc giá trị không hợp lệ";
            }
    
            // Giờ làm thêm có thể bỏ qua, nếu không có thì gán giá trị mặc định
            $overtime_hours = trim($_POST['over'] ?? ''); // Số giờ làm thêm
            if (!empty($overtime_hours) && !is_numeric($overtime_hours)) {
                $error['overtime_hours'] = "Số giờ làm thêm không hợp lệ";
            }
    
            // Lương làm thêm có thể bỏ qua, nếu không có thì gán giá trị mặc định
            $overtime_pay = trim($_POST['ove_pay'] ?? ''); // Lương làm thêm
            if (!empty($overtime_pay) && !is_numeric($overtime_pay)) {
                $error['overtime_pay'] = "Lương làm thêm không hợp lệ";
            }
    
            $payment_date = trim($_POST['paymen'] ?? '');
            if (empty($payment_date)) {
                $error['payment_date'] = "Bạn chưa nhập ngày thanh toán";
            }
    
            // Tính tổng lương nếu không có lỗi nhập liệu
            if (empty($error)) {
                // Nếu không có giờ làm thêm và lương làm thêm, gán giá trị mặc định
                $overtime_hours = empty($overtime_hours) ? 0 : $overtime_hours;
                $overtime_pay = empty($overtime_pay) ? 0 : $overtime_pay;
    
                // Tính tổng lương
                $total_salary = ($hours_worked * $hourly_rate) + ($overtime_hours * $overtime_pay);
    
                // Thêm dữ liệu vào database
                $this->luong->add($employee_id, $month, $hourly_rate, $hours_worked, $overtime_hours, $overtime_pay, $total_salary, $payment_date);
                header("Location: ?act=luong");
                exit; // Dừng thực thi tiếp mã
            }
        }
    
        // Hiển thị form
        require_once './views/luong/add.php';
    }
    
    
    public function update() {
        $error = [];
    
        // Lấy ID lương từ URL
        $salary_id = trim($_GET['salary_id'] ?? '');
        if (empty($salary_id)) {
            die("Thiếu ID lương cần cập nhật");
        }
    
        // Lấy dữ liệu hiện tại từ cơ sở dữ liệu
        $currentData = $this->luong->getOne($salary_id);
        if (!$currentData) {
            die("Dữ liệu không tồn tại");
        }
    
        // Kiểm tra nếu form được gửi
        if (isset($_POST['btnsend'])) {
            // Lấy dữ liệu từ form và xử lý
            $employee_id = trim($_POST['emp'] ?? $currentData['employee_id']);
            if (empty($employee_id)) {
                $error['employee_id'] = "Bạn chưa nhập mã nhân viên";
            }
    
            $month = trim($_POST['mon'] ?? $currentData['month']);
            if (empty($month)) {
                $error['month'] = "Bạn chưa nhập tháng";
            }
    
            $basic_salary = floatval(trim($_POST['bas'] ?? $currentData['basic_salary']));
            if ($basic_salary <= 0) {
                $error['basic_salary'] = "Lương cơ bản phải lớn hơn 0";
            }
    
            $hours_worked = floatval(trim($_POST['hou'] ?? $currentData['hours_worked']));
            if ($hours_worked < 0) {
                $error['hours_worked'] = "Số giờ làm không hợp lệ";
            }
    
            $overtime_hours = floatval(trim($_POST['over'] ?? $currentData['overtime_hours']));
            if ($overtime_hours < 0) {
                $error['overtime_hours'] = "Số giờ làm thêm không hợp lệ";
            }
    
            $overtime_pay = floatval(trim($_POST['ove_pay'] ?? $currentData['overtime_pay']));
            if ($overtime_pay < 0) {
                $error['overtime_pay'] = "Tiền làm thêm không hợp lệ";
            }
    
            // Tính tổng lương
            $total_salary = $basic_salary + ($overtime_hours * $overtime_pay);
    
            $payment_date = trim($_POST['paymen'] ?? $currentData['payment_date']);
            if (empty($payment_date)) {
                $error['payment_date'] = "Bạn chưa nhập ngày thanh toán";
            }
    
            // Kiểm tra nếu không có lỗi thì cập nhật dữ liệu
            if (empty($error)) {
                $this->luong->update($salary_id, $employee_id, $month, $basic_salary, $hours_worked, $overtime_hours, $overtime_pay, $total_salary, $payment_date);
                header("Location: ?act=luong");
                exit;
            }
        }
        // Hiển thị form với dữ liệu hiện tại
        require_once './views/luong/edit.php';
    }


    // function exportExcel() {
    //     try {
    //         // Lấy dữ liệu từ cơ sở dữ liệu
    //         $data = $this->luong->getAll(); // Phương thức lấy dữ liệu từ database
    
    //         // Tạo file Excel
    //         $spreadsheet = new Spreadsheet();
    //         $sheet = $spreadsheet->getActiveSheet();
    //         $sheet->setTitle('Danh sách Lương');
    
    //         // Đặt tiêu đề cột
    //         $sheet->setCellValue('A1', 'Mã nhân viên')
    //               ->setCellValue('B1', 'Họ tên')
    //               ->setCellValue('C1', 'Tháng ')
    //               ->setCellValue('D1', 'Lương cơ bản')
    //               ->setCellValue('E1', 'Số giờ làm')
    //               ->setCellValue('F1', 'Số giờ làm thêm')
    //               ->setCellValue('G1', 'Tổng lương')
    //               ->setCellValue('H1', 'Ngày trả');
    
    //         // Ghi dữ liệu vào file Excel
    //         $row = 2;
    //         foreach ($data as $pro) {
    //             $sheet->setCellValue('A' . $row, htmlspecialchars($pro['employee_id'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('B' . $row, htmlspecialchars($pro['name'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('C' . $row, htmlspecialchars($pro['month'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('D' . $row, htmlspecialchars($pro['basic_salary'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('E' . $row, htmlspecialchars($pro['hours_worked'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('F' . $row, htmlspecialchars($pro['overtime_hours'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('G' . $row, htmlspecialchars($pro['total_salary'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('H' . $row, htmlspecialchars($pro['payment_date'], ENT_QUOTES, 'UTF-8'));
    //             $row++;
    //         }
    
    //         // Thiết lập tự động căn chỉnh kích thước cột
    //         foreach (range('A', 'H') as $col) {
    //             $sheet->getColumnDimension($col)->setAutoSize(true);
    //         }
    
    //         // Xóa buffer trước khi xuất
    //         ob_end_clean();
    
    //         // Thiết lập header để tải file
    //         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //         header('Content-Disposition: attachment;filename="DanhSachbangluong.xlsx"');
    //         header('Cache-Control: max-age=0');
    
    //         // Lưu file Excel
    //         $writer = new Xlsx($spreadsheet);
    //         $writer->save('php://output');
    //         exit();
    //     } catch (Exception $e) {
    //         error_log('Lỗi xuất Excel: ' . $e->getMessage());
    //         echo 'Có lỗi xảy ra khi xuất file Excel. Vui lòng thử lại.';
    //     }
    // }
    



}
