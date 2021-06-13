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
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />

    <title> Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços</title>
</head>

<body style="background: #b7b5b0;">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div class="container-sm" style="margin-top: 240px;border-radius: 12px;background-color: #fafafa; padding: 32px; max-width: 540px; box-shadow: 0px 10px 14px -6px rgba(0, 0, 0, 0.2), 0px 22px 35px 3px rgba(0, 0, 0, 0.14), 0px 8px 42px 7px rgba(0, 0, 0, 0.12);
          box-shadow: 0px 10px 14px -6px rgba(0, 0, 0, 0.2), 0px 22px 35px 3px rgba(0, 0, 0, 0.14), 0px 8px 42px 7px rgba(0, 0, 0, 0.12);">
       
        <div style="display: flex;align-items: center;justify-content: center; margin-bottom: 60px">
            <img
              src="/projeto-lab-bd/assets/images/logo1.svg"
              alt="Logo Momberg Soluções"
            />
          </div>

        <form action="login.php" method="POST">


            <div class="row">

                <div>
                    <div class="form-floating mb-3">
                        <input required size="80" type="login" class="form-control input-sm" id="login" name="login" placeholder="Jordana Momberg">
                        <label for="login">Email</label>
                    </div>

                </div>

                <div>
                    <div class="form-floating mb-3">
                        <input required size="8" type="password" class="form-control input-sm" id="senha" name="senha" placeholder="Jordana Momberg">
                        <label for="senha">Senha</label>
                    </div>
                </div>

            </div>

            <div style="display: flex; flex-direction: column;align-items: center;justify-content: center; margin-top: 60px">

                <button type="submit" id="entrar" name ="entrar" style="background-color: #000; border: 0; 
                border-radius: 6px;color: #fff; padding:8px 32px; font-family: Montserrat, sans-serif">Entrar</button>



                <a href="/projeto-lab-bd/HomePage/index.html" style="margin-top:24px">← Voltar</a>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>