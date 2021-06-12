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
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  
  <body>
    <div class="container">
      <nav>
        <ul class="menu">
        <?php
              if (!isset($_SESSION)) session_start();
              $nivel_necessario = 'adm';
              if (!isset($_SESSION['login']) OR ($_SESSION['tipo'] != $nivel_necessario)) {

              }
              else {
                ?>
                <li>
                  <a href="#">Usuarios</a>
                  <ul>
                    <li><a href="usuarios/cad_user.php">Cadastrar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Categoria</a>
                  <ul>
                    <li><a href="categoria/cad_cat.php">Cadastrar</a></li>
                    <li><a href="categoria/consulta_cat.php">Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Serviços</a>
                  <ul>
                    <li><a href="servicos/cad_serv.php">Cadastrar</a></li>
                    <li><a href="servicos/consulta_serv.php">Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Prestadores</a>
                  <ul>
                    <li><a href="prestadores/cad_prest.php">Cadastrar</a></li>
                    <li><a href="prestadores/consulta_prest.php">Consultar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Prestadores/Serviços</a>
                  <ul>
                    <li><a href="prestadores-serv/cad.php">Cadastrar</a></li>
                    <li><a href="prestadores-serv/consulta.php">Consultar</a></li>
                  </ul>
                </li>                  
              <?php }
            ?>         
          
          <li>
            <a href="#">Clientes</a>
            <ul>
              <li><a href="clientes/cad_cli.php">Cadastrar</a></li>
              <li><a href="clientes/consulta_cli.php">Consultar</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Orçamentos</a>
            <ul>
              <li><a href="orcamentos/cad_orc.php">Cadastrar</a></li>
              <li><a href="orcamentos/consult_orc.php">Consultar</a></li>
            </ul>
          </li>
          <?php
              if (!isset($_SESSION)) session_start();
              $nivel_necessario = 'adm';
              if (!isset($_SESSION['login']) OR ($_SESSION['tipo'] != $nivel_necessario)) {

              }
              else {
                ?>
                <li>
                  <a href="#">Relatórios Adm</a>
                  <ul>
                    <li><a href="relatorios-adm/rel_serv.php">Serviços por Categoria</a></li>
                    <li><a href="relatorios-adm/rel_prest_serv.php">Prestadores por Serviço</a></li>
                    <li><a href="relatorios-adm/rel_orc.php">Orçamentos por Data</a></li>
                    <li><a href="relatorios-adm/rel_orc_cli.php">Orçamentos por Cliente</a></li>
                    <li><a href="relatorios-adm/rel_orc_prest.php">Orçamentos por Prestador</a></li>
                  </ul>
                </li>
              <?php }
            ?>
          <li>
            <a href="#">Relatórios Cli</a>
            <ul>
              <li><a href="relatorios-cli/rel_serv.php">Serviços</a></li>
              <li><a href="relatorios-cli/rel_prest.php">Prestadores</a></li>
            </ul>
          </li>
          <li><a href="login/logout.php">Sair</a></li>
        </ul>
      </nav>
    </div>
  </body>
</html>
