<?php
session_start();
include_once("../connection.php");

$id_servico = filter_input(INPUT_POST, 'id_servico', FILTER_SANITIZE_NUMBER_INT);
$id_prestador = filter_input(INPUT_POST, 'id_prestador', FILTER_SANITIZE_NUMBER_INT);

$result= "DELETE FROM prestadores_servicos WHERE id_servico='$id_servico' AND id_prestador='$id_prestador'";
$resultado= mysqli_query($con, $result);
if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Serviço excluído com sucesso</p>";
    header("Location: consulta.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Serviço não foi excluida</p>";
    header("Location: del_cat.php?id_servico=$id_servico&id_prestador=$id_prestador");
}
?>