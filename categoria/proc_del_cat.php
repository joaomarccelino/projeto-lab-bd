<?php
session_start();
include_once("../connection.php");

$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

$verif="SELECT * FROM servicos WHERE id_categoria='$id_categoria'";
$resu= mysqli_query($con, $verif);
if (mysqli_affected_rows($con)) {
	$_SESSION['msg'] = "<p style='color:green;'>Esta categoria não pode ser excluída, pois está vinculada a um ou mais serviços.</p>";
	header("Location: consulta_cat.php");
} else {
	$result= "DELETE FROM categoria WHERE id_categoria='$id_categoria'";
	$resultado= mysqli_query($con, $result);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Categoria excluida com sucesso</p>";
		header("Location: consulta_cat.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Categoria não foi excluida</p>";
		header("Location: del_cat.php?id_categoria=$id_categoria");
	}
}


?>