<?php
session_start();
include_once("conection.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM tbfuncao WHERE id = '$id'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<a href="cad_cat.php">Cadastrar</a><br>
		<a href="consulta_cat.php">Listar</a><br>
		<h1>Alteração - Categoria</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_cat.php">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">			
			<label>Função: </label>
			<input type="text" name="nome" placeholder="Digite a categoria" value="<?php echo $row['descricao']; ?>"><br><br>						
			<input type="submit" value="Salvar">
		</form>
	</body>
</html>