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
    <div id="titulo_med" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>CADASTRO DO MEDICAMENTO</h2>
            <h5>CADASTRO DO MEDICAMENTO</h5>
        </div>
    </div>
    <?php

    include_once("conexao.php");



    include_once("navbar.html");
    ?>
    <title>Cadastro Medicamentos</title>
    <div id="cad-remed-conteiner">
        <form id="2" action="func_cadastro_remed.php" method="POST">
            <label>Nome</label> <input class='form-control' type="text" name="nome_remed">
            <label>Dosagem</label> <input class='form-control' type="text" name="dosagem">
            <label>Observações</label> <input class='form-control' type="text" name="obs_remed"><br>
            <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
    </div>

</body>

</html>