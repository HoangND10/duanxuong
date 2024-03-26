<?php
require('pdo.php');
$sql = "SELECT * FROM category";
$cate = $connect->query($sql)->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên Loại</th>
            <th><a href="addcate.php">Thêm</a></th>
        </tr>
        <?php foreach ($cate as $c) : ?>
            <tr>
                <td><?php echo $c["id"] ?></td>
                <td><?php echo $c["name"] ?></td>
                <td>
                    <a href="updatecate.php?id=<?php echo $c['id'] ?>">Sửa</a>
                    <a href="javascript:xoa(<?php echo $c['id'] ?>)">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button><a href="index.php">Về chọn bảng</a></button>
</body>
<script>
    function xoa(id) {
        if (confirm("Bạn có muốn xóa không ?")) {
            document.location = "deletecate.php?id=" + id;
        }
    }
</script>

</html>