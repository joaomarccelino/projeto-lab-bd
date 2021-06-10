<?php
session_start();
include_once("conection.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM tbespecialidade WHERE id = '$id'";
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
		<!--a href="inc_esp.php">Cadastrar</a><br-->
		<a href="index_esp.php">Listar</a><br>
		<h1>Excluir Especialidade</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_del_esp.php">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			
			<label>Especialidade: </label>
			<input type="text" name="nome" placeholder="Digite a especialidade" value="<?php echo $row['descricao']; ?>"><br><br>
						
			<input type="submit" value="Confirma exclusão">
		</form>
	</body>
</html>