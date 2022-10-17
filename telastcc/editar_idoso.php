<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <div id="titulo1" class="titulo">
        <h2>Editar dados do Idoso</h2>
    </div>
    <?php
    include('conexao.php');
    // include('navbar.html');

    $ididoso = $_GET['ididoso'];

    if (isset($_POST['editar'])) {
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
				cpf='$cpf',
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
        include('navbar.html');
    }
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

            <form action="editar_idoso.php?ididoso=<?php echo $ididoso ?>" method="POST">

                <div class="idoso1">


                    <label>Nome do Idoso</label> <input class='form-control' value="<?php echo $linha['nome_idoso']; ?> " type="text" name="nome_idoso">
                    <label>Data de Nascimento</label><br> <input class='form-control' value="<?php echo $linha['nascimento']; ?>" type="date" size="25" placeholder="__/__/____" name="nascimento">
                    <label>Numero do CPF</label> <br><input class='form-control' value="<?php echo $linha['cpf']; ?>" type="text" name="cpf">

                    <!-- <label>Plano de Saude</label><br>


					<div class="radio">
						<input type="radio" name="planosaude" value="sim">Sim
					</div>
					<div class="radio">
						<input type="radio" name="planosaude" value="nao">Não
					</div> -->

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
            <label>Alergias</label><br> <input class='form-control' value="<?php echo $linha['alergia']; ?>" type="text" name="alergia">
            <label>Comorbidades</label> <input class='form-control' value="<?php echo $linha['comorbidade']; ?>" type="text" name="comorbidade">
            <!-- <label>Numero do SUS</label> <input class='form-control' type="text" name="numerosus"> -->
            <label>Observaçôes</label> <textarea class='form-control' value="<?php echo $linha['obs_idoso']; ?>" type="textarea " name="obs_idoso"></textarea>

        </div>

        <div class="resp">
            <!-- <div class="titulo">
				 <h3>Responsavel</h3> 
			</div> -->
            <label>Nome do Responsavel:</label><input class='form-control' value="<?php echo $linha['nome_resp']; ?>" type="text" name="nomeresp">
            <label>CPF do Responsavel</label><input class='form-control' value="<?php echo $linha['cpf_resp']; ?>" type="text" name="cpf_resp">
            <label>Telefone</label><br><input class='form-control' value="<?php echo $linha['telefone_resp']; ?>" type="text" name="telefoneresp">
            <label>Grau de Parentesco</label><input class='form-control' value="<?php echo $linha['parentesco']; ?>" type="text" name="parentesco">
            <label>Endereço</label><br><input class='form-control' value="<?php echo $linha['endereco_resp']; ?>" type="text" name="enderecoresp">
            <input id="botao" onclick="myFunction()" class='btn btn-success' type="submit" value="Enviar" name="editar" />
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
    </script>
</body>

</html>