
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #5959ed;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #4343d1;
        }

        form p {
            text-align: center;
            color: #f00;
            margin-top: -10px;
        }

        @media (max-width: 768px) {
            form {
                padding: 15px 20px;
            }

            form button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="?act=login">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" required />
        
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required />
        
        <button type="submit">Đăng nhập</button>
    </form>

    <?php
    // Hiển thị lỗi nếu có
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
</body>
</html>
