<?php
require('pdo.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql_delete = "DELETE FROM category WHERE id = '$id'";
    $stmt_delete = $connect->prepare($sql_delete);
    $stmt_delete->execute();

    header("Location: listcate.php");
}
