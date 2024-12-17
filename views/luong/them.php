<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới lương</title>
</head>
<body>
    <center>
        <h1>Thêm mới</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="emp" placeholder="Employee ID">
                <p><?php echo htmlspecialchars($error['employee_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <input type="date" name="mon" placeholder="Month">
                <p><?php echo htmlspecialchars($error['month'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <input type="number" name="bas" placeholder="Basic Salary">
                <p><?php echo htmlspecialchars($error['basic_salary'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <input type="number" name="hou" placeholder="Hours Worked">
                <p><?php echo htmlspecialchars($error['hours_worked'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <input type="number" name="over" placeholder="Overtime Hours">
                <p><?php echo htmlspecialchars($error['overtime_hours'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <input type="number" name="ove_pay" placeholder="Overtime Pay">
                <p><?php echo htmlspecialchars($error['overtime_pay'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <input type="number" name="tota" placeholder="Total Salary">
                <p><?php echo htmlspecialchars($error['total_salary'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <input type="date" name="paymen" placeholder="Payment Date">
                <p><?php echo htmlspecialchars($error['payment_date'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <br>
            <input type="submit" name="btnsend" value="Add">
        </form>
    </center>
    <p><?php echo htmlspecialchars($message['success'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
    <a href="<?php echo BASE_DIR; ?>?act=luong">Danh sách lương</a>
</body>
</html>
