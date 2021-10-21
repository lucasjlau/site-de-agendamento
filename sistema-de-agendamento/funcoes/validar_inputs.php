<?php

if (isset($_POST['cadastrar'])):
    // VALIDANDO LOGIN
    if (empty($_POST['login'])):
        die('Preencha o campo "Login"');
    elseif (strlen($_POST['login']) > 20 or strlen($_POST['login']) <= 2):
        die('Login inválido');
    // VALIDANDO TELEFONE
    elseif (empty($_POST['telefone'])):
        die('Preencha o campo "Telefone"');
    elseif (strlen($_POST['telefone']) < 11 or strlen($_POST['telefone']) > 12):
        die ('Preencha o telefone no formato correto');
    elseif (!is_numeric($_POST['telefone'])):
        die('Não é permitido letras no campo "Telefone"');
    // VALIDANDO EMAIL
    elseif (empty($_POST['email'])):
        die('Preencha o campo "Email"');
    elseif (strlen($_POST['email']) > 40 or strlen($_POST['email']) < 20):
        die('Email inválido');
    // VALIDANDO SENHA
    elseif (empty($_POST['senha'])):
        die('Preencha o campo "Senha"');
    elseif (strlen($_POST['senha']) < 8):
        die('Senha muito curta');
    endif;
endif;