<?php
include_once('conexao.php');

$idremedio = $_POST['idremedio'];
$quant_caixa = $_POST['quant_caixa'];;
$add_cp = $_POST['add_cp'];

if (isset($_POST['ididoso'])) {
        $ididoso = $_POST['ididoso'];
        $sql = "UPDATE estoque_idoso SET 
        caixas='$quant_caixa', add_cp='$add_cp'  WHERE idremed=$idremedio and ididoso=$ididoso";
        mysqli_query($con, $sql);
        header('Location: estoque_idoso.php?ididoso=' . $ididoso);
} else {
        $sql = "UPDATE estoque_sus SET 
        caixas='$quant_caixa', add_cp='$add_cp'  WHERE idremedio=$idremedio";

        mysqli_query($con, $sql);
        header('Location: estoque.php');
}
