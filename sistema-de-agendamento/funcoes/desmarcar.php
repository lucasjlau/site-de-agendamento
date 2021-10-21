<?php

require_once 'conexao.php';

if (isset($_POST['desmarcar'])):
    if (!isset($_SESSION)):
        session_start();
        if (!isset($_SESSION['usuario'])):
            header('location: ../formularios/login.php');
        else:
            $id = $_SESSION['usuario'];
            $cliente = mysqli_query($banco, "SELECT * FROM clientes WHERE id_cliente = '$id'");
            $cli = $cliente->fetch_assoc();
            $h = $cli['hora'];
            /////------------------////
            $desmarcar = mysqli_query($banco, "UPDATE clientes SET marcado = 0, hora = NULL WHERE id_cliente = '$id'");
            $horarios = mysqli_query($banco, "UPDATE horarios SET disponivel = 1 WHERE hora = '$h'");
            if ($desmarcar and $horarios):
                header('refresh:1');
            endif;
        endif;
    endif;
endif;