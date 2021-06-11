<?php
session_start();
include_once("../connection.php");

$id_prestador = filter_input(INPUT_POST, 'id_prestador', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);


$result= "UPDATE prestadores SET nome='$nome', email='$email', logradouro='$logradouro', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep', telefone='$telefone', celular='$celular' WHERE id_prestador='$id_prestador'";
$resultado= mysqli_query($con, $result);

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Prestador alterado com sucesso</p>";
	header("Location: consulta_prest.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Prestador não foi alterado</p>";
	header("Location: edit_prest.php?id_prestador=$id_prestador");
}
?>
