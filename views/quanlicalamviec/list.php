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
                    <li><a href=""><i class="ri-group-fill"></i>Quản lí nhân sự<i class="ri-arrow-left-s-fill"></i></a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost/qlinv/?act=product"><i class="ri-arrow-drop-right-fill"></i>Danh sách nhân viên</a></li>
                            <li><a href=""><i class="ri-arrow-drop-right-fill"></i>Tạo danh sách nhân viên</a></li>
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
                        <li><i class="ri-search-line"></i></li>
                        <li><i class="ri-drag-move-line"></i></li>
                    </ul>
                </div>
                <div class="admin-content-top-right">
                    <ul>
                        <li><i class="ri-notification-3-line" number="3"></i></li>
                        <li><i class="ri-chat-3-line" number="5"></i></li>
                    </ul>
                </div>
            </div>
            <div class="admin-content-main">
                <div class="admin-content-main-title">
                    <h1><a href="http://localhost/qlinv/giaodien/main.php">Dashboard</a></h1>
                </div>
                <div class="admin-content-main-content">
                    
                <div class="container">

    <table class="table table-bordered">
         <!-- Nút xuất danh sách -->
         <a href="index.php?act=exportExcel-Work" class="btn btn-primary mb-3">Xuất danh sách</a>

        <!-- <a class="btn btn-success floating-btn" href="<?= BASE_DIR ?>?act=add">Thêm ca làm việc</a> -->
        <thead>
            <tr>
                <th>Số TT</th>
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Ngày làm việc</th>
                <th>Thứ</th>
                <th>Giờ bắt đầu</th>
                <th>Giờ kết thúc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $stt = 1;
            foreach ($data as $row) { 
                // Đảm bảo các giá trị không NULL
                $employee_id = htmlspecialchars($row['employee_id'] ?? '');
                $name = htmlspecialchars($row['name'] ?? '');
                $work_date = htmlspecialchars($row['work_date'] ?? '');
                $day_of_week = htmlspecialchars($row['day_of_week'] ?? '');
                $start_time = htmlspecialchars($row['start_time'] ?? '');
                $end_time = htmlspecialchars($row['end_time'] ?? '');
            ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $employee_id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $work_date; ?></td>
                    <td><?php echo $day_of_week; ?></td>
                    <td><?php echo $start_time; ?></td>
                    <td><?php echo $end_time; ?></td>
                    <td>
                        <a href="index.php?act=delete&employee_id=<?php echo $employee_id; ?>" 
                           class="btn btn-danger" 
                           onclick="return confirm('Bạn có chắc chắn muốn xóa ca làm việc của nhân viên này?');">
                           Xóa
                        </a>
                        <a href="#" class="btn btn-warning" 
                           data-toggle="modal" data-target="#editModal" 
                           onclick="showEditForm('<?php echo $employee_id; ?>', '<?php echo $work_date; ?>', '<?php echo $day_of_week; ?>', '<?php echo $start_time; ?>', '<?php echo $end_time; ?>')">
                           Sửa
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
     <!-- Modal Cập Nhật -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Cập nhật ca làm việc</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="?act=update"> <!-- Specify the correct action file here -->
                        <input type="hidden" id="edit_employee_id" name="employee_id">
                        <div class="form-group">
                            <label for="edit_work_date">Ngày làm việc:</label>
                            <input type="date" id="edit_work_date" name="work_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_day_of_week">Thứ:</label>
                            <select id="edit_day_of_week" name="day_of_week" class="form-control" required>
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
                            <label for="edit_start_time">Thời gian bắt đầu:</label>
                            <input type="time" id="edit_start_time" name="start_time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_end_time">Thời gian kết thúc:</label>
                            <input type="time" id="edit_end_time" name="end_time" class="form-control" required>
                        </div>
                        <button type="button" class="btn-secondary" data-dismiss="modal">Hủy</button>
                        <button name="sbm" type="submit" class="btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showEditForm(employee_id, work_date, day_of_week, start_time, end_time) {
    document.getElementById('edit_employee_id').value = employee_id;
    document.getElementById('edit_work_date').value = work_date;
    document.getElementById('edit_day_of_week').value = day_of_week;
    document.getElementById('edit_start_time').value = start_time;
    document.getElementById('edit_end_time').value = end_time;
}
</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
           
                   
<script src="views/quanlinhanvien/admin.js"></script>
</body>
</html>
