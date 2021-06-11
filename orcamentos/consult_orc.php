<?php
    if (!isset($_SESSION)) session_start();
    if (!isset($_SESSION['login'])) {
        session_destroy();
        header("Location: ../login/index.php"); 
    }
    include_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />

    <title> Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços</title>
</head>

<body style="background-color: #fafafa;">

    <div class="container" style="margin-top: 40px;">

        <div style="display: flex;align-items: center;justify-content: space-between">
            <h1>Orçamentos </h1>
            <a href="../main.php">← Voltar</a>
        </div>

        <table border="1" width="100%" class="table  table-striped" style="margin: 40px 0 60px 0; ">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Data de Início</th>
                    <th>Valor</th>
                    <th>Data de Expiração</th>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Prestador</th>
                    <th>Observação</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            $result_orc = "SELECT o.id_orcamento, o.data_inicio, o.valor, o.data_expiracao, o.observacao, p.nome, s.servico, c.nome AS nome_cliente FROM orcamentos AS o, prestadores AS p, servicos AS s, clientes AS c WHERE o.id_prestador = p.id_prestador AND o.id_servico = s.id_servico AND o.id_cliente = c.id_cliente";
            $resultado_orc = mysqli_query($con, $result_orc);
            while ($orc = mysqli_fetch_assoc($resultado_orc)) {
                echo "<tr><th>" . $orc['id_orcamento'] . "</th><th> ";
                echo $orc['data_inicio'] . "</th><th>"  . $orc['valor'] . "</th><td>" . $orc['data_expiracao'] . "</td><td>";
                echo $orc['nome_cliente'] . "</td><td>" . $orc['servico'] . "</td><td>" . $orc['nome'] . "</td><td>";
                echo $orc['observacao'] . "</td><td><a href='edit_orc.php?id_orcamento=" . $orc['id_orcamento'] . "'>Editar</a>";
                echo "<a href='del_orc.php?id_orcamento=" . $orc['id_orcamento'] . "' style='color:#d32f2f; margin-left: 24px'>Excluir </a></td></tr>";
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>