<?php
    require_once('./integraBanco.php');

    $nome = $_POST['nome'];

    if($nome){
        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$nome%' ";
        $listar = mysql_query($sql, $conexao) or die('Query incorreta: ' . $sql . '<br>' . mysql_errno() . ": " . mysql_error());

        $conteudo = "<table class='tabela' cellspacing='0' cellpadding='1'>";
        $conteudo .= "<tr class='top'>";
        $conteudo .= "<th>Id</th>";
        $conteudo .= "<th>Nome</th>";
        $conteudo .= "<th>Idade</th>";
        $conteudo .=  "<th>Email</th>";
        $conteudo .=  "<th>Celular</th>";
        $conteudo .=  "<th>Sexo</th>";
        $conteudo .=  "<th>Ação</th>";
        $conteudo .=  "</tr>";

        while ($row = mysql_fetch_assoc($listar)) {
            $conteudo .= "<tr>";
            $conteudo .= "<td>".$row['id']."</td>";
            $conteudo .= "<td>".$row['nome']."</td>";
            $conteudo .= "<td>".$row['idade']."</td>";
            $conteudo .= "<td>".$row['email']."</td>";
            $conteudo .= "<td>".$row['celular']."</td>";
            $conteudo .= "<td>".$row['sexo']."</td>";
            $conteudo .= "<td> <a href='./cadastro.php?id=".$row['id']."' id='edit'><i class='fas fa-edit'></i></a> <a href='./excluir.php?id=".$row['id']."' id='delet'><i class='fas fa-trash-alt'></i></a></td>";
            $conteudo .= "</tr>";
        }   
        $conteudo .=  "<tr class='footer'>";
        $conteudo .=  "<td colspan='7'>Foram encontrados um total de " .mysql_num_rows($listar) ." registros</td>";
        $conteudo .=  "</tr>";
        $conteudo .= "</table>";
        echo $conteudo;
    } else {
        $sql = "SELECT * FROM pessoas;";
        $listar = mysql_query($sql, $conexao) or die ("Query Incorreta: [> ".$sql ." <]<br>".mysql_errno().': '.mysql_error()); 

        $conteudo = "<table class='tabela' cellspacing='0' cellpadding='1'>";
        $conteudo .= "<tr class='top'>";
        $conteudo .= "<th>Id</th>";
        $conteudo .= "<th>Nome</th>";
        $conteudo .= "<th>Idade</th>";
        $conteudo .=  "<th>Email</th>";
        $conteudo .=  "<th>Celular</th>";
        $conteudo .=  "<th>Sexo</th>";
        $conteudo .=  "<th>Ação</th>";
        $conteudo .=   "</tr>";

        while ($row = mysql_fetch_assoc($listar)) {
            $conteudo .= "<tr>";
            $conteudo .= "<td>".$row['id']."</td>";
            $conteudo .= "<td>".$row['nome']."</td>";
            $conteudo .= "<td>".$row['idade']."</td>";
            $conteudo .= "<td>".$row['email']."</td>";
            $conteudo .= "<td>".$row['celular']."</td>";
            $conteudo .= "<td>".$row['sexo']."</td>";
            $conteudo .= "<td> <a href='./cadastro.php?id=".$row['id']."' id='edit'><i class='fas fa-edit'></i></a> <a href='./excluir.php?id=".$row['id']."' id='delet'><i class='fas fa-trash-alt'></i></a></td>";
            $conteudo .= "</tr>";
        }   
        $conteudo .=  "<tr class='footer'>";
        $conteudo .=  "<td colspan='7'>Foram encontrados um total de " .mysql_num_rows($listar) ." registros</td>";
        $conteudo .=  "</tr>";
        $conteudo .= "</table>";
    
            echo $conteudo;
    }
?>