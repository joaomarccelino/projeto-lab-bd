<?php
	session_start();
	include_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Listar</title>		
	</head>
	<body>
		<h1>Listar Serviços</h1>
		<table border="1" width="100%">
            <thead>
                <tr><td>Nº</td><td>Categoria</td><td colspan="2">Ações</td></tr>
            </thead>
        <?php  
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 

    $sql = "SELECT * from categoria";
    $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");


    while($cat = mysqli_fetch_assoc($resultado)){
        echo "<tr><td>" . $cat['id_categoria'] . "</td><td> "; 
        echo $cat['categoria'] . "</td><td><a href='edit_cat.php?id_categoria=". $cat['id_categoria'] . "'>Editar</a>";
        echo "</td><td> <a href='del_serv.php?id_categoria=". $cat['id_categoria'] . "'>Excluir </a></td></tr>";
    }
    echo "</table>";
    ?>
    <a href="../main.html">Voltar</a>
    </body>
</html>