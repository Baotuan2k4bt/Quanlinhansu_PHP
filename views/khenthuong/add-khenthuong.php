
<?php
// Khởi tạo đối tượng Database
$db = new Database();
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title></title>
    <link rel="stylesheet" href="views/quanlinhanvien/admin.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font Awesome -->

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<section class="admin">
    <div class="row-grid">
        <div class="admin-sidebar">
        <div class="admin-sidebar-top flex justify-center items-center mb-6">
    <img src="https://cdn.vietnambiz.vn/2019/10/3/color-silhouette-cartoon-facade-shop-store-vector-14711058-1570007843495391141359-1570076859193969194096-15700769046292030065819-1570076927728377843390.png" width="40%" height="10" alt="Profile">
</div>
            <div class="admin-sidebar-content">
                <ul>

                    <li><a href=""><i class="ri-dashboard-line"></i> Dashboard</a></li>
                    <li><a href=""><i class="ri-group-fill"></i>Quản lí nhân sự<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost/qlinv/?act=product"><i class="ri-arrow-drop-right-fill"></i>Danh sách nhân viên</a></li>

                        </ul>
                    </li>
                    <li><a href=""><i class="ri-calendar-check-fill"></i> Thiết lập lịch làm việc<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost/qlinv/?act=add"><i class="ri-arrow-drop-right-fill"></i>Tạo đăng kí ca làm việc</a></li>
                            <li><a href="http://localhost/qlinv/index.php?act=list"><i class="ri-arrow-drop-right-fill"></i>Danh sách ca làm việc</a></li>
                          
                        </ul>
                    </li>
                    <li><a href=""><i class="ri-calendar-schedule-line"></i></i> Bảng chấm công<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
    
                            <li><a href="http://localhost/qlinv/?act=chamcong"><i class="ri-arrow-drop-right-fill"></i>Bảng chấm công làm việc</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="ri-wallet-3-line"></i> Quản lí lương<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                        <li><a  href="<?= BASE_DIR ?>?act=add-luong" ><i class="ri-arrow-drop-right-fill"></i>Bảng tính lương</a></li>
                        <li><a href="<?php echo BASE_DIR ?>?act=luong"><i class="ri-arrow-drop-right-fill"></i>Danh sách bảng lương nhân viên</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="ri-folder-chart-line"></i> Báo cáo & phân tích <i class="ri-arrow-left-s-fill"></i></a>
    <ul class="sub-menu">
        <li><a href="http://localhost/qlinv/?act=list_baocao"><i class="ri-arrow-drop-right-fill"></i>Bảng báo cáo</a></li>
    </ul>
</li>
<li><a href=""><i class="ri-verified-badge-line"></i> Quản lí đơn từ<i class="ri-arrow-left-s-fill"></i></a>
                    <ul class="sub-menu">
    
    <li><a href="http://localhost/qlinv/?act=list-dontu"><i class="ri-arrow-drop-right-fill"></i>Đơn từ</a></li>
</ul>
                    </li>
                    <li><a href=""><i class="ri-star-line"></i> Khen thưởng & kỉ luật<i class="ri-arrow-left-s-fill"></i></a>
                    <ul class="sub-menu">
    
    <li><a href="http://localhost/qlinv/?act=list-khenthuong"><i class="ri-arrow-drop-right-fill"></i>Danh sách </a></li>
</ul>
                    <li><a href=""><i class="ri-user-star-line"></i> Tài khoản<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost/qlinv/?act=login"><i class="ri-arrow-drop-right-fill"></i>Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="admin-content">
<div class="admin-content-top">
    <div class="admin-content-top-left">
        <ul>
            <li>
                <i class="ri-search-line"></i>
            </li>
            <li>  <i class="ri-drag-move-line"></i></li>
        </ul>
        </div>
    <div class="admin-content-top-right">
        <ul>
            <li>
                <i class="ri-notification-3-line"number="3"> </i > </li>
            <li><i class="ri-chat-3-line " number="5"></i></li>
        </ul>
    </div>
    </div>
    <div="admin-content-main">
        <div class="admin-content-main-title">
            <h1><a href="http://localhost/qlinv/giaodien/main.php">Dashboard</a></h1>
        </div>
        <div class="admin-content-main-content">
        <div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Thêm đợt khen thưởng</h1>
        </div>
        <form  method="POST">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 font-bold mb-2">Mã nhân viên <span class="text-red-500">*</span></label>
            <select class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md" id="employee_id" name="employee_id" required>
                <option value="">Chọn nhân viên</option>
                <?php
                    // Kết nối cơ sở dữ liệu và lấy danh sách nhân viên
                    $sql_su = "SELECT * FROM employees";
                    $query = $db->conn->query($sql_su);
                    if ($query) {
                        while ($row_s = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . htmlspecialchars($row_s["employee_id"]) . '">'
                                . htmlspecialchars($row_s["employee_id"]) . ' - ' . htmlspecialchars($row_s["name"]) . '</option>';
                        }
                    } else {
                        echo '<option value="">Không thể lấy danh sách nhân viên</option>';
                    }
                ?>
            </select>
        </div>
        
        <div>
            <label class="block text-gray-700 font-bold mb-2">Loại hành động <span class="text-red-500">*</span></label>
            <select id="action_type" name="action_type" required class="w-full border border-gray-300 rounded px-4 py-2">
                <option value="Khen thưởng">Khen thưởng</option>
                <option value="Kỷ luật">Kỷ luật</option>
            </select>
        </div>
        
        <div>
            <label class="block text-gray-700 font-bold mb-2">Chi tiết</label>
            <input type="text" id="category" name="category" required class="w-full border border-gray-300 rounded px-4 py-2">
        </div>
        
        <div>
            <label class="block text-gray-700 font-bold mb-2">Ngày quyết định</label>
            <input type="date" name="action_date" required class="w-full border border-gray-300 rounded px-4 py-2">
        </div>
        
        <div>
            <label class="block text-gray-700 font-bold mb-2">Giá trị <span class="text-red-500">*</span></label>
            <input type="number" id="reward_amount" name="reward_amount" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>
        
        <div>
            <label class="block text-gray-700 font-bold mb-2">Người duyệt</label>
            <input type="text" name="approved_by" class="w-full p-2 border border-gray-300 rounded">
        </div>
        
        <div>
            <label class="block text-gray-700 font-bold mb-2">Ngày phê duyệt</label>
            <input type="date" name="approved_date" class="w-full p-2 border border-gray-300 rounded">
        </div>
        
        <div>
            <label class="block text-gray-700 font-bold mb-2">Lý do</label>
            <textarea id="reason" name="reason" class="w-full border border-gray-300 rounded px-4 py-2"></textarea>
        </div>

        <div>
            <button type="reset" class="bg-gray-200 text-gray-700 px-4 py-2 rounded mr-2">Hủy</button>
            <button type="submit" name="sbmt" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Lưu và thêm</button>
        </div>
    </div>
</form>


</section>
</body>
<script src="views/quanlinhanvien/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</html>
