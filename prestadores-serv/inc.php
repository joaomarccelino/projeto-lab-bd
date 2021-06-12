<?php
$id_prestador = $_POST["id_prestador"];
$id_servico = $_POST["id_servico"];
include('../connection.php');

$query = "INSERT INTO prestadores_servicos (id_prestador, id_servico) VALUES ('$id_prestador', '$id_servico')";
$resu = mysqli_query($con, $query);
if(mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<div style='color: #32cd32; display: flex; align-items:center; margin-bottom: 12px'><img src='/projeto-lab-bd/assets/icons/check.svg' alt='check' style='width: 22px; margin-right: 8px'/>Inclusão realizada com sucesso</div>";
	header("Location: cad.php");
} else {
    $_SESSION['msg'] = "<div style='color: #d32f2f> Ops! Algo deu errado </div>";
    header("Location: cad.php");
}
mysqli_close($con);
