<?php
    include('../connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />
    <title>Relatório de Orçamentos</title>
</head>
<body>
    <h1>Pesquisar Orçamentos</h1>
    <form action="" method="post">
        <label>Data de Início: </label>
        <input type="date" name="data_inicio">
        <label>Data de Expiração: </label>
        <input type="date" name="data_expiracao">
        <input type="submit" name="searchService" value="Pesquisar">
    </form>
    <br>
    <div style="display: flex;align-items: center;justify-content: space-between">
            <a href="../main.html">← Voltar</a>
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
            </tr>
    </thead>
    <?php
    $searchService = filter_input(INPUT_POST, 'searchService', FILTER_SANITIZE_STRING);
    if ($searchService) {
        $data_inicio = $_POST['data_inicio'];
        $data_expiracao = $_POST['data_expiracao'];
        $query = "SELECT * FROM orcamento_cliente_prestador WHERE data_inicio >= $data_inicio AND data_expiracao <=$data_expiracao LIMIT 5"; 
        $result = mysqli_query($con, $query);
        while($orc = mysqli_fetch_assoc($result)) {
            echo "<tr><th>" . $orc['id_orcamento'] . "</th><th> ";
                echo $orc['data_inicio'] . "</th><th>"  . $orc['valor'] . "</th><td>" . $orc['data_expiracao'] . "</td><td>";
                echo $orc['nome_cliente'] . "</td><td>" . $orc['servico'] . "</td><td>" . $orc['nome'] . "</td><td>";
                echo $orc['observacao'] . "</td>";
        }       
    }
    ?>
    </table>
</body>
</html>