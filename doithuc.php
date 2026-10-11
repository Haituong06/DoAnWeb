<?php
// Kết nối database
$host = "localhost";
$dbname = "anime";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<div class='error'>Kết nối thất bại: " . $e->getMessage() . "</div>");
}

// Lấy phim đời thực (loại trừ hoạt hình)
$stmt = $pdo->prepare("
    SELECT ten_sp, anh_sp, theloai_sp 
    FROM sanpham 
    WHERE LOWER(theloai_sp) NOT LIKE '%hoat hinh%'
      AND LOWER(theloai_sp) NOT LIKE '%hoạt hình%'
    ORDER BY ten_sp ASC
");
$stmt->execute();
$phims = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phim Đời Thực</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Trang Chủ</a></li>
        <li><a href="anime.php">Hoạt Hình</a></li>
        <li><a href="doithuc.php" class="active">Đời Thực</a></li>
        <li><a href="dky.php">Đăng Ký</a></li>
        <li><a href="dnhap.php">Đăng Nhập</a></li>
    </ul>
</nav>

  <?php
echo '
<video autoplay muted loop playsinline width="100%" height="900px">
    <source src="video/3.mp4" type="video/mp4">
</video>
';
?>
<div class="grid-section">
    <?php if (empty($phims)): ?>
        
    <?php else: ?>
        <div class="grid" id="movieGrid">
            <?php foreach ($phims as $i => $phim): ?>
                <div class="card" style="animation-delay: <?= $i * 0.04 ?>s"
                     data-title="<?= htmlspecialchars(strtolower($phim['ten_sp'])) ?>">

                    <div class="card-img">
                        <?php if (!empty($phim['anh_sp'])): ?>
                            <img src="<?= htmlspecialchars($phim['anh_sp']) ?>"
                                 alt="<?= htmlspecialchars($phim['ten_sp']) ?>"
                                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                            <div class="no-img" style="display:none">🎬</div>
                        <?php else: ?>
                            <div class="no-img">🎬</div>
                        <?php endif; ?>
                    </div>

                    <div class="card-body">
                        <div class="card-title"><?= htmlspecialchars($phim['ten_sp']) ?></div>
                        <div class="card-genre">
                            <span class="genre-dot"></span>
                            <?= htmlspecialchars($phim['theloai_sp'] ?: 'Đời thực') ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
   

</body>
</html>
