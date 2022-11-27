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
    <div id="titulo_estoque" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>CADASTRO DE ESTOQUE</h2>
            <h5>CADASTRO DE ESTOQUE</h5>
        </div>
    </div>
    <?php

    include_once("conexao.php");

    $ididoso = $_GET['ididoso'];
    $idremedio = $_GET['idremedio'];
    include_once("navbar.html");

    ?>
    <title>Cadastro Idosos</title>
    <div class='conteiner' id="cad-estoque-conteiner">

        <form action="func_estoque.php" method="POST">

            <label>Medicamento </label>
            <?php $sql10 = "select * from medicamentos where idremedio = $idremedio ";
            $rs10 = mysqli_query($con, $sql10);
            $linha10 = mysqli_fetch_array($rs10) ?>
            <div class="campo">
                <?php echo $linha10['nome_remed'] . ' - ' . $linha10['dosagem']; ?>
            </div>
            <? echo $sql10; ?>

            <label>Quantidade de caixas</label> <br><input class='form-control' type="text" name="quant_caixa">
            <label>Quantidade de medicamentos em cada caixa</label> <br><input class='form-control' type="text" name="unid_caixa"> <br>
            <input type="hidden" value="<?= $idremedio ?>" name="idremedio">
            <input type="hidden" value="<?= $ididoso ?>" name="ididoso">
            <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
    </div>

    </div>
    <?php
    //}
    ?>
</body>

</html>