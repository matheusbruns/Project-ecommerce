<?php
include_once '../db/connection.php';    
include_once '../user/security/validate.php';

$sql = "DELETE FROM users_has_products WHERE users_iduser = :iduser";
$stmt = $db_connection->prepare($sql);
$stmt->bindParam(':iduser', $_SESSION['iduser']);
$stmt->execute();

header('Location: carrinho.php');
?>