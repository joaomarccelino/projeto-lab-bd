<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="/projeto-lab-bd/assets/images/favicon.png" type="image/x-icon" />

    <title> Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços</title>
</head>

<body style="background-color: #fafafa;">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div class="container" style="margin-top: 40px">

        <div style="display: flex;align-items: center;justify-content: space-between; margin-bottom: 40px">
            <h1>Adicionar clientes </h1>
            <a href="../main.html">← Voltar</a>
        </div>


        <form action="inc_cli.php" method="POST">

            <legend style="color: #470283; margin-bottom: 24px; ">  </legend>
            <div class="row">
                <div>
                    <div class="form-floating mb-3">
                        <input required size="80" type="text" class="form-control input-sm" id="nome" name="nome" placeholder="Jordana Momberg">
                        <label for="nome">Nome</label>
                    </div>

                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input required size="30" type="text" class="form-control input-sm" id="email" name="email" placeholder="Jordana Momberg">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>