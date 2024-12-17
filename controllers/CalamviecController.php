<?php
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\IOFactory;


class CalamviecController {
    public $calamviec;

    // Constructor khởi tạo đối tượng work
    public function __construct() {
        // Đảm bảo rằng lớp work đã được bao gồm hoặc khởi tạo
        $this->calamviec = new calamviec();  // Chú ý tên lớp cần đúng với tên file Work.php
    }

    // Hàm liệt kê thông tin
    public function list() {
        // Lấy dữ liệu từ phương thức getAll() của đối tượng Work
        $data = $this->calamviec->getAll();

        // Bao gồm file view để hiển thị dữ liệu
        require_once './views/quanlicalamviec/list.php';  // Đảm bảo đường dẫn đúng
    }
    public function delete(){
        if(isset($_GET['employee_id'])){
            $employee_id = $_GET['employee_id'];
            $this->calamviec->delete($employee_id);
            header('Location: ?act=list');
        }else{
            header('Location: ?act=list');
        }
    }
    public function add() {
        // Khởi tạo đối tượng WorkSchedule Model
        $workSchedule = new calamviec();

        if (isset($_POST['sbm'])) {
            $employee_id = $_POST['employee_id'];
            $work_date = $_POST['work_date'];
            $day_of_week = $_POST['day_of_week'];
            $start_time = $_POST['start_time'];
            $end_time = $_POST['end_time'];

            // Kiểm tra nếu ca làm việc đã tồn tại
            if ($workSchedule->checkDuplicate($employee_id, $work_date, $start_time, $end_time)) {
                echo "<div style='color:red;'>Ca làm việc này đã tồn tại, vui lòng chọn ca khác.</div>";
            } else {
                // Thêm ca làm việc mới
                $workSchedule->insert($employee_id, $work_date, $day_of_week, $start_time, $end_time);
                // Chuyển hướng đến trang danh sách ca làm việc
                header('Location: index.php?act=list');
                exit();
            }
        }

        // Bao gồm lại view danh sách ca làm việc sau khi xử lý
        require_once './views/quanlicalamviec/add.php';
    }
    // function exportExcel() {
    //     try {
    //         // Lấy dữ liệu từ cơ sở dữ liệu
    //         $data = $this->calamviec ->getAll(); // Phương thức lấy dữ liệu từ database
    
    //         // Tạo file Excel
    //         $spreadsheet = new Spreadsheet();
    //         $sheet = $spreadsheet->getActiveSheet();
    //         $sheet->setTitle('Danh sách nhân viên');
    
    //         // Đặt tiêu đề cột
    //         $sheet->setCellValue('A1', 'Mã nhân viên')
    //               ->setCellValue('B1', 'Họ tên')
    //               ->setCellValue('C1', 'Ngày làm việc')
    //               ->setCellValue('D1', 'Thứ')
    //               ->setCellValue('E1', 'Thời gian bắt đầu')
    //               ->setCellValue('F1', 'Thời gian kết thúc');
           
    
    //         // Ghi dữ liệu vào file Excel
    //         $row = 2;
    //         foreach ($data as $pro) {
    //             $sheet->setCellValue('A' . $row, htmlspecialchars($pro['employee_id'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('B' . $row, htmlspecialchars($pro['name'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('C' . $row, htmlspecialchars($pro['work_date'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('D' . $row, htmlspecialchars($pro['day_of_week'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('E' . $row, htmlspecialchars($pro['start_time'], ENT_QUOTES, 'UTF-8'))
    //                   ->setCellValue('F' . $row, htmlspecialchars($pro['end_time'], ENT_QUOTES, 'UTF-8'));
                    
    //             $row++;
    //         }
    
    //         // Thiết lập tự động căn chỉnh kích thước cột
    //         foreach (range('A', 'F') as $col) {
    //             $sheet->getColumnDimension($col)->setAutoSize(true);
    //         }
    
    //         // Xóa buffer trước khi xuất
    //         ob_end_clean();
    
    //         // Thiết lập header để tải file
    //         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //         header('Content-Disposition: attachment;filename="DanhSachcalamviec.xlsx"');
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

