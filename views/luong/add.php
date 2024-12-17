
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
    <div="admin-content-main">
        <div class="admin-content-main-title">
            <h1><a href="http://localhost/qlinv/giaodien/main.php">Dashboard</a></h1>
        </div>
        <div class="admin-content-main-content">
        <html lang="en">
        <body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <h1 class="text-2xl font-bold mb-6 text-center">Thêm mới lương</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Employee ID -->
                    <div>
                        <label for="emp" class="block text-gray-700">Mã nhân viên</label>
                        <input type="text" name="emp" id="emp" value="<?= htmlspecialchars($_POST['emp'] ?? '') ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập mã nhân viên">
                        <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($error['employee_id'] ?? '') ?></p>
                    </div>

                    <!-- Month -->
                    <div>
                        <label for="mon" class="block text-gray-700">Tháng</label>
                        <input type="month" name="mon" id="mon" value="<?= htmlspecialchars($_POST['mon'] ?? '') ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($error['month'] ?? '') ?></p>
                    </div>

                    <!-- Basic Salary -->
                    <div>
                        <label for="bas" class="block text-gray-700">Lương cơ bản</label>
                        <input type="number" name="bas" id="bas" value="<?= htmlspecialchars($_POST['bas'] ?? '') ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập lương cơ bản">
                        <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($error['basic_salary'] ?? '') ?></p>
                    </div>

                    <!-- Hours Worked -->
                    <div>
                        <label for="hou" class="block text-gray-700">Số giờ làm việc</label>
                        <input type="number" name="hou" id="hou" value="<?= htmlspecialchars($_POST['hou'] ?? '') ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập số giờ làm việc">
                        <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($error['hours_worked'] ?? '') ?></p>
                    </div>

                    <!-- Overtime Hours -->
                    <div>
                        <label for="over" class="block text-gray-700">Số giờ làm thêm</label>
                        <input type="number" name="over" id="over" value="<?= htmlspecialchars($_POST['over'] ?? '') ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập số giờ làm thêm">
                        <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($error['overtime_hours'] ?? '') ?></p>
                    </div>

                    <!-- Overtime Pay -->
                    <div>
                        <label for="ove_pay" class="block text-gray-700">Lương làm thêm</label>
                        <input type="number" name="ove_pay" id="ove_pay" value="<?= htmlspecialchars($_POST['ove_pay'] ?? '') ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập lương làm thêm">
                        <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($error['overtime_pay'] ?? '') ?></p>
                    </div>

                    <!-- Payment Date -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="paymen" class="block text-gray-700">Ngày thanh toán</label>
                        <input type="date" name="paymen" id="paymen" value="<?= htmlspecialchars($_POST['paymen'] ?? '') ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($error['payment_date'] ?? '') ?></p>
                    </div>

                    <!-- Total Salary Display -->
                    <div class="col-span-1 md:col-span-2">
                        <strong class="block text-gray-700">Tổng lương:</strong>
                        <span id="total-salary-display" class="block text-lg font-bold text-blue-500">0 VND</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-6">
                    <input type="submit" name="btnsend" value="Thêm mới" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </form>
        </div>
    </div>

    <script>
     document.addEventListener('input', function () {
    const hourlyRate = parseFloat(document.querySelector('#bas').value) || 0; // Lương theo giờ
    const hoursWorked = parseFloat(document.querySelector('#hou').value) || 0; // Số giờ làm việc
    const overtimeHours = parseFloat(document.querySelector('#over').value) || 0; // Số giờ làm thêm
    const overtimePay = parseFloat(document.querySelector('#ove_pay').value) || 0; // Lương làm thêm

    // Tính tổng lương
    const totalSalary = (hourlyRate * hoursWorked) + (overtimeHours * overtimePay);

    // Hiển thị tổng lương
    document.querySelector('#total-salary-display').textContent = totalSalary.toLocaleString('vi-VN') + ' VND';
});
    </script>
</body>

<script src="views/quanlinhanvien/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</html>

