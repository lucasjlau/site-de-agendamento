<?php
    require_once '../funcoes/conexao.php';

    $horarios = mysqli_query($banco, "SELECT * FROM horarios WHERE disponivel = '1'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios</title>
    <link rel="stylesheet" href="../css/horarios.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="item1">
                <h2>Horários</h2>
            <form method="POST">
                <table>
                    <?php
                        if ($horarios->num_rows != 0):
                            while ($disponiveis = $horarios->fetch_assoc()):
                    ?>            
                                <tr>
                                    <td><?php echo $disponiveis['hora']; ?></td>
                                    <td><button type="submit" value="<?php echo $disponiveis['hora']; ?>" name="botao">Marcar</button></td>
                                </tr>
                    <?php
                            endwhile;
                        endif;
                    ?>
                </table>
            </form>
            </div>
        </div>
        <div class="container2">
            <form method="POST">
                <nav id="cabeca">
                    <button type="submit" name="editar" class="cabecalho">Editar</button>
                    <button type="submit" name="desmarcar" class="cabecalho">Desmarcar</button>
                    <button type="submit" name="sair" class="cabecalho">Sair</button>
                </nav>
            </form>
            <section>
                <?php
                    if (isset($_POST['sair'])):
                        session_destroy();
                        header('location: ../formularios/login.php');
                    endif;
                    if (isset($_POST['editar'])):
                        header('location: editar.php');
                    endif;
                    require_once '../funcoes/desmarcar.php';
                    require_once '../funcoes/marcar.php';
                    require_once '../funcoes/exibir.php';
                ?>
            </section>
        </div>
    </main>
</body>
</html>