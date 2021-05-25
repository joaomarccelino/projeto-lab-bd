<?php
include('../connection.php');

$nome = $_POST["nome"];
$email = $_POST["email"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];

$query = "INSERT INTO prestadores (nome, logradouro, numero, complemento, bairro, cep, cidade, estado, telefone, celular, email) VALUES ('$nome', '$logradouro', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', '$telefone', '$celular', '$email')";
$resu = mysqli_query($con, $query);
if (mysqli_insert_id($con)){
    print "<br> Inclusão realizada com sucesso";
} else {
    print "<br> Algo deu errado";
}
mysqli_close($con);

?>