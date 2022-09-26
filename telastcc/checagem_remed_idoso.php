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
    $horario = $_GET['horario'];
    if (isset($_GET['check'])) {
        $checagem = $_POST['checagem'];
        echo 'kkkkkkkkkkkkkkkkkkkkkkkkkkkk' . $checagem;
    }
    ?>

    <div class="conteiner">
        <table class="table table-info table-bordered">
            <thead>
                <tr>
                    <td>Pacientes</td>
                    <td>Remedio</td>
                    <td>Dosagem</td>
                    <td>Posologia</td>
                    <td>check</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php $sql = "select * from utiliza, idosos, medicamentos where utiliza.ididoso = idosos.ididoso and utiliza.horario = '$horario' and utiliza.idremedio = medicamentos.idremedio";
                    $rs = mysqli_query($con, $sql);
                    while ($linha = mysqli_fetch_array($rs)) { ?>
                        <td colspan="1"><?php echo $linha['nome_idoso']; ?></a>
                        <td><?php echo $linha['nome_remed'] ?></td>
                        <td><?php echo $linha['dosagem'] ?></td>
                        <td><?php echo $linha['posologia'] ?></td>
                        <td><a href="checagem_remed_idoso.php?checagem=true&horario=<?php echo $horario ?>"><i class='bx bxs-check-square'></i> </a></td>
                        <td>
                            <form action="checagem_remed_idoso.php?checagem=true&horario=<?php echo $horario ?>" method="POST">
                                <button class='btn btn-success' type="submit" name="check"><i class='bx bxs-check-square'></i></button>
                            </form>
                        </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <h4>obs: minha intenção é fazer o botao do check enviar o valor de verdadeiro, e quando o valor ser verdadeiro o botao vai ficar verde, quando ser falso vai ficar vermelho, e eu usaria esses valores na outra pagina tambem, por exemplo, quando todos os valores de tal horario forem verdadeiros o botao fica verde. <br><br> meu maior problema seria resetar os valores a cada 24 horas. </h4>
    </div>

</body>

</html>