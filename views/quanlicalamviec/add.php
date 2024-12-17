<!-- Modal: Thêm Ca Làm Việc -->
<?php
// Khởi tạo đối tượng Database
$db = new Database();
?><?php
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
                          
                            <li><a href=""><i class="ri-arrow-drop-right-fill"></i>Tạo tài khoản nhân viên</a></li>
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
            <h1><a href="http://localhost/qlinv/giaodien/main.php">Dashboard</a></h1>
        </div>
        <div class="admin-content-main-content">
        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Thêm Ca Làm Việc</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="employee_id">Mã nhân viên:</label>
                                <select class="form-control" id="employee_id" name="employee_id" required>
                                    <option value="">Chọn nhân viên</option>
                                    <!-- PHP code to fetch employee list -->
                                    <?php
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
                            <div class="form-group">
                                <label for="work_date">Ngày làm việc:</label>
                                <input type="date" class="form-control" id="work_date" name="work_date" required>
                            </div>
                            <div class="form-group">
                                <label for="day_of_week">Thứ:</label>
                                <select class="form-control" id="day_of_week" name="day_of_week" required>
                                    <option value="">Chọn thứ</option>
                                    <option value="Monday">Thứ Hai</option>
                                    <option value="Tuesday">Thứ Ba</option>
                                    <option value="Wednesday">Thứ Tư</option>
                                    <option value="Thursday">Thứ Năm</option>
                                    <option value="Friday">Thứ Sáu</option>
                                    <option value="Saturday">Thứ Bảy</option>
                                    <option value="Sunday">Chủ Nhật</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_start_time">Giờ bắt đầu:</label>
                                <input type="time" id="edit_start_time" name="start_time" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_end_time">Giờ kết thúc:</label>
                                <input type="time" id="edit_end_time" name="end_time" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button name="sbm" type="submit" class="btn btn-primary">Thêm ca làm việc</button>
                                <a href="index.php?act=list" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script src="views/chamcong/admin.js"></script>
</html>
