<?php
session_start();
include 'connect.php';

$message = "";

if (isset($_POST['dangnhap'])) {

    $username = trim($_POST['ten_dn']);
    $password = trim($_POST['mk_dn']);

    // Kiểm tra input rỗng
    if (empty($username) || empty($password)) {
        $message = "Vui lòng nhập đầy đủ tài khoản và mật khẩu!";
    } else {
        $sql = "SELECT * FROM dki WHERE ten_dk = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi SQL: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Kiểm tra mật khẩu (dùng password_verify nếu dùng password_hash khi đăng ký)
            if (password_verify($password, $user['mk_dk'])) {
                $_SESSION['username'] = $user['ten_dk'];
                header("Location: index.php");
                exit;
            } else {
                $message = "Sai mật khẩu!";
            }
        } else {
            $message = "Tài khoản không tồn tại!";
        }

        $stmt->close();
    }
}
?>