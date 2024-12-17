<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-header h2 {
            font-size: 22px;
            font-weight: 600;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875em;
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        .form-footer .btn {
            width: 48%;
            font-size: 16px;
            padding: 12px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        /* Nút thêm */
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        /* Nút hủy */
        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
            border: none;
        }
        .btn-danger-custom:hover {
            background-color: #c82333;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style> -->
</head>
<body>

<div class="container">
    <div class="form-header">
        <h2>Thêm Nhân Viên Mới</h2>
    </div>
    <form method="POST" enctype="multipart/form-data" id="employeeForm">
        <div class="form-group">
            <label for="employeeName">Tên Nhân Viên</label>
            <input type="text" class="form-control" name="name" id="employeeName" placeholder="Nhập tên nhân viên" required>
            <span class="error-message" id="nameError"></span>
        </div>

        <div class="form-group">
            <label for="employeeEmail">Email</label>
            <input type="email" class="form-control" name="email" id="employeeEmail" placeholder="Nhập email" required>
            <span class="error-message" id="emailError"></span>
        </div>

        <div class="form-group">
            <label for="employeePhone">Số Điện Thoại</label>
            <input type="text" class="form-control" name="phone" id="employeePhone" placeholder="Nhập số điện thoại" required>
            <span class="error-message" id="phoneError"></span>
        </div>

        <div class="form-group">
            <label for="employeePosition">Chức Vụ</label>
            <input type="text" class="form-control" name="position" id="employeePosition" placeholder="Nhập chức vụ" required>
            <span class="error-message" id="positionError"></span>
        </div>

        <div class="form-group">
            <label for="employeeAddress">Địa Chỉ</label>
            <input type="text" class="form-control" name="address" id="employeeAddress" placeholder="Nhập địa chỉ" required>
            <span class="error-message" id="addressError"></span>
        </div>

        <div class="form-group">
            <label for="employeePhoto">Ảnh Nhân Viên</label>
            <input type="file" class="form-control-file" name="image" id="employeePhoto" required>
            <span class="error-message" id="imageError"></span>
        </div>

        <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal()">Hủy</button>
                <button name="sbmt" type="submit" class="btn-primary">Thêm</button>
            </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Function to close the form and return to the previous page
    function closeForm() {
        window.history.back();
    }

    // Form validation before submission
    document.getElementById("employeeForm").addEventListener("submit", function(event) {
        let valid = true;

        // Clear previous errors
        document.querySelectorAll(".error-message").forEach(function(errorElement) {
            errorElement.innerHTML = '';
        });

        // Validate required fields
        const fields = ['name', 'email', 'phone', 'position', 'address', 'image'];
        fields.forEach(function(field) {
            let input = document.getElementById(field);
            let error = document.getElementById(field + "Error");

            if (input.value.trim() === "") {
                valid = false;
                error.innerHTML = "Trường này là bắt buộc.";
            }
        });

        // Prevent form submission if invalid
        if (!valid) {
            event.preventDefault();
        }
    });
</script>

</body>
</html>
