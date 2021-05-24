<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria</title>
</head>
<body>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <p><h1> Categoria - Inclusão </h1></p>
    <form action="inc_cat.php" method="POST">
        <p>Categoria: <input type="text" size="30" name="categoria" required>
        <p><input type="submit" value="Enviar">
        <p><input type="reset" value="Limpar">
    </form>
    
</body>
</html>