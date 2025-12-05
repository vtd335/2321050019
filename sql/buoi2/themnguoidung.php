<?php
include 'connect.php';
    if (!empty($_POST['ten_dang_nhap']) &&
    !empty($_POST['mat_khau']) &&
    !empty($_POST['ho_ten']) &&
    !empty($_POST['email']) &&
    !empty($_POST['sdt']) &&
    !empty($_POST['ngay_sinh']) &&
    !empty($_POST['vaitro']))
    {
    $tendangnhap = $_POST['ten_dang_nhap'];
    $matkhau = $_POST['mat_khau'];
    $hoten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $ngaysinh = $_POST['ngay_sinh'];
    $vaitro = $_POST['vaitro'];
    $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, ho_ten, email, sdt, vai_tro_id, ngay_sinh)
            VALUES ('$tendangnhap', '$matkhau', '$hoten', '$email', '$sdt', '$vaitro', '$ngaysinh')";
    echo $sql;
    mysqli_query($conn, $sql);
    header('location: index.php?page_layout=nguoidung');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        h1{
            text-align: center;
        }
        form {
            width: 400px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>thêm người dùng</h1>
    <form action="index.php?page_layout=themnguoidung" method ="post">
        
        <div>
            <p style= "font-weight: bold;">Đăng nhập</p>
            <input type="text" name ="ten_dang_nhap" placeholder="Tên đăng nhập" >
        </div>
        <div>
            <p style= "font-weight: bold;">mật khẩu</p>
            <input type="password" name ="mat_khau" placeholder="Mật khẩu" >
        </div>
        <div>
            <p style= "font-weight: bold;">Họ tên</p>
            <input type="text" name ="ho_ten" placeholder="Họ tên" >
        </div>
        <div>
            <p style= "font-weight: bold;">Email</p>
            <input type="email" name ="email" placeholder="Email" >
        </div>
        <div>
            <p style= "font-weight: bold;">Số điện thoại</p>
            <input type="text" name ="sdt" placeholder="số điện thoại" >
        </div>
        <div>
            <p style= "font-weight: bold;">Ngày sinh</p>
            <input type="date" name ="ngay_sinh" placeholder="ngày sinh" >
        </div>
        <div style= "margin-bottom: 15px;">
            <p style:= "font-weight: bold;">vai trò</p>
            <select name="vaitro">
                <option value="1">admin</option>
                <option value="2">đạo diễn</option>
                <option value="3">diễn viên</option>
                <option value="4">người dùng</option>
            </select>
        </div>
        <div style= "text-align: center; margin-top:20px; ">
            <input style:="width: 30px;" type="submit" value ="Thêm mới">
        </div>
</form>

</body>
</html>