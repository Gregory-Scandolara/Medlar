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
    <?php  /* include("conexao.php");
    $ididoso = $_GET['ididoso'];
    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Sao_Paulo'));
    $DateAndTime = $Object->format("Y-m-d h:i:s a"); ?>
*/
    ?>
    <div class="conteiner">
        <table class="table table-info table-bordered">
            <!-- <tr>
            <td colspan="3">LAR IDOSO SÃO JOSE<br>Turno noite</td>
             criar um select que puxe o horario e adicione apenas a quantidade de horarios que usa
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
        </tr> -->

            <tr>
                <td colspan="1">Paciente</td>
                <td>Segunda</td>
                <td>Terça</td>
                <td>Quarta</td>
                <td>Quinta</td>
                <td>Sexta</td>
                <td>Sabado</td>
                <td>Domingo</td>
            </tr>
            <tr>
                <td>00:00</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>01:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>02:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>03:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>04:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>05:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>06:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>07:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>08:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>09:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>10:00</td>
                <td colspan="1">Paciente</td>
            </tr>
            <tr>
                <td>11:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>12:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>13:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>14:00</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>15:00</td>
                <td colspan="1">Paciente</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>16:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>17:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>18:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>19:00</td>
                <td colspan="1">Paciente</td>
            </tr>

            <tr>
                <td>20:00</td>
            </tr>

            <tr>
                <td>21:00</td>
            </tr>
            <tr>
                <td>22:00</td>
            </tr>
            <tr>
                <td>23:00</td>
            </tr>
    </div>

    <?php /* $sql = "select * from utiliza, medicamentos where utiliza.idremedio = medicamentos.idremedio and ididoso=$ididoso";
        $rs = mysqli_query($con, $sql);
        while ($linha = mysqli_fetch_array($rs)) { ?>
            <tr>
                <td><?php echo $linha['idremedio'];; ?></td>
                <td><?php echo $linha['nome_remed'];; ?></td>
                <td>1cp</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            <?php } ?>
            </tr>
            <tr>
                <td rowspan="4" colspan="2">Observações:</td>
                <td rowspan="2">Sinais Vitais</td>
                <td>PA</td>
                <td>FC</td>
                <td>PA</td>
                <td>FC</td>
                <td>PA</td>
                <td>FC</td>
                <td>PA</td>
                <td>FC</td>
                <td>PA</td>
                <td>FC</td>
                <td>PA</td>
                <td>FC</td>
                <td>PA</td>
                <td>FC</td>


            </tr>
            <tr>
                <td>Sat</td>
                <td>T1</td>
                <td>Sat</td>
                <td>T1</td>
                <td>Sat</td>
                <td>T1</td>
                <td>Sat</td>
                <td>T1</td>
                <td>Sat</td>
                <td>T1</td>
                <td>Sat</td>
                <td>T1</td>
                <td>Sat</td>
                <td>T1</td>

            </tr>
            <tr>
                <td>Eliminações</td>
                <td>U</td>
                <td>C</td>
                <td>U</td>
                <td>C</td>
                <td>U</td>
                <td>C</td>
                <td>U</td>
                <td>C</td>
                <td>U</td>
                <td>C</td>
                <td>U</td>
                <td>C</td>
                <td>U</td>
                <td>C</td>

            </tr>
            <tr>
                <td>Assinatura<br> Tecnica <br>Enfermagem</td>
                <td colspan="2">ASS</td>
                <td colspan="2">ASS</td>
                <td colspan="2">ASS</td>
                <td colspan="2">ASS</td>
                <td colspan="2">ASS</td>
                <td colspan="2">ASS</td>
                <td colspan="2">ASS</td>
            </tr>
    </table>

    <?php /*
    <!-- segunda tabela -->

    <table border="1">
        <tr>
            <td colspan="3">LAR IDOSO SÃO JOSE<br>Turno manha</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
            <td colspan="2">data<br>/ /</td>
        </tr>
        <tr>
            <td colspan="2">Medicação</td>
            <td>Posologia</td>
            <td>8hrs</td>
            <td>12hrs</td>
            <td>8hrs</td>
            <td>12hrs</td>
            <td>8hrs</td>
            <td>12hrs</td>
            <td>8hrs</td>
            <td>12hrs</td>
            <td>8hrs</td>
            <td>12hrs</td>
            <td>8hrs</td>
            <td>12hrs</td>
            <td>8hrs</td>
            <td>12hrs</td>
        </tr>
        <tr>
            <td>1</td>
            <td>remedio A</td>
            <td>1cp</td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>

        </tr>
        <tr>
            <td>2</td>
            <td>remedio B</td>
            <td>1cp</td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>

        </tr>
        <tr>
            <td>3</td>
            <td>remedio C</td>
            <td>1cp</td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>

        </tr>
        <tr>
            <td>4</td>
            <td>remedio D</td>
            <td>1cp</td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr>
            <td rowspan="4" colspan="2">Observações:</td>
            <td rowspan="2">Sinais Vitais</td>
            <td>PA</td>
            <td>FC</td>
            <td>PA</td>
            <td>FC</td>
            <td>PA</td>
            <td>FC</td>
            <td>PA</td>
            <td>FC</td>
            <td>PA</td>
            <td>FC</td>
            <td>PA</td>
            <td>FC</td>
            <td>PA</td>
            <td>FC</td>


        </tr>
        <tr>
            <td>Sat</td>
            <td>T1</td>
            <td>Sat</td>
            <td>T1</td>
            <td>Sat</td>
            <td>T1</td>
            <td>Sat</td>
            <td>T1</td>
            <td>Sat</td>
            <td>T1</td>
            <td>Sat</td>
            <td>T1</td>
            <td>Sat</td>
            <td>T1</td>

        </tr>
        <tr>
            <td>Eliminações</td>
            <td>U</td>
            <td>C</td>
            <td>U</td>
            <td>C</td>
            <td>U</td>
            <td>C</td>
            <td>U</td>
            <td>C</td>
            <td>U</td>
            <td>C</td>
            <td>U</td>
            <td>C</td>
            <td>U</td>
            <td>C</td>

        </tr>
        <tr>
            <td>Assinatura<br> Tecnica <br>Enfermagem</td>
            <td colspan="2">ASS</td>
            <td colspan="2">ASS</td>
            <td colspan="2">ASS</td>
            <td colspan="2">ASS</td>
            <td colspan="2">ASS</td>
            <td colspan="2">ASS</td>
            <td colspan="2">ASS</td>
        </tr>
    </table>
    */ ?>
</body>

</html>