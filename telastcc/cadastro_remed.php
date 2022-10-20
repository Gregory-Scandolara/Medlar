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
        <h2>CADASTRO DO MEDICAMENTO</h2>
    </div>
    <?php

    include("conexao.php");

    if (isset($_POST['btnSalvar'])) {
        $nome_remed = $_POST['nomeremed'];
        $dosagem = $_POST['dosagem'];
        $obs_remed = $_POST['obs_remed'];


        $sql = "INSERT INTO medicamentos (nome_remed, descricao, dosagem, obs_remed)
					VALUES ('$nome_remed', '$dosagem', '$obs_remed')";

        mysqli_query($con, $sql);
        //echo $sql;
        mysqli_close($con);
        header("Location: dado_remed.php");
    ?>
    <?php } else {
        include("navbar.html");
    ?>
        <title>Cadastro Medicamentos</title>
        <div id="cad-remed-conteiner">
            <form id="2" action="cadastro_remed.php" method="POST">
                <label>Nome</label> <input class='form-control' type="text" name="nome_remed">

                <label>Dosagem</label> <input class='form-control' type="text" name="dosagem">
                <label>Observações</label> <input class='form-control' type="text" name="obs_remed"><br>
                <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
                <input class='btn btn-info' type="reset" value="Limpar campos" />
        </div>
    <?php } ?>
</body>

</html>