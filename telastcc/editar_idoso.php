<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <div id="titulo1" class="titulo">
        <h2>EDITAR DADO DO IDOSO</h2>
    </div>
    <?php
    include('conexao.php');
    // include('navbar.html');



    if (isset($_POST['editar'])) {
        $ididoso = $_POST['ididoso'];
        $nome_idoso = $_POST['nome_idoso'];
        $nascimento = $_POST['nascimento'];
        $genero = $_POST['genero'];
        $alergia = $_POST['alergia'];
        $comorbidade = $_POST['comorbidade'];
        $obs_idoso = $_POST['obs_idoso'];
        $cpf = $_POST['cpf'];
        $nomeresp = $_POST['nomeresp'];
        $telefoneresp = $_POST['telefoneresp'];
        $cpf_resp = $_POST['cpf_resp'];
        $parentesco = $_POST['parentesco'];
        $enderecoresp = $_POST['enderecoresp'];

        $sql = "UPDATE idosos SET 
                nome_idoso='$nome_idoso', 
                nascimento='$nascimento', 
                genero='$genero',
                alergia='$alergia' ,
				comorbidade='$comorbidade' ,
				obs_idoso='$obs_idoso' ,
				cpf_idoso='$cpf_idoso',
				nome_resp='$nomeresp' ,
				telefone_resp='$telefoneresp' ,
				cpf_resp='$cpf_resp' ,
				parentesco='$parentesco' ,
				endereco_resp='$enderecoresp' 
            WHERE ididoso='$ididoso'";

        mysqli_query($con, $sql);
        header('Location: dadoidoso.php?ididoso=' . $ididoso);
        echo $sql;
        // if (mysqli_affected_rows($con) > 0) {
        //     echo "<script> alert('Usuário alterado com sucesso.') </script>";
        //     // header("Location: listaUsuarios.php");
        // } else {
        //     echo "<script> alert('Ocorreu algum erro.') </script>";
        // }
    } else {
        $ididoso = $_GET['ididoso'];
        include('navbar.html');

        $sql = "SELECT * FROM idosos WHERE ididoso=$ididoso";
        $rs = mysqli_query($con, $sql);
        $linha = mysqli_fetch_array($rs);
    ?>
        <?php include('navbar.html'); ?>
        <?php


        include("conexao.php");
        ?>
        <div id="cad-idoso-conteiner">
            <div class="idoso">
                <form action="editar_idoso.php" method="POST">
                    <div class="idoso1">


                        <label>Nome do idoso</label> <input value="<?= $linha['nome_idoso']; ?>" class='form-control' type="text" name="nome_idoso">

                        <label>Data de nascimento</label><br> <input value="<?= $linha['nascimento']; ?>" class='form-control' type="date" size="25" placeholder="__/__/____" name="nascimento">

                        <label>Número do CPF</label> <br><input value="<?= $linha['cpf_idoso']; ?>" class='form-control' type="text" name="cpf_idoso">
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


                    </div>
            </div>
            <div class="idoso2">
                <label>Alergias</label><br> <input value="<?= $linha['alergia']; ?>" class='form-control' type="text" name="alergia">

                <label>Comorbidades</label> <input value="<?= $linha['comorbidade']; ?>" class='form-control' type="text" name="comorbidade">

                <label>Observaçôes</label> <textarea value="<?= $linha['obs_idoso']; ?>" class='form-control' type="textarea " name="obs_idoso"></textarea>

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
        <script>
            function myFunction() {
                let text = "Press a button!\nEither OK or Cancel.";
                if (confirm(text) == true) {
                    text = "You pressed OK!";
                } else {
                    text = "You canceled!";
                }
                document.getElementById("demo").innerHTML = text;
            }
            <?php } ?>
        </script>
</body>

</html>