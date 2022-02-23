<?php
session_start();
require_once('./integraBanco.php');

$action = $_POST['action'];
$id = $_POST['id'];
$name = $_POST["nome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$celular = $_POST["celular"];
$sexo = $_POST["sexo"];

if ($sexo[0] == 'masc') {
    $genero="Masculino";
}else {
    $genero="Feminino";
}

if (!$action) {
    $sql = "INSERT INTO pessoas (nome, idade, email, celular, sexo) VALUES ('$name', '$idade', '$email', '$celular', '$genero')";

    mysql_query($sql, $conexao) or die ("Query Incorreta: [".$sql . "] <br> ".mysql_errno().': '.mysql_error());

    if (mysql_affected_rows() > 0) {
    $_SESSION['alert'] = "<script>alert('Dados cadastrados com sucesso!')</script>";
    header ("Location: ./teste.php");

    }else{
        echo "<h1>Infelizmente não foi possível cadastrar os dados!</h1>";
    }
}else {
    $sql = "UPDATE pessoas SET nome='$name' , idade='$idade', email='$email', celular='$celular' , sexo='$genero' WHERE id=$id";

    mysql_query($sql , $conexao) or die ("Query incorreta: [".$sql ."] <br>".mysql_errno(). ': ' .mysql_error());

    if (mysql_affected_rows() > 0) {
        $_SESSION['alert'] = "<script>alert('Dados cadastrados com sucesso!')</script>";
        header ("Location: ./cadastro.php?id=".$id);
    }else {
        $_SESSION['alert'] = "<script>alert('Nenhum dado foi alterado!')!</script>";
        header ("Location: ./teste.php");
    }
}
?>