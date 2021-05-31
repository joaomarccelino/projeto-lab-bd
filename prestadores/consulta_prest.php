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
		<h1>Lista de Prestadores</h1>
		<table border="1" width="100%">
            <thead>
                <tr><td>Nº</td><td>Nome</td><td>Logradouro</td><td>Nº</td><td>Complemento</td><td>Bairro</td><td>CEP</td><td>Cidade</td><td>Estado</td><td>Telefone</td><td>E-mail</td><td colspan="2">Ações</td></tr>
            </thead>
        <?php  
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 
        $result_prest = "SELECT * FROM prestadores";
        $resultado_prest = mysqli_query($con, $result_prest);
        while($prest = mysqli_fetch_assoc($resultado_prest)){
            echo "<tr><td>" . $prest['id_prestador'] . "</td><td> "; 
            echo $prest['nome'] . "</td><td>"  . $prest['logradouro'] . "</td><td>" . $prest['numero'] . "</td><td>";
            echo $prest['complemento'] . "</td><td>" . $prest['bairro'] . "</td><td>" . $prest['cep'] . "</td><td>";
            echo $prest['cidade'] . "</td><td>" . $prest['estado'] ."</td><td>". $prest['telefone'] ."</td><td>". $prest['email'] ."</td><td><a href='edit_prest.php?id_prestador=". $prest['id_prestador'] . "'>Editar</a>";
            echo "</td><td> <a href='del_cli.php?id_prestador=". $prest['id_prestador'] . "'>Excluir </a></td></tr>";
        }
        echo "</table>";
        ?>
        <a href="../main.html">Voltar</a>
    </body>
</html>