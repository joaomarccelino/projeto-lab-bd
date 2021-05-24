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
    <title>Cadastro de Serviço</title>
</head>
<body>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <p><h1> Serviço - Inclusão </h1></p>
    <form action="inc_serv.php" method="POST">
        <p>Serviço: <input type="text" size="30" name="servico" required>
        <p><label for="">Selecione uma Categoria</label>
        <select name="id_categoria">
        <option>Selecione...</option>        
            <?php                 
                include('../connection.php');
                $query = 'SELECT * FROM categoria ORDER BY id_categoria;';
                $result = mysqli_query ($con, $query) or die (mysqli_connect_error());
                while($cat = mysqli_fetch_array($result)) { 
            ?>
            <option value="<?php echo $cat['id_categoria'] ?>"><?php echo $cat['categoria'] ?></option>
            <?php 
            }            
            ?>
        </select>
        <p><input type="submit" value="Enviar">
        <p><input type="reset" value="Limpar">
    </form>
    
</body>
</html>