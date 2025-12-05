<?php
include 'connect.php';

// Kiểm tra xem có ID không
if (!isset($_GET['id'])) {
    die("Không tìm thấy ID người dùng!");
}

$id = intval($_GET['id']);

// Lấy dữ liệu người dùng theo ID
$sql = "SELECT * FROM nguoi_dung WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Không tìm thấy người dùng!");
}

$error = "";

// Nếu submit form
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        !empty($_POST['ten_dang_nhap']) &&
        !empty($_POST['mat_khau']) &&
        !empty($_POST['ho_ten']) &&
        !empty($_POST['email']) &&
        !empty($_POST['sdt']) &&
        !empty($_POST['ngay_sinh']) &&
        !empty($_POST['vaitro'])
    ) {

        $tendangnhap = $_POST['ten_dang_nhap'];
        $matkhau = $_POST['mat_khau'];
        $hoten = $_POST['ho_ten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $ngaysinh = $_POST['ngay_sinh'];
        $vaitro = $_POST['vaitro'];

        $sql_update = "UPDATE nguoi_dung 
                       SET ten_dang_nhap=?, mat_khau=?, ho_ten=?, email=?, sdt=?, vai_tro_id=?, ngay_sinh=?
                       WHERE id=?";

        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param(
            "sssssssi",
            $tendangnhap,
            $matkhau,
            $hoten,
            $email,
            $sdt,
            $vaitro,
            $ngaysinh,
            $id
        );

        $stmt_update->execute();

        header("Location: index.php?page_layout=nguoidung");
        exit;

    } else {
        $error = "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật người dùng</title>
</head>
<body>
    <h1 style="text-align:center;">Cập nhật người dùng</h1>

    <form method="POST" action="">
        <label>Tên đăng nhập:</label><br>
        <input type="text" name="ten_dang_nhap" value="<?= $user['ten_dang_nhap'] ?>"><br><br>

        <label>Mật khẩu:</label><br>
        <input type="password" name="mat_khau" value="<?= $user['mat_khau'] ?>"><br><br>

        <label>Họ tên:</label><br>
        <input type="text" name="ho_ten" value="<?= $user['ho_ten'] ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>

        <label>Số điện thoại:</label><br>
        <input type="text" name="sdt" value="<?= $user['sdt'] ?>"><br><br>

        <label>Ngày sinh:</label><br>
        <input type="date" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?>"><br><br>

        <label>Vai trò:</label><br>
        <select name="vaitro">
            <option value="1" <?= $user['vai_tro_id'] == 1 ? "selected" : "" ?>>Admin</option>
            <option value="2" <?= $user['vai_tro_id'] == 2 ? "selected" : "" ?>>Đạo diễn</option>
            <option value="3" <?= $user['vai_tro_id'] == 3 ? "selected" : "" ?>>Diễn viên</option>
            <option value="4" <?= $user['vai_tro_id'] == 4 ? "selected" : "" ?>>Người dùng</option>
        </select>
        <br><br>

        <button type="submit">Cập nhật</button>

        <p style="color:red;"><?= $error ?></p>
    </form>

</body>
</html>
