<?php
class Login {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }

    // Phương thức xác thực người dùng
    public function authenticate($username, $password) {
        $stmt = $this->db->conn->prepare("SELECT user_id, username, password, role FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra nếu user tồn tại và mật khẩu đúng (so sánh trực tiếp mật khẩu)
        if ($user && $user['password'] === $password) {
            return $user; // Xác thực thành công
        }

        return null; // Xác thực thất bại
    }
}
?>
