<?php
session_start();
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$id_cliente = $_POST['id_cliente'];
$tipo = $_POST['tipo'];
include('../connection.php');
$query_select = "SELECT login FROM login_usuarios WHERE login = '$login'";
$select = mysqli_query($con,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];

    if($login == "" || $login == null){
        $_SESSION['msg'] = "<p> O campo login deve ser preenchido</p>";
        header("Location:cad_user.php");
    }else{
        if($logarray == $login) {
            $_SESSION['msg'] = "<p>Esse login já existe";
            header("Location:cad_user.php");
        }else{
            $query = "INSERT INTO login_usuarios (login, senha, id_cliente, tipo) VALUES ('$login','$senha', '$id_cliente', '$tipo')";
            $insert = mysqli_query($con,$query);
            if($insert) {
                $_SESSION['msg'] = "<p> Usuário cadastro com sucesso !";
                header("Location:cad_user.php");
            }else{
                $_SESSION['msg'] = "<p> Não foi possível cadastrar esse usuário!";
                header("Location:cad_user.php");
            }
        }
    }
?>