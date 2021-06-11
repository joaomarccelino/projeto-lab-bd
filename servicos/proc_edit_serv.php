<?php
session_start();
include_once("../connection.php");

$id_servico = filter_input(INPUT_POST, 'id_servico', FILTER_SANITIZE_NUMBER_INT);
$servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);

$result= "UPDATE servicos SET servico='$servico' WHERE id_servico='$id_servico'";
$resultado= mysqli_query($con, $result);


if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Serviço alterado com sucesso</p>";
	header("Location: consulta_serv.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Serviço não foi alterado</p>";
	header("Location: edit_serv.php?id_servico=$id_servico");
}
?>
