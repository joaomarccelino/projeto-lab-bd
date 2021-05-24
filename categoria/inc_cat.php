<?php
$categoria = $_POST["categoria"];
include('../connection.php');

$query = "INSERT INTO categoria (categoria) VALUES ('$categoria')";
$resu = mysqli_query($con, $query);
if (mysqli_insert_id($con)){
    print "<br> Inclusão realizada com sucesso";
}
mysqli_close($con);

?>