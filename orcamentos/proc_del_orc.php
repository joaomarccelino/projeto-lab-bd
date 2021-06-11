<?php
session_start();
include_once("../connection.php");

$id_orcamento = filter_input(INPUT_POST, 'id_orcamento', FILTER_SANITIZE_NUMBER_INT);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);

$result= "DELETE FROM orcamentos WHERE id_orcamento='$id_orcamento'";
$resultado= mysqli_query($con, $result);
if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Orçamento excluido com sucesso</p>";
    header("Location: consulta_orc.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Orçamento não foi excluido</p>";
    header("Location: del_orc.php?id_orcamento=$id_orcamento");
}

?>