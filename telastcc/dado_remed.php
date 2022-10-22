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
        <h2>MEDICAMENTOS</h2>
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
                window.location.href = "deleta_remed.php?idremedio=<?php echo $iddelete ?>";
            }
        </script>
    <?php }
    ?>

    <!-- <div class="tabela-conteiner"> -->

    <div class="remedio">
        <form action="dado_remed.php" name="pesquisa_remed">
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Digite o nome do medicamento" name="pesquisa_remed">
                    <button type="submit" class="searchButton">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
            </div>
        </form>
        <table id="med" class="table table-striped table-info table-bordered ">


            <!-- tentar transformar os remedios em accordion -->
            <thead>

                <tr>
                    <th class="text-center">Nome do remédio </th>
                    <th class="text-center">Dosagem</th>
                    <th class="text-center">Observação</th>
                    <th colspan="2" class="text-center">Ação</th>
                </tr>
            </thead>
            <?php
            if (isset($_GET['pesquisa_remed'])) {
                $pesquisa_remed = "%" . trim($_GET['pesquisa_remed']) . "%";
                $sql = "select * from medicamentos WHERE nome_remed LIKE '$pesquisa_remed'";
            } else {
                $sql = "select * from medicamentos";
            }
            $rs = mysqli_query($con, $sql);
            while ($linha = mysqli_fetch_array($rs)) { ?>

                <td class="text-center"> <?php echo $linha['nome_remed'];; ?></td>
                <td class="text-center"> <?php echo $linha['dosagem']; ?></td>
                <td class="text-center"> <?php echo $linha['obs_remed']; ?></td>
                <td class="text-center">
                    <div class="botao "><a style=" padding: 10" class=' btn btn-success btn-sm' href='dado_idoso_remed.php?idremedio=<?php echo $linha['idremedio']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                            </svg></a></div>
                </td>
                <td class="text-center">
                    <div class="botao "><a style=" padding: 10" class=' btn btn-danger btn-sm' href='dado_remed.php?iddelete=<?php echo $linha['idremedio']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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