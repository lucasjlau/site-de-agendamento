<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        require_once 'conexao.php';

        $login = $banco->escape_string($_POST['login']);
        $telefone = $banco->escape_string($_POST['telefone']);
        $email = $banco->escape_string($_POST['email']);
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $verify = mysqli_query($banco, "SELECT * FROM clientes WHERE login = '$login' LIMIT 1");

        if ($verify->num_rows == 1 and isset($_POST['cadastrar'])):
            die('Login ja está em uso');
        elseif ($verify->num_rows == 0 and isset($_POST['cadastrar'])):
            $query = mysqli_query($banco, "INSERT INTO clientes VALUES (DEFAULT, '$login', '$telefone', '$email', '$senha', DEFAULT, NULL, DEFAULT)");
            if (!$query and isset($_POST['cadastrar'])):
        ?>
                <p class="erros">Erro ao se cadastrar</p>
        <?php
            elseif ($query and isset($_POST['cadastrar'])):    
        ?>
                <p class="cadastrado">Cadastrado com sucesso</p>
        
        <?php
            endif;
        endif;
        ?>
</body>
</html>