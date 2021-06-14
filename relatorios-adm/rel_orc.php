<?php
if (!isset($_SESSION)) session_start();
$nivel_necessario = 'adm';
if (!isset($_SESSION['login']) or ($_SESSION['tipo'] != $nivel_necessario)) {
    header("Location: ../main.php");
}
include_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />

    <title> Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços</title>
</head>

<body style="background-color: #fafafa;">
    <div class="container" style="margin-top: 40px;">

        <div style="display: flex;align-items: center;justify-content: space-between;margin-bottom: 40px">
            <h1>Pesquisar orçamentos </h1>
            <a href="../main.php">← Voltar</a>
        </div>

        <form action="" method="post">
        
            <div class="row">
                <div>
                    <div class="form-floating mb-3">
                        <input required size="80" type="date" class="form-control input-sm" id="data_inicio" name="data_inicio" placeholder="Jordana Momberg">
                        <label for="data_inicio">Data de Início</label>
                    </div>
                </div>

                <div>
                    <div class="form-floating mb-3">
                        <input required size="80" type="date" class="form-control input-sm" id="data_expiracao" name="data_expiracao" placeholder="Jordana Momberg">
                        <label for="data_expiracao">Data de Expiração</label>
                    </div>
                </div>
            </div>

            <input type="submit" name="searchService" value="Pesquisar" style="color: #fff; background-color: #470283; padding: 6px 12px; border-radius: 4px; border:0; margin-right: 24px">


        </form>
        <br>

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
                </tr>
            </thead>
            <?php
            $searchService = filter_input(INPUT_POST, 'searchService', FILTER_SANITIZE_STRING);
            if ($searchService) {
                $data_inicio = $_POST['data_inicio'];
                $data_expiracao = $_POST['data_expiracao'];
                $query = "SELECT * FROM orcamento_cliente_prestador WHERE data_inicio >= '$data_inicio' AND data_expiracao <= '$data_expiracao'";
                $result = mysqli_query($con, $query);
                while ($orc = mysqli_fetch_assoc($result)) {
                    echo "<tr><th>" . $orc['id_orcamento'] . "</th><th> ";
                    echo $orc['data_inicio'] . "</th><th>"  . $orc['valor'] . "</th><td>" . $orc['data_expiracao'] . "</td><td>";
                    echo $orc['nome_cliente'] . "</td><td>" . $orc['servico'] . "</td><td>" . $orc['nome'] . "</td><td>";
                    echo $orc['observacao'] . "</td>";
                }
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>