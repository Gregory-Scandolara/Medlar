<?php
include_once('conexao.php');
$idutiliza = $_POST['idutiliza'];
$ididoso = $_POST['ididoso'];
$posologia = $_POST['posologia'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$horario = $_POST['horario'];
$obs_remed_idoso = $_POST['obs_remed_idoso'];
$estoque = $_POST['estoque'];

$sql = "UPDATE utiliza SET 
        posologia='$posologia', 
        horario='$horario', 
        data_inicio='$data_inicio', 
        data_fim='$data_fim', 
        obs_remed_idoso='$obs_remed_idoso',
        estoque='$estoque'
        WHERE idutiliza='$idutiliza'";
mysqli_query($con, $sql);
header('Location: dado_remed_idoso.php?ididoso=' . $ididoso);
