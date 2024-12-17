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

<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Tất cả khen thưởng & kỉ luật </h1>
        <a href="<?php echo BASE_DIR ?>?act=add-khenthuong" class="bg-blue-500 text-white px-4 py-2 rounded">+ Thêm</a>

    </div>
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center space-x-2">
            <select class="border border-gray-300 rounded px-4 py-2">
                <option>Tất cả đơn vị</option>
            </select>
            <button class="border border-gray-300 rounded px-4 py-2">
                <i class="fas fa-cog"></i>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-800">
            <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b">Mã khen thưởng</th>
                <th class="py-2 px-4 border-b">Tên nhân viên</th>
                <th class="py-2 px-4 border-b">Loại hoạt động</th>
                <th class="py-2 px-4 border-b">Chi tiết </th>

                <th class="py-2 px-4 border-b">Ngày quyết định</th>
                <th class="py-2 px-4 border-b">Giá trị</th>
                <th class="py-2 px-4 border-b">Lí do</th>
                <th class="py-2 px-4 border-b">Người phê duyệt</th>
                <th class="py-2 px-4 border-b">Ngày phê duyêt</th>
                <th class="py-2 px-4 border-b">Hành động </th>
              
            </tr>
            <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
    <tr>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['id']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['name']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['action_type']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['category']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['action_date']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['reward_amount']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['reason']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['approved_by']) ?></td>
        <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['approved_date']) ?></td>
        <td class="py-2 px-4 border-b">
            <!-- Chỉnh sửa URL và xác nhận xóa -->
            <a href="index.php?act=delete-khenthuong&id=<?= htmlspecialchars($row['id']) ?>" 
               onclick="return confirm('Bạn có chắc chắn muốn xóa hành động: ?');" 
               class="btn btn-danger btn-sm">Xóa</a>
        </td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="10" class="py-4 px-4 text-center text-gray-500">Không có dữ liệu</td>
    </tr>
<?php endif; ?>

</table>
</div>
</section>
</body>
<script src="views/quanlinhanvien/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</html>
