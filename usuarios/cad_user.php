<?php
if (!isset($_SESSION)) session_start();
$nivel_necessario = 'adm';
if (!isset($_SESSION['login']) or ($_SESSION['tipo'] != $nivel_necessario)) {
    header("Location: ../main.php");
}
include_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />

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
    <div class="container" style="margin-top: 40px;">

        <div style="display: flex;align-items: center;justify-content: space-between;margin-bottom: 40px">
            <h1> Adicionar usuário </h1>
            <a href="../main.php">← Voltar</a>
        </div>
        <form action="inc_user.php" method="POST">
            <div class="row">
                <div>
                    <select name="id_cliente" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
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
                    <div class="form-floating mb-3">
                        <input required size="80" type="text" class="form-control input-sm" id="login" name="login" placeholder="Jordana Momberg">
                        <label for="login">Login</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input required size="8" type="password" class="form-control input-sm" id="senha" name="senha" placeholder="Jordana Momberg">
                        <label for="senha">Senha</label>
                    </div>
                </div>
                <div>
                    <select name="tipo" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected disabled>Selecione tipo de usuário</option>
                        <option value="adm">Administrador</option>
                        <option value="cli">Cliente</option>
                    </select>
                </div>

            </div>
            <div style="display: flex;align-items: center;justify-content: center; margin-top: 60px">
                <input type="submit" name="entrar" value="Enviar" style="color: #fff; background-color: #470283; padding: 6px 12px; border-radius: 4px; border:0; margin-right: 24px">
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>

</html>