<?php

    include_once "../../db/connection.php";
    $id_category = (int)$_GET['id_category'];

if(isset($id_category)){
    $db_connection->exec("DELETE FROM products WHERE id_category = $id_category"); 

    header("Location: tableCategories.php");
    echo "Deletado com sucesso";
}

?>