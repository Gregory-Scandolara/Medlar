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
    include('conexao.php');
    if (isset($_POST['btnSalvar'])) {
        $nome_idoso = $_POST['nome_idoso'];
        $nascimento = $_POST['nascimento'];
        $genero = $_POST['genero'];
        $alergia = $_POST['alergia'];
        $comorbidade = $_POST['comorbidade'];
        $obs_idoso = $_POST['obs_idoso'];
        $cpf_idoso = $_POST['cpf_idoso'];
        $nomeresp = $_POST['nomeresp'];
        $telefoneresp = $_POST['telefoneresp'];
        $cpf_resp = $_POST['cpf_resp'];
        $parentesco = $_POST['parentesco'];
        $enderecoresp = $_POST['enderecoresp'];

        $sql = "INSERT INTO idosos (nome_idoso, nascimento, genero, alergia, comorbidade, obs_idoso, cpf_idoso, nome_resp, telefone_resp, cpf_resp, parentesco, endereco_resp) 
        VALUES ('$nome_idoso', '$nascimento', '$genero', '$alergia', '$comorbidade',  '$obs_idoso', '$cpf_idoso', '$nomeresp', '$telefoneresp', '$cpf_resp', '$parentesco', '$enderecoresp')";
        mysqli_query($con, $sql);
        echo $sql;
        header('Location: listaidosos.php');
    } else {
        include('navbar.html');
    ?>

        <title>Cadastro Idosos</title>
        <div id="titulo1" class="titulo">
            <h2>CADASTRO DO IDOSO</h2>
        </div>
        <div id="cad-idoso-conteiner" class="columns">
            <div class="idoso">
                <form action="cadastro_idoso.php" method="POST">
                    <div class="idoso1 column">


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
                            <input type="radio" name="genero" value="O">O
                        </div>


                    </div>
            </div>
            <div class="idoso2 column">
                <label>Alergias</label><br> <input class='form-control' type="text" name="alergia">

                <label>Comorbidades</label> <input class='form-control' type="text" name="comorbidade">

                <label>Observação</label> <textarea class='form-control' type="textarea " name="obs_idoso"></textarea>

            </div>

            <div class="resp column">
                <label>Nome do responsável</label><input class='form-control' type="text" name="nomeresp">

                <label>CPF do responsável</label><input class='form-control' type="text" name="cpf_resp">

                <label>Telefone</label><br><input class='form-control' type="text" name="telefoneresp">

                <label>Grau de parentesco</label><input class='form-control' type="text" name="parentesco">

                <label>Endereço</label><br><input class='form-control' type="text" name="enderecoresp">

                <input id="botao" class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
                <input id="botao" class='btn btn-info' type="reset" value="Limpar campos" />
                </form>
            </div>
        </div> <?php } ?>
</body>

</html>