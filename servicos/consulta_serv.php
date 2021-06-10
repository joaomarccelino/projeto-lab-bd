<?php
session_start();
include_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="/projeto-lab-bd/assets/images/favicon.png" type="image/x-icon" />

    <title> Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços</title>
</head>

<body style="background-color: #fafafa;">

    <div class="container" style="margin-top: 40px;">

        <div style="display: flex;align-items: center;justify-content: space-between">
            <h1>Serviços </h1>
            <a href="../main.html">← Voltar</a>
        </div>

        <table border="1" width="100%" class="table  table-striped" style="margin: 40px 0 60px 0; ">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Serviço</th>
                    <th>Categoria</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            $result_serv = "SELECT s.id_servico, s.servico, c.categoria FROM servicos AS s, categoria AS c WHERE s.id_categoria = c.id_categoria";
            $resultado_serv = mysqli_query($con, $result_serv);
            while ($serv = mysqli_fetch_assoc($resultado_serv)) {
                echo "<tr><td>" . $serv['id_servico'] . "</td><td> ";
                echo $serv['servico'] . "</td><td>" . $serv['categoria'] . "</td><td><a href='edit_serv.php?id_servico=" . $serv['id_servico'] . "'>Editar</a>";
                echo "<a href='del_serv.php?id_servico=" . $serv['id_servico'] . "' style='color:#d32f2f; margin-left: 24px'>Excluir </a></td></tr>";
            };
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>