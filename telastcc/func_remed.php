<?php
include('conexao.php');
$idremedio = $_GET['idremedio'];

$sql = "DELETE FROM utiliza WHERE idremedio=$idremedio";
mysqli_query($con, $sql);
if (mysqli_affected_rows($con) > 0) {
    header("Location: dado_idoso_remed.php?idremedio=" . $idremedio);
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($con);
    echo $con->error;
}
