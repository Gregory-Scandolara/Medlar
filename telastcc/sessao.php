<?php /*
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
    if (mysqli_affected_rows($linha) > 0) {
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
} */
include_once('conexao.php');
if (isset($_GET['logout'])) {
    session_start(); // Inicia a sessão
    session_destroy(); // Destrói a sessão limpando todos os valores salvos
    header("Location: login.php?final=1");
    exit; // Redireciona o visitante
}
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) and (empty($_POST['user']) or empty($_POST['senha']))) {
    header("Location: index.php");
    exit;
}

$usuario = $_POST['user'];
$senha = $_POST['senha'];

// Validação do usuário/senha digitados
// $sql = "SELECT `id_user` FROM `usuarios` WHERE (`nome_usuario` = '" . $usuario . "') AND (`senha` = '" . sha1($senha) . "')";
$sql = "SELECT id_user FROM usuarios WHERE nome_usuario = '$usuario' AND senha = '$senha'";
$rs = mysqli_query($con, $sql);
if (mysqli_num_rows($rs) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    header("Location: index.php?erro=1");
    exit;
} else {
    // Salva os dados encontados na variável $resultado
    $resultado = mysqli_fetch_assoc($rs);

    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['id_user'];
    echo $_SESSION['UsuarioID'];
    // Redireciona o visitante
    header("Location: checagem.php");
    exit;
}
