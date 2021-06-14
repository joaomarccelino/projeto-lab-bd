<?php
session_start();
include_once("../connection.php");
$id_servico = filter_input(INPUT_GET, 'id_servico', FILTER_SANITIZE_NUMBER_INT);
$id_prestador = filter_input(INPUT_GET, 'id_prestador', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM prestador_servico WHERE id_servico = '$id_servico' AND id_prestador = '$id_prestador'";
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
		<a href="inc.php">Cadastrar</a><br>
		<a href="consulta.php">Listar</a><br>
		<h1>Excluir Prestador/Serviço</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_del.php">
			<input type="hidden" name="id_servico" value="<?php echo $row['id_servico']; ?>">	
			<div class="col-6">	
				<div class="form-floating mb-3">		
					<input type="text" name="servico" placeholder="Digite o servico" class="form-control"  value="<?php echo $row['servico']; ?>"><br><br>
					<label for="servico">Serviço: </label>
				</div>
				<input type="hidden" name="id_prestador" value="<?php echo $row['id_prestador']; ?>">	
				<div class="form-floating mb-3">			
					<input type="text" name="prestador" placeholder="Digite o nome" class="form-control"  value="<?php echo $row['nome']; ?>"><br><br>	
					<label for="prestador">Prestador: </label>
				</div>				
				<div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">						
					<input type="submit" class="btn btn-primary" value="Confirma exclusão">
				</div>
			</div>
		</form>
	</body>
</html>