<?php
session_start();
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];
    if ($username == "hoang" && $pass == "123456") {
        $_SESSION["taiKhoan"] = $username;
        $login_success = "Đăng nhập thành công";
    } else {
        $login_error = "Thông tin không đúng";
    }
}
if (isset($_POST["logout"])) {
    unset($_SESSION["taiKhoan"]);
    echo "Đăng xuất thành công";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <form action="" method="POST" <?php if (isset($_SESSION["taiKhoan"])) echo 'class="hidden"'; ?>>
        <label for="">Tên đăng nhập:</label>
        <input type="text" name="username" required>

        <label for="">Mật khẩu:</label>
        <input type="password" name="password" required>

        <button type="submit" name="submit">Đăng nhập</button>
    </form>
    <?php
    if (isset($login_success)) {
        echo "<p style='color: green;'>$login_success. Xin chào: $username</p>";
    } else if (isset($login_error)) {
        echo "<p style='color: red;'>$login_error</p>";
    }
    ?>
    <?php
    if (isset($_SESSION["taiKhoan"])) {
        echo '<form action="" method="POST">
        <button type="submit" name="logout">Đăng xuất</button>
        </form>';
        echo '<button><a href="list.php"><h2>Product</h2></a></button>';
        echo '<button><a href="listcate.php"><h2>Category</h2></a></button>';
    }
    ?>
</body>

</html>