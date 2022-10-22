<?php
include('conexao.php');
$checagem = $_POST['checagem'];
$idutiliza = $_POST['idutiliza'];
$idremedio = $_POST['idremedio'];
$posologia = $_POST['posologia'];
$horario = $_POST['horario'];
$sql = "UPDATE utiliza SET 
             checagem='$checagem' 
            WHERE idutiliza='$idutiliza'";
mysqli_query($con, $sql);

$sql = "select add_cp from medicamentos where idremedio = $idremedio";
echo $sql;
$rs = mysqli_query($con, $sql);
$linha = mysqli_fetch_array($rs);

$add_cp = $linha['add_cp'];
$sub_cp = $posologia;
//quantidade de comprimidos a serem consumidos
$util_cp = $add_cp - $sub_cp;
$sql3 = "UPDATE medicamentos SET 
             add_cp='$util_cp'
             WHERE add_cp = '$add_cp' and idremedio = '$idremedio'";
mysqli_query($con, $sql3);
header('Location: checagem_remed_idoso.php?horario=' . $horario);
