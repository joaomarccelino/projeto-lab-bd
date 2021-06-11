<?php
session_start();
include_once("../connection.php");

$id_servico = filter_input(INPUT_POST, 'id_servico', FILTER_SANITIZE_NUMBER_INT);
$servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);

$verif="SELECT * FROM orcamentos WHERE id_servico='$id_servico'";
$resu= mysqli_query($con, $verif);
if (mysqli_affected_rows($con)) {
	$_SESSION['msg'] = "<p style='color:green;'>Este serviço não pode ser excluído, pois está vinculado a um ou mais orçamentos.</p>";
	header("Location: consulta_serv.php");
} else {
	$result= "DELETE FROM servicos WHERE id_servico='$id_servico'";
	$resultado= mysqli_query($con, $result);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Serviço excluído com sucesso</p>";
		header("Location: consulta_serv.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Serviço não foi excluida</p>";
		header("Location: del_cat.php?id_servico=$id_servico");
	}
}


?>