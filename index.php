<?php
// Import configuration and dependencies
require_once './helpers/env.php';
require_once './models/Database.php';
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// require 'vendor/autoload.php';
 require_once './views/quanlicalamviec/config/connect.php';
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$act = $_GET['act'] ?? 'login';  

// Import controllers and models
require_once './controllers/HomeController.php';
require_once './controllers/QliController.php';
require_once './controllers/CalamviecController.php';
require_once './controllers/ChamcongController.php';
require_once './controllers/LuongController.php';
require_once './controllers/baocaoController.php';
require_once './controllers/dontuController.php';
require_once './controllers/khenthuongController.php';
require_once './controllers/LoginController.php';
require_once './controllers/HomeUserController.php';
require_once './models/Qli.php';
require_once './models/calamviec.php';
require_once './models/Chamcong.php';
require_once './models/Luong.php';
require_once './models/baocao.php';
require_once  './models/Dontu.php';
require_once  './models/khenthuong.php';
require_once './models/Login.php';




// Instantiate controllers
$homeUserController = new HomeUserController();
$homeController = new HomeController();
$qliController = new QliController();
$CalamviecController = new CalamviecController();
$ccongController = new ChamcongController();
$luong = new LuongController();
$baocaoController= new baocaoController;
$dontuController= new dontuController;
$khenthuongController= new KhenthuongController;
$loginController = new LoginController();

$user_id = $_SESSION['user']['user_id'] ?? null;  
// Get action from query parameter, default to '/'
$act = $_GET['act'] ?? '/';

// Use a switch statement to call the appropriate controller method
switch ($act) {
    // Home page
case'/':
    $homeController->home();  // Điều hướng tới trang chủ admin
    break;

    case 'home':
        $homeController->home();  // Điều hướng tới trang chủ admin
         break;
     case 'home_user':
         $homeUserController->homeUser();  // Điều hướng tới trang chủ user
         break;
     
     // Trang đăng nhập
     case 'login':
         $loginController->login();
         break;
 
     // Trang đăng xuất
     case 'logout':
         $loginController->logout();
         break;
    
    // Product management
    case 'product':
        $qliController->list();
        break;
    case 'add-product':
        $qliController->add();
        break;
    case 'edit-product':
        require_once './views/quanlinhanvien/edit.php';  // Ensure this file exists
        break;
    case 'search':
            $qliController->search();    ;  // Ensure this file exists
            break;    
    case 'del-product':
        $qliController->delete();
        break;
    //  case'exportExcel':
    //         $qliController->exportExcel();
    //         break;
    // case'importExcel':
    //     $qliController->importExcel();
    //      break;              

    // Chấm công (Attendance)
    case 'chamcong':
        $ccongController->list();
        break;
    case 'del-chamcong':
        $ccongController->delete();
        break;
    case 'add-chamcong':
        $ccongController->add();
        break;
    case 'edit-chamcong':
        $ccongController->edit();
        break;
    //   case 'export-excel':
    //         $ccongController->exportExcel();
    //         break;   

    // Ca làm việc (Work Schedule)
    case 'list':
        $CalamviecController->list();
        break;
    case 'add':
        $CalamviecController->add();
        break;
    case 'delete':
        $CalamviecController->delete();
        break;
        // case'exportExcel-Work':
        //     $CalamviecController->exportExcel();
        //     break;    
    
    case 'update':
        require_once './views/quanlicalamviec/update.php';  // Ensure this file exists
        break;
        
 
    // // lương
    case 'luong':
        $luong->list();
        break;
        case 'add-luong':
            $luong->add();   
            break;
        case 'edit-luong':
            $luong->update();   
            break; 
        case 'del-luong':
            $luong->delete();   
            break;  
            // case'exportExcel-salary':
            //     $luong->exportExcel();
            //     break;        
    // baocao
    case 'list_baocao':
        $baocaoController->list();
        break;
    case 'add-baocao':
        $baocaoController->add();
        break;
    case 'delete-baocao':
        $baocaoController->delete();
        break;
    // case 'export':
    //         $baocaoController->exportExcel();
    //         break;    

    // don TU
    case 'list-dontu':
        $dontuController->list();
        break; 
        
        
     // don TU
     case 'list-khenthuong':
        $khenthuongController->list();
        break;
    case 'delete-khenthuong':
            $khenthuongController->delete();
            break;
     case 'add-khenthuong':
                $khenthuongController->add();
                break;  
                
              
             
    default:
        // Handle unknown actions
        echo "Unknown action: {$act}";
        break;
}