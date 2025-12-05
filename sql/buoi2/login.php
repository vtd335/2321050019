<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method ="post">
        <h1>Đăng nhập</h1>
        <div>
            <input type="text" name ="username" placeholder="Tên đăng nhập" >
        </div>
        <div>
            <input type="password" name ="password" placeholder="Mật khẩu" >
        </div>
        <div>
            <input type="submit" value ="Đăng nhập">
        </div>
</form>
<?php
include('connect.php');
if(isset($_POST['username']) && isset($_POST['password'])){
    $tenDangNhap = $_POST['username'];
    $matKhau = $_POST['password'];

    $sql = "select * from nguoi_dung where ten_dang_nhap ='$tenDangNhap' and mat_khau = '$matKhau'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0) {
        session_start();
        $_SESSION['username'] = $tenDangNhap;
        header('location: trangchu.php');
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng";
    }

    //if ($tenDangNhap == "admin" && $matKhau == "123"){
      //  session_start();
        //$_SESSION['username'] = $tenDangNhap;
        //header('location: trangchu.php');
    //}
    //else{
      //  echo "Tên đăng nhập hoặc mật khẩu không đúng";
    //}
}

    //nếu tên đăng nhập = admin và mật khẩu = 123 thì cho phép người dùng vào trang chủ

    ?>
</body>
</html>