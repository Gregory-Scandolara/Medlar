<?php include_once("restrito.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estoque.css">
    <title>Document</title>
</head>

<body>
    <div id="titulo1" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>ESTOQUE</h2>
            <h5>ESTOQUE</h5>
        </div>
    </div>
    <?php
    include_once("navbar.html");
    include_once("conexao.php");
    ?>
    <div id="lista-estoque">


        <form action="estoque.php" name="pesquisa_remed">
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Digite o nome do medicamento" name="pesquisa_remed">
                    <button type="submit" class="searchButton">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
            </div>
        </form>
        <table id="estoq" class="table table-info table-striped">
            <thead class="thead">
                <tr>
                    <th class="pergunta text-center">Medicamento</th>
                    <th class="pergunta text-center">Dosagem</th>
                    <th id="some" class="text-center">Quantidade de caixas</th>
                    <th id="some" class="text-center">Total de comprimidos</th>
                    <th id="some" colspan="1" class="text-center pergunta">Editar</th>
                    <th id="some" colspan="1" class="text-center pergunta">Adicionar</th>
                    <th id="botaomodal" class="pergunta">Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_GET['pesquisa_remed'])) {
                    $pesquisa_remed = "%" . trim($_GET['pesquisa_remed']) . "%";
                    $sql = "select * from medicamentos, estoque_sus where nome_remed LIKE '$pesquisa_remed' order by nome_remed";
                } else {
                    $sql = "select * from medicamentos, estoque_sus where estoque_sus.idremedio = medicamentos.idremedio order by nome_remed";
                }
                $rs = mysqli_query($con, $sql);

                while ($linha = mysqli_fetch_array($rs)) {
                    $caixas = $linha['caixas'];
                    $add_cp = $linha['add_cp'];
                ?>
                    <tr>
                        <td class="texto pergunta"><?php echo $linha['nome_remed']; ?></td>
                        <td class="texto pergunta"><?php echo $linha['dosagem']; ?></td>
                        <td id="some" class="texto"><?php echo $linha['caixas']; ?></td>
                        <td id="some" class="texto"><?php echo $linha['add_cp'];  ?></td>
                        <td id="botaomodal">
                            <!-- Trigger/Open The Modal -->
                            <button class="btn btn-info btn-sm" id="myBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg></button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h5 class="text-center">Informações detalhadas</h5>
                                    <table>
                                        <tr>
                                            <td>caixas estocadas</td>
                                            <td> <?= $caixas ?></td>
                                        </tr>
                                        <tr>
                                            <td>comprimidos estocados</td>
                                            <td> <?= $add_cp ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="botao">
                                                    Deseja adicionar algo ao estoque?
                                            </td>
                                            <td> <a id="cadastro" style=" padding: 5;" class='btn btn-success btn-sm' name='btnSalvar' href='cadastro_estoque.php?idremedio=<?php echo $linha['idremedio'] ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                                    </svg></a>

                                </div>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="botao">
                                Deseja Editar o Estoque?
                        </td>

                        <td> <a id="cadastro" style=" padding: 5;" class='btn btn-secondary btn-sm' href='editar_estoque.php?idremedio=<?php echo $linha['idremedio'] ?>'><svg xmlns="http://www.w3.org/2000/svg" margin-bottom="10px" position: relative width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </a>

    </div>
    </td>
    </tr>
    </table>
    </div>

    </div>
    </td>
    <td id="some">
        <div class="botao pergunta"><a id="cadastro" style=" padding: 5;" class='btn btn-secondary btn-sm' href='editar_estoque.php?idremedio=<?php echo $linha['idremedio'] ?>'><svg xmlns="http://www.w3.org/2000/svg" margin-bottom="10px" position: relative width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg></a></div>
    </td>
    <td id="some">
        <div class="botao pergunta"><a id="cadastro" style=" padding: 5;" class='btn btn-success btn-sm' name='btnSalvar' href='cadastro_estoque.php?idremedio=<?php echo $linha['idremedio'] ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                </svg></a></div>
    </td>
    </tr>
<?php } ?>

</div>
</div>
</tbody>

</table>
<?php include_once('funcao_modal.php');
?>
</body>

</html>