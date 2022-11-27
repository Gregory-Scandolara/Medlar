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
    <div id="titulo_edita_idoso" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>EDITAR DADO DO IDOSO</h2>
            <h5>EDITAR DADO DO IDOSO</h5>
        </div>
    </div>
    <?php
    include_once('conexao.php');

    // include('navbar.html');




    $ididoso = $_GET['ididoso'];
    include_once("navbar.html");
    $sql = "SELECT * FROM idosos WHERE ididoso=$ididoso";
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);
    ?>




    <div id="cad-idoso-conteiner">
        <div class="idoso">
            <form action="func_editar_idoso.php" method="POST">
                <div class="idoso1">


                    <label>Nome do idoso</label> <input value="<?= $linha['nome_idoso']; ?>" class='form-control' type="text" name="nome_idoso">

                    <label>Data de nascimento</label><br> <input value="<?= $linha['nascimento']; ?>" class='form-control' type="date" size="25" placeholder="__/__/____" name="nascimento">

                    <label>CPF</label> <br><input value="<?= $linha['cpf_idoso']; ?>" class='form-control' type="text" name="cpf_idoso">
                    <?php
                    $genM = ($linha['genero'] == 'M') ? "checked" : "";
                    $genF = ($linha['genero'] == 'F') ? "checked" : "";
                    $genO = ($linha['genero'] == 'O') ? "checked" : "";
                    ?>
                    <label>Genero:</label><br>
                    <div class="radio">
                        <input type="radio" name="genero" value="F" <?php echo $genF; ?>>F
                    </div>

                    <div class="radio"><input type="radio" name="genero" value="M" <?php echo $genM; ?>>M</div>

                    <div class="radio"><input type="radio" name="genero" value="O" <?php echo $genO; ?>>O</div>
                    <label>Entrada</label> <input value="<?= $linha['data_entrada']; ?>" class='form-control' type="date" name="data_entrada">

                </div>
        </div>
        <div class="idoso2">
            <label>Alergias</label><br> <input value="<?= $linha['alergia']; ?>" class='form-control' type="text" name="alergia">

            <label>Comorbidades</label> <input value="<?= $linha['comorbidade']; ?>" class='form-control' type="text" name="comorbidade">



            <label>Limitações</label> <input value="<?= $linha['limitacoes']; ?>" class='form-control' type="text" name="limitacoes">

            <label>Cartão do SUS</label> <input value="<?= $linha['cartao_sus']; ?>" class='form-control' type="text" name="cartao_sus">

            <label>Observaçôes</label> <input value="<?= $linha['obs_idoso']; ?>" class='form-control' type="text" name="obs_idoso">

        </div>

        <div class="resp">
            <label>Nome do responsável</label><input value="<?= $linha['nome_resp']; ?>" class='form-control' type="text" name="nomeresp">

            <label>CPF do responsável</label><input value="<?= $linha['cpf_resp']; ?>" class='form-control' type="text" name="cpf_resp">

            <label>Telefone</label><br><input value="<?= $linha['telefone_resp']; ?>" class='form-control' type="text" name="telefoneresp">

            <label>Grau de parentesco</label><input value="<?= $linha['parentesco']; ?>" class='form-control' type="text" name="parentesco">

            <label>Endereço</label><br><input value="<?= $linha['endereco_resp']; ?>" class='form-control' type="text" name="enderecoresp">
            <input type="hidden" value="<?= $ididoso ?>" name="ididoso">
            <input id="botao" class='btn btn-success' type="submit" value="Enviar" name="editar" />
            <input id="botao" class='btn btn-info' type="reset" value="Limpar campos" />
            </form>
        </div>
    </div>

</body>

</html>