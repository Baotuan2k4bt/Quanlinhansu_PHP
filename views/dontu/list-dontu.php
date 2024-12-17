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
        <div class="container mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Quản lý Đơn từ Yêu cầu</h1>
        <div class="flex space-x-4">
        <button >
        <i class="ri-chat-check-line"></i> <!-- Biểu tượng chuông thông báo -->
    </button>
    <button id="showUploadFormButton" class="bg-yellow-500 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-yellow-600">Tải từ form</button>
</div>
   </div>

    <!-- Form Templates Section -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
        <h2 class="text-3xl font-semibold mb-6 text-gray-700">Mẫu đơn từ</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <h3 class="text-xl font-semibold text-white">Mẫu đơn xin nghỉ phép</h3>
                <a href="https://sg.docworkspace.com/d/sIPfZytDGAcWwrboG" download class="bg-white text-blue-600 px-4 py-2 rounded mt-4 inline-block hover:bg-gray-200">Tải xuống</a>
            </div>
            <div class="bg-gradient-to-r from-green-400 to-green-600 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <h3 class="text-xl font-semibold text-white">Mẫu đơn xin tăng lương</h3>
                <a href="path/to/mau-don-xin-tang-luong.docx" download class="bg-white text-green-600 px-4 py-2 rounded mt-4 inline-block hover:bg-gray-200">Tải xuống</a>
            </div>
            <div class="bg-gradient-to-r from-red-400 to-red-600 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <h3 class="text-xl font-semibold text-white">Mẫu đơn xin chuyển công tác</h3>
                <a href="path/to/mau-don-xin-chuyen-cong-tac.docx" download class="bg-white text-red-600 px-4 py-2 rounded mt-4 inline-block hover:bg-gray-200">Tải xuống</a>
            </div>
        </div>
    </div>

    <!-- Upload Form Section (Initially hidden) -->
    <div id="uploadFormSection" class="bg-white p-8 rounded-lg shadow-lg mb-8 hidden fixed top-0 right-0 w-1/3 h-full overflow-auto z-50">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-semibold text-gray-700">Tải lên mẫu đơn từ</h2>
            <button id="closeUploadFormButton" class="text-gray-700 text-2xl font-bold">×</button>
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label for="formName" class="block text-gray-700 font-semibold">Tên mẫu đơn</label>
                <input type="text" id="formName" name="formName" class="w-full border border-gray-300 rounded px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="formFile" class="block text-gray-700 font-semibold">Chọn tệp</label>
                <input type="file" id="formFile" name="formFile" class="w-full border border-gray-300 rounded px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-green-600">Tải lên</button>
        </form>
    </div>

    <!-- Button to show form -->
      <!-- Button to show form (Top right corner) -->
  


    <!-- Received Forms Section -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
        <h2 class="text-3xl font-semibold mb-6 text-gray-700">Đơn từ đã tiếp nhận</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr class="bg-gray-200">
                    <th class="py-4 px-6 border-b text-left text-gray-700">Tên nhân viên</th>
                    <th class="py-4 px-6 border-b text-left text-gray-700">Loại đơn</th>
                    <th class="py-4 px-6 border-b text-left text-gray-700">Ngày nộp</th>
                    <th class="py-4 px-6 border-b text-left text-gray-700">Lí do</th>
                    <th class="py-4 px-6 border-b text-left text-gray-700">Trạng thái</th>
                    <th class="py-4 px-6 border-b text-left text-gray-700">Hành động</th>
                </tr>
                </thead>
                <tbody>
    <?php
    foreach ($data as $form) {
        $statusClass = $form['status'] === 'Đang xử lý' ? 'bg-yellow-500' : 'bg-green-500';
        echo "<tr>
            <td class='py-4 px-6 border-b text-gray-700'>{$form['name']}</td>
            <td class='py-4 px-6 border-b text-gray-700'>{$form['request_type']}</td>
            <td class='py-4 px-6 border-b text-gray-700'>{$form['request_date']}</td>
            <td class='py-4 px-6 border-b text-gray-700'>{$form['reason']}</td>  
            <td class='py-4 px-6 border-b text-gray-700'>
                <button class='{$statusClass} text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105' onclick='confirmStatusChange(this)'>{$form['status']}</button>
            </td>
            <td class='py-4 px-6 border-b text-gray-700'>
                <button class='bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105'>Xem</button>
                <button class='bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105'>Xóa</button>
            </td>
        </tr>";
    }
    ?>
</tbody>

    </div>
</div>

<!-- JavaScript to toggle the upload form -->
<script>
    document.getElementById("showUploadFormButton").addEventListener("click", function() {
        // Toggle the visibility of the upload form
        document.getElementById("uploadFormSection").classList.toggle("hidden");
    });

    document.getElementById("closeUploadFormButton").addEventListener("click", function() {
        // Close the upload form when the close button is clicked
        document.getElementById("uploadFormSection").classList.add("hidden");
    });
 
    function confirmStatusChange(button) {
            const currentStatus = button.innerText;
            const newStatus = currentStatus === 'Đang xử lý' ? 'Đã duyệt' : 'Đang xử lý';
            if (confirm(`Bạn có chắc chắn muốn thay đổi trạng thái thành "${newStatus}"?`)) {
                button.innerText = newStatus;
                button.classList.toggle('bg-yellow-500');
                button.classList.toggle('bg-green-500');
            }
        }

</script>

</section>
</body>
<script src="views/quanlinhanvien/admin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</html>
