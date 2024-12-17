<?php
// require 'vendor/autoload.php';
class Dontu{
    public $db;
    public function __construct(){
       $this->db = new Database();
    }

    // lấy dữ liệu 2 c
    public function getAll(){
        $sql = "SELECT r.id AS request_id, e.name , r.request_type, r.request_date, r.status, r.reason FROM requests r JOIN employees e ON r.employee_id = e.employee_id;";
        $result = $this->db->getAll($sql);
        return $result;
    }
}