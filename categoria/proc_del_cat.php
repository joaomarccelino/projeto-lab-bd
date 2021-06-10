<?php
session_start();
include_once("conection.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$result= "UPDATE tbespecialidade SET descricao='$nome' WHERE id='$id'";
$resultado= mysqli_query($con, $result);


if(mysqli_affected_rows($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Especialidade alterada com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Especialidade não foi alterada</p>";
	header("Location: edit_esp.php?id=$id");
}

?>
