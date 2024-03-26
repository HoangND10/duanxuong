<?php
require('pdo.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql_detail = "SELECT * FROM category WHERE id = '$id'";
    $stmt_detail = $connect->prepare($sql_detail);
    $stmt_detail->execute();
    $category = $stmt_detail->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST["btn-submit"])) {
    $name = $_POST["name"];

    if (empty($name)) {
        $error["name"] = "Bạn chưa nhập tên loại";
    }


    if (!$error) {
        $sql = "UPDATE category SET name = '$name' WHERE id = '$id'";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
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
        <h1>Sửa loại</h1>
        <a href="listcate.php">Về trang danh sách</a><br>
        <label for="">Tên điện thoại</label>
        <input type="text" name="name" value="<?= $category["name"] ?>">
        <span><?php echo isset($error["name"]) ? $error["name"] : ""; ?></span><br>
        <button type="submit" name="btn-submit">Sửa</button>
    </form>
</body>

</html>