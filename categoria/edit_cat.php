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
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />
		<title>CRUD - Editar</title>		
	</head>
	<body style="background-color: #fafafa;">
		
		<div style="display: flex;align-items: start;justify-content: space-between;margin-bottom: 40px;flex-direction: column">
            <h1> Alterar categoria </h1>
			<a href="cad_cat.php">Cadastrar</a><br>
			<a href="consulta_cat.php">Listar</a><br>
        </div>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_cat.php">			
			<input type="hidden" name="id_categoria" value="<?php echo $row['id_categoria']; ?>">			
			<div class="col-6">	
				<div class="form-floating mb-3">
					<input type="text" id="categoria" class="form-control" name="categoria" placeholder="Digite a categoria" value="<?php echo $row['categoria']; ?>"><br><br>						
					<label for="categoria">Categoria: </label>		
				</div>
				<div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">
					<input type="submit" value="Salvar" class="btn btn-primary">
				</div>
			</div>
		</form>
	</body>
</html>