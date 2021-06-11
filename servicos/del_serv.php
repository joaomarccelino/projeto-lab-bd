<?php
session_start();
include_once("../connection.php");
$id_servico = filter_input(INPUT_GET, 'id_servico', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM servicos WHERE id_servico = '$id_servico'";
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
		<a href="inc_serv.php">Cadastrar</a><br>
		<a href="consulta_serv.php">Listar</a><br>
		<h1>Excluir Serviço</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_del_serv.php">
			<input type="hidden" name="id_servico" value="<?php echo $row['id_servico']; ?>">
			
			<label>Especialidade: </label>
			<input type="text" name="servico" placeholder="Digite o servico" value="<?php echo $row['servico']; ?>"><br><br>
						
			<input type="submit" value="Confirma exclusão">
		</form>
	</body>
</html>