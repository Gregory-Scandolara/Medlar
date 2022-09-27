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
    include("conexao.php");


    $ididoso = $_GET['ididoso'];;

    if (isset($_POST['btnSalvar'])) {
        $ididoso = $_POST['ididoso'];
        $idremedio = $_POST['idremedio'];
        $posologia = $_POST['posologia'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $horario = $_POST['horario'];
        $obs = $_POST['obs'];

        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, horario, data_inicio, data_fim, obs)
        VALUES ('$ididoso', '$idremedio', $posologia, '$horario', '$data_inicio','$data_fim', '$obs')";
        echo $sql;
        mysqli_query($con, $sql);
        header('Location: dadoidoso.php?ididoso=' . $ididoso);
    } else {
        include("navbar.html");
        $sql = "SELECT * FROM idosos WHERE ididoso=$ididoso";
        $rs = mysqli_query($con, $sql);
        $linha = mysqli_fetch_array($rs);
    ?>
        <title>Cadastro Medicamentos</title>
        </h2>
        <div id="cad-conteiner3">
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

                <label>Horario: </label><input type="time" class='form-control' name="horario">
                <!-- 
                <option>Selecione</option>
                <option value="00:00:00">00hrs</option>
                <option value="01:00:00">01hrs</option>
                <option value="02:00:00">02hrs</option>
                <option value="03:00:00">03hrs</option>
                <option value="04:00:00">04hrs</option>
                <option value="05:00:00">05hrs</option>
                <option value="06:00:00">06hrs</option>
                <option value="07:00:00">07hrs</option>
                <option value="08:00:00">08hrs</option>
                <option value="09:00:00">09hrs</option>
                <option value="10:00:00">10hrs</option>
                <option value="11:00:00">11hrs</option>
                <option value="12:00:00">12hrs</option>
                <option value="13:00:00">13hrs</option>
                <option value="14:00:00">14rs</option>
                <option value="15:00:00">15hrs</option>
                <option value="16:00:00">16hrs</option>
                <option value="17:00:00">17hrs</option>
                <option value="18:00:00">18hrs</option>
                <option value="19:00:00">19hrs</option>
                <option value="20:00:00">20hrs</option>
                <option value="21:00:00">21hrs</option>
                <option value="22:00:00">22hrs</option>
                <option value="23:00:00">23hrs</option>


                </select><BR> -->
                <label>Posologia Diaria:</label> <input class='form-control' type="text" name="posologia">
                <!-- <label>Data inicial:</label> <input type="date" name="datainicial"><br>
			<label>Data fim:</label> <input type="date" name="datafinal"><br> -->
                <label>Data Inicio:</label><input class='form-control' type="date" name="data_inicio">
                <label>Data Fim:</label><input class='form-control' type="date" name="data_fim">
                <label>Observações:</label> <input class='form-control' type="text" name="obs"><br><br>
                <input type="hidden" name="ididoso" value="<?php echo $ididoso ?>">
                <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
                <input class='btn btn-info' type="reset" value="Limpar campos" />
            </form>
        </div>
    <?php } ?>
</body>

</html>