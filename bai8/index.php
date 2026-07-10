<?php
// 1. Đăng ký Autoloading tự động nạp file chứa class khi được gọi
spl_autoload_register(function ($class) {
    // Chuyển dấu \ trong Namespace thành đường dẫn thư mục / 
    $file = str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

// 2. Sử dụng class thông qua Namespace
use App\Students\Student;

// Tạo đối tượng sinh viên
$sv = new Student("Tran Xuan Vy", 20, "SV12345");
$sv->hienThiThongTin();
?>