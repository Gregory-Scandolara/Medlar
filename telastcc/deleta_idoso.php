<?php

include('conexao.php');

$ididoso = $_GET['ididoso'];

$sql = "DELETE FROM idosos WHERE ididoso=$ididoso";
//descobrir forma de excluir os remedios do idoso junto 
mysqli_query($con, $sql);
mysqli_query($con, $sql2);
if (mysqli_affected_rows($con) > 0) {
    header("Location: listaidosos.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($con);
    echo $con->error;
}
