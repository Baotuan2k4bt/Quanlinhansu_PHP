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
    <link rel="stylesheet" href="views/quanlinhanvien/admin.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


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
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($error as $message): ?>
                    <li><?php echo htmlspecialchars($message); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">

        <!-- Thanh tìm kiếm -->
        <form class="form-inline my-2 my-lg-0 d-flex align-items-center" method="GET" action="index.php?act=search">
            <div class="input-group">
                <input type="text" name="searchKeyword" class="form-control form-control-sm" placeholder="Nhập mã nhân viên hoặc tên" aria-label="Tìm kiếm">
                <button type="submit" class="btn btn-outline-primary btn-sm ml-2">
                    <i class="bi bi-search"></i> Tìm kiếm
                </button>
            </div>
        </form>

        <!-- Các nút chức năng -->
        <div class="d-flex align-items-center ml-auto">
            <!-- Thêm nhân viên -->
            <a href="#" class="btn btn-success btn-sm mx-2" data-toggle="modal" data-target="#addEmployeeModal">
                <i class="bi bi-person-plus-fill"></i> Thêm nhân viên
            </a>

            <!-- Xuất Excel -->
            <a href="index.php?act=exportExcel" class="btn btn-info btn-sm mx-2">
                <i class="bi bi-file-earmark-excel-fill"></i> Xuất Excel
            </a>

              <!-- Nhập dữ liệu từ file Excel -->
              <form action="index.php?act=importExcel" method="post" enctype="multipart/form-data" class="d-flex align-items-center ml-2">
                <input type="file" name="excelFile" id="excelFile"  required>
                <button type="submit" class="btn btn-primary btn-sm ml-2">
                    <i class="fas fa-upload"></i>
                </button>
            </form>
        </div>

    </div>
</nav>

       <!-- Danh sách nhân viên -->
<div class="table-responsive mt-4">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Mã nhân viên</th>
                <th>Họ tên</th>
                <th>Ảnh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data) && is_array($data)): ?>  
                <?php foreach ($data as $pro): ?>
                    <tr>
                        <td><?php echo $pro['employee_id']; ?></td>
                        <td><?php echo $pro['name']; ?></td>
                        <td><img src="uploads/<?php echo $pro['image']; ?>" alt="Image" width="75" height="75"></td>
                        <td><?php echo $pro['email']; ?></td>
                        <td><?php echo $pro['phone']; ?></td>
                        <td><?php echo $pro['address']; ?></td>
                        <td><?php echo $pro['position']; ?></td>
                <td>
                    <a href="index.php?act=del-product&employee_id=<?php echo $pro['employee_id']; ?>" 
                       onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên <?php echo $pro['name']; ?>?');" 
                       class="btn btn-danger btn-sm">
                       Xóa
                    </a>
           
            
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editEmployeeModal" 
   onclick="showEditForm(<?php echo $pro['employee_id']; ?>, '<?php echo addslashes(htmlspecialchars($pro['name'])); ?>', 
                         '<?php echo addslashes(htmlspecialchars($pro['image'])); ?>', 
                         '<?php echo addslashes(htmlspecialchars($pro['email'])); ?>', 
                         '<?php echo addslashes(htmlspecialchars($pro['phone'])); ?>', 
                         '<?php echo addslashes(htmlspecialchars($pro['address'])); ?>', 
                         '<?php echo addslashes(htmlspecialchars($pro['position'])); ?>')">Sửa</a>

            </td>
                
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8">Không có dữ liệu nhân viên.</td>
        </tr>
    <?php endif; ?>
