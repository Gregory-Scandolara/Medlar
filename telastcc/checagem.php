<?php /*session_start(); 

$_SESSION = 
 */ ?>

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
        <h3>CHECAGEM DIÁRIA</h3>
    </div>
    <?php include("conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y/m/d');
    // $horario = $_GET['horario'];
    include("navbar.html"); ?>
    <div id="um" class="conteiner">

        <table id="tab" class="table table-primary table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="1">Horários</td>
                    <th id='check' class="text-center" colspan="1">Check</td>
                </tr>
            </thead>
            <tr><?php
                $sql = "select horario, min(checagem) as MenorData from utiliza group by utiliza.horario order by horario";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>


                    <?php
                    $color = (strtotime($hoje) == strtotime($linha['MenorData'])) ? "#0ead69" : "#db3a34";
                    ?>
                    <td id='idoso' class="text-center" bgcolor="<?php echo $color ?>"><?php echo $linha['horario']; ?></td>
                    <td id='check' class="text-center" colspan="1" bgcolor="<?php echo $color ?>"><a id="btn" class='btn btn-sm' href='checagem_remed_idoso.php?horario=<?php echo $linha['horario']; ?> '>
                            <div class="row">
                                <div id="text" class="col">
                                    <h5>checagem</h5>
                                </div>
                                <div id='icone' class="col"><i class='bx bx-check-square'></i></div>
                            </div>
                        </a>
                    </td>
            </tr> <?php } ?>

    </div>
</body>

</html>