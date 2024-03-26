<?php
require('pdo.php');
$sql = "SELECT product.*, category.name AS name1
    FROM product
    INNER JOIN category ON product.id_cate = category.id
    WHERE 1
";
$phones = $connect->query($sql)->fetchAll();

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
            <th>Tên điện thoại</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Loại</th>
            <th><a href="add.php">Thêm</a></th>
        </tr>
        <?php foreach ($phones as $phone) : ?>
            <tr>
                <td><?php echo $phone["id"] ?></td>
                <td><?php echo $phone["name"] ?></td>
                <td><img width="100px" src="img/<?php echo $phone["image"] ?>" alt=""></td>
                <td><?php echo $phone["price"] ?></td>
                <td><?php echo $phone["name1"] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $phone['id'] ?>">Sửa</a>
                    <a href="javascript:xoa(<?php echo $phone['id'] ?>)">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button><a href="index.php">Về chọn bảng</a></button>
</body>
<script>
    function xoa(id) {
        if (confirm("Bạn có muốn xóa không ?")) {
            document.location = "delete.php?id=" + id;
        }
    }
</script>

</html>