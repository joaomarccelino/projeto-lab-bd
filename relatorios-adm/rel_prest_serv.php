<?php
    if (!isset($_SESSION)) session_start();
    $nivel_necessario = 'adm';
    if (!isset($_SESSION['login']) OR ($_SESSION['tipo'] != $nivel_necessario)) {
        header("Location: ../main.php"); 
    }
    include_once("../connection.php");
?>