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
    if (isset($_POST['btnSalvar'])) {
        $idremedio = $_POST['idremedio'];
        $quant_caixa = $_POST['quant_caixa'];;
        $unid_caixa = $_POST['unid_caixa'];
        $add_cp = $quant_caixa * $unid_caixa;
        $sql = "INSERT INTO estoque (idremedio, caixas, unid_cp, add_cp)
					VALUES ('$idremedio', '$quant_caixa', '$unid_caixa', '$add_cp')";

        mysqli_query($con, $sql);
        //echo $sql;
        mysqli_close($con);
        header('Location: estoque.php');
    ?>
    <?php
    } else {
        include("navbar.html");
    ?>
        <title>Cadastro Idosos</title>
        <div class='container' id="cad-estoque-conteiner">
            <form action="cadastro_estoque.php" method="POST">

                <label>Medicamento</label> <select class='form-control' name="idremedio">
                    <option>Selecione</option>
                    <?php $sql = "select * from medicamentos ";
                    $rs = mysqli_query($con, $sql);
                    while ($linha = mysqli_fetch_array($rs)) { ?>
                        <option value=<?php echo $linha['idremedio'] ?>>
                            <?php echo $linha['nome_remed'] . ' - ' . $linha['dosagem'] . 'mg'; ?>
                        </option>
                    <?php } ?>
                </select>

                <label>Quantidade de caixas</label> <br><input class='form-control' type="text" name="quant_caixa">
                <label>Quantidade de remedios em cada caixa</label> <br><input class='form-control' type="text" name="unid_caixa"> <br>

                <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
                <input class='btn btn-info' type="reset" value="Limpar campos" />
        </div>

        </div>
    <?php } ?>
</body>

</html>