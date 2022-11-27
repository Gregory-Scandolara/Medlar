<?php
include_once('conexao.php');

$ididoso = $_POST['ididoso'];
$idremedio = $_POST['idremedio'];
$posologia = $_POST['posologia'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$horario = $_POST['horario'];
$estoque = $_POST['estoque'];
$obs_remed_idoso = $_POST['obs_remed_idoso'];

if ($estoque == 'p') {
    if (empty($data_fim) and empty($data_inicio)) {
        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario', '$obs_remed_idoso', 'p')";
    } elseif (!empty($data_fim) and empty($data_inicio)) {
        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_fim, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario','$data_fim', '$obs_remed_idoso', 'p')";
    } elseif (empty($data_fim) and !empty($data_inicio)) {
        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_inicio, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario', '$data_inicio', '$obs_remed_idoso', 'p')";
    } else {

        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_inicio, data_fim, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario', '$data_inicio','$data_fim', '$obs_remed_idoso', 'p')";
    }
} else {



    if (empty($data_fim) and empty($data_inicio)) {
        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario', '$obs_remed_idoso', 's')";
    } elseif (!empty($data_fim) and empty($data_inicio)) {
        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_fim, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario','$data_fim', '$obs_remed_idoso', 's')";
    } elseif (empty($data_fim) and !empty($data_inicio)) {
        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_inicio, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario', '$data_inicio', '$obs_remed_idoso', 's')";
    } else {

        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_inicio, data_fim, obs_remed_idoso, estoque)
     VALUES ('$ididoso', '$idremedio', '$posologia', '$horario', '$data_inicio','$data_fim', '$obs_remed_idoso', 's')";
    }
}
mysqli_query($con, $sql);
if ($estoque == 'p') {
    $sqlp = "select * from estoque_idoso where ididoso='$ididoso' and idremed='$idremedio'";
    $rsp = mysqli_query($con, $sqlp);
    $linhap = mysqli_fetch_array($rsp);
    echo $sqlp . 'kdf';
    $add_estoque = $linhap['idestoqueidoso'];
    if (empty($add_estoque)) {

        $sql2 = "INSERT INTO estoque_idoso (ididoso, idremed, caixas, unid_cp, add_cp)
      VALUES ('$ididoso', '$idremedio', 0, 0, 0)";
        mysqli_query($con, $sql2);
        echo 'abcd';
    }
}


// echo $sql . $sql2;
header('Location: dadoidoso.php?ididoso=' . $ididoso);
