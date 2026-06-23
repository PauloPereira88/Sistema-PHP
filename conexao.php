<?php

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'bancophp');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi Possivel Conectar');

?>