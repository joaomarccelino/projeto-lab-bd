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
    <p><h1> Usuários - Inclusão </h1></p>
    <form action="inc_user.php" method="POST">
        <p><label for="">Cliente: </label>
        <select name="id_cliente">
            <option>Selecione...</option>        
                <?php                 
                    include('../connection.php');
                    $query = 'SELECT * FROM clientes ORDER BY id_cliente;';
                    $result = mysqli_query ($con, $query) or die (mysqli_connect_error());
                    while($cat = mysqli_fetch_array($result)) { 
                ?>
            <option value="<?php echo $cat['id_cliente'] ?>"><?php echo $cat['nome'] ?></option>
            <?php 
            }            
            ?>
        </select>

        <p>Login: <input type="text" size="30" name="login" required>
        <p>Senha: <input type="password" size="30" name="senha" required>
        <p><label>Tipo: </label>
            <select name="tipo">
                <option>Selecione...</option>      
                <option value="adm">Administrador</option>
                <option value="cli">Cliente</option>
            </select>

        <p><input type="submit" value="Enviar">
        <p><input type="reset" value="Limpar">
    </form>
            
</body>
</html>