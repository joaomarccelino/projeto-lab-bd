<?php
$nome = $_POST["nome"];
$rg = $_POST["rg"];
$cpf = $_POST["cpf"];
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


include('../connection.php');

$query = "INSERT INTO clientes (nome, rg, cpf_cnpj, email, logradouro, numero, complemento, bairro, cidade, estado, cep, telefone_fixo, celular) VALUES ('$nome', '$rg', '$cpf', '$email', '$logradouro', '$numero' '$complemento', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$celular')";
$resu = mysqli_query($con, $query);
if (mysqli_insert_id($con)){
    print "<br> Inclusão realizada com sucesso";
}
mysqli_close($con);

?>