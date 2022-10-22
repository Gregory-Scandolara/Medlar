<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="css/dadoidoso.css"> -->
    <link rel="stylesheet" href="css/checagem.css">
</head>

<body>
    <div id="titulo1" class="titulo">
        <h2>CHECAGEM DIÁRIA</h2>
    </div>
    <?php include("conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y/m/d');
    // $horario = $_GET['horario'];
    include("navbar.html"); ?>
    <div id="um" class="conteiner">

        <table class="table table-primary table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="1">Horários</td>
                    <th class="text-center" colspan="1">Checagem</td>
                </tr>
            </thead>
            <tr><?php
                $sql = "select horario, min(checagem) as MenorData from utiliza group by utiliza.horario order by horario";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>


                    <?php
                    $color = (strtotime($hoje) == strtotime($linha['MenorData'])) ? "#0ead69" : "#db3a34";
                    ?>
                    <td class="text-center" bgcolor="<?php echo $color ?>"><?php echo $linha['horario']; ?></td>
                    <td class="text-center" colspan="1" bgcolor="<?php echo $color ?>"><a href='checagem_remed_idoso.php?horario=<?php echo $linha['horario']; ?> '>CHECK
                            <i class='bx bx-check-square'></i>
                        </a>
                    </td>
            </tr> <?php } ?>

    </div>
</body>

</html>