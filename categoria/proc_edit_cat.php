<?php
session_start();
include_once("../connection.php");

$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

$result= "UPDATE categoria SET categoria='$categoria' WHERE id_categoria='$id_categoria'";
$resultado= mysqli_query($con, $result);


if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Categoria alterada com sucesso</p>";
	header("Location: consulta_cat.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Categoria não foi alterada</p>";
	header("Location: edit_cat.php?id_categoria=$id_categoria");
}
?>
