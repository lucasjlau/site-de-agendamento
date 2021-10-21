<?php

require_once 'conexao.php';

$hora = $banco->escape_string($_POST['botao']);

if (!isset($_SESSION)):
    session_start();
    if (!isset($_SESSION['usuario'])):
        header('location: ../formularios/login.php');
    elseif(isset($_SESSION['usuario'])):

        // PEGAR ID DA SESSÃO
        $id = $_SESSION['usuario'];
        //

        $verificar_se_esta_marcado = mysqli_query($banco, "SELECT * FROM clientes WHERE id_cliente = '$id' LIMIT 1");
        $marcado = $verificar_se_esta_marcado->fetch_assoc();
        if ($marcado['marcado'] == 1):
            die('Você está marcado para '.$marcado['hora'].' caso queira mudar de horário é necessario desmarcar primeiro');
        elseif ($marcado['marcado'] == 0 and isset($_POST['botao'])):
            $marcar = mysqli_query($banco, "UPDATE clientes SET marcado = 1, hora = '$hora' WHERE id_cliente = '$id'");
            if ($marcar):
                $indisponivel = mysqli_query($banco, "UPDATE horarios SET disponivel = 0 WHERE hora = '$hora'");
                if ($indisponivel and $marcar):
                    header('refresh:1');
                endif;
            endif;
        endif;
    endif;
endif;