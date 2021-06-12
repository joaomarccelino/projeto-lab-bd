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
    <title>Relatório de Prestadores/Serviços</title>
</head>
<body>
    <h1>Pesquisar Serviços por Prestador</h1>
    <form action="" method="post">
        <label>Prestador: </label>
        <input type="text" name="nome">
        <input type="submit" name="searchService" value="Pesquisar">
    </form>
    <br>
    <div style="display: flex;align-items: center;justify-content: space-between">
            <a href="../main.php">← Voltar</a>
        </div>
    <table border="1" width="100%" class="table  table-striped" style="margin: 40px 0 60px 0; ">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Prestador</th>
                    <th>Serviço</th>
                </tr>
            </thead>
    <?php
    $searchService = filter_input(INPUT_POST, 'searchService', FILTER_SANITIZE_STRING);
    if ($searchService) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $query = "SELECT * FROM prestador_servico WHERE nome LIKE '%$nome%' LIMIT 5"; 
        $result = mysqli_query($con, $query);
        while($serv = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $serv['id_prestador'] . "</td><td> ";
            echo $serv['nome'] . "</td><td>" . $serv['servico'] . "</td>";
        }       
    }
    ?>
    </table>
</body>
</html>