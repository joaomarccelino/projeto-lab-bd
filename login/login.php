<?php 
session_start();
include("../connection.php");
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = mysqli_real_escape_string($con, $_POST["senha"]);  
$senha = md5($senha);
$tipo;

if (isset($entrar)) {
    $query="SELECT * FROM login_usuarios WHERE login = '$login' AND senha = '$senha'";
    $sql = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($sql);
    $verifica = mysqli_query($con,$query) or die("erro !!");
    if (mysqli_num_rows($verifica)<=0){
        $_SESSION['msg'] = "<p> 'Login e/ou senha incorretos'";
        header("Location:index.php");
    }else{
        $_SESSION['login'] = $login;
        $_SESSION['tipo'] = $result['tipo'];
        header("Location:../main.php");
    }
}
?>