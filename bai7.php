<?php
// 1. Tạo Interface Downloadable
interface Downloadable {
    public function download();
}

// 2. Class Book (Lớp cha)
class Book {
    protected $title;
    protected $author;
    protected $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public function getInfo() {
        return "Sách: {$this->title} | Tác giả: {$this->author} | Giá: {$this->price} VNĐ";
    }
}

// 3. Class Ebook kế thừa Book và triển khai Interface Downloadable
class Ebook extends Book implements Downloadable {
    private $fileSize; // Dung lượng file (MB)

    public function __construct($title, $author, $price, $fileSize) {
        // Gọi lại constructor của lớp cha (Book)
        parent::__construct($title, $author, $price);
        $this->fileSize = $fileSize;
    }

    // Triển khai bắt buộc phương thức từ Interface Downloadable
    public function download() {
        echo "Đang tải xuống sách điện tử '{$this->title}' (Dung lượng: {$this->fileSize} MB)...<br>";
    }
}

// === CHẠY THỬ BÀI 7 ===
$ebook = new Ebook("Lập Trình PHP", "Trần Xuân Vỷ", 150000, 15);

echo $ebook->getInfo() . "<br>"; // Sử dụng lại phương thức của Book
$ebook->download();              // Gọi phương thức từ Interface
?>