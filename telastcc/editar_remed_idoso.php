<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">

    <title>Document</title>
</head>
<div id="titulo1" class="titulo">
    <h2>EDITAR MEDICAMENTO DO IDOSO</h2>
</div>
<?php
include("conexao.php");


$idutiliza = $_GET['idutiliza'];

if (isset($_POST['editar'])) {
    $ididoso = $_POST['ididoso'];
    $posologia = $_POST['posologia'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $horario = $_POST['horario'];
    $obs_remed_idoso = $_POST['obs_remed_idoso'];

    $sql = "UPDATE utiliza SET 
            posologia='$posologia', 
            horario='$horario', 
            data_inicio='$data_inicio', 
            data_fim='$data_fim', 
            obs_remed_idoso='$obs_remed_idoso'
            WHERE idutiliza='$idutiliza'";
    mysqli_query($con, $sql);
    header('Location: dado_remed_idoso.php?ididoso=' . $ididoso);
} else {
    include("navbar.html");
    $sql = "select * from utiliza, medicamentos where utiliza.idutiliza = '$idutiliza' and utiliza.idremedio = medicamentos.idremedio";
    $rs = mysqli_query($con, $sql);
    $linha2 = mysqli_fetch_array($rs);
?>
    <title>Cadastro Medicamentos</title>
    <div id="cad-remed-idoso-conteiner">
        <form action="editar_remed_idoso.php?idutiliza=<?php echo $idutiliza ?>" method="POST">
            <label>Medicamento</label>
            <div class="campo">
                <?php echo $linha2['nome_remed'] . ' - ' . $linha2['dosagem'] . 'mg'; ?>
            </div>


            <?php $sql = "select medicamentos.nome_remed as nome_remed, medicamentos.dosagem as dosagem, utiliza.ididoso as ididoso, utiliza.horario as horario, utiliza.data_inicio as data_inicio, utiliza.data_fim as data_fim, utiliza.posologia as posologia, utiliza.obs_remed_idoso as obs_remed_idoso from medicamentos, utiliza where idutiliza = $idutiliza";
            $rs = mysqli_query($con, $sql);
            $linha = mysqli_fetch_array($rs) ?>






            </select>

            <label>Horario </label><input value="<?= $linha['horario'] ?>" type="time" step="1" class='form-control' name="horario">
            <label>Posologia Diaria</label> <input value="<?= $linha['posologia'] ?>" class='form-control' type="text" name="posologia">
            <label>Data Inicio</label><input value="<?= $linha['data_inicio'] ?>" class='form-control' type="date" name="data_inicio">
            <label>Data Fim</label><input value="<?= $linha['data_fim'] ?>" class='form-control' type="date" name="data_fim">
            <label>Observações</label> <input value="<?= $linha['obs_remed_idoso'] ?>" class='form-control' type="text" name="obs_remed_idoso"><br>
            <input type="hidden" name="ididoso" value="<?php echo $linha['ididoso']; ?>">
            <input class='btn btn-success' type="submit" value="Enviar" name="editar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
        </form>
    </div>
<?php } ?>

<body>

</body>

</html>