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
    <class="admin-content-main">
        <div class="admin-content-main-title">
            <h1><a href="http://localhost/qlinv/giaodien/main.php">Dashboard</a></h1>
        </div>
        <div class="admin-content-main-content">
        <div class="flex justify-end mb-6 space-x-4">
    <!-- Nút Thêm Sản Phẩm -->
    <a href="<?= BASE_DIR ?>?act=add-luong" 
       class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
        + Bảng tính lương
    </a>
    
    <!-- Nút Xuất ra Excel -->
    <a href="index.php?act=exportExcel-salary" 
       class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
        Xuất ra Excel
    </a>
</div>
    
    <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-300">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-sm uppercase">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Mã NV</th>
                    <th class="py-3 px-6 text-left">Tên</th>
                    <th class="py-3 px-6 text-left">Tháng</th>
                    <th class="py-3 px-6 text-left">Lương Cơ Bản</th>
                    <th class="py-3 px-6 text-left">Số Giờ Làm</th>
                    <th class="py-3 px-6 text-left">Số Giờ Làm Thêm</th>
                    <th class="py-3 px-6 text-left">Lương Giờ Làm Thêm</th>
                    <th class="py-3 px-6 text-left">Tổng Lương</th>
                    <th class="py-3 px-6 text-left">Ngày Phát</th>
                    <th class="py-3 px-6 text-left">Hành Động</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                <?php foreach ($data as $item) { ?>
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="py-3 px-6"><?= $item['salary_id']; ?></td>
                    <td class="py-3 px-6"><?= $item['employee_id']; ?></td>
                    <td class="py-3 px-6"><?= $item['name']; ?></td>
                    <td class="py-3 px-6"><?= $item['month']; ?></td>
                    <td class="py-3 px-6 text-green-600 font-bold">
                        <?= number_format($item['basic_salary'], 0, ',', '.'); ?>₫
                    </td>
                    <td class="py-3 px-6"><?= $item['hours_worked']; ?> giờ</td>
                    <td class="py-3 px-6"><?= $item['overtime_hours']; ?> giờ</td>
                    <td class="py-3 px-6 text-blue-600">
                        <?= number_format($item['overtime_pay'], 0, ',', '.'); ?>₫
                    </td>
                    <td class="py-3 px-6 text-purple-700 font-bold">
                        <?= number_format($item['total_salary'], 0, ',', '.'); ?>₫
                    </td>
                    <td class="py-3 px-6"><?= date('d/m/Y', strtotime($item['payment_date'])); ?></td>
                    <td class="py-3 px-6 flex space-x-4">
                        <a href="<?= BASE_DIR ?>?act=edit-luong&salary_id=<?= $item['salary_id']; ?>" 
                           class="text-blue-600 hover:text-blue-800 font-medium transition">Edit</a>
                        <a href="<?= BASE_DIR ?>?act=del-luong&salary_id=<?= $item['salary_id']; ?>" 
                           onclick="return confirm('Bạn có muốn xóa ???');" 
                           class="text-red-600 hover:text-red-800 font-medium transition">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


</body>
<script src="views/quanlinhanvien/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</html>
