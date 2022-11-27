<?php include_once("restrito.php"); ?>
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
    include_once('conexao.php');

    include_once('navbar.html');
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y-m-d');
    // echo 'kkkkkkkkkkkkkkkkkkkkkkk' . $hoje;
    $horario = $_GET['horario'];
    ?>
    <div id="titulo_checagem_remed" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h5>Checagem dos medicamentos do horario: <?= $horario ?></h5>
            <h2>Checagem dos medicamentos do horario: <?= $horario ?></h2>
        </div>
    </div>
    <div id="dois" class="conteiner">
        <table class="table table-info table-bordered">
            <thead>
                <tr>
                    <td>Idosos</td>
                    <td id="some">Medicamento</td>
                    <td id="some">Dosagem</td>
                    <td id="some">Posologia</td>
                    <td id="some">checagem</td>
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
                        <td id="some" colspan="1" bgcolor="<?= $color ?>"><?= $linha['nome_remed'] ?></td>
                        <td id="some" colspan="1" bgcolor="<?= $color ?>"><?= $linha['dosagem'] ?></td>
                        <td id="some" colspan="1" bgcolor="<?= $color ?>"><?= $linha['posologia'] . 'cp' ?></td>
                        <td id="some" colspan="1" bgcolor="<?= $color ?>"><?= date_format(date_create($linha['checagem']), "d/m/Y") ?></td>
                        <!-- <td><a href="checagem_remed_idoso.php?checagem=true&horario=<?php /* echo $horario */ ?>"><i class='bx bxs-check-square'></i> </a></td> -->
                        <td id="some" colspan="1" bgcolor="<?php echo $color ?>">
                            <form action=" func_checagem.php<?php /*echo $_SERVER["PHP_SELF"]; ?>?horario=<?php echo $horario */ ?>" method="POST">
                                <input type="hidden" name="checagem" value="<?= $hoje ?>">
                                <input type="hidden" name="idutiliza" value="<?= $linha['idutiliza'] ?>">
                                <input type="hidden" name="idremedio" value="<?= $linha['idremedio'] ?>">
                                <input type="hidden" name="posologia" value="<?= $linha['posologia'] ?>">
                                <input type="hidden" name="horario" value="<?= $linha['horario'] ?>">
                                <input type="hidden" name="estoque" value="<?= $linha['estoque'] ?>">

                                <!--  <button class='btn btn-success' type="submit" name="check"><i class='bx bxs-check-square'></i></button> -->
                                <input class='btn btn-success' type="submit" name="check" i class='bx bxs-check-square'>
                            </form>
                        </td>
                        <td colspan="1" bgcolor="<?= $color ?>" id="botaomodal">
                            <!-- Trigger/Open The Modal -->
                            <button class="btn btn-info btn-sm" style="padding: 13px;" id="myBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg></button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <?php
                                $nome_remed = $linha['nome_remed'];
                                $dosagem = $linha['dosagem'];
                                $posologia = $linha['posologia'] . 'cp';
                                $checagem = $linha['checagem']; ?>
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h5 class="text-center">Informações detalhadas</h5>
                                    <table>
                                        <tr>
                                            <td>Medicamento</td>
                                            <td> <?= $nome_remed ?></td>
                                        </tr>
                                        <tr>
                                            <td>Dosagem</td>
                                            <td><?= $dosagem ?></td>
                                        </tr>
                                        <tr>
                                            <td>Posologia</td>
                                            <td><?= $posologia ?></td>
                                        </tr>
                                        <tr>
                                            <td>checagem</td>
                                            <td><?= $checagem ?></td>
                                        </tr>
                                        <tr>
                                            <td>check</td>
                                            <td colspan="1">
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

                                    </table>
                                </div>

                            </div>
                        </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
    <?php include_once('funcao_modal.php');
    ?>
</body>

</html>