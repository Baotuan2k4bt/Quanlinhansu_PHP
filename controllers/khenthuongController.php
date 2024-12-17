<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class KhenthuongController {
    public $khenthuong;

    public function __construct() {
        // Tạo đối tượng của class baocao
        require_once './models/khenthuong.php'; // Đảm bảo class baocao được include
        $this->khenthuong = new khenthuong();
    }

    public function list() {
        // Gọi phương thức từ model baocao để lấy dữ liệu
        $data = $this->khenthuong->getAll();
        // Truyền dữ liệu vào view
        require_once './views/khenthuong/list-khenthuong.php';
    }

    
    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->khenthuong->delete($id);
            header('Location: ?act=list-khenthuong');
        }else{
            header('Location: ?act=list-khenthuong');
        }
    }
 
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sbmt'])) {
            $employee_id = $_POST['employee_id'];
            $action_type = $_POST['action_type'];
            $category = $_POST['category'];
            $action_date = $_POST['action_date'];
            $reward_amount = !empty($_POST['reward_amount']) ? $_POST['reward_amount'] : null;
            $approved_by = $_POST['approved_by'];
            $approved_date = $_POST['approved_date'];
            $reason = $_POST['reason'];

    
            // Gọi hàm addReport trong model để thêm dữ liệu
            $result = $this->khenthuong->add($employee_id, $action_type, $category,  $action_date , $reward_amount,$approved_by,$approved_date, $reason);
    
            if ($result) {
                // Chuyển hướng về trang danh sách sau khi thêm thành công
                header('Location: index.php?act=list-khenthuong');
                exit;
            } else {
                echo "Đã xảy ra lỗi khi thêm báo cáo.";
            }
        } else {
            // Nếu không phải phương thức POST, hiển thị form thêm mới
            include './views/khenthuong/add-khenthuong.php';
        }
    }
    
}