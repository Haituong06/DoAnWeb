
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

<!DOCTYPE html>
<html>
<head>
    <title>Web Film</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<style>
    
.form-container{

    height: 100vh;

    display: flex;

    justify-content: center;
    align-items: center;
}

form{

    background: #1f1f1f;

    padding: 40px;

    width: 350px;

    border-radius: 10px;
}

form h1{

    text-align: center;

    margin-bottom: 20px;
}

form input{

    width: 100%;

    padding: 12px;

    margin-bottom: 15px;

    border: none;

    outline: none;

    border-radius: 5px;
}

form button{

    width: 100%;

    padding: 12px;

    border: none;

    background: red;

    color: white;

    font-size: 16px;

    border-radius: 5px;

    cursor: pointer;
}

form button:hover{

    background: darkred;
}

form a{

    color: white;

    display: block;

    text-align: center;

    margin-top: 15px;
}

input[type='submit'] {
    background-color: rgb(86, 255, 2) ;;
        color:#fff;

}
input[type='submit']:hover, input[type='submit']:active {
    background-color:rgba(58, 140, 18, 0.75) ;
        color:#fff;

}
</style>
<div class="form-container">

    <form method="POST" action="">

        <h1>Đăng Nhập</h1>

        <input type="text"
               name="ten_dn"
               placeholder="Tên đăng nhập"
               value="<?= isset($_POST['ten_dn']) ? htmlspecialchars($_POST['ten_dn']) : '' ?>"
               required>

        <input type="password"
               name="mk_dn"
               placeholder="Mật khẩu"
               required>

        <input type="submit" name="dangnhap" value="Đăng Nhập">
            
        <a href="dky.php">
            Chưa có tài khoản? Đăng ký
        </a>

    </form>
     <?php if (!empty($message)): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

</div>
</body>
</html>