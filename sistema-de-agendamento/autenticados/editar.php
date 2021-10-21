<?php
  require_once '../funcoes/conexao.php';
  if (!isset($_SESSION)):
    session_start();
    if (!isset($_SESSION['usuario'])):
      header('location: ../formularios/login.php');
    else:
      $id = $_SESSION['usuario'];
      $dds = mysqli_query($banco, "SELECT * FROM clientes WHERE id_cliente = '$id'");
      if ($dds->num_rows == 1):
        $cliente = $dds->fetch_assoc();
      endif;
    endif;
  endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <main>
        <div class="for">
            <form method="POST">
                <h1>Cadastre-se</h1>
                <input type="text" name="login" id="login" placeholder="Nome" value="<?php echo $cliente['login'];?> "><br>
                <input type="tel" name="telefone" id="telefone" value="<?php echo $cliente['telefone']; ?>" placeholder="21 98888-8888"><br>
                <input type="email" name="email" value="<?php echo $cliente['email']; ?>" id="email" placeholder="Exemplo@exemplo.com"><br>
                <input type="password" name="senha" id="senha" placeholder="Senha"><br>
                <button type="submit" name="cadastrar" id="cadastrar">Cadastrar</button><br>
                <a href="horarios.php">Voltar</a><br>
            </form>
        </div>
        <div class="ima">
            <picture>
                <source media="(max-width: 843px)" srcset="../imagens/cortada2.jpg">
                <img src="../imagens/original.jpg" alt="">
            </picture>
        </div>
    </main>
    <footer>
        <p class="erros">
            <?php
                include('../funcoes/validar_inputs.php');
            ?>
        </p>
        <p class="cadastrado">
            <?php
                include('../funcoes/editar_cliente.php');
            ?>
        </p>
    </footer>