<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Film</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    #video{
    z-index: 1;
     position: relative;
}

#header, #film, #footer{
     
    z-index: 2;
}

#quangcao{
    z-index: 3;
    position: a;
}

#film{
    position: absolute;
    top: 100px;
}
</style>
<body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>

    <div id="header"><?php include("header.php")?></div>
   <div id="video"> <?php include("video.php") ?> </div>
    <div id="film"><?php include("film.php")?></div>
   <div id="footer"><?php include("footer.php")?></div>

</body>
</html>
