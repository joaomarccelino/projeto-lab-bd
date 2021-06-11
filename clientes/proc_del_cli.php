<?php
session_start();
include_once("../connection.php");

$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$verif="SELECT * FROM orcamentos WHERE id_cliente='$id_cliente'";
$resu= mysqli_query($con, $verif);
if (mysqli_affected_rows($con)) {
	$_SESSION['msg'] = "<p style='color:green;'>Este cliente não pode ser excluído pois está vinculada a um ou mais orçamentos.</p>";
	header("Location: consulta_cli.php");
} else {
	$result= "DELETE FROM clientes WHERE id_cliente='$id_cliente'";
	$resultado= mysqli_query($con, $result);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Cliente excluido com sucesso</p>";
		header("Location: consulta_cli.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Cliente não foi excluido</p>";
		header("Location: del_cli.php?id_cliente=$id_cliente");
	}
}

?>