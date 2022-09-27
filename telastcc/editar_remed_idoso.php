<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">

    <title>Document</title>
</head>
<?php
include("conexao.php");
include("navbar.html");

$idutiliza = $_GET['idutiliza'];

if (isset($_POST['editar'])) {
    $ididoso = $_POST['ididoso'];
    $idremedio = $_POST['idremedio'];
    $posologia = $_POST['posologia'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $horario = $_POST['horario'];
    $obs = $_POST['obs'];

    $sql = "UPDATE utiliza SET 
            ididoso='$ididoso', 
            idremedio='$idremedio', 
            posologia='$posologia', 
            horario='$horario', 
            data_inicio='$data_inicio', 
            data_fim='$data_fim', 
            obs='$obs'
            WHERE idutiliza='$idutiliza'";
    mysqli_query($con, $sql);
    header("Location: dado_remed_idoso.php?ididoso=" . $ididoso);
} else {
    $sql = "select * from utiliza, medicamentos where utiliza.idutiliza = '$idutiliza' and utiliza.idremedio = medicamentos.idremedio";
    $rs = mysqli_query($con, $sql);
    $linha = mysqli_fetch_array($rs);
?>
    <title>Cadastro Medicamentos</title>
    </h2>
    <div id="cad-conteiner3">
        <form action="editar_remed_idoso.php?ididoso=<?php echo $idutiliza ?>" method="POST">
            <label>Medicamento: <select class='form-control' name="idremedio"></label>
            <option>Selecione</option>

            <?php $sql = "select * from medicamentos ";
            $rs = mysqli_query($con, $sql);
            while ($linha = mysqli_fetch_array($rs)) { ?>

                <option value=<?php echo $linha['idremedio'] ?>>
                    <?php echo $linha['nome_remed'] . ' - ' . $linha['dosagem']; ?>
                </option>

            <?php } ?>
            </select>

            <label>Horario: </label><input value="<?php echo $linha['horario']; ?>" type="time" class='form-control' name="horario">
            <label>Posologia Diaria:</label> <input class='form-control' type="text" name="posologia">
            <label>Data Inicio:</label><input class='form-control' type="date" name="data_inicio">
            <label>Data Fim:</label><input class='form-control' type="date" name="data_fim">
            <label>Observações:</label> <input class='form-control' type="text" name="obs"><br><br>
            <input type="hidden" name="ididoso" value="<?php echo $ididoso ?>">
            <input class='btn btn-success' type="submit" value="Enviar" name="btnSalvar" />
            <input class='btn btn-info' type="reset" value="Limpar campos" />
        </form>
    </div>
<?php } ?>

<body>

</body>

</html>