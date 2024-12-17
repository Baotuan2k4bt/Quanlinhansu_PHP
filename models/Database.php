<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'quanlinhansu');
define('DB_USER', 'root'); // Người dùng MySQL của bạn
define('DB_PASS', ''); // Mật khẩu của người dùng MySQL
define('DB_PORT', '3306'); // Thay đổi cổng nếu cần

class Database {
    public $conn;

    public function __construct() {
        try {
            if (class_exists('PDO')) {
                $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';port=' . DB_PORT; // Tạo DSN cho PDO
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
                $this->conn = new PDO($dsn, DB_USER, DB_PASS, $options); // Lưu kết nối vào thuộc tính conn
            }
        } catch (Exception $exception) {
            echo '<div style="color:red;padding:5px 15px;border:1px solid red;">';
            echo $exception->getMessage() . '<br>'; // Hiển thị thông báo lỗi
            echo '</div>';
            die();
        }
    }

    public function getAll($sql) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return [];
        }
    }
    public function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Truy vấn thất bại: " . $e->getMessage();
            return false;
        }
    }
    public function prepare($sql) {
        return $this->conn->prepare($sql); // Trả về đối tượng PDOStatement
    }  


    public function getOne($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function execute($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}

