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
    include('conexao.php');

    $idremedio = $_GET['idremedio'];

    if (isset($_POST['editar'])) {
        $idremedio = $_POST['idremedio'];
        $quant_caixa = $_POST['quant_caixa'];;
        $add_cp = $_POST['add_cp'];

        $sql = "DELETE FROM estoque WHERE idremedio=$idremedio";

        mysqli_query($con, $sql);

        $sql2 = "insert into estoque (idremedio, caixas ,unid_cp, add_cp)
                values ('$idremedio', '$quant_caixa', '0', '$add_cp')";

        mysqli_query($con, $sql2);

        header('Location: estoque.php');
        echo $sql2;
        // if (mysqli_affected_rows($con) > 0) {
        //     echo "<script> alert('Usuário alterado com sucesso.') </script>";
        //     // header("Location: listaUsuarios.php");
        // } else {
        //     echo "<script> alert('Ocorreu algum erro.') </script>";
        // }
    } else {
        $sql = "SELECT SUM(caixas) as caixas, SUM(add_cp) as add_cp FROM estoque WHERE idremedio=$idremedio";
        $rs = mysqli_query($con, $sql);
        $linha = mysqli_fetch_array($rs);
    ?>
        <?php include('navbar.html'); ?>
        <?php


        include("conexao.php");
        ?>
        <div id="titulo1" class="titulo">
            <h2>EDITAR ESTOQUE</h2>
        </div>
        <div class='container' id="cad-estoque-conteiner">
            <form action="editar_estoque.php?idremedio=<?php echo $idremedio ?>" method="POST">

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
                <input class='btn btn-success' type="submit" value="Enviar" name="editar" />
                <input class='btn btn-info' type="reset" value="Limpar campos" />
        </div>

        </div>
    <?php } ?>
</body>

</html>