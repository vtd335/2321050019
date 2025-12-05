<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font_family: Arial, sans-serif;
            width: 80%;
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse
        }
    </style>
</head>
<body>
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Thông tin người dùng</h1>
        <div>
            <a class="btnthem" href="index.php?page_layout=themnguoidung" >Thêm người dùng</a>
        </div>
    </div>
 <table border = "1">
    <tr>
        <th>tên đăng nhập</th>
        <th>họ tên</th>
        <th>email</th>
        <th>số điện thoại</th>
        <th>vai trò</th>
        <th>ngày sinh</th>
    </tr>
    <?php
    include 'connect.php';
    $sql = "SELECT nd.*, vt.ten_vai_tro
FROM nguoi_dung nd
JOIN vai_tro vt ON nd.vai_tro_id = vt.id
";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)){
        ?>
    <tr>
        <td><?php echo $row["ten_dang_nhap"] ?></td>
        <td><?php echo $row["ho_ten"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["sdt"] ?></td>
        <td><?php echo $row["ten_vai_tro"] ?></td>
        <td><?php echo $row["ngay_sinh"] ?></td>
        <td>
            <a class="btnsua" href="capnhatnguoidung.php?id=<?php echo $row['id']?>">Cập nhật</a>
            <a class="btnsua" href="xoanguoidung.php?id=<?php echo $row['id']?>">Xóa</a>
        </td>
    </tr>
    <?php } ?>
 </table>
</body>
</html>