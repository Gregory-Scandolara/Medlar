<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <title>Document</title>
</head>

<body>
    <form action="listaidoso.php" name="pesquisa_idoso">
        <div class="search-box">
            <input type="text" class="search-text" placeholder="pesquisar nome" name="pesquisa_idoso">
            <button class="pesquisa"><i style="padding-top: 7px; padding-left: 2px; width: 50px; height: 20px" class='bx bx-search'></i></button>
        </div>
    </form>
    <?php include("navbar.html");
    //include("bootstrap.html");
    ?>
    <div id="lista-conteiner">
        <table id="table" class="table table-striped table-primary">
            <thead class="thead">
                <tr>
                    <th class="texto">Nome</th>
                    <th class="text-center" colspan="2">Dados</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include("conexao.php");
                if (isset($_GET['pesquisa_idoso'])) {
                    $pesquisa_idoso = "%" . trim($_GET['pesquisa_idoso']) . "%";
                    $sql = "SELECT * FROM idosos WHERE nome_idoso LIKE '$pesquisa_idoso'";
                    $rs = mysqli_query($con, $sql);
                    while ($linha = mysqli_fetch_array($rs)) {
                ?>
                        <tr>
                            <td class="texto"><?php echo $linha['nome_idoso'] ?></td>
                            <td class="text-center"><a style="width: 50px; height: 40px" class='btn btn-primary btn-sm' href='dadoidoso.php?ididoso=<?php echo $linha['ididoso'] ?>'>
                                    <i class='bx bxs-user'></i>
                        </tr>
                    <?php }
                } else {
                    $sql = "select * from idosos";
                    $rs = mysqli_query($con, $sql);
                    while ($linha = mysqli_fetch_array($rs)) {
                    ?>

                        <tr>
                            <td class="texto"><?php echo $linha['nome_idoso'] ?></td>
                            <td class="text-center"><a style="width: 50px; height: 40px" class='btn btn-primary btn-sm' href='dadoidoso.php?ididoso=<?php echo $linha['ididoso'] ?>'>
                                    <i class='bx bxs-user'></i>
                        </tr>
                <?php }
                } ?>

    </div>
    </tbody>
    </table>
</body>

</html>