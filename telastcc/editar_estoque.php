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

        $sql = "UPDATE medicamentos SET 
        caixas='$quant_caixa', add_cp='$add_cp'  WHERE idremedio=$idremedio";

        mysqli_query($con, $sql);
        header('Location: estoque.php');
        echo $sql2;
        // if (mysqli_affected_rows($con) > 0) {
        //     echo "<script> alert('Usuário alterado com sucesso.') </script>";
        //     // header("Location: listaUsuarios.php");
        // } else {
        //     echo "<script> alert('Ocorreu algum erro.') </script>";
        // }
    } else {
        $sql = "SELECT caixas, add_cp FROM medicamentos WHERE idremedio=$idremedio";
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
        <div class='conteiner' id="cad-estoque-conteiner">
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