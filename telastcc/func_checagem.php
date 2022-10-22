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

$sql2 = "select MAX(add_cp) as max_cp from estoque where idremedio = $idremedio";
$rs2 = mysqli_query($con, $sql2);
$linha2 = mysqli_fetch_array($rs2);

$max_cp = $linha2['max_cp'];
$sub_cp = $posologia;
$util_cp = $max_cp - $sub_cp;
$sql3 = "UPDATE estoque SET 
             add_cp='$util_cp'
             WHERE add_cp = '$max_cp' and idremedio = '$idremedio'";
mysqli_query($con, $sql3);
header('Location: checagem_remed_idoso.php?horario=' . $horario);
