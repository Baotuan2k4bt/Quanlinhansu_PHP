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

                            <li><a href=""><i class="ri-arrow-drop-right-fill"></i>Tạo tài khoản nhân viên</a></li>
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
    
    <li><a href="http://localhost/qlinv/?act=list-khenthuong"><i class="ri-arrow-drop-right-fill"></i>Đơn từ</a></li>
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
    <class="admin-content-main">
        <div class="admin-content-main-title">
            <h1><a href="http://localhost/qlinv/giaodien/main.php">Dashboard</a></h1>
        </div>
        <div class="admin-content-main-content">
<!-- Giao diện Tổng quan -->
<div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-xl mb-6">
            <div class="flex justify-end space-x-4 mb-6">
                <a href="index.php?act=export" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition duration-300 ease-in-out">
                    <i class="fas fa-file-export mr-2"></i>Xuất báo cáo
                </a>
                <a class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-green-600 transition duration-300 ease-in-out" href="<?= BASE_DIR ?>?act=add-baocao">
                    <i class="fas fa-plus-circle mr-2"></i>Thêm báo cáo việc
                </a>
            </div>
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Tổng quan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-600 p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
                    <div class="flex items-center">
                        <i class="fas fa-users text-3xl text-white mr-3"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Tổng số nhân viên</h3>
                            <p class="text-3xl font-bold text-white"><?= htmlspecialchars($overview['total']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-green-600 p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
                    <div class="flex items-center">
                        <i class="fas fa-user-plus text-3xl text-white mr-3"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Nhân viên mới</h3>
                            <p class="text-3xl font-bold text-white"><?= htmlspecialchars($overview['new']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-red-600 p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
                    <div class="flex items-center">
                        <i class="fas fa-user-times text-3xl text-white mr-3"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Nhân viên nghỉ việc</h3>
                            <p class="text-3xl font-bold text-white"><?= htmlspecialchars($overview['resigned']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Phần Thống kê nhân viên -->
<div class="bg-white p-6 rounded-lg shadow-xl mb-6">

    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Thống kê nhân viên</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Giới tính -->
        <div class="bg-blue-50 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Giới tính</h3>
            <div class="flex items-center mb-4">
                <div class="w-1/2 bg-blue-500 h-6 rounded-l"></div>
                <div class="w-1/2 bg-pink-500 h-6 rounded-r"></div>
            </div>
            <div class="flex justify-between text-gray-700">
                <span>Nam: 5</span>
                <span>Nữ: 6</span>
            </div>
        </div>

        <!-- Độ tuổi -->
        <div class="bg-yellow-50 p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Độ tuổi</h3>
            <div class="flex items-center mb-4">
                <div class="w-1/3 bg-yellow-500 h-6 rounded-l"></div>
                <div class="w-1/3 bg-green-500 h-6"></div>
                <div class="w-1/3 bg-red-500 h-6 rounded-r"></div>
            </div>
            <div class="flex justify-between text-gray-700">
                <span>20-30: 50</span>
                <span>30-40: 50</span>
                <span>40+: 50</span>
            </div>
        </div>
    </div>
</div>


   <!-- Detailed Reports Section -->
<div class="bg-white p-6 rounded-lg shadow-lg mb-6">
    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Báo cáo chi tiết</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr class="bg-gray-200">
                <th class="py-3 px-6 border-b text-left text-gray-700">Tên nhân viên</th>
                <th class="py-3 px-6 border-b text-left text-gray-700">Số giờ làm việc trong tháng</th>
                <th class="py-3 px-6 border-b text-left text-gray-700">Lương cơ Bản</th>
                <th class="py-3 px-6 border-b text-left text-gray-700">Thanh toán</th>
                <th class="py-3 px-6 border-b text-left text-gray-700">Ngày thanh toán</th>
                <th class="py-3 px-6 border-b text-left text-gray-700">Tháng báo cáo</th>
                <th class="py-3 px-6 border-b text-left text-gray-700">Thành tích/ Ghi chú</th>
                <th class="py-3 px-6 border-b text-left text-gray-500"> Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
    $stt = 1;  // Khởi tạo biến số thứ tự ở ngoài vòng lặp
    foreach ($data as $t) {
        ?>
        <tr>
            <td class='py-3 px-6 border-b text-gray-1000'>
                <?= htmlspecialchars(isset($t['name']) ? $t['name'] : ''); ?>
            </td>
            <td class='py-3 px-6 border-b text-gray-500'>
                <?= htmlspecialchars(isset($t['hours_worked']) ? $t['hours_worked'] : ''); ?>
            </td>
            <td class='py-3 px-6 border-b text-gray-500'>
                <?= htmlspecialchars(isset($t['total_salary']) ? $t['total_salary'] : ''); ?>
            </td>
            <td class='py-3 px-6 border-b text-gray-500'>
                <?= htmlspecialchars(isset($t['payment_status']) ? $t['payment_status'] : ''); ?>
            </td>
            <td class='py-3 px-6 border-b text-gray-500'>
                <?= htmlspecialchars(isset($t['payment_date']) ? $t['payment_date'] : ''); ?>
            </td>
            <td class='py-3 px-6 border-b text-gray-500'>
                <?= htmlspecialchars(isset($t['report_month']) ? $t['report_month'] : ''); ?>
            </td>
            <td class='py-3 px-6 border-b text-gray-500'>
                <?= htmlspecialchars(isset($t['note']) ? $t['note'] : ''); ?>
            </td>
            <td class='py-3 px-6 border-b text-gray-500'>
                <a href="index.php?act=delete-baocao&report_id=<?= $t['report_id']; ?>" 
                   onclick="return confirm('Bạn có chắc chắn muốn xóa  <?= htmlspecialchars($t['name']); ?>?');" 
                   class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</tbody>
</table>
    </div>
</div>
</section>
</body>
<script src="views/quanlinhanvien/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</html>
