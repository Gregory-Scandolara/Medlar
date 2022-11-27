<?php include_once("restrito.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('conexao.php');


    $idremedio = $_GET['idremedio'];
    $ididoso = $_GET['ididoso'];

    $sql = "SELECT caixas, add_cp FROM estoque_idoso WHERE idremed=$idremedio and ididoso= $ididoso";
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);
    ?>
    <?php include_once('navbar.html'); ?>
    <?php


    include_once("conexao.php");
    ?>
    <div id="titulo_edita_estoque" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>EDITAR ESTOQUE</h2>
            <h5>EDITAR ESTOQUE</h5>
        </div>
    </div>
    <div class='conteiner' id="cad-estoque-conteiner">
        <form action="func_editar_estoque.php" method="POST">

            <label>Medicamento </label>
            <?php $sql2 = "select * from medicamentos where idremedio = $idremedio ";
            $rs2 = mysqli_query($con, $sql2);
            $linha2 = mysqli_fetch_array($rs2) ?>
            <div class="campo">
                <?php echo $linha2['nome_remed'] . ' - ' . $linha2['dosagem']; ?>
            </div>
            <label>Quantidade de caixas</label> <br><input value="<?php echo $linha['caixas']; ?>" class='form-control' type="text" name="quant_caixa">
            <label>Quantidade total de comprimidos</label> <br><input value="<?php echo $linha['add_cp']; ?>" class='form-control' type="text" name="add_cp"> <br>
            <input type="hidden" name="idremedio" value="<?php echo $idremedio ?>">
            <input type="hidden" name="ididoso" value="<?php echo $ididoso ?>">
            <input class='btn btn-success' type="submit" value="Enviar" name="editar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
    </div>

    </div>

</body>

</html>