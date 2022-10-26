<?php
session_start();
include("conexao.php");
$user = $_POST['user'];
$senha = $_POST['senha'];
$sql = "SELECT * FROM usuarios WHERE nome_usuario='$user' AND senha='$senha'";
mysqli_query($con, $sql);
$query = mysqli_query($con, $sql);
$rs = mysqli_query($con, $sql);
while ($linha = mysqli_fetch_array($rs));
$sla  = $linha['id_user'];
$_SESSION['id_user'] = $linha['id_user'];

if ($sla = 1) {
    /*tem algum problema nesse if 
    if (mysqli_affected_rows($linha) > 0) {*/
    $_SESSION['id'] = $linha['id_user'];
} else {
    header('location:login.php');
}

if (mysqli_affected_rows($con) > 0) {
    echo "<script> alert('Login sucessido.') </script>";
    header('location:checagem.php');
    die();
} else {

    header('location:login.php?erro=1');
}