</tbody>
</table>
    <!-- Modal thêm nhân viên -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Thêm Nhân Viên Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form  method="POST" action="index.php?act=add-product" enctype="multipart/form-data" id="employeeForm">
                        <div class="form-group">
                            <label for="employeeName">Tên Nhân Viên</label>
                            <input type="text" class="form-control" name="name" id="employeeName" placeholder="Nhập tên nhân viên" required>
                        </div>
                        <div class="form-group">
                            <label for="employeePhoto">Ảnh Nhân Viên</label>
                            <input type="file" class="form-control-file" name="image" id="employeePhoto" required>
                        </div>
                        <div class="form-group">
                            <label for="employeeEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="employeeEmail" placeholder="Nhập email" required>
                        </div>

                        <div class="form-group">
                            <label for="employeePhone">Số Điện Thoại</label>
                            <input type="text" class="form-control" name="phone" id="employeePhone" placeholder="Nhập số điện thoại" required>
                        </div>

                       

                        <div class="form-group">
                            <label for="employeeAddress">Địa Chỉ</label>
                            <input type="text" class="form-control" name="address" id="employeeAddress" placeholder="Nhập địa chỉ" required>
                        </div>
                        <div class="form-group">
                            <label for="employeePosition">Chức Vụ</label>
                            <input type="text" class="form-control" name="position" id="employeePosition" placeholder="Nhập chức vụ" required>
                        </div>

                        
                        <button type="button" class="btn-secondary" onclick="closeModal()">Hủy</button>
                      <button name="sbmt" type="submit" class="btn-primary">Thêm</button>
                            </div>
                    </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Modal sửa thông tin nhân viên -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel">Cập Nhật Thông Tin Nhân Viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form chỉnh sửa thông tin nhân viên -->
                <form method="POST" action="index.php?act=edit-product" enctype="multipart/form-data" id="editEmployeeForm">
                    <input type="hidden" name="employee_id" id="edit_employee_id"> <!-- Giấu mã nhân viên -->
                    <div class="form-group">
                        <label for="edit_employeeName">Tên Nhân Viên</label>
                        <input type="text" class="form-control" name="name" id="edit_employeeName" placeholder="Nhập tên nhân viên" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_employeePhoto">Ảnh Nhân Viên</label>
                        <input type="file" class="form-control-file" name="image" id="edit_employeePhoto">
                        <div id="currentPhoto">
                            <img id="currentImage" src="" width="100" alt="Current Photo" style="display:none;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_employeeEmail">Email</label>
                        <input type="email" class="form-control" name="email" id="edit_employeeEmail" placeholder="Nhập email" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_employeePhone">Số Điện Thoại</label>
                        <input type="text" class="form-control" name="phone" id="edit_employeePhone" placeholder="Nhập số điện thoại" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_employeeAddress">Địa Chỉ</label>
                        <input type="text" class="form-control" name="address" id="edit_employeeAddress" placeholder="Nhập địa chỉ" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_employeePosition">Chức Vụ</label>
                        <input type="text" class="form-control" name="position" id="edit_employeePosition" placeholder="Nhập chức vụ" required>
                    </div>

                    <button type="button" class="btn-secondary" onclick="closeModal()">Hủy</button>
                    <button name="sbmt" type="submit" class="btn-primary">Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showEditForm(employee_id, name, image, email, phone, address, position) {
    // Gán giá trị vào các input
    document.getElementById('edit_employee_id').value = employee_id;
    document.getElementById('edit_employeeName').value = name;
    document.getElementById('edit_employeeEmail').value = email;
    document.getElementById('edit_employeePhone').value = phone;
    document.getElementById('edit_employeeAddress').value = address;
    document.getElementById('edit_employeePosition').value = position;

    // Hiển thị ảnh hiện tại
    const currentImage = document.getElementById('currentImage');
    if (image) {
        currentImage.src = 'uploads/' + image; // Đặt đường dẫn ảnh chính xác
        currentImage.style.display = 'block'; // Hiển thị ảnh
    } else {
        currentImage.style.display = 'none'; // Ẩn nếu không có ảnh
    }

    // Mở modal
    $('#editEmployeeModal').modal('show');
}

function closeModal() {
    $('#editEmployeeModal').modal('hide');
}

</script>
<!-- Bootstrap JS and dependencies -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
           
                   
</section>
</body>
<script src="views/quanlinhanvien/admin.js"></script>
</html>
