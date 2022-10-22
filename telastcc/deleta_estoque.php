<?php

include('conexao.php');

$idremedio = $_GET['idremedio'];

$sql = "DELETE FROM estoque WHERE idremedio=$idremedio";
//descobrir forma de excluir os remedios do idoso junto 
mysqli_query($con, $sql);
if (mysqli_affected_rows($con) > 0) {
    header("Location: estoque.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($con);
    echo $con->error;
}