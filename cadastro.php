<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Cadastro Clientes</title>
</head>

<?php
session_start();
if ($_SESSION['alert']) {
    echo $_SESSION['alert'];
}
unset($_SESSION['alert']);

require_once('./integraBanco.php');

$alt = 0; 

if ($_GET['id']) 
{
    $sql = "SELECT * FROM pessoas WHERE id=".$_GET['id'].";";
    $listar = mysql_query($sql, $conexao) or die ("Query Incorreta: [> ".$sql ." <]<br>".mysql_errno().': '.mysql_error());
    $row = mysql_fetch_assoc($listar);
    $alt = 1;

    $masculino = null;
    $feminino = null;

    if ($row['sexo'] === 'Masculino') {
        $masculino = 'checked';
    } else {
        $feminino = 'checked';
    }
} 
?>

<body>
    <form action="./alteraBanco.php" method="POST">
    <input type="hidden" value="<?php print($alt);?>" name="action" id="action">
    <input type="hidden" value="<?php print($_GET['id']);?>" name="id" id="id">
        <fieldset>
            <div class="header">
                <img src="img/profile-man.png" alt=" Homem">
                <h2>Cadastro de Pessoas</h2>
            </div>
            <div class="linha">
                <div class="content">
                    <label for="Nome"><b>Nome</b></label>
                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Informe seu nome" value="<? echo $row['nome']; ?>" required>
                </div>
                <div class="content">
                    <label for="idade"><b>Idade</b></label>
                    <input type="number" name="idade" id="idade" class="inputUser" placeholder="Informe sua idade" value="<? echo $row['idade']; ?>" required>
                </div>
            </div>
            <br>
            <div class="linha">
                <div class="content">
                    <label for="email"><b>E-mail</b></label>
                    <input type="text" name="email" id="email" class="inputUser" placeholder="Informe seu e-mail" value="<? echo $row['email']; ?>" required>
                </div>
                    <div class="content">
                    <label for="celular"><b>Celular</b></label>
                    <input type="number" name="celular" id="celular" class="inputUser" placeholder="Informe seu celular" value="<? echo $row['celular']; ?>" required>
                    </div>
                </div>
            </div>
                <p><b>Sexo:</b></p>
                <input type="radio" name="sexo[]" id="masc" value="masc" class="inputRadio" required <?echo $masculino;?>>
                <label for="masc">Masculino</label>
                <input type="radio" name="sexo[]" id="fem" value="fem" class="inputRadio"  <?echo $feminino;?>>
                <label for="fem">Feminino</label>
            <br>
            <div class="botao">
                <input type="submit" id="submit" value="Cadastrar"> 
            </div>
        </fieldset>   
    </form>   
</body>
</html>