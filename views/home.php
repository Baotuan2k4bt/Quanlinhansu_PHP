<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>day la trang chu</h2>
    <a href="<?php echo BASE_DIR ?>?act=product">danh sach sp</a>
    <a href="<?php echo BASE_DIR ?>?act=chamcong">danh sach chamcong</a>
    <a href="<?php echo BASE_DIR ?>?act=list">danh sach</a>
    <a href="<?php echo BASE_DIR ?>?act=luong">luong</a> -->
  

    </body>
</html> 
<!-- <?php
include_once __DIR__ . './giaodien/head.php';
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>admin</title>
    <link rel="stylesheet" href="views/quanlinhanvien/admin.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">



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
                    <li><a href="#"><i class="ri-wallet-3-line"></i> Quản lý lương <i class="ri-arrow-left-s-fill"></i></a>
    <ul class="sub-menu">
        <li><a href="#"><i class="ri-arrow-drop-right-fill"></i>Bảng tính lương</a></li>
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
    <div class="admin-content-main">
        <div class="admin-content-main-title">
            <h1>Dashboard</h1>
        </div>
        <div class="admin-content-main-content">
        <img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2017/10/Phan-mem-quan-ly-nhan-su-1.jpg" />
        </div>

</div>

        </div>
    </div>
</section>
<script src="views/quanlinhanvien/admin.js"></script>
<!-- <?php
include_once __DIR__ . './giaodien/footer.php';   
?> -->