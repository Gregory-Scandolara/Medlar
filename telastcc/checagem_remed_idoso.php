<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checagem.css">
    <title>Document</title>
</head>

<body>

    <?php
    include('conexao.php');
    include('navbar.html');
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y-m-d');
    // echo 'kkkkkkkkkkkkkkkkkkkkkkk' . $hoje;
    $horario = $_GET['horario'];
    ?>
    <div id="titulo2" class="titulo">
        <h4>Checagem dos medicamentos do horario: <?= $horario ?></h4>
        <h2>Checagem dos medicamentos do horario: <?= $horario ?></h2>
    </div>
    <div id="dois" class="conteiner">
        <table class="table table-info table-bordered">
            <thead>
                <tr>
                    <td>Pacientes</td>
                    <td>Remedio</td>
                    <td>Dosagem</td>
                    <td>Posologia</td>
                    <td>checagem</td>
                    <td>check</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $sql = "select * from utiliza, idosos, medicamentos where utiliza.ididoso = idosos.ididoso and utiliza.horario = '$horario' and utiliza.idremedio = medicamentos.idremedio";
                    $rs = mysqli_query($con, $sql);
                    while ($linha = mysqli_fetch_array($rs)) {
                        $color = (strtotime($hoje) == strtotime($linha['checagem'])) ? "#0ead69" : "#db3a34";

                        //echo 'kkkkkkkkkkkkkkkkk' . $linha['checagem'] . $hoje; 
                    ?>

                        <td colspan="1" bgcolor="<?= $color ?>"><?= $linha['nome_idoso']; ?></a>
                        <td colspan="1" bgcolor="<?= $color ?>"><?= $linha['nome_remed'] ?></td>
                        <td colspan="1" bgcolor="<?= $color ?>"><?= $linha['dosagem'] ?></td>
                        <td colspan="1" bgcolor="<?= $color ?>"><?= $linha['posologia'] . 'cp' ?></td>
                        <td colspan="1" bgcolor="<?= $color ?>"><?= $linha['checagem'] ?></td>
                        <!-- <td><a href="checagem_remed_idoso.php?checagem=true&horario=<?php /* echo $horario */ ?>"><i class='bx bxs-check-square'></i> </a></td> -->
                        <td colspan="1" bgcolor="<?php echo $color ?>">
                            <form action=" func_checagem.php<?php /*echo $_SERVER["PHP_SELF"]; ?>?horario=<?php echo $horario */ ?>" method="POST">
                                <input type="hidden" name="checagem" value="<?= $hoje ?>">
                                <input type="hidden" name="idutiliza" value="<?= $linha['idutiliza'] ?>">
                                <input type="hidden" name="idremedio" value="<?= $linha['idremedio'] ?>">
                                <input type="hidden" name="posologia" value="<?= $linha['posologia'] ?>">
                                <input type="hidden" name="horario" value="<?= $linha['horario'] ?>">
                                <!--  <button class='btn btn-success' type="submit" name="check"><i class='bx bxs-check-square'></i></button> -->
                                <input class='btn btn-success' type="submit" name="check" i class='bx bxs-check-square'>
                            </form>
                        </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>

</body>

</html>