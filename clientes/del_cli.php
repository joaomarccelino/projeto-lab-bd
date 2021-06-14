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
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />
		<title>CRUD - Excluir</title>		
	</head>
	<body>
		<a href="cad_cli.php">Cadastrar</a><br>
		<a href="consulta_cli.php">Listar</a><br>
		<h1>Excluir Cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_del_cli.php">
			<input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">
			<div class="col-6">	
				<div class="form-floating mb-3">	
					<input type="text" name="nome" class="form-control" placeholder="Digite o nome" value="<?php echo $row['nome']; ?>"><br><br>
					<label for="nome">Cliente: </label>	
				</div>				
				<div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">	
					<input type="submit" value="Confirma exclusão" class="btn btn-primary">
				</div>
			</div>
		</form>
	</body>
</html>