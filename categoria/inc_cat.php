<?php
$categoria = $_POST["categoria"];
include('../connection.php');

$query = "INSERT INTO categoria (categoria) VALUES ('$categoria')";
$resu = mysqli_query($con, $query);
if (mysqli_insert_id($con)) {
    print "<div style='color: #32cd32; display: flex; align-items:center; margin-bottom: 12px'>
    <img src='/projeto-lab-bd/assets/icons/check.svg' alt='check' style='width: 22px; margin-right: 8px'/> 
    Inclusão realizada com sucesso
    </div><br><a href='../main.php'>Voltar</a>";
} else {
    print "<div style='color: #d32f2f> Ops! Algo deu errado </div>";
}
mysqli_close($con);
