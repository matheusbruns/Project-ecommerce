<?php

    include_once "../../db/connection.php";
    $id_user = (int)$_GET['iduser'];

if(isset($id_user)){
    $db_connection->exec("DELETE FROM products WHERE iduser = $id_user"); 

    header("Location: tableAdmins.php");
    echo "Deletado com sucesso";
}

?>