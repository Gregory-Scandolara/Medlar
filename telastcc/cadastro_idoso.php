<?php include_once("restrito.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('conexao.php');

    // if (isset($_POST['btnSalvar'])) {
    // } else {

    include_once('navbar.html');
    ?>

    <title>Cadastro Idosos</title>
    <div id="titulo_idoso" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>CADASTRO DO IDOSO</h2>
            <h5>CADASTRO DO IDOSO</h5>
        </div>
    </div>
    <div id="cad-idoso-conteiner">
        <div class="idoso">
            <form action="func_cadastro_idoso.php" method="POST">
                <div class="idoso1">


                    <label>Nome do idoso</label> <input class='form-control' type="text" name="nome_idoso">

                    <label>Data de nascimento</label><br> <input class='form-control' type="date" size="25" placeholder="__/__/____" name="nascimento">

                    <label>CPF</label> <br><input class='form-control' type="text" name="cpf_idoso">

                    <label>Gênero</label><br>
                    <div class="radio">
                        <input type="radio" name="genero" value="F">F
                    </div>
                    <div class="radio">
                        <input type="radio" name="genero" value="M">M
                    </div>
                    <div class="radio">
                        <input id="outro" type="radio" name="genero" value="O">O
                    </div>
                    <label>Entrada</label> <input class='form-control' type="date" name="data_entrada">

                </div>
        </div>
        <div class="idoso2">
            <label>Alergias</label><br> <input class='form-control' type="text" name="alergia">

            <label>Comorbidades</label> <input class='form-control' type="text" name="comorbidade">



            <label>Limitações</label> <input class='form-control' type="text" name="limitacoes">

            <label>Cartão do SUS</label> <input class='form-control' type="text" name="cartao_sus">

            <label>Observações</label> <input class='form-control' type="text" name="obs_idoso">

        </div>

        <div class="resp">
            <label>Nome do responsável</label><input class='form-control' type="text" name="nomeresp">

            <label>CPF do responsável</label><input class='form-control' type="text" name="cpf_resp">

            <label>Telefone</label><br><input class='form-control' type="text" name="telefoneresp">

            <label>Grau de parentesco</label><input class='form-control' type="text" name="parentesco">

            <label>Endereço</label><br><input class='form-control' type="text" name="enderecoresp">

            <input id="botao" class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input id="botao" class='btn btn-info' type="reset" value="Limpar campos" />
            </form>
        </div>
    </div>
</body>

</html>