<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


    class QliController{
        public $qli;
        public function __construct(){
            $this->qli = new qli();
        }
        public function list(){
            $data = $this->qli->getAll(); // Check if data is empty
            if (empty($data)) {
                echo "No data found!";
            } else {
                require_once './views/quanlinhanvien/list.php'; // Include the view with the data
            }
          
        }
        // Phương thức tìm kiếm nhân viên theo mã hoặc tên
        public function search() {
            if (isset($_GET['searchKeyword']) && !empty($_GET['searchKeyword'])) {
                $searchKeyword = $_GET['searchKeyword'];
        
                // Lấy kết quả từ Model
                $data = $this->qli->search($searchKeyword);
        
                // Lưu kết quả tìm kiếm vào SESSION hoặc GET
                if (!empty($data)) {
                    session_start(); // Khởi tạo session
                    $_SESSION['search_results'] = $data; // Lưu kết quả tìm kiếm
                    header("Location: ?act=product");
                    exit();
                } else {
                    // Chuyển hướng với thông báo lỗi
                    header("Location: ?act=product");
                    exit();
                }
            } else {
                // Chuyển hướng với thông báo "vui lòng nhập từ khóa"
                header("Location: ?act=product");
                exit();
            }
        }
        
        public function add() {
            $error = [];
            $successMessage = '';
        
            if (isset($_POST['sbmt'])) {
                // Nhận và xác thực dữ liệu
                $name = $_POST['name'] ?? '';
                if (empty($name)) {
                    $error['name'] = "Bạn chưa nhập tên.";
                }
        
                $email = $_POST['email'] ?? '';
                if (empty($email)) {
                    $error['email'] = "Bạn chưa nhập email.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Định dạng email không hợp lệ.";
                }
        
                $phone = $_POST['phone'] ?? '';
                if (empty($phone)) {
                    $error['phone'] = "Bạn chưa nhập số điện thoại.";
                }
        
                $address = $_POST['address'] ?? '';
                if (empty($address)) {
                    $error['address'] = "Bạn chưa nhập địa chỉ.";
                }
        
                $position = $_POST['position'] ?? '';
                if (empty($position)) {
                    $error['position'] = "Bạn chưa nhập chức vụ.";
                }
        
                // Xử lý tải lên tệp ảnh
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image_tmp = $_FILES['image']['tmp_name'];
                    $fileType = mime_content_type($image_tmp); // Kiểm tra MIME type
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        
                    if (!in_array($fileType, $allowedTypes)) {
                        $error['image'] = "Chỉ cho phép tải lên các định dạng: JPG, PNG, GIF.";
                    } else {
                        // Tạo tên tệp duy nhất
                        $uploadDir = './uploads/';
                        $newFileName = uniqid('img_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                        $uploadFile = $uploadDir . $newFileName;
        
                        if (!move_uploaded_file($image_tmp, $uploadFile)) {
                            $error['image'] = "Không thể tải lên ảnh.";
                        }
                    }
                } else {
                    $error['image'] = "Bạn phải tải lên một ảnh.";
                }
        
                // Nếu không có lỗi, thêm dữ liệu vào cơ sở dữ liệu
                if (empty($error)) {
                    $this->qli->insert($name, $newFileName, $email, $phone, $address, $position);
                    $successMessage = "Nhân viên đã được thêm thành công!";
                    header("Location: ?act=product");
                    exit();
                }
            }
        
            // Truyền dữ liệu sang view
            require_once './views/quanlinhanvien/list.php';
        }
        
        public function delete(){
            if(isset($_GET['employee_id'])){
                $employee_id = $_GET['employee_id'];
                $this->qli->delete($employee_id);
                header('Location: ?act=product');
            }else{
                header('Location: ?act=product');
            }
        }

//         function exportExcel() {
//             try {
//                 // Lấy dữ liệu từ cơ sở dữ liệu
//                 $data = $this->qli->getAll(); // Phương thức lấy dữ liệu từ database
        
//                 // Tạo file Excel
//                 $spreadsheet = new Spreadsheet();
//                 $sheet = $spreadsheet->getActiveSheet();
//                 $sheet->setTitle('Danh sách nhân viên');
        
//                 // Đặt tiêu đề cột
//                 $sheet->setCellValue('A1', 'Mã nhân viên')
//                       ->setCellValue('B1', 'Họ tên')
//                       ->setCellValue('C1', 'Ảnh')
//                       ->setCellValue('D1', 'Email')
//                       ->setCellValue('E1', 'Số điện thoại')
//                       ->setCellValue('F1', 'Địa chỉ')
//                       ->setCellValue('G1', 'Chức vụ');
        
//                 // Ghi dữ liệu vào file Excel
//                 $row = 2;
//                 foreach ($data as $pro) {
//                     $sheet->setCellValue('A' . $row, htmlspecialchars($pro['employee_id'], ENT_QUOTES, 'UTF-8'))
//                           ->setCellValue('B' . $row, htmlspecialchars($pro['name'], ENT_QUOTES, 'UTF-8'))
//                           ->setCellValue('C' . $row, htmlspecialchars($pro['image'], ENT_QUOTES, 'UTF-8'))
//                           ->setCellValue('D' . $row, htmlspecialchars($pro['email'], ENT_QUOTES, 'UTF-8'))
//                           ->setCellValue('E' . $row, htmlspecialchars($pro['phone'], ENT_QUOTES, 'UTF-8'))
//                           ->setCellValue('F' . $row, htmlspecialchars($pro['address'], ENT_QUOTES, 'UTF-8'))
//                           ->setCellValue('G' . $row, htmlspecialchars($pro['position'], ENT_QUOTES, 'UTF-8'));
//                     $row++;
//                 }
        
//                 // Thiết lập tự động căn chỉnh kích thước cột
//                 foreach (range('A', 'G') as $col) {
//                     $sheet->getColumnDimension($col)->setAutoSize(true);
//                 }
        
//                 // Xóa buffer trước khi xuất
//                 ob_end_clean();
        
//                 // Thiết lập header để tải file
//                 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//                 header('Content-Disposition: attachment;filename="DanhSachNhanVien.xlsx"');
//                 header('Cache-Control: max-age=0');
        
//                 // Lưu file Excel
//                 $writer = new Xlsx($spreadsheet);
//                 $writer->save('php://output');
//                 exit();
//             } catch (Exception $e) {
//                 error_log('Lỗi xuất Excel: ' . $e->getMessage());
//                 echo 'Có lỗi xảy ra khi xuất file Excel. Vui lòng thử lại.';
//             }
//         }
        
// // Hàm nhập dữ liệu từ file Excel vào cơ sở dữ liệu
// function importExcel() {
//     try {
//         if (!isset($_FILES['excelFile']) || $_FILES['excelFile']['error'] !== UPLOAD_ERR_OK) {
//             throw new Exception('Vui lòng chọn một file Excel hợp lệ.');
//         }

//         // Lấy file Excel
//         $filePath = $_FILES['excelFile']['tmp_name'];

//         // Đọc dữ liệu từ file Excel
//         $spreadsheet = IOFactory::load($filePath);
//         $sheet = $spreadsheet->getActiveSheet();
//         $data = $sheet->toArray();  // Chuyển dữ liệu thành mảng

//         // Tạo kết nối CSDL
//         $db = new Database();

//         $errorMessages = [];

//         // Lặp qua từng dòng dữ liệu trong Excel (bỏ qua tiêu đề)
//         foreach ($data as $key => $row) {
//             if ($key === 0) { // Bỏ qua dòng tiêu đề
//                 continue;
//             }

//             $employee_id = htmlspecialchars($row[0] ?? '');
//             $name = htmlspecialchars($row[1] ?? '');
//             $image = htmlspecialchars($row[2] ?? '');
//             $email = htmlspecialchars($row[3] ?? '');
//             $phone = htmlspecialchars($row[4] ?? '');
//             $address = htmlspecialchars($row[5] ?? '');
//             $position = htmlspecialchars($row[6] ?? '');

//             // Kiểm tra nếu employee_id đã tồn tại trong cơ sở dữ liệu
//             $sqlCheck = "SELECT COUNT(*) FROM employees WHERE employee_id = :employee_id";
//             $paramsCheck = [':employee_id' => $employee_id];
//             $stmt = $db->prepare($sqlCheck);
//             $stmt->execute($paramsCheck);
//             $rowCount = $stmt->fetchColumn(); // Lấy số lượng bản ghi

//             if ($rowCount > 0) {
//                 // Nếu tồn tại, thêm thông báo lỗi vào mảng errorMessages
//                 $errorMessages[] = "Mã nhân viên $employee_id đã tồn tại.";
//                 continue; // Bỏ qua nhập dữ liệu cho dòng này
//             }

//             // Chèn dữ liệu vào cơ sở dữ liệu
//             $sql = "INSERT INTO employees (employee_id, name, image, email, phone, address, position) 
//                     VALUES (:employee_id, :name, :image, :email, :phone, :address, :position)";
//             $params = [
//                 ':employee_id' => $employee_id,
//                 ':name' => $name,
//                 ':image' => $image,
//                 ':email' => $email,
//                 ':phone' => $phone,
//                 ':address' => $address,
//                 ':position' => $position
//             ];
//             $result = $db->executeQuery($sql, $params);

//             if (!$result) {
//                 throw new Exception("Có lỗi xảy ra khi nhập dữ liệu.");
//             }
//         }

//         if (count($errorMessages) > 0) {
//             // Nếu có lỗi, hiển thị thông báo lỗi và quay lại trang danh sách
//             $_SESSION['errorMessages'] = $errorMessages;
//             header("Location: ?act=product");
//             exit();
//         }

//         // Nếu thành công, hiển thị thông báo và quay lại trang danh sách
//         $_SESSION['successMessage'] = "Dữ liệu đã được nhập thành công.";
//         header("Location: ?act=product");
//         exit();

//     } catch (Exception $e) {
//         // Xử lý lỗi và quay lại trang danh sách
//         $_SESSION['errorMessages'] = [$e->getMessage()];
//         header("Location: ?act=product");
//         exit();
//     }
// }

    }      
