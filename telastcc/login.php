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
    <div class="imagem">
        <img src="img/login.png" alt="">

    </div>
    <div id="login-conteiner">
        <h1>Login</h1>
        <form method="POST" action="checagem.php">
            <label class="label">Username</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                </span>
            </div>
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="">
            <input type="submit" value="Login">





        </form>


    </div>
</body>

</html>