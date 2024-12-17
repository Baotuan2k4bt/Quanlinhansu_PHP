<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Admin</title>
    <link rel="stylesheet" href="views/quanlinhanvien/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
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
                    <li><a href=""><i class="ri-group-fill"></i>Xem thông tin cá nhân<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="?act=showProfile"><i class="ri-arrow-drop-right-fill"></i>Thông tin cá nhân</a></li>
                            <li><a href="?act=showWorkSchedule"><i class="ri-arrow-drop-right-fill"></i>Ca làm việc</a></li>
                            <li><a href="?act=showAttendance"><i class="ri-arrow-drop-right-fill"></i>Bảng chấm công</a></li>
                            <li><a href="?act=showSalary"><i class="ri-arrow-drop-right-fill"></i>Bảng lương</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="ri-calendar-check-fill"></i>Đăng kí ca làm<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="?module=staff&&action=interface_schedule"><i class="ri-arrow-drop-right-fill"></i>Danh sách ca làm việc</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="ri-wallet-3-line"></i> Yêu cầu hỗ trợ<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="?module=staff&&action=interface_slary"><i class="ri-arrow-drop-right-fill"></i>Bảng lương </a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="ri-user-star-line"></i> Tài khoản<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="?act=login"><i class="ri-arrow-drop-right-fill"></i>Đăng xuất</a></li>
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
            //
        </div>

</div>

        </div>
    </div>
    <script src="views/quanlinhanvien/admin.js"></script>
</body>
</html>