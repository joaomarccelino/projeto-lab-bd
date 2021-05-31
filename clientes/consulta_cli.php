<?php
	session_start();
	include_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Listar</title>		
	</head>
	<body>
		<h1>Lista de Clientes</h1>
		<table border="1" width="100%">
            <thead>
                <tr><td>Nº</td><td>Nome</td><td>RG</td><td>CPF</td><td>Logradouro</td><td>Nº</td><td>Complemento</td><td>Bairro</td><td>CEP</td><td>Cidade</td><td>Estado</td><td>Telefone</td><td>Celular</td><td>E-mail</td><td colspan="2">Ações</td></tr>
            </thead>
        <?php  
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 
        $result_cli = "SELECT * FROM clientes";
        $resultado_cli = mysqli_query($con, $result_cli);
        while($cli = mysqli_fetch_assoc($resultado_cli)){
            echo "<tr><td>" . $cli['id_cliente'] . "</td><td> "; 
            echo $cli['nome'] . "</td><td>" . $cli['rg'] . "</td><td>" . $cli['cpf_cnpj'] . "</td><td>" . $cli['logradouro'] . "</td><td>" . $cli['numero'] . "</td><td>";
            echo $cli['complemento'] . "</td><td>" . $cli['bairro'] . "</td><td>" . $cli['cep'] . "</td><td>";
            echo $cli['cidade'] . "</td><td>" . $cli['estado'] ."</td><td>". $cli['telefone_fixo'] ."</td><td>". $cli['celular'] ."</td><td>". $cli['email'] ."</td><td><a href='edit_cli.php?id_servico=". $cli['id_cliente'] . "'>Editar</a>";
            echo "</td><td> <a href='del_cli.php?id_servico=". $cli['id_cliente'] . "'>Excluir </a></td></tr>";
        }
        echo "</table>";
        ?>
        <a href="../main.html">Voltar</a>
    </body>
</html>