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
    include("navbar.html");
    include("bootstrap.html");
    include("conexao.php");
    $ididoso = $_GET['ididoso'];;

    if (isset($_POST['btnSalvar'])) {
        $ididoso = $_POST['ididoso'];
        $idremedio = $_POST['idremedio'];
        $posologia = $_POST['posologia'];
        $periodo = $_POST['periodo'];
        $obs = $_POST['obs'];

        $sql = "INSERT INTO utiliza (ididoso, idremedio, posologia, periodo, obs)
        VALUES ('$ididoso', '$idremedio', $posologia, '$periodo', '$obs')";

        mysqli_query($con, $sql);
        // echo $sql;
        mysqli_close($con);
    } else {

        "SELECT * FROM idosos WHERE ididoso=$ididoso";
    ?>
        <title>Cadastro Medicamentos</title>
        </h2>
        <div id="cad-conteiner3">
            <form action="recebemedicamento.php" method="POST">
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
                <label>Horario: <select class='form-control'></label>
                <option>Selecione</option>

                <option value="00">00hrs</option>
                <option value="01">01hrs</option>
                <option value="02">02hrs</option>
                <option value="03">03hrs</option>
                <option value="04">04hrs</option>
                <option value="05">05hrs</option>
                <option value="06">06hrs</option>
                <option value="07">07hrs</option>
                <option value="08">08hrs</option>
                <option value="09">09hrs</option>
                <option value="10">10hrs</option>
                <option value="11">11hrs</option>
                <option value="12">12hrs</option>
                <option value="13">13hrs</option>
                <option value="14">14rs</option>
                <option value="15">15hrs</option>
                <option value="16">16hrs</option>
                <option value="17">17hrs</option>
                <option value="18">18hrs</option>
                <option value="19">19hrs</option>
                <option value="20">20hrs</option>
                <option value="21">21hrs</option>
                <option value="22">22hrs</option>
                <option value="23">23hrs</option>


                </select><BR>
                <label>Posologia Diaria:</label> <input class='form-control' type="text" name="posologia">
                <!-- <label>Data inicial:</label> <input type="date" name="datainicial"><br>
			<label>Data fim:</label> <input type="date" name="datafinal"><br> -->
                <label>Periodo(dias):</label><input class='form-control' type="text" name="periodo">
                <label>Observações:</label> <input class='form-control' type="text" name="obs"><br><br>
                <input type="hidden" name="ididoso" value="<?php echo $ididoso ?>">
                <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
                <input class='btn btn-info' type="reset" value="Limpar campos" />
            </form>
        </div>
    <?php } ?>
</body>

</html>