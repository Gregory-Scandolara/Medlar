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
    <?php include("conexao.php");
    include("navbar.html"); ?>
    <div class="conteiner">
        <h1>CHECAGEM</h1>
        <table class="table table-info table-bordered">
            <tr>
                <td colspan="1">Horarios</td>
                <td colspan="1">Pacientes</td>
            </tr>
            <tr><?php
                $sql = "select * from utiliza, idosos where utiliza.ididoso = idosos.ididoso group by utiliza.horario";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td><?php echo $linha['horario']; ?></td>

                    <td colspan="1"><a href='checagem_remed_idoso.php?horario=<?php echo $linha['horario']; ?> '>vermelho</a>
                    </td>
            </tr> <?php } ?>
        <?php /* <tr>
                <td>01:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '1' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>02:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '2' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>

                <td>03:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '3' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>04:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '4' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>05:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '5' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>06:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '6' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>07:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '7' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>08:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '8' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>09:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '9' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>10:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '10' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>11:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '11' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>12:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '12' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>13:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '13' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>14:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '14' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>15:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '15' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>16:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '16' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>17:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '17' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>18:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '18' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>19:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '19' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>20:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '20' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>

            <tr>
                <td>21:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '21' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>22:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '22' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr>
            <tr>
                <td>23:00</td>
                <?php
                $sql = "select * from utiliza, idosos where utiliza.horario = '23' and utiliza.ididoso = idosos.ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>
                    <td colspan="1"><?php echo $linha['nome_idoso'];
                                } ?>
                    </td>
            </tr> */ ?>
    </div>
</body>

</html>