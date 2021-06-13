<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['login'])) {
    session_destroy();
    header("Location: login/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="icon" href="/projeto-lab-bd/assets/favicon.png" type="image/x-icon" />

    <title>
        Momberg Soluções - Itapetininga, São Miguel Arcanjo - Prestadores de
        serviços
    </title>
</head>

<body style="background: #b7b5b0;font-family: Montserrat, sans-serif;">

    <div style="margin-top: 60px; max-width: 1500px;display: flex;align-items: center;justify-content: center;margin-left: 120px;">
        <nav>
            <ul >
                <?php
                if (!isset($_SESSION)) session_start();
                $nivel_necessario = 'adm';
                if (!isset($_SESSION['login']) or ($_SESSION['tipo'] != $nivel_necessario)) {
                } else {
                ?>
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuários
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="usuarios/cad_user.php">Cadastrar</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Categoria
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="categoria/cad_cat.php">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="categoria/consulta_cat.php">Cadastrar</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Serviços
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="servicos/cad_serv.php">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="servicos/consulta_serv.php">Consultar</a></li>
                        </ul>
                    </div>


                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Prestadores
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="prestadores/cad_prest.php">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="prestadores/consulta_prest.php">Consultar</a></li>
                        </ul>
                    </div>


                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Prestadores/Serviços
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="prestadores-serv/cad.php">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="prestadores-serv/consulta.php">Consultar</a></li>
                        </ul>
                    </div>

                <?php }
                ?>


                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Clientes
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="clientes/cad_cli.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="clientes/consulta_cli.php">Consultar</a></li>
                    </ul>
                </div>

                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Orçamentos
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="orcamentos/cad_orc.php">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="orcamentos/consult_orc.php">Consultar</a></li>
                    </ul>
                </div>

                <?php
                if (!isset($_SESSION)) session_start();
                $nivel_necessario = 'adm';
                if (!isset($_SESSION['login']) or ($_SESSION['tipo'] != $nivel_necessario)) {
                } else {
                ?>
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Relatórios Adm
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="relatorios-adm/rel_serv.php">Serviços por Categoria</a></li>
                            <li><a class="dropdown-item" href="relatorios-adm/rel_prest_serv.php">Prestadores por Serviço</a></li>
                            <li><a class="dropdown-item" href="relatorios-adm/rel_orc.php">Orçamentos por Data</a></li>
                            <li><a class="dropdown-item" href="relatorios-adm/rel_orc_cli.php">Orçamentos por Cliente</a></li>
                            <li><a class="dropdown-item" href="relatorios-adm/rel_orc_prest.php">Orçamentos por Prestador</a></li>
                        </ul>
                    </div>

                <?php }
                ?>

                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Relatórios Cli
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="relatorios-cli/rel_serv.php">Serviços</a></li>
                        <li><a class="dropdown-item" href="relatorios-cli/rel_prest.php">Prestadores</a></li>
                    </ul>
                </div>

                <button type="button" class="btn btn-dark"><li style="list-style-type: none;"><a href="login/logout.php" style="text-decoration: none; color: #fff">Sair</a></li></button>
                
            </ul>
        </nav>
    </div>

    <div class="container" style="margin-top: 40px;">

        <main style="flex: 1;max-width: 560px;margin-top: 160px;display: flex;flex-direction: column;justify-content: center;">
            <h1 style="font-size: 54px;color: #000000; font-weight: 700">
                Conectamos você no<br />
                mundo todo.
            </h1>
            <p style="font-size: 24px; margin-top: 24px;line-height: 38px; color: #565656;">
                Pra você cliente que busca serviços de qualidade com os melhores
                preços do mercado e/ou para você empresa que quer expandir e
                aumentar a carteira de clientes.
            </p>


        </main>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>

</html>