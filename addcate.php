<?php
require('pdo.php');
$error = [];

if (isset($_POST["btn-submit"])) {
    $name = $_POST["name"];

    if (empty($name)) {
        $error["name"] = "Bạn chưa nhập tên loại";
    }

    if (!$error) {
        $sql = "INSERT INTO category VALUES (null, '$name')";
        $connect->query($sql);
        header("Location: listcate.php");
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
        <h1>Thêm loại</h1>
        <a href="listcate.php">Về trang danh sách</a><br>
        <label for="">Tên loại</label>
        <input type="text" name="name">
        <span><?php echo isset($error["name"]) ? $error["name"] : ""; ?></span><br>
        <button type="submit" name="btn-submit">Thêm</button>
    </form>
</body>

</html>