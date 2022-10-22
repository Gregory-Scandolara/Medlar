<?php

include("conexao.php");


$idremedio = $_POST['idremedio'];
$quant_caixa = $_POST['quant_caixa'];;
$unid_caixa = $_POST['unid_caixa'];
$add_cp = $quant_caixa * $unid_caixa;
$sql = "select add_cp, caixas from medicamentos where idremedio = '$idremedio'";
$rs = mysqli_query($con, $sql);
$linha = mysqli_fetch_array($rs);
if (isset($linha['add_cp'])) {
    $quant_caixa =  $quant_caixa + $linha['caixas'];
    $add_cp = $add_cp + $linha['add_cp'];
}
$sql = "UPDATE medicamentos SET  caixas='$quant_caixa',unid_cp='$unid_caixa',add_cp='$add_cp' where idremedio = $idremedio";

mysqli_query($con, $sql);
echo $sql . 'kkkkkkkkkkkkkkkkkkkk' . $idremedio;
mysqli_close($con);
header('Location: estoque.php');
