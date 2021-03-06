<?php
    if (!isset($_SESSION)) session_start();
    $nivel_necessario = 'adm';
    if (!isset($_SESSION['login']) OR ($_SESSION['tipo'] != $nivel_necessario)) {
        header("Location: ../main.php"); 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />
    
    <title> Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços</title>
</head>

<body style="background-color: #fafafa;">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div class="container" style="margin-top: 40px;">

        <div style="display: flex;align-items: center;justify-content: space-between;margin-bottom: 40px">
            <h1> Adicionar categoria </h1>
            <a href="../main.php">← Voltar</a>
        </div>

        
        <form action="inc_cat.php" method="POST">

            <div class="form-floating mb-3">
                <input required type="text" class="form-control" id="categoria" name="categoria" placeholder="Tecnologia">
                <label for="categoria">Categoria</label>
            </div>

            <div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">
                <button type="submit" class="btn btn-primary" style="margin-right: 24px;">Cadastrar</button>
                <button type="reset" class="btn btn-secondary">Limpar campos</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>