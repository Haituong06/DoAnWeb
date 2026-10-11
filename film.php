<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Film</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .product .link-chitiet{
    text-decoration: none;
    color:#fff;}
</style>
<body>
    
    <div class="product">  
        <?php
    include("connect.php");
        $sql = "SELECT id_sp,ten_sp, anh_sp, mota_sp FROM sanpham";

        $result = $conn->query($sql);

if ($result === false) {
    die("Lỗi SQL: " . $conn->error);
}

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
?>
   <a class="link-chitiet"
   href="chitiet.php?id_sp=<?php echo $row['id_sp']; ?>">
        
            <div class='product-image'>
                <img src= "<?php echo $row['anh_sp']?>">
        
                    <div class='product-text'>
                      <h3><?php echo $row['ten_sp']?></h3>
                    </div>
            </div>
            </a>
<?php
    }

}else{
    echo "Không có film nào";
}
?>

   
    </div>

     
</body>
</html>