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

  if (!isset($_SESSION['usuario'])):
    header('location: ../formularios/login.php');
  else:
    $id = $_SESSION['usuario'];
    $nome = $banco->escape_string($_POST['login']);
    $telefone = $banco->escape_string($_POST['telefone']);
    $email = $banco->escape_string($_POST['email']);
    $senha = $banco->escape_string($_POST['senha']);
    $selecionar_cliente = mysqli_query($banco, "SELECT * FROM clientes WHERE id_cliente = '$id' LIMIT 1");
    if ($selecionar_cliente->num_rows == 1):
      $editar = $selecionar_cliente->fetch_assoc();
      $pass = password_verify($senha, $editar['senha']);
      if ($editar && $pass):
        $inserir = mysqli_query($banco, "UPDATE clientes SET login = '$nome', telefone = '$telefone', email = '$email' WHERE id_cliente = '$id'");
        if ($inserir):
?>
          <p class="cadastrado">Usuário editado com sucesso</p>
<?php
          header('refresh:1');
        endif;
      elseif (!$pass and isset($_POST['cadastrar'])):
?>
        <p class="erros">Senha incorreta</p>
<?php
      elseif(!$inserir and isset($_POST['cadastrar'])):
?>
        <p class="erros">Erro ao editar usuário</p>
<?php
      endif;
    endif;
  endif;
  ?>
</body>
</html>