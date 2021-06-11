<?php
session_start();
include_once("../connection.php");
$id_prestador = filter_input(INPUT_GET, 'id_prestador', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM prestadores WHERE id_prestador = '$id_prestador'";
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
	<body>
		<a href="cad_prest.php">Cadastrar</a><br>
		<a href="consulta_prest.php">Listar</a><br>
		<h1>Alteração - Cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_cli.php">
			<input type="hidden" name="id_prestador" value="<?php echo $row['id_prestador']; ?>">			
            <legend style="color: #470283; margin-bottom: 24px;"> Dados </legend>
            <div class="row">
                <div>
                    <div class="form-floating mb-3">
                        <input required size="80" type="text" class="form-control input-sm" id="nome" name="nome" placeholder="Jordana Momberg" value="<?php echo $row['nome']; ?>">
                        <label for="nome">Nome</label>
                    </div>

                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input required size="30" type="email" class="form-control input-sm" id="email" name="email" placeholder="Jordana Momberg" value="<?php echo $row['email']; ?>">
                        <label for="email">E-mail</label>
                    </div>
                </div>

            </div>
            <fieldset>
                <legend style="color: #470283; margin-bottom: 24px; margin-top: 40px"> Endereço </legend>
                <div class="row">
                    <div class="col-10">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="logradouro" name="logradouro" placeholder="Jordana Momberg" value="<?php echo $row['logradouro']; ?>">
                            <label for="logradouro">Logradouro</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="numero" name="numero" placeholder="Jordana Momberg" value="<?php echo $row['numero']; ?>">
                            <label for="numero">Número</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="complemento" name="complemento" placeholder="Jordana Momberg" value="<?php echo $row['complemento']; ?>">
                            <label for="complemento">Complemento</label>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="bairro" name="bairro" placeholder="Jordana Momberg" value="<?php echo $row['bairro']; ?>">
                            <label for="bairro">Bairro</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="cidade" name="cidade" placeholder="Jordana Momberg" value="<?php echo $row['cidade']; ?>">
                            <label for="cidade">Cidade</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input required size="2" type="text" class="form-control input-sm" id="estado" name="estado" placeholder="Jordana Momberg" value="<?php echo $row['estado']; ?>">
                            <label for="estado">UF</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input required size="2" type="text" class="form-control input-sm" id="cep" name="cep" placeholder="Jordana Momberg" value="<?php echo $row['cep']; ?>">
                            <label for="cep">CEP</label>
                        </div>
                    </div>
                </div>

            </fieldset>
            <fieldset>
                <legend style="color: #470283; margin-bottom: 24px; margin-top: 40px"> Contato </legend>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input required size="80" type="tel" class="form-control input-sm" id="telefone" name="telefone" placeholder="Jordana Momberg" value="<?php echo $row['telefone']; ?>">
                            <label for="telefone">Telefone</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input required size="80" type="tel" class="form-control input-sm" id="celular" name="celular" placeholder="Jordana Momberg" value="<?php echo $row['celular']; ?>">
                            <label for="celular">Celular</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">
                <input type="submit" name="cadastrar" value="Cadastrar" style="color: #fff; background-color: #470283; padding: 6px 12px; border-radius: 4px; border:0; margin-right: 24px">
                <button type="reset"  class="btn btn-secondary">Limpar campos</button>
            </div>
        </form>
	</body>
</html>