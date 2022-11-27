<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> -->
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['erro'])) {
        echo "<script> alert('Usuário ou senha incorretos.') </script>";
    }
    if (isset($_GET['invalid'])) {
        echo "<script> alert('Faça o login primeiro.') </script>";
    }
    if (isset($_GET['final'])) {
        echo "<script> alert('Sessão finalizada.') </script>";
    }
    ?>
    <div class="imagem">
        <img src="img/login.png" alt="">

    </div>
    <div id="login-conteiner">
        <h1>Login</h1>
        <form method="POST" action="sessao.php">
            <label class="label">Usuario</label>
            <input name="user" type="text" placeholder="">
            <label for="password">Senha</label>
            <input type="password" name="senha" placeholder="">
            <input type="submit" value="Login">





        </form>


    </div>
</body>

</html>