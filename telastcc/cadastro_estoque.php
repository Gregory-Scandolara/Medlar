<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Document</title>
</head>

<body>
    <div id="titulo1" class="titulo">
        <h2>CADASTRO DE ESTOQUE</h2>
    </div>
    <?php

    include("conexao.php");

    /* if (isset($_POST['btnSalvar'])) {
        $idremedio = $_POST['idremedio'];
        $quant_caixa = $_POST['quant_caixa'];;
        $unid_caixa = $_POST['unid_caixa'];
        $add_cp = $quant_caixa * $unid_caixa;
        $sql3 = "select * from medicamentos where idremedio = $idremedio";
        $rs2 = mysqli_query($con, $sql3);
        $linha2 = mysqli_fetch_array($rs2);
        if (isset($linha2['add_cp'])) {
            $quant_caixa =  $quant_caixa + $linha2['caixas'];
            $add_cp = $add_cp + $linha2['add_cp'];
        }
        $sql = "UPDATE medicamentos SET  caixas='$quant_caixa',unid_cp='$unid_caixa',add_cp='$add_cp' where idremedio = $idremedio";

        mysqli_query($con, $sql);
        echo $sql;
        mysqli_close($con);
        header('Location: estoque.php');
    ?>
    <?php
    } else {*/
    $idremedio = $_GET['idremedio'];
    include("navbar.html");

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
            <label>Quantidade de remedios em cada caixa</label> <br><input class='form-control' type="text" name="unid_caixa"> <br>
            <input type="hidden" value="<?= $idremedio ?>" name="idremedio" />
            <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
    </div>

    </div>
    <?php
    //}
    ?>
</body>

</html>