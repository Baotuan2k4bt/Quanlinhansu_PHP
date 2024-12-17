<?php
class dontuController {
    public $Dontu;

    public function __construct() {
        require_once './models/Dontu.php'; // Đảm bảo file tồn tại
        $this->Dontu = new Dontu();

    }

    public function list() {
        // Lấy dữ liệu từ phương thức getAll() của đối tượng Dontu
        $data = $this->Dontu->getAll();

        // Bao gồm file view để hiển thị dữ liệu
        require_once './views/dontu/list-dontu.php';  // Đảm bảo đường dẫn đúng
    }
}

