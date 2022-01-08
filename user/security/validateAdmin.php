<?php
include_once './../db/connection.php';
session_start();
    if(!(session_status() == 2 && $_SESSION['admin'] == 1)){
        header('Location: ../index.php');
    }

?>