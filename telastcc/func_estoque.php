<?php

include_once("conexao.php");


$idremedio = $_POST['idremedio'];
$quant_caixa = $_POST['quant_caixa'];;
$unid_caixa = $_POST['unid_caixa'];
$add_cp = $quant_caixa * $unid_caixa;
if (isset($_POST['ididoso'])) {
    $ididoso = $_POST['ididoso'];
    $sql = "select add_cp, caixas from estoque_idoso where idremed = '$idremedio' and ididoso = '$ididoso'";
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);
    if (isset($linha['add_cp'])) {
        $quant_caixa =  $quant_caixa + $linha['caixas'];
        $add_cp = $add_cp + $linha['add_cp'];
    }

    $sql = "UPDATE estoque_idoso SET caixas='$quant_caixa',unid_cp='$unid_caixa',add_cp='$add_cp' where idremed = $idremedio and ididoso = $ididoso";

    mysqli_query($con, $sql);
    echo $sql . 'kkkkkkkkkkkkkkkkkkkk' . $idremedio;
    mysqli_close($con);
    header('Location: estoque_idoso.php?ididoso=' . $ididoso);
} else {
    $sql = "select add_cp, caixas from estoque_sus where idremedio = '$idremedio'";
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);
    if (isset($linha['add_cp'])) {
        $quant_caixa =  $quant_caixa + $linha['caixas'];
        $add_cp = $add_cp + $linha['add_cp'];
    }
    $sql = "UPDATE estoque_sus SET  caixas='$quant_caixa',unid_cp='$unid_caixa',add_cp='$add_cp' where idremedio = $idremedio";

    mysqli_query($con, $sql);
    echo $sql . 'kkkkkkkkkkkkkkkkkkkk' . $idremedio;
    mysqli_close($con);
    header('Location: estoque.php');
}
