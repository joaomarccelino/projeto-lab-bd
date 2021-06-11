<?php
session_start();
include_once("../connection.php");
$id_cliente = filter_input(INPUT_GET, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Excluir</title>		
	</head>
	<body>
		<a href="inc_cat.php">Cadastrar</a><br>
		<a href="consulta_cat.php">Listar</a><br>
		<h1>Excluir Cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_del_cli.php">
			<input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">
			
			<label>Cliente: </label>
			<input type="text" name="nome" placeholder="Digite o nome" value="<?php echo $row['nome']; ?>"><br><br>
						
			<input type="submit" value="Confirma exclusão">
		</form>
	</body>
</html>