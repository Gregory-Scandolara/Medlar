<?php

include_once('conexao.php');

$idutiliza = $_GET['idutiliza'];
$sql2 = "select * from utiliza where idutiliza=$idutiliza";
$rs = mysqli_query($con, $sql2);

$sql = "DELETE FROM utiliza WHERE idutiliza=$idutiliza";

mysqli_query($con, $sql);
if (mysqli_affected_rows($con) > 0) {
    // echo "<script>alert('Medicamento apagado com sucesso.');</script>";
    // confirm("Press a button!");

} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($con);
    echo $con->error;
}

while ($linha = mysqli_fetch_array($rs))
    $ididoso = $linha['ididoso'];
header("Location: dado_remed_idoso.php?ididoso=" . $ididoso);
echo $ididoso;
