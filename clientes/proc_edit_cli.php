<?php
session_start();
include_once("../connection.php");

$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$cpf_cnpj = filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$telefone_fixo = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);

$result= "UPDATE categoria SET nome='$nome', rg='$rg', cpf_cnpj='$cpf_cnpj', email='$email', logradouro='$logradouro', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep', telefone_fixo='$telefone_fixo', celular='$celular' WHERE id_cliente='$id_cliente'";
$resultado= mysqli_query($con, $result);

if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:green;'Cliente com sucesso</p>";
	header("Location: consulta_cli.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Cliente não foi alterado</p>";
	header("Location: edit_cli.php?id_cliente=$id_cliente");
}
?>
