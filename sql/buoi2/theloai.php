<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thể loại</h1>
    <table border = "1">
        <tr>
            <th>Tên phim</th>
            <th>Thể loại</th>
        </tr>
        <?php
        include 'connect.php';
        $sql = "SELECT ptl.*, p.ten_phim ,tl.ten_the_loai FROM phim_the_loai ptl 
JOIN phim p on ptl.phim_id=p.id
JOIN the_loai tl on ptl.the_loai_id=tl.id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)){
            ?>
        <tr>
            <td><?php echo $row["ten_phim"] ?></td>
            <td><?php echo $row["ten_the_loai"] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>