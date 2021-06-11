<?php
session_start();
include_once("../connection.php");

$id_prestador = filter_input(INPUT_POST, 'id_prestador', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$verif="SELECT * FROM orcamentos WHERE id_prestador='$id_prestador'";
$resu= mysqli_query($con, $verif);
if (mysqli_affected_rows($con)) {
	$_SESSION['msg'] = "<p style='color:green;'>Este prestador não pode ser excluído pois está vinculada a um ou mais orçamentos.</p>";
	header("Location: consulta_cli.php");
} else {
	$result= "DELETE FROM prestadores WHERE id_prestador='$id_prestador'";
	$resultado= mysqli_query($con, $result);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Prestador excluido com sucesso</p>";
		header("Location: consulta_prest.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Prestador não foi excluido</p>";
		header("Location: del_prest.php?id_prestador=$id_prestador");
	}
}

?>