<?php
    include 'connect.php';
$thanh_cong ="";
if (isset($_POST['dangky'])) {
    $username     = trim($_POST['ten_dk']);
    $password     = trim($_POST['mk_dk']);
    $hashPassword = password_hash($password, PASSWORD_DEFAULT); 

    $sql  = "INSERT INTO dki(`ten_dk`, `mk_dk`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashPassword); 

    if ($stmt->execute()) {
         $thanh_cong = "Đăng ký thành công!";
        header("Location: dnhap.php");
    } else {
        echo "Lỗi: " . $stmt->error; 
    }

    $stmt->close();
}

$conn->close();
?>