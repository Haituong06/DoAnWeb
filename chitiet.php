<?php
// Kết nối MySQL
$conn = new mysqli("localhost", "root", "", "anime");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

$id = $_GET['id_sp'];
$sql = "SELECT * FROM sanpham WHERE id_sp = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['ten_sp']; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #0d0d0d;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            margin: 160px auto;
            padding: 0 20px;
            display: flex;
            gap: 40px;
            align-items: center;
        }

        /* ẢNH */
        .gallery {
            flex-shrink: 0;
        }

        .main-image img {
            width: 280px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
            display: block;
        }

        /* THÔNG TIN */
        .info {
            flex: 1;
        }

        .info h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ffffff;
            line-height: 1.3;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .item span {
            font-size: 13px;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .item strong {
            font-size: 15px;
            color: #eee;
            font-weight: 400;
            line-height: 1.6;
        }

        /* NÚT QUAY LẠI */
        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 22px;
            background: #e50914;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s;
        }

        .back-btn:hover {
            background: #b0060f;
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
                margin: 30px auto;
            }

            .main-image img {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <!-- ẢNH -->
    <div class="gallery">
        <div class="main-image">
            <img id="mainImg" src="<?php echo $row['anh_sp']; ?>" alt="<?php echo $row['ten_sp']; ?>">
        </div>
    </div>

    <!-- THÔNG TIN -->
    <div class="info">
        <h1><?php echo $row['ten_sp']; ?></h1>

        <div class="info-list">
            <div class="item">
                <span>Giới thiệu</span>
                <strong><?php echo $row['mota_sp']; ?></strong>
            </div>
        </div>

        <a href="javascript:history.back()" class="back-btn">← Quay lại</a>
    </div>

</div>

</body>
</html>