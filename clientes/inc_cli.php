<?php
include('../connection.php');

$nome = $_POST["nome"];
$rg = $_POST["rg"];
$cpf_cnpj = $_POST["cpf"];
$email = $_POST["email"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];
$telefone_fixo = $_POST["telefone_fixo"];
$celular = $_POST["celular"];

$query = "INSERT INTO clientes (nome, logradouro, numero, complemento, bairro, cep, cidade, estado, cpf_cnpj, rg, telefone_fixo, celular, email) VALUES ('$nome', '$logradouro', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', '$cpf_cnpj', '$rg', '$telefone_fixo', '$celular', '$email')";
$resu = mysqli_query($con, $query);
if (mysqli_insert_id($con)){
    print "<br> Inclusão realizada com sucesso";
} else {
    print "<br> Algo deu errado";
}
mysqli_close($con);

?>