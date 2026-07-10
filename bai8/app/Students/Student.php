<?php
namespace App\Students;

class Student extends Person {
    private $studentID;

    public function __construct($name, $age, $studentID) {
        parent::__construct($name, $age);
        $this->studentID = $studentID;
    }

    public function hienThiThongTin() {
        echo "MSSV: {$this->studentID} | Họ tên: {$this->name} | Tuổi: {$this->age}<br>";
    }
}
?>