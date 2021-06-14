<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$cadastrar = filter_input(INPUT_POST, "cadastrar", FILTER_SANITIZE_STRING);
if ($cadastrar) {
    include("../bib_funcoes.php");
    $erros = array();
    $telefone_fixo = $_POST["telefone_fixo"];
    $celular = $_POST["celular"];
    $numero = $_POST["numero"];
    $cep = $_POST["cep"];
    $cpf_cnpj = $_POST["cpf_cnpj"];

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
    if (!is_numeric($telefone_fixo)) {
        $erros[] = "Telefone não pode conter letras";
    }
    if ((strlen($telefone_fixo)) != 10) {
        $erros[] = "Telefone deve conter 10 números";
    }
    if (!valida_cpf($cpf_cnpj)) {
        $errors[] = "CPF inválido";
    }
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<div style='color: #d32f2f; display: flex; align-items:center; margin-bottom: 12px'>
            <img src='/projeto-lab-bd/assets/icons/close.svg' alt='close' style='width: 22px; margin-right: 8px'/> $erro</div>";
        }
    } else {
        include('../connection.php');

        $nome = $_POST["nome"];
        $rg = $_POST["rg"];
        $cpf_cnpj = $_POST["cpf_cnpj"];
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
        if (mysqli_insert_id($con)) {
            print "<div style='color: #32cd32; display: flex; align-items:center; margin-bottom: 12px'>
                <img src='/projeto-lab-bd/assets/icons/check.svg' alt='check' style='width: 22px; margin-right: 8px'/> 
                Inclusão realizada com sucesso
           </div><br><a href='../main.php'>Voltar</a>";
        } else {
            print "<div style='color: #d32f2f> Ops! Algo deu errado </div>";
        }
        mysqli_close($con);
    }
}
