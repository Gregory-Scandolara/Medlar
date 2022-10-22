<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dado.css">
    <title>Document</title>
</head>

<body>
    <div id="titulo1" class="titulo">
        <h2>Medicamentos do paciente</h2>
    </div>
    <?php

    include("navbar.html");

    include("conexao.php");
    if (isset($_GET['iddelete'])) {
        $iddelete = $_GET['iddelete'];
    ?>
        <script language="Javascript">
            var resposta = confirm("Deseja remover esse registro?");
            if (resposta == true) {
                window.location.href = "deleta_remed_idoso.php?idutiliza=<?php echo $iddelete ?>";
            }
        </script>
    <?php }
    $ididoso = $_GET['ididoso']; ?>

    <!-- <div class="tabela-conteiner"> -->

    <div class="remedio">
        <table class="table table-info table-bordered ">


            <!-- tentar transformar os remedios em accordion -->
            <thead>

                <tr>
                    <th class="text-center">Nome do remédio </th>
                    <th class="texto">Dosagem</th>
                    <th class="texto">Posologia</th>
                    <th class="texto">Horário</th>
                    <th colspan="1" class="text-center">Data Inicio</th>
                    <th colspan="1" class="text-center">Data Fim</th>
                    <th class="texto">Observação</th>
                    <th colspan="2" class="text-center">Ação</th>
                </tr>
            </thead>
            <?php
            $sql = "select * from utiliza, medicamentos where utiliza.idremedio = medicamentos.idremedio and ididoso=$ididoso";
            $rs = mysqli_query($con, $sql);
            while ($linha = mysqli_fetch_array($rs)) {

            ?>

                <tr>
                    <td class="text-center"> <?php echo $linha['nome_remed'];; ?></td>
                    <td class="text-center"> <?php echo $linha['dosagem']; ?></td>
                    <td class="text-center"> <?php echo $linha['posologia'] . 'cp'; ?></td>
                    <td class="text-center"> <?php echo $linha['horario']; ?></td>
                    <td class="text-center"> <?php echo date_format(date_create($linha['data_inicio']), "d/m/Y"); ?></td>
                    <td class="text-center"> <?php echo date_format(date_create($linha['data_fim']), "d/m/Y"); ?></td>
                    <td class="text-center"> <?php echo $linha['obs_remed_idoso']; ?></td> <?php /*problema aq na obs */ ?>
                    <td>
                        <div class="botao"><a style=" padding: 10" class='btn btn-warning btn-sm' href='editar_remed_idoso.php?idutiliza=<?php echo $linha['idutiliza']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg></a></div>
                    </td>
                    <td>
                        <div class="botao"><a style=" padding: 10" class=' btn btn-danger btn-sm' href='dado_remed_idoso.php?iddelete=<?php echo $linha['idutiliza']; ?>&ididoso=<?php echo $linha['ididoso']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg></a></div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>