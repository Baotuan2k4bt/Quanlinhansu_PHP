
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calculateTotalSalary = () => {
                const basicSalary = parseFloat(document.querySelector('input[name="bas"]').value) || 0;
                const overtimeHours = parseFloat(document.querySelector('input[name="over"]').value) || 0;
                const overtimePay = parseFloat(document.querySelector('input[name="ove_pay"]').value) || 0;
                const totalSalary = basicSalary + (overtimeHours * overtimePay);
                document.querySelector('#total-salary-display').textContent = totalSalary.toLocaleString('vi-VN') + ' VND';
            };

            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('input', calculateTotalSalary);
            });
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Chỉnh sửa lương</h1>
            <form action="" method="post">
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Employee ID</label>
                    <input type="text" name="emp" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Employee ID" value="<?php echo htmlspecialchars($currentData['employee_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($error['employee_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Month</label>
                    <input type="date" name="mon" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Month" value="<?php echo htmlspecialchars($currentData['month'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($error['month'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Basic Salary</label>
                    <input type="number" name="bas" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Basic Salary" value="<?php echo htmlspecialchars($currentData['basic_salary'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($error['basic_salary'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Hours Worked</label>
                    <input type="number" name="hou" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Hours Worked" value="<?php echo htmlspecialchars($currentData['hours_worked'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($error['hours_worked'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Overtime Hours</label>
                    <input type="number" name="over" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Overtime Hours" value="<?php echo htmlspecialchars($currentData['overtime_hours'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($error['overtime_hours'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Overtime Pay</label>
                    <input type="number" name="ove_pay" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Overtime Pay" value="<?php echo htmlspecialchars($currentData['overtime_pay'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($error['overtime_pay'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="mb-6">
                    <strong class="block text-gray-700 font-semibold mb-2">Total Salary:</strong>
                    <span id="total-salary-display" class="block text-lg font-bold mt-1">
                        <?php echo number_format($currentData['total_salary'] ?? 0, 0, ',', '.'); ?> VND
                    </span>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Payment Date</label>
                    <input type="date" name="paymen" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Payment Date" value="<?php echo htmlspecialchars($currentData['payment_date'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($error['payment_date'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="text-center">
                    <input type="submit" name="btnsend" value="Update" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                </div>
            </form>
            <div class="text-center mt-6">
                <a href="?act=luong" class="text-blue-500 hover:underline">Danh sách lương</a>
            </div>
        </div>
    </div>

</section>
</body>
<script src="views/quanlinhanvien/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</html>

