<?php 
session_start();
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha_usu = MD5($_POST['senha_usu']);
include("connection.php");
if (isset($entrar)) {
    $query="SELECT * FROM login_usuarios WHERE login = '$login' AND senha = '$senha_usu'";
    $verifica = mysqli_query($con,$query) or die("erro !!");
    if (mysqli_num_rows($verifica)<=0){
        $_SESSION['msg'] = "<p> 'Login e/ou senha incorretos'";
        header("Location:tela_login.php");
    }else{
        $_SESSION['login'] = $login;
        header("Location:main.php");
    }
}
?>