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
    <title>admin</title>
    <link rel="stylesheet" href="views/chamcong/admin.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head><link href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/css/ionicons.min.css" rel="stylesheet">

<body>
<section class="admin">
    <div class="row-grid">
        <div class="admin-sidebar">
            <div class="admin-sidebar-top">
                <img src="https://cdn.vietnambiz.vn/2019/10/3/color-silhouette-cartoon-facade-shop-store-vector-14711058-1570007843495391141359-1570076859193969194096-15700769046292030065819-1570076927728377843390.png" width="50%" height="70" alt="Profile">
            </div>
            <div class="admin-sidebar-content">
                <ul>

                    <li><a href=""><i class="ri-dashboard-line"></i> Dashboard</a></li>
                    <li><a href=""><i class="ri-group-fill"></i>Quản lí nhân sự<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost/qlinv/?act=product"><i class="ri-arrow-drop-right-fill"></i>Danh sách nhân viên</a></li>
                            <li><a href=""><i class="ri-arrow-drop-right-fill"></i>Danh sách tài khoản nhân viên</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="ri-calendar-check-fill"></i> Thiết lập lịch làm việc<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                        <li><a href="http://localhost/qlinv/?act=add"><i class="ri-arrow-drop-right-fill"></i>Tạo đăng kí ca làm việc</a></li>
                        <li><a href="http://localhost/qlinv/index.php?act=list"><i class="ri-arrow-drop-right-fill"></i>Danh sách ca làm việc</a></li>
                
                        </ul>
                    </li>
                    <li><a href=""><i class="ri-calendar-schedule-line"></i> Bảng chấm công<i class="ri-arrow-left-s-fill"></i></a>
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
</li>   <li><a href=""><i class="ri-verified-badge-line"></i> Quản lí đơn từ<i class="ri-arrow-left-s-fill"></i></a>
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
    <div class="admin-content-main">
        <div class="admin-content-main-title">
            <h1><a href="http://localhost/qlinv/giaodien/main.php">Dashboard</a></h1>
        </div>
        <div class="admin-content-main-content">
        <div class="d-flex justify-content-end mb-2">
    <a href="index.php?act=export-excel" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Xuất ra Excel
    </a>
</div>
</div>
    </a>
        <div class="container mt-2">
        <!-- Card chứa danh sách chấm công -->
        <div class="col-md-13">
            <div class="card shadow-sm rounded">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                <h6><strong>Thông Tin Chấm Công</strong></h6>
                <p class="lead fs-6 text-white font-weight-bold">
</p>
                    <a href="<?php echo BASE_DIR ?>?act=add-chamcong" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle"></i> Thêm Chấm Công
                    </a>
                </div>
                <div class="container mt-1">
    <!-- Thông Tin Chấm Công -->
    <div class="row mb-6">
        <div class="col-md-12">                
  <table class="table table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Mã chấm công</th>
            <th>Mã NV</th>
            <th>Tên</th>
            <th>Ngày Làm</th>
            <th>Giờ Vào</th>
            <th>Giờ Ra</th>
            <th>Thứ</th>
            <th>Trạng Thái</th>
            <th>Số giờ làm</th>
            <th>Giờ làm thêm</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($data)) { ?>
            <tr>
                <td colspan="8" class="text-center">Không có dữ liệu chấm công</td>
            </tr>
        <?php } else { ?>
            <?php foreach ($data as $cc) { ?>
                <tr>
                <td><?= htmlspecialchars($cc['attendance_id']); ?></td>
                    <td><?= htmlspecialchars($cc['employee_id']); ?></td>
                    <td><?= htmlspecialchars($cc['name']); ?></td>
                    <td><?= htmlspecialchars($cc['date']); ?></td>
                    <td><?= htmlspecialchars($cc['clock_in']); ?></td>
                    <td><?= htmlspecialchars($cc['clock_out']); ?></td>
                    <td><?= htmlspecialchars($cc['day_of_week']); ?></td>
                    <td><?= htmlspecialchars($cc['status']); ?></td>
                    <td><?= htmlspecialchars($cc['working_hours']); ?></td>
                    <td><?= htmlspecialchars($cc['overtime_hours']); ?></td>
                    <td class="text-center">
                    <a href="index.php?act=del-chamcong&attendance_id=<?= htmlspecialchars($cc['attendance_id']); ?>" 
   onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên <?= htmlspecialchars($cc['name']); ?>?');">
   <i class="ri-delete-bin-6-line"></i>
</a>

   <a href="<?= BASE_DIR ?>?act=edit-chamcong&attendance_id=<?= $cc['attendance_id']; ?>">
    <i class="ri-edit-2-line"></i>
</a>

                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>

<!-- Thêm Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>

<script src="views/chamcong/admin.js"></script>
</html>
