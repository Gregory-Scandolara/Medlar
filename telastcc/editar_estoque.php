<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('conexao.php');
    include('navbar.html');

    $ididoso = $_GET['ididoso'];

    if (isset($_POST['editar'])) {
        $nome_idoso = $_POST['nome_idoso'];
        $nascimento = $_POST['nascimento'];
        // $enfermeira = $_POST['enfermeira'];
        $genero = $_POST['genero'];
        $alergia = $_POST['alergia'];
        $comorbidade = $_POST['comorbidade'];
        $obs = $_POST['obs'];
        // $numerosus = $_POST['numerosus'];
        $cpf = $_POST['cpf'];
        // $planosaude = $_POST['planosaude'];
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
				obs='$obs' ,
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
    }
    $sql = "SELECT * FROM idosos WHERE ididoso=$ididoso";
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);
    ?>
    <?php include('navbar.html'); ?>
    <?php


    include("conexao.php");
    ?>
    <title>Cadastro Idosos</title>
    <div class='container' id="cad-conteiner3">
        <form action="cadastro_estoque.php" method="POST">
            <br><br>
            <label>Medicamento <select class='form-control' name="idremedio"></label>
            <option>Selecione</option>
            <?php $sql = "select * from medicamentos ";
            $rs = mysqli_query($con, $sql);
            while ($linha = mysqli_fetch_array($rs)) { ?>
                <option value=<?php echo $linha['idremedio'] ?>>
                    <?php echo $linha['nome_remed'] . ' - ' . $linha['dosagem'] . 'mg'; ?>
                </option>
            <?php } ?> </select>

            <label>Quantidade de caixas</label> <br><input class='form-control' type="text" name="quant_caixa">
            <label>Quantidade de remedios em cada caixa</label> <br><input class='form-control' type="text" name="unid_caixa"> <br>

            <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
    </div>

    </div>
</body>

</html>