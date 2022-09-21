<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dado.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("navbar.html");
    include("bootstrap.html");
    include("conexao.php");
    $ididoso = $_GET['ididoso']; ?>

    <!-- <div class="tabela-conteiner"> -->

    <div class="remedio">
        <table class="table table-info table-bordered">


            <!-- tentar transformar os remedios em accordion -->
            <thead>

                <tr>
                    <th class="texto">Nome do Remedio: </th>
                    <th class="text-center">Periodo</th>
                    <th class="texto">Dosagem</th>
                    <th class="texto">Observaçôes</th>
                </tr>

                <?php
                $sql = "select * from utiliza, medicamentos where utiliza.idremedio = medicamentos.idremedio and ididoso=$ididoso";
                $rs = mysqli_query($con, $sql);
                while ($linha = mysqli_fetch_array($rs)) { ?>

                    <tr>
                        <td> <?php echo $linha['nome_remed'];; ?></td>
                        <td> <?php echo $linha['periodo']; ?></td>
                        <td> <?php echo $linha['dosagem']; ?></td>
                        <td> <?php echo $linha['obs']; ?></td>
                        <td>
                            <div class="botao"><a id="cadastro" style=" padding: 25; width: 10px; height: 10px" class='btn btn-danger btn-sm' href='deletaremedidoso.php?idutiliza=<?php echo $linha['idutiliza']; ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg></a></div>
                        </td><br>
                    </tr>
                <?php } ?>
        </table>
    </div>
</body>

</html>