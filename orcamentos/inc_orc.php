<?php
include('../connection.php');

$data_inicio = $_POST["data_inicio"];
$valor = $_POST["valor"];
$id_prestador = $_POST["id_prestador"];
$id_servico = $_POST["id_servico"];
$id_cliente = $_POST["id_cliente"];
$data_expiracao = $_POST["data_expiracao"];
$observacao = $_POST["observacao"];


$query = "INSERT INTO orcamentos (data_inicio, valor, id_prestador, id_servico, id_cliente, data_expiracao, observacao) VALUES ('$data_inicio', '$valor', '$id_prestador', '$id_servico', '$id_cliente', '$data_expiracao', '$observacao')";
$resu = mysqli_query($con, $query);
if (mysqli_insert_id($con)){
    print "<br> Inclusão realizada com sucesso";
} else {
    print "<br> Algo deu errado";
}
mysqli_close($con);

?>