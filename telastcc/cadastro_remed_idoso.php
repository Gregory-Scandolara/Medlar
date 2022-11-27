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

    <?php
    include_once("conexao.php");



    $ididoso = $_GET['ididoso'];;


    include_once("navbar.html");
    $sql = "SELECT * FROM idosos WHERE ididoso=$ididoso";
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);
    ?>
    <div id="titulo_med_idoso" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>Cadastro do Medicamento para o Idoso</h2>
            <h5>Cadastro do Medicamento para o Idoso</h5>
        </div>
    </div>


    <title>Cadastro Medicamentos</title>
    <div id="cad-remed-idoso-conteiner">
        <form action="func_cadastro_remed_idoso.php?ididoso=<?php echo $ididoso ?>" method="POST">
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

            <label>Horário </label><input type="time" step="1" class='form-control' name="horario">
            <label>Posologia(somente números)</label> <input class='form-control' type="text" <?php /*pattern="[1-2-3-4-5-6-7-8-9-10]"*/ ?>name="posologia">
            <label>Estoque</label><br>
            <div class="radio">
                <input type="radio" name="estoque" value="p">Pessoal
            </div>
            <div class="radio">
                <input type="radio" name="estoque" value="s">SUS
            </div>
            <label>Data Inicio:</label><input class='form-control' type="date" name="data_inicio">
            <label>Data Fim:</label><input class='form-control' type="date" name="data_fim">
            <!-- <label>Observações</label> <input class='form-control' type="text" name="obs_remed_idoso"><br> -->
            <input type="hidden" name="ididoso" value="<?php echo $ididoso ?>">
            <input type="hidden" name="checagem" value="2000-02-20">
            <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
        </form>
    </div>

</body>

</html>