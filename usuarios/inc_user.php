<?php
session_start();
include('../connection.php');
$login = $_POST['login'];
$senha = mysqli_real_escape_string($con, $_POST["senha"]);  
$senha = md5($senha);
$id_cliente = $_POST['id_cliente'];
$tipo = $_POST['tipo'];
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