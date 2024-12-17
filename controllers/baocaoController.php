<?php
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class baocaoController {
    public $baocao;

    public function __construct() {
        // Tạo đối tượng của class baocao
        require_once './models/baocao.php'; // Đảm bảo class baocao được include
        $this->baocao = new baocao();
    }

    public function list() {
        // Gọi phương thức từ model baocao để lấy dữ liệu
        $data = $this->baocao->getAll();
        $overview = $this->baocao->getEmployeeOverview(); // Sửa lại cú pháp để sử dụng $this->baocao

        // Truyền dữ liệu vào view
        require_once './views/baocao/list_baocao.php';
    }
    public function delete(){
        if(isset($_GET['report_id'])){
            $report_id = $_GET['report_id'];
            $this->baocao->delete($report_id);
            header('Location: ?act=list_baocao');
        }else{
            header('Location: ?act=list_baocao');
        }
    }
    public function add() {
        if (isset($_POST['sbmt'])) {
            $employee_id = $_POST['employee_id'];
            $report_month = $_POST['report_month'];
            $note = $_POST['note'];
    
            // Gọi hàm addReport để thêm báo cáo
            $result = $this->baocao->addReport($employee_id, $report_month, $note);
    
            if ($result) {
                // Chuyển hướng về trang báo cáo sau khi thêm thành công
                header('Location: index.php?act=list_baocao');
                exit; // Đảm bảo không có mã HTML nào xuất ra sau header
            } else {
                echo "Không tìm thấy thông tin lương cho nhân viên này trong tháng báo cáo.";
            }
        } else {
            // Nếu không phải POST, hiển thị form nhập báo cáo
            include './views/baocao/add_baocao.php';
        }
    }

    // public function exportExcel()  {
    //     try {
    //         // Lấy tất cả dữ liệu chấm công từ model
    //         $data = $this->baocao->getAll();
        
    //         // Tạo đối tượng Spreadsheet mới từ PhpSpreadsheet
    //         $spreadsheet = new Spreadsheet();
    //         $sheet = $spreadsheet->getActiveSheet();
    //         $sheet->setTitle('Bang bao cao');
    
    //         // Đặt tiêu đề cho các cột
    //         $sheet->setCellValue('A1', 'Tên nhân viên')
    //               ->setCellValue('B1', 'Số giờ làm')
    //               ->setCellValue('C1', 'Lương ')
    //               ->setCellValue('D1', 'Trạng thái')
    //               ->setCellValue('E1', 'Ngày thanh toán')
    //               ->setCellValue('F1', 'Tháng báo cáo')
    //               ->setCellValue('G1', 'Thành tích/ Ghi chú');
                 
    
    //         // Điền dữ liệu vào file Excel
    //         $row = 2;
    //             foreach ($data as $t) {
    //                 $sheet->setCellValue('A' . $row, htmlspecialchars($t['name'], ENT_QUOTES, 'UTF-8'))
    //                       ->setCellValue('B' . $row, htmlspecialchars($t['hours_worked'], ENT_QUOTES, 'UTF-8'))
    //                       ->setCellValue('C' . $row, htmlspecialchars($t['total_salary'], ENT_QUOTES, 'UTF-8'))
    //                       ->setCellValue('D' . $row, htmlspecialchars($t['payment_status'], ENT_QUOTES, 'UTF-8'))
    //                       ->setCellValue('E' . $row, htmlspecialchars($t['payment_date'], ENT_QUOTES, 'UTF-8'))
    //                       ->setCellValue('F' . $row, htmlspecialchars($t['report_month'], ENT_QUOTES, 'UTF-8'))
    //                       ->setCellValue('G' . $row, htmlspecialchars($t['note'], ENT_QUOTES, 'UTF-8'));
    //                 $row++;
    //             }
    
    //           // Thiết lập tự động căn chỉnh kích thước cột
    //           foreach (range('A', 'G') as $col) {
    //             $sheet->getColumnDimension($col)->setAutoSize(true);
    //         }
    
    //         // Xóa buffer trước khi xuất
    //         ob_end_clean();
    
    //         // Thiết lập header để tải file
    //         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //         header('Content-Disposition: attachment;filename="Bangbaocao.xlsx"');
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

