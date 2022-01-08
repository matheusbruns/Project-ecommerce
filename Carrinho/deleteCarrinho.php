<?php
    include_once '../db/connection.php';    
    include_once '../user/security/validate.php';

    if(isset($_GET['idProduct'])){
        echo $idProduct = $_GET['idProduct'];

        $sql = "DELETE FROM users_has_products WHERE users_iduser = :iduser AND products_category_id = :idProduct";
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':iduser', $_SESSION['iduser']);
        $stmt->bindParam(':idProduct', $idProduct);
        $stmt->execute();
    }
    header('Location: carrinho.php');


?>