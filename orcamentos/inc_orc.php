<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$cadastrar = filter_input(INPUT_POST, "cadastrar", FILTER_SANITIZE_STRING);
if ($cadastrar) {
    $erros = array();
    $valor = $_POST["valor"];

    if (!$valor = filter_input(INPUT_POST, "valor", FILTER_VALIDATE_FLOAT)) {
        $erros[] = "Valor inválido";
    }


    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<div style='color: #d32f2f; display: flex; align-items:center; margin-bottom: 12px'>
        <img src='/projeto-lab-bd/assets/icons/close.svg' alt='close' style='width: 22px; margin-right: 8px'/> $erro</div>";
        }
    } else {
        include('../connection.php');

        $data = $_POST["data"];
        $valor = $_POST["valor"];
        $id_prestador = $_POST["id_prestador"];
        $id_servico = $_POST["id_servico"];
        $id_cliente = $_POST["id_cliente"];
        $data_expiracao = $_POST["data_expiracao"];
        $observacao = $_POST["observacao"];


        $query = "INSERT INTO orcamentos (data_inicio, valor, id_prestador, id_servico, id_cliente, data_expiracao, observacao) VALUES ('$data', '$valor', '$id_prestador', '$id_servico', '$id_cliente', '$data_expiracao', '$observacao')";
        $resu = mysqli_query($con, $query);
        if (mysqli_insert_id($con)) {
            print "<div style='color: #32cd32; display: flex; align-items:center; margin-bottom: 12px'>
                <img src='/projeto-lab-bd/assets/icons/check.svg' alt='check' style='width: 22px; margin-right: 8px'/> 
                Inclusão realizada com sucesso
            </div>";
        } else {
            print "<div style='color: #d32f2f> Ops! Algo deu errado </div>";
        }
        mysqli_close($con);
    }
}
