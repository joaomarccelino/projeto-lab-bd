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
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />

    <title>Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços</title>
</head>

<body style="background-color: #fafafa;">
    <div class="container" style="margin-top: 40px;">
        <div style="display: flex;align-items: center;justify-content: space-between">
            <h1>Prestadores </h1>
            <a href="../main.html">← Voltar</a>
        </div>
        <table border="1" width="100%" class="table  table-striped" style="margin: 40px 0 60px 0; ">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nome</th>
                    <th>Logradouro</th>
                    <th>Nº</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            $result_prest = "SELECT * FROM prestadores";
            $resultado_prest = mysqli_query($con, $result_prest);
            while ($prest = mysqli_fetch_assoc($resultado_prest)) {
                echo "<tr><th>" . $prest['id_prestador'] . "</th><td> ";
                echo $prest['nome'] . "</td><td>"  . $prest['logradouro'] . "</td><td>" . $prest['numero'] . "</td><td>";
                echo $prest['complemento'] . "</td><td>" . $prest['bairro'] . "</td><td>" . $prest['cep'] . "</td><td>";
                echo $prest['cidade'] . "</td><td>" . $prest['estado'] . "</td><td>" . $prest['telefone'] . "</td><td>" . $prest['email'] . "</td><td><a href='edit_prest.php?id_prestador=" . $prest['id_prestador'] . "'>Editar</a>";
                echo "<a href='del_prest.php?id_prestador=" . $prest['id_prestador'] . "' style='color:#d32f2f; margin-left: 24px'>Excluir </a></td></tr>";
            }
            ?>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>