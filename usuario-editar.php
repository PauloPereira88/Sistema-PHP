<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Usuarios - Editar</title>

  </head>
  <body>
    <?php include('navbar.php'); ?>
    
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar usuario
                <a href="index.php" class="btn btn-danger float-right">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['id_usuarios'])) {
                $usuario_id = mysqli_real_escape_string($conexao, $_GET['id_usuarios']);
                $sql = "SELECT * FROM usuarios WHERE id_usuarios='$usuario_id'";
                $query = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($query) > 0) {
                    $usuario = mysqli_fetch_array($query);
                
                ?>
              <form action="acoes.php" method="POST">
                <input type="hidden" name="usuario_id" value="<?=$usuario['id_usuarios']?>">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?=$usuario['nome']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Email</label>
                  <input type="text" name="email" value="<?=$usuario['email']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Data Nascimento</label>
                  <input type="date" name="data_nascimento" value="<?=$usuario['data_nascimento']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Senha</label>
                  <input type="passwor" name="senha" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_usuario" class="btn btn-primary">Atualizar</button>
                </div>
              </form>
              <?php
                } else {
                    echo "<h5> Usuario não Encontrado </5>";
                }
            }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
  </body>
</html>