<html>

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
        <h2>Checagem dos medicamentos</h2>
    </div>
    <?php include("conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y/m/d');
    // $horario = $_GET['horario'];
    include("navbar.html"); ?>
    <div class="conteiner">

        <table class="table table-primary">
            <thead>
                <tr>
                    <th class="text-center" colspan="1">Horarios</td>
                    <th class="text-center" colspan="1">Pacientes</td>
                </tr>
            </thead>
            <tr><?php
               // $sql_c = "select min(checagem) from utiliza WHERE horario = '00:00:00'";
               // $rs_c = mysqli_query($con, $sql_c);
                //while ($linha_c = mysqli_fetch_array($rs_c)); {

                //    var_dump($rs_c);
                    // echo $linha_c['min(checagem'];
               // }
                $sql = "select horario, min(checagem) as MenorData from utiliza group by utiliza.horario";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td class="texto"><?php echo $linha['horario']; ?></td>

                    <?php

                   // $horario = $linha['horario'];
                   // $sql_c = "select MIN(checagem) as MenorData from utiliza WHERE horario = '00:00:05'";
                   // $rs_c = mysqli_query($con, $sql_c);
                   // $linha_c = mysqli_fetch_array($rs_c);

                      $color = (strtotime($hoje) == strtotime($linha['MenorData'])) ? "green" : "red";
                  //  echo "resultado: ".$rs_c;
                    ?>
                    <td class="texto" colspan="1" bgcolor="<?php echo $color ?>"><a href='checagem_remed_idoso.php?horario=<?php echo $linha['horario']; ?> '>vermelho</a>
                    </td>
            </tr> <?php } ?>

    </div>
</body>

</html>