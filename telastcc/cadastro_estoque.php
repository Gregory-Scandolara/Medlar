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
        <h2>Cadastro de Estoque</h2>
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

        <!-- <div id="tabela-conteiner">
            <div class="dois">
                <table class="table table-info table-bordered">
                    <thead>
                        <td> <?php echo 'nome: '; ?></td>
                        <?php
                        $sql = "select * from medicamentos where idremedio=$idremedio";
                        $rs = mysqli_query($con, $sql);
                        while ($linha = mysqli_fetch_array($rs)) { ?>
                            <td> <?php echo  $linha['nome_remed']; ?></tr>
                            <td> <?php echo 'Dosagem: '; ?></td>

                            <td> <?php echo $linha['dosagem'] . 'mg'; ?></tr>
                            <?php } ?>

                            <td> <?php echo 'Quantidade de Caixas: '; ?></td>
                            <td> <?php echo $quant_caixa; ?></tr>

                            <td> <?php echo 'Remedios por Caixa: '; ?></td>
                            <td> <?php echo $unid_caixa; ?></tr>

                            <td> <?php echo 'Comprimidos adicionados no Estoque: '; ?></td>
                            <td> <?php echo $add_cp; ?></tr>

            </div>
            <a href="cadastro_estoque.php">cadastrar mais um</a> -->
    <?php
    } else {
        include("navbar.html");
    ?>
        <title>Cadastro Idosos</title>
        <div class='container' id="cad-estoque-conteiner">
            <form action="cadastro_estoque.php" method="POST">
                <br><br>
                <label>Medicamento <select class='form-control' name="idremedio"></label>
                <option>Selecione</option>
                <?php $sql = "select * from medicamentos ";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <option value=<?php echo $linha['idremedio'] ?>>
                        <?php echo $linha['nome_remed'] . ' - ' . $linha['dosagem'] . 'mg'; ?>
                    </option>
                <?php } ?> </select>

                <label>Quantidade de caixas</label> <br><input class='form-control' type="text" name="quant_caixa">
                <label>Quantidade de remedios em cada caixa</label> <br><input class='form-control' type="text" name="unid_caixa"> <br>

                <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
                <input class='btn btn-info' type="reset" value="Limpar campos" />
        </div>

        </div>
    <?php } ?>
</body>

</html>