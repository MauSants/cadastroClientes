<?php
session_start();
require_once('./integraBanco.php');

    $sql = "DELETE FROM pessoas WHERE id=".$_GET['id'];

    mysql_query($sql, $conexao) or die ("Query Incorreta: [".$sql . "] <br> ".mysql_errno().': '.mysql_error());

    if ($_GET['id'] != null) {
        $_SESSION['alert'] = "<script>alert('Dados deletados com sucesso!')</script>";
        header ("Location: ./teste.php");
    }else {
        $_SESSION['alert'] = "<script>alert('Erro ao deletar os dados.')</script>";
        header ("Location: ./teste.php");
    }
?>
