<?php
session_start();
include_once("../connection.php");
$id_categoria = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
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
			<input type="hidden" name="id_categoria" value="<?php echo $row['id_categoria']; ?>">			
			<label>Categoria: </label>
			<input type="text" name="categoria" placeholder="Digite a categoria" value="<?php echo $row['categoria']; ?>"><br><br>						
			<input type="submit" value="Salvar">
		</form>
	</body>
</html>