<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estoque.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("navbar.html");
    include("bootstrap.html");
    include("conexao.php"); ?>
    <div id="lista-conteiner">
        <table class="table table-primary">
            <thead class="thead">
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Dosagem</th>
                    <th class="text-center">Quantidade de Caixas</th>
                    <!-- <th class="texto">Total de Comprimidos</th> -->
                    <th colspan="2" class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select medicamentos.idremedio,SUM(estoque.add_cp) as add_cp,medicamentos.nome_remed as nome_remed,medicamentos.dosagem,SUM(estoque.caixas) as caixas from estoque, medicamentos where estoque.idremedio = medicamentos.idremedio group by estoque.idremedio";
                $rs = mysqli_query($con, $sql);

                while ($linha = mysqli_fetch_array($rs)) { ?>

                    <tr>
                        <td class="texto"><?php echo $linha['nome_remed']; ?></td>
                        <td class="texto"><?php echo $linha['dosagem'] . 'mg'; ?></td>
                        <td class="texto"><?php echo $linha['caixas']; ?></td>
                        <!-- <td class="texto"><?php /* echo $linha['add_cp']; */ ?></td> -->
                        <td>
                            <div class="botao"><a id="cadastro" style=" padding: 17; width: 0px; height: 0px" class='btn btn-secondary btn-sm' href='editaridoso.php?ididoso=<?php echo $ididoso ?>'><svg xmlns="http://www.w3.org/2000/svg" margin-bottom="10px" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg></a></div>
                        </td>
                        <td>
                            <div class="botao"><a id="cadastro" style=" padding: 17; width: 0px; height: 0px" class='btn btn-danger btn-sm' href='deletaidoso.php?ididoso=<?php echo $ididoso ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg></a></div>
                        </td>
                    </tr>
                <?php } ?>

    </div>
    </div>
    </tbody>

    </table>
</body>

</html>