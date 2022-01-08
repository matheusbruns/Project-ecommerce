<?php

    include_once "../db/connection.php";
    include_once("../user/security/validate.php");

    $id_product = $_GET['idProduct'];
    $id_category = $_GET['idCategory'];

    $sql = "SELECT * FROM users_has_products WHERE users_iduser = :iduser AND products_category_id = :id_product";
    $stmt = $db_connection->prepare($sql);
    $stmt->bindParam(":iduser", $_SESSION['iduser']);
    $stmt->bindParam(":id_product", $id_product);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if(count($result) == 0){
        $sql = "INSERT INTO users_has_products (
            users_iduser, products_category_id, products_category_id_category) VALUES (:idUser, :idProduct, :idCategory)";

        $stm_sql = $db_connection->prepare($sql); 
        $stm_sql->bindParam(':idUser', $_SESSION['iduser']);
        $stm_sql->bindParam(':idProduct', $id_product);
        $stm_sql->bindParam(':idCategory', $id_category);

        $result = $stm_sql->execute();
        header ("Location: carrinho.php");
    }else{
        header ("Location: ../telaProduto/productScreen.php?id=" . $id_product);
    }
    

?>