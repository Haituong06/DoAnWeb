<?php
 
// kết nối MySQL
$conn = new mysqli("localhost", "root", "", "anime");

// kiểm tra kết nối

if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

 $conn->set_charset("utf8");
?>