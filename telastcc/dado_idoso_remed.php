<?php include_once("restrito.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('navbar.html');
    include_once('conexao.php');
    if (isset($_GET['iddelete'])) {
        $iddelete = $_GET['iddelete'];
    ?>
        <script language="Javascript">
            var resposta = confirm("Deseja remover esse registro?");
            if (resposta == true) {
                window.location.href = "func_remed.php?idremedio=<?php echo $iddelete ?>";
            }
        </script>
    <?php }

    $idremedio = $_GET['idremedio'];
    $sql2 = "select nome_remed, dosagem from medicamentos where idremedio = $idremedio";
    $rs2 = mysqli_query($con, $sql2);
    $linha2 = mysqli_fetch_array($rs2);
    $nome_remed = $linha2['nome_remed'] . ' - ' . $linha2['dosagem'];
    ?>
    <div id="titulo_idoso_remed" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>LISTA DE IDOSOS QUE UTILIZAM <?= $nome_remed ?></h2>
            <h5>LISTA DE IDOSOS QUE UTILIZAM <?= $nome_remed ?></h5>
        </div>
    </div>
    <div class="lista-container">
        <table id="table" class="table table-striped table-info">
            <thead class="thead">
                <tr>
                    <th class="texto pergunta">Nome</th>
                    <th class="text-center pergunta" colspan="2">Dados</th>
                </tr>
            </thead>
            <div class="tbody">
                <tbody>
                    <?php
                    $sql = "select idosos.ididoso as ididoso, idosos.nome_idoso as nome_idoso from utiliza, idosos where idosos.ididoso = utiliza.ididoso and utiliza.idremedio = $idremedio";
                    $rs = mysqli_query($con, $sql);
                    $linha = mysqli_fetch_array($rs);
                    $vazio = ($linha != null) ? "true" : "false";
                    if ($vazio == "false") { ?>
                        <td class="pergunta">Não há idosos cadastrados com esse medicamento</td>
                        <td class="text-center"><a class='btn btn-info btn-sm' href="dado_remed.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg></a></td>
                    <?php  } else {
                    ?>
                        <tr>
                            <td class="pergunta">vc deseja excluir este remedio de todos os idosos listados?</td>
                            <td class="text-center pergunta"><a style="padding: 5px;" class='btn btn-danger btn-sm' href='<?php echo $_SERVER['PHP_SELF']; ?>?iddelete=<?php echo $idremedio ?>&idremedio=<?php echo $idremedio ?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                        </tr> <?php /*if (!empty($linha)) {
                            ?>
                        <tr>
                            <td>Este medicamento não foi cadastrado em nenhum idoso</td>
                        </tr><?php } */
                                while ($linha = mysqli_fetch_array($rs)) {
                                ?>

                            <tr>
                                <td class="texto botaoo pergunta"><?php echo $linha['nome_idoso'] ?></td>
                                <td class="text-center pergunta"><a style="padding: 5px;" class='btn btn-info btn-sm' href='dadoidoso.php?ididoso=<?php echo $linha['ididoso'] ?>'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                            </tr>
                    <?php }
                            } ?>
                    <!-- <tr>
                        <td>arrumar um jeito de mandar uma mensagem diferente quando nenhum idoso tiver cadastrado</td>
                    </tr> -->
            </div>

    </div>
</body>

</html>