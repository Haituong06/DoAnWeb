<?
$trangchu = "index";

switch ($trangchu) {
  case "index":
    include("index.php");
    break;
  case "anime":
    include("anime.php");
    break;
  case "doithuc":
    include("doithuc.php");
    break;
  case "dky":
    include("dky.php");
    break;
  case "dnhap":
    include("dnhap.php");
    break;
  
  default:
    echo "Giỡn mặt hả!";
}
?>