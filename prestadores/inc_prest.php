<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$cadastrar = filter_input(INPUT_POST, "cadastrar", FILTER_SANITIZE_STRING);
if ($cadastrar) {
    include("../bib_funcoes.php");
    $erros = array();
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $numero = $_POST["numero"];
    $cep = $_POST["cep"];

    if (!is_numeric($numero)) {
        $erros[] = "Número não pode conter letras";
    }
    if (!is_numeric($cep)) {
        $erros[] = "CEP não pode conter letras";
    }
    if ((strlen($cep)) != 8) {
        $erros[] = "CEP deve conter 8 números";
    }
    if (!is_numeric($celular)) {
        $erros[] = "Celular não pode conter letras";
    }
    if ((strlen($celular)) != 11) {
        $erros[] = "Celular deve conter 11 números";
    }
    if (!is_numeric($telefone)) {
        $erros[] = "Telefone não pode conter letras";
    }
    if ((strlen($telefone)) != 10) {
        $erros[] = "Telefone deve conter 10 números";
    }
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<div style='color: #d32f2f; display: flex; align-items:center; margin-bottom: 12px'>
            <img src='/projeto-lab-bd/assets/icons/close.svg' alt='close' style='width: 22px; margin-right: 8px'/> $erro</div>";
        }
    }
} else {
    include('../connection.php');
    $erros = array();
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $logradouro = $_POST["logradouro"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $numero = $_POST["numero"];
    $cep = $_POST["cep"];

    $query = "INSERT INTO prestadores (nome, logradouro, numero, complemento, bairro, cep, cidade, estado, telefone, celular, email) VALUES ('$nome', '$logradouro', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado', '$telefone', '$celular', '$email')";
    $resu = mysqli_query($con, $query);
    if (mysqli_insert_id($con)) {
        print "<div style='color: #32cd32; display: flex; align-items:center; margin-bottom: 12px'>
        <img src='/projeto-lab-bd/assets/icons/check.svg' alt='close' style='width: 22px; margin-right: 8px'/> Inclusão realizada com sucesso</div>";
    } else {
        print "<div style='color: #d32f2f> Ops! Algo deu errado </div>";
    }
    mysqli_close($con);
}
