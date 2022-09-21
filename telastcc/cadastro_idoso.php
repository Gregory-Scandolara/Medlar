<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Document</title>
</head>

<body>
    <?php include("navbar.html");
    include("bootstrap.html"); ?>
    <title>Cadastro Idosos</title>
    <div id="titulo1" class="titulo">
        <h2>Cadastro do Idoso</h2>
    </div>
    <div id="cad-conteiner">
        <div class="idoso">
            <form action="recebeidoso.php" method="POST">
                <div class="idoso1">


                    <label>Nome do Idoso</label> <input class='form-control' type="text" name="nome">

                    <label>Data de Nascimento</label><br> <input class='form-control' type="date" size="25" placeholder="__/__/____" name="nascimento">

                    <label>Numero do CPF</label> <br><input class='form-control' type="text" name="cpf">

                    <label>Genero:</label><br>
                    <div class="radio">
                        <input type="radio" name="genero" value="F">F
                    </div>
                    <div class="radio">
                        <input type="radio" name="genero" value="M">M
                    </div>
                    <div class="radio">
                        <input type="radio" name="genero" value="O">O
                    </div>


                </div>
        </div>
        <div class="idoso2">
            <label>Alergias</label><br> <input class='form-control' type="text" name="alergia">

            <label>Comorbidades</label> <input class='form-control' type="text" name="comorbidade">

            <label>Observaçôes</label> <textarea class='form-control' type="textarea " name="obs"></textarea>

        </div>

        <div class="resp">
            <label>Nome do Responsavel:</label><input class='form-control' type="text" name="nomeresp">

            <label>CPF do Responsavel</label><input class='form-control' type="text" name="cpf_resp">

            <label>Telefone</label><br><input class='form-control' type="text" name="telefoneresp">

            <label>Grau de Parentesco</label><input class='form-control' type="text" name="parentesco">

            <label>Endereço</label><br><input class='form-control' type="text" name="enderecoresp">

            <input id="botao" class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input id="botao" class='btn btn-info' type="reset" value="Limpar campos" />
            </form>
        </div>
    </div>
</body>

</html>