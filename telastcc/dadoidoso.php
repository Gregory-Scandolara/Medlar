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
    <div id="titulo_idoso" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>DADOS DO IDOSO</h2>
            <h5>DADOS DO IDOSO</h5>
        </div>
    </div>
    <?php
    include_once('navbar.html');

    include_once('conexao.php');

    if (isset($_GET['iddelete'])) {
        $iddelete = $_GET['iddelete'];
    ?>
        <script language="Javascript">
            var resposta = confirm("Deseja remover esse registro?");
            if (resposta == true) {
                window.location.href = "deleta_idoso.php?ididoso=<?php echo $iddelete ?>";
            }
        </script>
    <?php }
    $ididoso = $_GET['ididoso'];
    ?>

    <div class="botoes">
        <div class="botao"><a id="cadastro" style=" padding: 20;" class='btn btn-info btn-sm' data-toggle="tooltip" data-placement="top" title="Cadastro do medicamento" href='cadastro_remed_idoso.php?ididoso=<?php echo $ididoso ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                </svg></a>
        </div>

        <div class="botao"><a id="cadastro" style="padding: 20;" class='btn btn-warning btn-sm' data-toggle="tooltip" data-placement="top" title="Medicamentos" href='dado_remed_idoso.php?ididoso=<?php echo $ididoso ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                </svg></a>
        </div>

        <div class="botao"><a id="cadastro" style=" padding: 20;" class='btn btn-secondary btn-sm' data-toggle="tooltip" data-placement="top" title="Editar" href='editar_idoso.php?ididoso=<?php echo $ididoso ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg></a>
        </div>

        <div class="botao"><a id="cadastro" style=" padding: 20;" onclick="myFunction()" class='btn btn-danger btn-sm' data-toggle="tooltip" data-placement="top" title="Deletar" href='dadoidoso.php?iddelete=<?php echo $ididoso ?>&ididoso=<?php echo $ididoso ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg></a>
        </div>
        <div class="botao"><a id="cadastro" style=" padding: 20;" onclick="myFunction()" class='btn btn-success btn-sm' data-toggle="tooltip" data-placement="top" title="Deletar" href='estoque_idoso.php?ididoso=<?php echo $ididoso ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg></a>
        </div>
    </div>
    <?php
    $sql = "select * from idosos where ididoso=$ididoso";
    $rs = mysqli_query($con, $sql);
    while ($linha = mysqli_fetch_array($rs)) {
    ?>
        <?php
        $genero = $linha['genero'];
        if ($genero == 'F') {
            $genero = 'Feminino';
        } elseif ($genero == 'M') {
            $genero = 'Masculino';
        } else {
            $genero = 'Outro';
        }
        ?>

        <div class="tabela-conteiner">
            <div class="um">
                <table class="idoso table table-bordered table-striped">

                    <td class="pergunta"> <?php echo 'Idoso '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['nome_idoso']; ?></tr>

                    <td class="pergunta"> <?php echo 'Data de nascimento '; ?></td>
                    <td class="pergunta resposta"> <?php echo date_format(date_create($linha['nascimento']), "d/m/Y"); ?></tr>

                    <td class="pergunta"> <?php echo 'CPF do idoso '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['cpf_idoso']; ?></tr>

                    <td class="pergunta"> <?php echo 'Gênero '; ?></td>
                    <td class="pergunta resposta"> <?php echo $genero; ?></tr>

                    <td class="pergunta"> <?php echo 'Número SUS '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['cartao_sus']; ?></tr>

                    <td class="pergunta"> <?php echo 'Alergias '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['alergia']; ?></tr>

                    <td class="pergunta"> <?php echo 'Comorbidades '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['comorbidade']; ?></tr>

                    <td class="pergunta"> <?php echo 'Limitações '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['limitacoes']; ?></tr>

                    <td class="pergunta"> <?php echo 'Observações '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['obs_idoso']; ?></tr>
                </table>
            </div>
            <div class="dois">
                <table class="idoso table table-bordered table-striped">

                    <td class="pergunta"> <?php echo 'Data de entrada '; ?></td>
                    <td class="pergunta resposta"> <?php echo date_format(date_create($linha['data_entrada']), "d/m/Y"); ?></tr>

                    <td class="pergunta"> <?php echo 'Nome do Responsável '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['nome_resp']; ?></tr>

                    <td class="pergunta"> <?php echo 'Telefone do Responsável '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['telefone_resp']; ?></tr>

                    <td class="pergunta"> <?php echo 'CPF '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['cpf_resp']; ?></tr>

                    <td class="pergunta"> <?php echo 'Grau de parentesco '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['parentesco']; ?></tr>

                    <td class="pergunta"> <?php echo 'Endereço do responsável '; ?></td>
                    <td class="pergunta resposta"> <?php echo $linha['endereco_resp']; ?></tr>
                </table>
            </div>
        </div>
    <?php } ?>
</body>

</html>