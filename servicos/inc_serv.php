<?php
$servico = $_POST["servico"];
$id_categoria = $_POST["id_categoria"];
include('../connection.php');

$query = "INSERT INTO servicos (servico, id_categoria) VALUES ('$servico', '$id_categoria')";
$resu = mysqli_query($con, $query);
if (mysqli_insert_id($con)){
    print "<br> Inclusão realizada com sucesso";
}
mysqli_close($con);

?>