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
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <title>Cadastro de Orçamentos</title>
</head>
<body>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <p><h1> Orçamentos - Inclusão </h1></p>
    <form action="inc_orc.php" method="POST">
        <p>Data: <input type="date" size="30" name="data_inicio" required>
        <p>Valor: R$<input type="number" name="valor">
        <p>Data de Expiração: <input type="date" size="30" name="data_expiracao" required>

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

        <p><label for="">Prestador: </label>
        <select name="id_prestador">
        <option>Selecione...</option>        
            <?php                 
                include('../connection.php');
                $query = 'SELECT * FROM prestadores ORDER BY id_prestador;';
                $result = mysqli_query ($con, $query) or die (mysqli_connect_error());
                while($cat = mysqli_fetch_array($result)) { 
            ?>
            <option value="<?php echo $cat['id_prestador'] ?>"><?php echo $cat['nome'] ?></option>
            <?php 
            }            
            ?>
        </select>

        <p><label for="">Serviço: </label>
        <select name="id_servico">
        <option>Selecione...</option>        
            <?php                 
                include('../connection.php');
                $query = 'SELECT * FROM servicos ORDER BY id_servico;';
                $result = mysqli_query ($con, $query) or die (mysqli_connect_error());
                while($cat = mysqli_fetch_array($result)) { 
            ?>
            <option value="<?php echo $cat['id_servico'] ?>"><?php echo $cat['servico'] ?></option>
            <?php 
            }            
            ?>
        </select>

        <p>Observações: <textarea name="observacao" cols="33"></textarea>

        <p><input type="submit" value="Enviar">
        <p><input type="reset" value="Limpar">
    </form>
    
</body>
</html>