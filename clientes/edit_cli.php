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
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<a href="cad_cat.php">Cadastrar</a><br>
		<a href="consulta_cat.php">Listar</a><br>
		<h1>Alteração - Cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_cli.php">
			<input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente']; ?>">			
            <legend style="color: #470283; margin-bottom: 24px; ">  </legend>
            <div class="row">
                <div>
                    <div class="form-floating mb-3">
                        <input required size="80" type="text" class="form-control input-sm" id="nome" name="nome" placeholder="Jordana Momberg" value="<?php echo $row['nome']; ?>">
                        <label for="nome">Nome</label>
                    </div>

                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input required size="30" type="text" class="form-control input-sm" id="email" name="email" placeholder="Jordana Momberg" value="<?php echo $row['email']; ?>">
                        <label for="email">E-mail</label>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input required size="80" type="text" class="form-control input-sm" id="cpf" name="cpf" placeholder="Jordana Momberg">
                        <label for="cpf">CPF</label>
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input required size="30" type="text" class="form-control input-sm" id="rg" name="rg" placeholder="Jordana Momberg">
                        <label for="rg">RG</label>
                    </div>
                </div>


            </div>

            <fieldset>
                <legend style="color: #470283; margin-bottom: 24px; margin-top: 40px"> Endereço </legend>
                <div class="row">
                    <div class="col-10">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="logradouro" name="logradouro" placeholder="Jordana Momberg">
                            <label for="logradouro">Logradouro</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="numero" name="numero" placeholder="Jordana Momberg">
                            <label for="numero">Número</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="complemento" name="complemento" placeholder="Jordana Momberg">
                            <label for="complemento">Complemento</label>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="bairro" name="bairro" placeholder="Jordana Momberg">
                            <label for="bairro">Bairro</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input required size="80" type="text" class="form-control input-sm" id="cidade" name="cidade" placeholder="Jordana Momberg">
                            <label for="cidade">Cidade</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input required size="2" type="text" class="form-control input-sm" id="estado" name="estado" placeholder="Jordana Momberg">
                            <label for="estado">UF</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input required size="2" type="text" class="form-control input-sm" id="cep" name="cep" placeholder="Jordana Momberg">
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
                            <input required size="80" type="tel" class="form-control input-sm" id="telefone_fixo" name="telefone_fixo" placeholder="Jordana Momberg">
                            <label for="telefone_fixo">Telefone</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input required size="80" type="tel" class="form-control input-sm" id="celular" name="celular" placeholder="Jordana Momberg">
                            <label for="celular">Celular</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">
                <button type="submit" class="btn btn-primary" style="margin-right: 24px;">Cadastrar</button>
                <button type="reset" class="btn btn-secondary">Limpar campos</button>
            </div>
        </form>
	</body>
</html>