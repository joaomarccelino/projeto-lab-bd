<?php
    include_once("../connection.php");

    $sql = "SELECT * from categoria";
    $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");

    while ($registro = mysqli_fetch_array($resultado)){
        echo "Categoria: ".$registro['categoria']."<br>";
    }
    mysqli_close($con)

?>