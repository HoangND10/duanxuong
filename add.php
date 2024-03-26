<?php
require('pdo.php');
$sql = "SELECT * FROM category";
$category = $connect->query($sql)->fetchAll();

$error = [];

if (isset($_POST["btn-submit"])) {
    $name = $_POST["name"];
    $hinh = $_FILES["image"];
    $price = $_POST["price"];
    $id_cate = $_POST["id_cate"];

    if (empty($name)) {
        $error["name"] = "Bạn chưa nhập tên điện thoại";
    }

    if (isset($hinh)) {
        $target = "img/";
        $image = $hinh["name"];
        $target_file = $target . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    if (!$error) {
        $sql = "INSERT INTO product VALUES (null, '$name','$image','$price','$id_cate')";
        $connect->query($sql);
        header("Location: list.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Thêm điện thoại</h1>
        <a href="list.php">Về trang danh sách</a><br>
        <label for="">Tên điện thoại</label>
        <input type="text" name="name">
        <span><?php echo isset($error["name"]) ? $error["name"] : ""; ?></span><br>

        <label for="">Ảnh</label>
        <input type="file" name="image" accept="image/*"><br>

        <label for="">Giá</label>
        <input type="number" name="price"><br>

        <label for="">Loại điện thoại</label>
        <select name="id_cate">
            <?php foreach ($category as $phone) : ?>
                <option value="<?php echo $phone["id"] ?>"><?php echo $phone["name"] ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" name="btn-submit">Thêm</button>
    </form>
</body>

</html>