<?php
session_start();
include_once("../connection.php");
$id_orcamento = filter_input(INPUT_GET, 'id_orcamento', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM orcamentos WHERE id_orcamento = '$id_orcamento'";
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
		<h1>Excluir Orçamento</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_del_orc.php">
			<input type="hidden" name="id_orcamento" value="<?php echo $row['id_orcamento']; ?>">
			
			<label>Data de Início: </label>
			<input type="date" name="data" value="<?php echo $row['data_inicio']; ?>"><br><br>
						
			<input type="submit" value="Confirma exclusão">
		</form>
	</body>
</html>