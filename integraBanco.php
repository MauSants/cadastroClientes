<?php
$conexao = mysql_connect('db.trator.w2o', 'root', 'root');
if (!$conexao) {
    die ('Não é possível conectar: '.mysql_error());
}
$seleciona_db = mysql_select_db('cadastro_pessoas', $conexao);
if (!$seleciona_db) {
    die ('Algo deu errado'.mysql_error());
}
unset($seleciona_db);
?>