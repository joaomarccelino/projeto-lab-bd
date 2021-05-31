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
		<h1>Listar Serviços</h1>
		<table border="1" width="100%">
            <thead>
                <tr><td>Nº</td><td>Serviço</td><td>Categoria</td><td colspan="2">Ações</td></tr>
            </thead>
        <?php  
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 
        $result_serv = "SELECT s.id_servico, s.servico, c.categoria FROM servicos AS s, categoria AS c WHERE s.id_categoria = c.id_categoria";
        $resultado_serv = mysqli_query($con, $result_serv);
        while($serv = mysqli_fetch_assoc($resultado_serv)){
            echo "<tr><td>" . $serv['id_servico'] . "</td><td> "; 
            echo $serv['servico'] . "</td><td>" . $serv['categoria'] . "</td><td><a href='edit_serv.php?id_servico=". $serv['id_servico'] . "'>Editar</a>";
            echo "</td><td> <a href='del_serv.php?id_servico=". $serv['id_servico'] . "'>Excluir </a></td></tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>