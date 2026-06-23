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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Usuarios</title>

  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php include('mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Lista de Usuario
                            <a href="usuario-create.php" class="btn btn-primary float-right">Adicionar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOME</th>
                                    <th>EMAIL</th>
                                    <th>DATA NASCIMENTO</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM usuarios';
                                $usuarios = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($usuarios) > 0) {
                                    foreach($usuarios as $usuario) {
                                ?>
                                <tr>
                                    <td><?=$usuario['id_usuarios']?></td>
                                    <td><?=$usuario['nome']?></td>
                                    <td><?=$usuario['email']?></td>
                                    <td><?=date('d/m/y', strtotime($usuario['data_nascimento']))?></td>
                                    <td>
                                        <a href="usuario-view.php?id_usuarios=<?=$usuario['id_usuarios']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                                        <a href="usuario-editar.php?id_usuarios=<?=$usuario['id_usuarios']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                                        <form action="acoes.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Tem Certeza que Deseja Excluir?')" type="submit" name="delete_usuario" value="<?=$usuario['id_usuarios']?> " class="btn btn-danger btn-sm"><span class="bi-trash3-fill"></span>&nbsp;
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                }
                             } else {
                                echo '<h5> Nenhum Usuario Encontrado </h5>';
                              }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
  </body>
</html>