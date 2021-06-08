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
    <title>Cadastro de Clientes</title>
</head>
<body>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <p><h1> Cliente - Inclusão </h1></p>
    <form action="inc_cli.php" method="POST">
            <table width="80%">                
                <tr>
                    <td> Nome: </td><td><input type="text" size="80" name="nome" ></td>
                </tr>
                <tr>    
                    <td> RG: </td><td><input type="text" size="20" name="rg" ></td>
                    <td> CPF: </td><td><input type="text" size="20" name="cpf" ></td>                       
                </tr>
                <tr>
                    <td> E-mail: </td><td><input type="text" size="30" name="email" ></td>                     
                </tr>
            </table>
            <fieldset><legend> Endereço </legend>
                <table width="80%">
                    <tr>
                        <td> Rua: </td><td><input type="text" size="80" name="logradouro" ></td>
                        <td> Número: </td><td><input type="text" name="numero" ></td>
                    </tr>
                    <tr>
                        <td> Complemento: </td><td><input type="text" size="80" name="complemento" ></td>
                        <td> Bairro: </td><td><input type="text" size="60" name="bairro" ></td>  
                    </tr>
                    <tr> 
                        <td> Cidade: </td><td><input type="text" size="80" name="cidade" ></td>
                        <td> Estado: </td><td><input type="text" size="60" name="estado" ></td>
                    </tr>
                    <tr> 
                        <td> CEP: </td><td><input type="text" size="80" name="cep" ></td>
                    </tr>
                </table>
            </fieldset>            
            <fieldset><legend> Contato </legend>
                <table width="100%">
                    <tr>
                        <td> Telefone: </td><td><input type="tel" placeholder="(XX) XXXX-XXXX" name="telefone_fixo"></td>
                        <td> Celular: </td><td><input type="tel" placeholder="(XX) XXXXX-XXXX" name="celular"></td>
                    </tr>
                </table>
            </fieldset>        
        <p><input type="submit" value="Enviar">
        <p><input type="reset" value="Limpar">
    </form>
    
</body>
</html>