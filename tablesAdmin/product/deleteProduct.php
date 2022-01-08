<?php

    include_once "../../db/connection.php";
    include "../../user/security";

    $id = $_GET['id'];

    if(isset($id)){
        $db_connection->exec("DELETE FROM products WHERE category_id = :id");

        header("Location: ../tableProducts.php");
        echo "Deletado com sucesso";
    }

?>