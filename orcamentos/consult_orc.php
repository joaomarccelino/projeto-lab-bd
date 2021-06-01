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
		<h1>Lista de Orçamentos</h1>
		<table border="1" width="100%">
            <thead>
                <tr><td>Nº</td><td>Data de Início</td><td>Valor</td><td>Data de Expiração</td><td>Cliente</td><td>Serviço</td><td>Prestador</td><td>Observação</td><td colspan="2">Ações</td></tr>
            </thead>
        <?php  
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 
        $result_orc = "SELECT o.id_orcamento, o.data_inicio, o.valor, o.data_expiracao, o.observacao, p.nome, s.servico, c.nome AS nome_cliente FROM orcamentos AS o, prestadores AS p, servicos AS s, clientes AS c WHERE o.id_prestador = p.id_prestador AND o.id_servico = s.id_servico AND o.id_cliente = c.id_cliente";
        $resultado_orc = mysqli_query($con, $result_orc);
        while($orc = mysqli_fetch_assoc($resultado_orc)){
            echo "<tr><td>" . $orc['id_orcamento'] . "</td><td> "; 
            echo $orc['data_inicio'] . "</td><td>"  . $orc['valor'] . "</td><td>" . $orc['data_expiracao'] . "</td><td>";
            echo $orc['nome_cliente'] . "</td><td>" . $orc['servico'] . "</td><td>" . $orc['nome'] . "</td><td>";
            echo $orc['observacao'] ."</td><td><a href='edit_prest.php?id_orcamento=". $orc['id_orcamento'] . "'>Editar</a>";
            echo "</td><td> <a href='del_cli.php?id_orcamento=". $orc['id_orcamento'] . "'>Excluir </a></td></tr>";
        }
        echo "</table>";
        ?>
        <a href="../main.html">Voltar</a>
    </body>
</html>