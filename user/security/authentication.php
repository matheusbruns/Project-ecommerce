<?php
    include_once '../../db/connection.php';

    $email    = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    if(!empty($email) && !empty($password)){
        $sql = "SELECT * FROM users WHERE (email = :email AND password = :password)";

        $stm_sql = $db_connection -> prepare($sql);
        $stm_sql -> bindParam(':email', $email);
        $stm_sql -> bindParam(':password', $password);

        $stm_sql->execute();
        $result = $stm_sql-> fetchAll(PDO::FETCH_ASSOC);

        if(count($result) > 0){
            session_start();
            $_SESSION['admin'] = $result[0]['admin'];  
            $_SESSION['name'] = $result[0]['name'];
            $_SESSION['iduser'] = $result[0]['iduser'];
            $_SESSION['sessionId'] = session_id();

            header('Location: ../../index.php');
        }else{
            header('Location: ../login/login.php?error=1');
        }
       
    }else{
        header('Location: ../login/login.php?error=2');
    }
?>