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
            <h1>Usuários </h1>
            <a href="../main.php">← Voltar</a>
        </div>

        <table border="1" width="100%" class="table  table-striped" style="margin: 40px 0 60px 0; ">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Cliente</th>
                    <th>Login</th>
                </tr>
            </thead>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            $result_cli = "SELECT l.id_login, l.login, c.nome FROM login_usuarios AS l, clientes AS c WHERE l.id_cliente = c.id_cliente";
            $resultado_cli = mysqli_query($con, $result_cli);
            while ($cli = mysqli_fetch_assoc($resultado_cli)) {
                echo "<tr><th>" . $cli['id_login'] . "</th><td> ";
                echo $cli['nome'] . "</td><td>" . $cli['login'] . "</td>";
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>