<?php
    include "../../db/connection.php";

    $name        = $_POST['name'];
    $description = $_POST['desc'];
    $value       = $_POST['value-product'];
    $id_category = $_POST['categories'];
    echo $id_category;

    $image       = $_FILES['image'];
    $route       = "../imagem/image";
    move_uploaded_file($image['tmp_name'], $route . $image['name']);

    $sql = "INSERT INTO products (name, description, value, image, category_id_category, discount) VALUES (:name, :description, :value, :image, :category_id_category, :discount)";
    $number = 0;

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(":name", $name);
    $stm_sql->bindParam(":description", $description);
    $stm_sql->bindParam(":value", $value);
    $stm_sql->bindParam(":category_id_category", $id_category); 
    $stm_sql->bindParam(":image", $image['name']);
    $stm_sql->bindParam(":discount", $number);
    
    $result  = $stm_sql->execute();

    header("Location:../../tablesAdmin/tableProducts.php");
?>
