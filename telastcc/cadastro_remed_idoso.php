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
        <h2>Cadastro do Remedio para o Paciente</h2>
    </div>
    <?php
    include("conexao.php");


    $ididoso = $_GET['ididoso'];;

    if (isset($_POST['btnSalvar'])) {
        $ididoso = $_POST['ididoso'];
        $idremedio = $_POST['idremedio'];
        $posologia = $_POST['posologia'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $horario = $_POST['horario'];
        $obs_remed_idoso = $_POST['obs_remed_idoso'];

        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_inicio, data_fim, obs_remed_idoso)
        VALUES ('$ididoso', '$idremedio', $posologia, '$horario', '$data_inicio','$data_fim', '$obs_remed_idoso')";
        mysqli_query($con, $sql);
        header('Location: dadoidoso.php?ididoso=' . $ididoso);
        // header nao funciona vai toma no cu
    } else {
        include("navbar.html");
        $sql = "SELECT * FROM idosos WHERE ididoso=$ididoso";
        $rs = mysqli_query($con, $sql);
        $linha = mysqli_fetch_array($rs);
    ?>



        <title>Cadastro Medicamentos</title>
        <div id="cad-remed-idoso-conteiner">
            <form action="cadastro_remed_idoso.php?ididoso=<?php echo $ididoso ?>" method="POST">
                <label>Medicamento: <select class='form-control' name="idremedio"></label>
                <option>Selecione</option>

                <?php $sql = "select * from medicamentos ";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>

                    <option value=<?php echo $linha['idremedio'] ?>>
                        <?php echo $linha['nome_remed'] . ' - ' . $linha['dosagem']; ?>
                    </option>

                <?php } ?>
                </select>

                <label>Horario: </label><input type="time" step="1" class='form-control' name="horario">
                <label>Posologia:</label> <input class='form-control' type="text" name="posologia">
                <label>Data Inicio:</label><input class='form-control' type="date" name="data_inicio">
                <label>Data Fim:</label><input class='form-control' type="date" name="data_fim">
                <label>Observações:</label> <input class='form-control' type="text" name="obs_remed_idoso"><br>
                <input type="hidden" name="ididoso" value="<?php echo $ididoso ?>">
                <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
                <input class='btn btn-info' type="reset" value="Limpar campos" />
            </form>
        </div>
    <?php } ?>
</body>

</html>