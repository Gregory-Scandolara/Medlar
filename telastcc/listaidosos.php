<?php
include_once("restrito.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <title>Document</title>
</head>

<body>
    <div id="titulo_lista" class="titulo">
        <div class="titulo_img">
            <img src="img/titulo.png" alt="">
        </div>
        <div class="tit">
            <h2>LISTA DE IDOSOS</h2>
            <h5>LISTA DE IDOSOS</h5>
        </div>
    </div>
    <?php include("navbar.html");


    ?>
    <div class="lista-container" id="um">


        <form action="listaidosos.php" name="pesquisa_idoso">
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Digite o nome do idoso" name="pesquisa_idoso">
                    <button type="submit" class="searchButton">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
            </div>
        </form>
        <table id="table" class="table table-striped table-info">
            <thead class="thead">
                <tr>
                    <th class="texto">Nome</th>
                    <th id="some" class="text-center" colspan="2">Dados</th>
                </tr>
            </thead>
            <div class="tbody">
                <tbody>
                    <?php
                    include("conexao.php");

                    if (isset($_GET['pesquisa_idoso'])) {
                        $pesquisa_idoso = "%" . trim($_GET['pesquisa_idoso']) . "%";
                        $sql = "SELECT * FROM idosos WHERE nome_idoso LIKE '$pesquisa_idoso' order by nome_idoso";
                    } else {
                        $sql = "select * from idosos order by nome_idoso";
                    }
                    $rs = mysqli_query($con, $sql);
                    while ($linha = mysqli_fetch_array($rs)) {
                    ?>

                        <tr>
                            <td class="texto botaoo"><a id="sla" href='dadoidoso.php?ididoso=<?php echo $linha['ididoso'] ?>'> <?php echo $linha['nome_idoso'] ?></a>
                                <p id="some"><?php echo $linha['nome_idoso'] ?></p>
                            </td>
                            <td id="some" class="text-center"><a id="bot" style="" class='btn btn-info btn-sm' href='dadoidoso.php?ididoso=<?php echo $linha['ididoso'] ?>'>
                                    <i class='bx bxs-user'></i></a></td>
                        </tr>
                    <?php }
                    ?>
            </div>

    </div>
</body>

</html>