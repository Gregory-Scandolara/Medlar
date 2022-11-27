<?php include_once("restrito.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">

    <title>Document</title>
</head>
<div id="titulo_edit_remed_idoso" class="titulo">
    <div class="titulo_img">
        <img src="img/titulo.png" alt="">
    </div>
    <div class="tit">
        <h2>EDITAR MEDICAMENTO DO IDOSO</h2>
        <h5>EDITAR MEDICAMENTO DO IDOSO</h5>
    </div>
</div>
<?php
include_once("conexao.php");



$idutiliza = $_GET['idutiliza'];


include_once("navbar.html");
$sql = "select * from utiliza, medicamentos where utiliza.idutiliza = '$idutiliza' and utiliza.idremedio = medicamentos.idremedio";
$rs = mysqli_query($con, $sql);
$linha2 = mysqli_fetch_array($rs);
?>
<title>Cadastro Medicamentos</title>
<div id="cad-remed-idoso-conteiner">

    <form action="func_editar_remed_idoso.php" method="POST">
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
        <?php
        $estoqueP = ($linha2['estoque'] == 'p') ? "checked" : "";
        $estoqueS = ($linha2['estoque'] == 's') ? "checked" : ""; ?>
        <label>Estoque</label><br>
        <div>
            <div class="radio">
                <input type="radio" name="estoque" value="p" <?php echo $estoqueP; ?>>Pessoal
            </div>
            <div class="radio">
                <input type="radio" name="estoque" value="s" <?php echo $estoqueS; ?>>SUS
            </div>
        </div>
        <label>Data Inicio</label><input value="<?= $linha['data_inicio'] ?>" class='form-control' type="date" name="data_inicio">
        <label>Data Fim</label><input value="<?= $linha['data_fim'] ?>" class='form-control' type="date" name="data_fim">
        <label>Observações</label> <input value="<?= $linha['obs_remed_idoso'] ?>" class='form-control' type="text" name="obs_remed_idoso"><br>
        <input type="hidden" name="ididoso" value="<?php echo $linha['ididoso']; ?>">
        <input type="hidden" name="idutiliza" value="<?php echo $idutiliza; ?>">
        <input class='btn btn-success' type="submit" value="Enviar" name="editar" />
        <input class='btn btn-info' type="reset" value="Limpar campos" />
    </form>
</div>

<body>

</body>

</html>