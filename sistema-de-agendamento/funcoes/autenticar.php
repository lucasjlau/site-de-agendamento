<?php

    require_once 'conexao.php';

    if (isset($_POST['entrar'])):
        if (empty($_POST['nome']) or strlen($_POST['nome']) <= 2 or strlen($_POST['nome'])> 20):
            die('Login inválido');
        elseif (empty($_POST['password']) or strlen($_POST['password']) < 8):
            die('Senha inválida');
        endif;
    endif;

    $nome = $banco->escape_string($_POST['nome']);
    $password = $_POST['password'];

    $validar = mysqli_query($banco, "SELECT * FROM clientes WHERE login = '$nome' LIMIT 1");

    if ($validar->num_rows == 1 and isset($_POST['entrar'])):
        $dados_cli = $validar->fetch_assoc();
        $validar_senha = password_verify($password, $dados_cli['senha']);
        if ($validar_senha and isset($_POST['entrar'])):
            if (!isset($_SESSION)):
                session_start();
                $_SESSION['usuario'] = $dados_cli['id_cliente'];
                $_SESSION['admin'] = $dados_cli['admin'];
                header('location: ../autenticados/horarios.php');
            endif;
        elseif (!$validar_senha and isset($_POST['entrar'])):
            die('Login ou senha incorreto');
        endif;
    elseif ($validar->num_rows == 0 and isset($_POST['entrar'])):
        die('Login ou senha incorreto');
    endif;
