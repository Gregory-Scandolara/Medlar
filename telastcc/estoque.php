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
        <h2>ESTOQUE</h2>
    </div>
    <?php
    include("navbar.html");
    include("conexao.php"); ?>
    <div id="lista-estoque">
        <?php //<h4>devo juntar excluir a tabela estoque e adicionar seus atributos para o medicamentos?</h4> 
        if (isset($_GET['iddelete'])) {
            $iddelete = $_GET['iddelete'];
        ?>
            <script language="Javascript">
                var resposta = confirm("Deseja remover esse registro?");
                if (resposta == true) {
                    window.location.href = "deleta_estoque.php?idremedio=<?php echo $iddelete ?>";
                }
            </script>
        <?php }
        ?>

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
                    <th class="text-center">Nome</th>
                    <th class="text-center">Dosagem</th>
                    <th class="text-center">Quantidade de caixas</th>
                    <th class="text-center">Total de comprimidos</th>
                    <th colspan="4" class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_GET['pesquisa_remed'])) {
                    $pesquisa_remed = "%" . trim($_GET['pesquisa_remed']) . "%";
                    $sql = "select * from medicamentos where nome_remed LIKE '$pesquisa_remed' order by nome_remed";
                } else {
                    $sql = "select * from medicamentos order by nome_remed";
                }
                $rs = mysqli_query($con, $sql);

                while ($linha = mysqli_fetch_array($rs)) { ?>

                    <tr>
                        <td class="texto"><?php echo $linha['nome_remed']; ?></td>
                        <td class="texto"><?php echo $linha['dosagem']; ?></td>
                        <td class="texto"><?php echo $linha['caixas']; ?></td>
                        <td class="texto"><?php echo $linha['add_cp'];  ?></td>

                        <td>
                            <div class="botao"><a id="cadastro" style=" padding: 10;" class='btn btn-secondary btn-sm' href='editar_estoque.php?idremedio=<?php echo $linha['idremedio'] ?>'><svg xmlns="http://www.w3.org/2000/svg" margin-bottom="10px" position: relative width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg></a></div>
                        </td>
                        <td>
                            <div class="botao"><a id="cadastro" style=" padding: 10;" class='btn btn-success btn-sm' name='btnSalvar' href='cadastro_estoque.php?idremedio=<?php echo $linha['idremedio'] ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
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