<?php
include_once('conexao.php');
$nome_remed = $_POST['nome_remed'];
$dosagem = $_POST['dosagem'];
$obs_remed = $_POST['obs_remed'];


$sql = "INSERT INTO medicamentos (nome_remed, dosagem, obs_remed)
            VALUES ('$nome_remed', '$dosagem', '$obs_remed')";
mysqli_query($con, $sql);

$sql3 = "select idremedio from medicamentos where nome_remed = '$nome_remed' and dosagem = '$dosagem'";
$rs = mysqli_query($con, $sql3);
$linha = mysqli_fetch_array($rs);
$idremedio = $linha['idremedio'];

$sql2 = "INSERT INTO estoque_sus (idremedio, caixas, unid_cp, add_cp)
VALUES ('$idremedio', 0, 0, 0)";



mysqli_query($con, $sql2);
echo $sql;
mysqli_close($con);
header("Location: dado_remed.php");
