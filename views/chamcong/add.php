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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->

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
        <div class="admin-content">
        <style>
        /* Tổng thể */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .admin-content-main-content {
            padding: 30px;
            max-width: 1200px;
            margin: 20px auto;
        }

        /* Card thiết kế */
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 15px;
            border-bottom: none;
        }

        .card-body {
            padding: 30px;
        }

        /* Form */
        .form-group label {
            font-weight: 600;
            font-size: 1rem;
            color: #495057;
        }

        .form-control {
            height: 45px;
            font-size: 0.9rem;
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        /* Nút hành động */
        .btn {
            padding: 10px 20px;
            font-size: 0.9rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Alert */
        .alert {
            font-size: 0.875rem;
            margin-bottom: 20px;
        }
    </style>
        <div class="card">
            <div class="card-header">Thêm Chấm Công</div>
            <div class="card-body">
                <!-- Hiển thị thông báo lỗi hoặc thành công -->
                <?php if (isset($error) && $error): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($success) && $success): ?>
                    <div class="alert alert-success">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>

                <!-- Form thêm chấm công -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="attendance_id">Mã chấm công</label>
                        <input type="text" class="form-control" id="attendance_id" name="attendance_id" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_id">Mã nhân viên</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Chọn nhân viên</option>
                            <?php
                            $sql = "SELECT * FROM employees";
                            $query = $db->conn->query($sql);
                            if ($query) {
                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . htmlspecialchars($row["employee_id"]) . '">' . htmlspecialchars($row["name"]) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Ngày Làm Việc</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="clock_in">Giờ Vào</label>
                        <input type="time" class="form-control" id="clock_in" name="clock_in" required>
                    </div>
                    <div class="form-group">
                        <label for="clock_out">Giờ Ra</label>
                        <input type="time" class="form-control" id="clock_out" name="clock_out" required>
                    </div>
                    <button type="submit" name="sbm" class="btn btn-primary">Lưu Chấm Công</button>
                    <a href="?act=chamcong" class="btn btn-secondary">Trở lại danh sách</a>
                </form>
            </div>
        </div>
    </div>
</section>

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script src="views/chamcong/admin.js"></script>
</html>
