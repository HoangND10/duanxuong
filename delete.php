<?php
require('pdo.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql_delete = "DELETE FROM product WHERE id = '$id'";
    $stmt_delete = $connect->prepare($sql_delete);
    $stmt_delete->execute();

    header("Location: list.php");
}
