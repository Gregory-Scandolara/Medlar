<?php include_once("restrito.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dado.css">
    <title>Document</title>
</head>

<body>
    <div id="titulo_remed_idoso" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>Medicamentos do idoso</h2>
            <h5>Medicamentos do idoso</h5>
        </div>
    </div>
    <?php

    include_once("navbar.html");

    include_once("conexao.php");

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
                    <th class="pergunta text-center">Nome do medicamento </th>
                    <th class="pergunta texto">Dosagem</th>
                    <th id="some" class="pergunta texto">Posologia</th>
                    <th id="some" class="pergunta texto">Horário</th>
                    <th id="some" colspan="1" class="pergunta text-center">Data Inicio</th>
                    <th id="some" colspan="1" class="pergunta text-center">Data Fim</th>
                    <th id="some" class="pergunta texto">Observações</th>
                    <th colspan="2" class="pergunta text-center">Ação</th>
                </tr>
            </thead>
            <?php
            $sql = "select * from utiliza, medicamentos where utiliza.idremedio = medicamentos.idremedio and ididoso=$ididoso";
            $rs = mysqli_query($con, $sql);
            while ($linha = mysqli_fetch_array($rs)) {

            ?>

                <tr>
                    <td class="pergunta text-center"> <?php echo $linha['nome_remed'];; ?></td>
                    <td class="pergunta text-center"> <?php echo $linha['dosagem']; ?></td>
                    <td id="some" class="pergunta text-center"> <?php echo $linha['posologia'] . 'cp'; ?></td>
                    <td id="some" class="pergunta text-center"> <?php echo $linha['horario']; ?></td>
                    <td id="some" class="pergunta text-center"> <?php echo date_format(date_create($linha['data_inicio']), "d/m/Y"); ?></td>
                    <td id="some" class="pergunta text-center"> <?php echo date_format(date_create($linha['data_fim']), "d/m/Y"); ?></td>
                    <td id="some" class="pergunta text-center"> <?php echo $linha['obs_remed_idoso']; ?></td> <?php /*problema aq na obs */ ?>
                    <td id="some">
                        <div class="botao"><a style=" padding: 10" class='btn btn-warning btn-sm' href='editar_remed_idoso.php?idutiliza=<?php echo $linha['idutiliza']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg></a></div>
                    </td>
                    <td id="some">
                        <div class="botao"><a style=" padding: 10" class=' btn btn-danger btn-sm' href='dado_remed_idoso.php?iddelete=<?php echo $linha['idutiliza']; ?>&ididoso=<?php echo $linha['ididoso']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg></a></div>
                    </td>
                    <td colspan="1" id="botaomodal">
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
                            $horario = $linha['horario'];
                            $data_inicio = $linha['data_inicio'];
                            $data_fim = $linha['data_fim']; ?>
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
                                        <td>Horario</td>
                                        <td><?= $horario ?></td>
                                    </tr>
                                    <tr>
                                        <td>Data inicio</td>
                                        <td><?= $data_inicio ?></td>
                                    </tr>
                                    <tr>
                                        <td>Data Fim</td>
                                        <td><?= $data_fim ?></td>
                                    </tr>
                                    <tr>
                                        <td>Editar medicamento</td>
                                        <td>
                                            <div class="botao"><a style=" padding: 10" class='btn btn-warning btn-sm' href='editar_remed_idoso.php?idutiliza=<?php echo $linha['idutiliza']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg></a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Excluir medicamento</td>
                                        <td>
                                            <div class="botao"><a style=" padding: 10" class=' btn btn-danger btn-sm' href='dado_remed_idoso.php?iddelete=<?php echo $linha['idutiliza']; ?>&ididoso=<?php echo $linha['ididoso']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg></a></div>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php include('funcao_modal.php');
    ?>
</body>

</html>