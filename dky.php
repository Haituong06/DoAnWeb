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
#btn{
    background-color:red;
    color:#fff;
}

#btn:hover, #btn:active{
    background-color:rgb(246, 91, 91)
}
</style>


<div class="form-container">

    <form method="POST" action="xldky.php">

        <h1>Đăng Ký</h1>

        <input type="text"
               name="ten_dk"
               placeholder="Tên đăng ký"
               required>

        <input type="password"
               name="mk_dk"
               placeholder="Mật khẩu"
               required>

        <input type="submit" name="dangky" value="Đăng Ký" id="btn">

        <a href="dnhap.php">
            Đã có tài khoản? Đăng nhập
        </a>

    </form>

</div>  
</body>
</html>