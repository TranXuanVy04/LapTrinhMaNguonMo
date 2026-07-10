<?php
class BankAccount {
    // 1. Thuộc tính (Properties)
    private $soTaiKhoan;
    private $tenChuTaiKhoan;
    private $soDu;

    // Khởi tạo đối tượng với các giá trị ban đầu
    public function __construct($soTaiKhoan, $tenChuTaiKhoan, $soDuBanDau = 0) {
        $this->soTaiKhoan = $soTaiKhoan;
        $this->tenChuTaiKhoan = $tenChuTaiKhoan;
        $this->soDu = $soDuBanDau;
    }

    // 2. Phương thức Nạp tiền
    public function napTien($soTien) {
        if ($soTien > 0) {
            $this->soDu += $soTien;
            echo "Nạp thành công " . number_format($soTien) . " VNĐ.<br>";
        } else {
            echo "Số tiền nạp phải lớn hơn 0.<br>";
        }
    }

    // 3. Phương thức Rút tiền (có kiểm tra số dư)
    public function rutTien($soTien) {
        if ($soTien <= 0) {
            echo "Số tiền rút không hợp lệ.<br>";
        } elseif ($soTien > $this->soDu) {
            echo "Giao dịch thất bại: Số dư không đủ!<br>";
        } else {
            $this->soDu -= $soTien;
            echo "Rút thành công " . number_format($soTien) . " VNĐ.<br>";
        }
    }

    // 4. Phương thức Hiển thị số dư
    public function hienThiSoDu() {
        echo "Tài khoản [{$this->soTaiKhoan}] - Chủ TK: {$this->tenChuTaiKhoan} | Số dư hiện tại: " . number_format($this->soDu) . " VNĐ<br>";
    }
}

// === CHẠY THỬ BÀI 6 ===
$myAcc = new BankAccount("123456789", "Tran Xuan Vy", 500000);

$myAcc->hienThiSoDu(); // Số dư: 500,000 VNĐ
$myAcc->napTien(200000); // Nạp thêm 200,000
$myAcc->rutTien(800000); // Thử rút quá số dư -> Thất bại
$myAcc->rutTien(300000); // Rút hợp lệ -> Thành công
$myAcc->hienThiSoDu(); // Số dư còn lại: 400,000 VNĐ
?>