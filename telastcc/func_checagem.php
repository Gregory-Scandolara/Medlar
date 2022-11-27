<?php
include_once('conexao.php');
$checagem = $_POST['checagem'];
$idutiliza = $_POST['idutiliza'];
$idremedio = $_POST['idremedio'];
$posologia = $_POST['posologia'];
$horario = $_POST['horario'];
$estoque = $_POST['estoque'];
$sql = "UPDATE utiliza SET 
             checagem='$checagem' 
            WHERE idutiliza='$idutiliza'";
mysqli_query($con, $sql);

if ($estoque == 'p') {
    $sqlidoso = "select ididoso from utiliza where idutiliza = $idutiliza";
    $rsidoso = mysqli_query($con, $sqlidoso);
    $linhaidoso = mysqli_fetch_array($rsidoso);
    $ididoso = $linhaidoso['ididoso'];
    $sql = "select add_cp from estoque_idoso where idremed = $idremedio and ididoso = $ididoso";
    echo $sql;
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);

    $add_cp = $linha['add_cp'];
    $sub_cp = $posologia;
    //quantidade de comprimidos a serem consumidos
    $util_cp = $add_cp - $sub_cp;
    $sql3 = "UPDATE estoque_idoso SET 
             add_cp='$util_cp'
             WHERE add_cp = '$add_cp' and idremed = '$idremedio'";
    mysqli_query($con, $sql3);
    echo $sql3;
} elseif ($estoque = 's') {
    $sql = "select add_cp from estoque_sus where idremedio = $idremedio";
    echo $sql;
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);

    $add_cp = $linha['add_cp'];
    $sub_cp = $posologia;
    //quantidade de comprimidos a serem consumidos
    $util_cp = $add_cp - $sub_cp;
    $sql3 = "UPDATE estoque_sus SET 
             add_cp='$util_cp'
             WHERE add_cp = '$add_cp' and idremedio = '$idremedio'";
    mysqli_query($con, $sql3);
}
header('Location: checagem_remed_idoso.php?horario=' . $horario);
