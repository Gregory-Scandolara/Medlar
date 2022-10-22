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
    include('navbar.html');
    include('conexao.php');
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
    $sql2 = "select nome_remed from medicamentos where idremedio = $idremedio";
    $rs2 = mysqli_query($con, $sql2);
    $linha2 = mysqli_fetch_array($rs2);
    $nome_remed = $linha2['nome_remed']
    ?>
    <div id="titulo1ri" class="titulo">
        <h2>LISTA DE IDOSOS QUE UTILIZAM <?= $nome_remed ?></h2>
    </div>
    <div id="lista-container">
        <table id="table" class="table table-striped table-info">
            <thead class="thead">
                <tr>
                    <th class="texto">Nome</th>
                    <th class="text-center" colspan="2">Dados</th>
                </tr>
            </thead>
            <div class="tbody">
                <tbody>
                    <?php
                    $sql = "select idosos.ididoso as ididoso, idosos.nome_idoso as nome_idoso from utiliza, idosos where idosos.ididoso = utiliza.ididoso and utiliza.idremedio = $idremedio";
                    $rs = mysqli_query($con, $sql);
                    $linha = mysqli_fetch_array($rs);
                    ?>
                    <tr>
                        <td>vc deseja excluir este remedio de todos os idosos listados?</td>
                        <td class="text-center"><a style="width: 50px; height: 40px" class='btn btn-danger btn-sm' href='<?php echo $_SERVER['PHP_SELF']; ?>?iddelete=<?php echo $idremedio ?>&idremedio=<?php echo $idremedio ?>'>
                                <i class='bx bx-trash'></i>
                    </tr> <?php /*if (!empty($linha)) {
                            ?>
                        <tr>
                            <td>Este medicamento não foi cadastrado em nenhum idoso</td>
                        </tr><?php } */
                            while ($linha = mysqli_fetch_array($rs)) {
                            ?>

                        <tr>
                            <td class="texto botaoo"><?php echo $linha['nome_idoso'] ?></td>
                            <td class="text-center"><a style="width: 50px; height: 40px" class='btn btn-info btn-sm' href='dadoidoso.php?ididoso=<?php echo $linha['ididoso'] ?>'>
                                    <i class='bx bxs-user'></i>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>arrumar um jeito de mandar uma mensagem diferente quando nenhum idoso tiver cadastrado</td>
                    </tr>
            </div>

    </div>
</body>

</html>