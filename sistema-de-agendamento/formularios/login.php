<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/log.css">
</head>
<body>
<div class="container">
    <form method="POST">
        <h1>Login</h1>
        <input type="text" name="nome" id="nome" placeholder="Nome"><br>
        <input type="password" name="password" id="password" placeholder="Senha"><br>
        <button type="submit" name="entrar">Entrar</button><br>
        <a href="cadastrar.php">Ainda não tem cadastro ? Cadastre-se aqui</a><br>
        <section>
            <?php
                require_once '../funcoes/autenticar.php';
            ?>
        </section>
    </form>
</div>
</body>
</html>