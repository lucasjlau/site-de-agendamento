<?php
require_once 'conexao.php';

if (isset($_SESSION)):
    session_start();
    if (isset($_SESSION['usuario'])):
        $id = $_SESSION['usuario'];
        $dados = mysqli_query($banco, "SELECT * FROM clientes WHERE id_cliente = '$id'");
        $dados_cli = $dados->fetch_assoc();
        if ($dados_cli['marcado'] == 0):
            echo "Você não está agendado";
        endif;
    endif;
endif;