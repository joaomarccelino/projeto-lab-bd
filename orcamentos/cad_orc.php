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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h1>Cadastrar orçamento </h1>
            <a href="../main.html">← Voltar</a>
        </div>

        <form action="inc_orc.php" method="POST">


            <div class="row">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input required size="80" type="date" class="form-control input-sm" id="data_inicio" name="data_inicio" placeholder="Jordana Momberg">
                        <label for="data_inicio">Data do serviço</label>
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input required size="30" type="date" class="form-control input-sm" id="data_expiracao" name="data_expiracao" placeholder="Jordana Momberg">
                        <label for="data_expiracao">Data de expiração</label>
                    </div>
                </div>


                <div>
                    <select required name="id_cliente" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected disabled>Selecione um cliente</option>
                        <?php
                        include('../connection.php');
                        $query = 'SELECT * FROM clientes ORDER BY id_cliente;';
                        $result = mysqli_query($con, $query) or die(mysqli_connect_error());
                        while ($cat = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $cat['id_cliente'] ?>"><?php echo $cat['nome'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div>
                    <select required name="id_prestador" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected disabled>Selecione um prestador de serviço</option>
                        <?php
                        include('../connection.php');
                        $query = 'SELECT * FROM prestadores ORDER BY id_prestador;';
                        $result = mysqli_query($con, $query) or die(mysqli_connect_error());
                        while ($cat = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $cat['id_prestador'] ?>"><?php echo $cat['nome'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>


            </div>
            <div>
                <select required name="id_servico" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected disabled>Selecione um serviço</option>
                    <?php
                    include('../connection.php');
                    $query = 'SELECT * FROM servicos ORDER BY id_servico;';
                    $result = mysqli_query($con, $query) or die(mysqli_connect_error());
                    while ($cat = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $cat['id_servico'] ?>"><?php echo $cat['servico'] ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>


            <div>
                <div class="form-floating mb-3">
                    <input required size="30" type="number" class="form-control input-sm" id="valor" name="valor" placeholder="Jordana Momberg">
                    <label for="valor">Valor</label>
                </div>
            </div>


            <div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Escreva uma observação aqui..." id="observacao" name="observacao" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Observações</label>
                </div>
            </div>

    </div>

    <div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">
        <button type="submit" class="btn btn-primary" style="margin-right: 24px;">Cadastrar</button>
        <button type="reset" class="btn btn-secondary">Limpar campos</button>
    </div>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>