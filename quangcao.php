<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="quangcao">
          <img src="img/11.jpg" style="width: 35%;">
          <button id="btn-close" style="cursor: pointer;">X</button>
     </div>

     <script>
          window.onload = function () {
               document.getElementById('quangcao').style.display = 'block';
          }

          document.getElementById('btn-close').addEventListener('click', function () {
               document.getElementById('quangcao').style.display = 'none';
          });

          document.getElementById('btn-show-ads').addEventListener('click', function () {
               document.getElementById('quangcao').style.display = 'block';
          });
     </script>
</body>
</html>