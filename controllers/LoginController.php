<?php
class LoginController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Gọi model để xác thực người dùng
            $loginModel = new Login();
            $user = $loginModel->authenticate($username, $password);

            if ($user) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user'] = [
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                ];

                // Lấy đường dẫn gốc
                $baseURL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
                error_log("Base URL: $baseURL");
                
                // Điều hướng dựa trên vai trò
                if ($user['role'] === 'admin') {
                    header("Location: $baseURL/?act=home");
                } else {
                    header("Location: $baseURL/?act=home_user");
                }
                exit;
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu sai!";
                require_once './views/login/login.php';
                return;
            }
        }

        // Nếu không phải POST, hiển thị form đăng nhập
        require_once './views/login/login.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header("Location: /?act=login");
        exit;
    }
}
?>
