<?php
require('pdo.php');

$sql = "SELECT * FROM category";
$stmt_category = $connect->prepare($sql);
$stmt_category->execute();
$category = $stmt_category->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql_detail = "SELECT * FROM product WHERE id = '$id'";
    $stmt_detail = $connect->prepare($sql_detail);
    $stmt_detail->execute();
    $product = $stmt_detail->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST["btn-submit"])) {
    $name = $_POST["name"];
    $hinh = $_FILES["image"];
    $price = $_POST["price"];
    $id_cate = $_POST["id_cate"];

    if (empty($name)) {
        $error["name"] = "Bạn chưa nhập tên điện thoại";
    }

    if (!empty($_FILES["image"]["name"])) {
        $target = "img/";
        $image = $_FILES["image"]["name"];
        $target_file = $target . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    } else {
        $image = $product['image'];
    }


    if (!$error) {
        $sql = "UPDATE product SET name = '$name',image = '$image',price = '$price',id_cate = '$id_cate' WHERE id = '$id'";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
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
        <h1>Sửa điện thoại</h1>
        <a href="list.php">Về trang danh sách</a><br>
        <label for="">Tên điện thoại</label>
        <input type="text" name="name" value="<?= $product["name"] ?>">
        <span><?php echo isset($error["name"]) ? $error["name"] : ""; ?></span><br>

        <label for="">Ảnh</label>
        <input type="file" name="image" accept="image/*"><br>
        <img width="100" src="img/<?= $product["image"] ?>" alt=""><br>

        <label for="">Giá</label>
        <input type="number" name="price" value="<?= $product["price"] ?>"><br>

        <label for="">Loại điện thoại</label>
        <select name="id_cate">
            <?php foreach ($category as $phone) : ?>
                <option value="<?php echo $phone["id"] ?>" <?php echo ($phone['id'] == $product['id_cate']) ? "selected" : ""; ?>><?php echo $phone["name"] ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" name="btn-submit">Sửa</button>
    </form>
</body>

</html>