<?php
    include "../../db/connection.php";

    $name = $_POST['nameCategory'];
    
    $image  = $_FILES['imageCategory'];
    $route = "../image/image";
    move_uploaded_file($image['tmp_name'], $route . $image['name']);

    $sql = "INSERT INTO categories (name, image) VALUES (:name, :image)";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':name', $name);
    $stm_sql->bindParam(':image', $image['name']);

    $result  = $stm_sql->execute();

    header("Location:../../index.php");
?>

