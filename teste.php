    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styleTeste.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Tabela</title>
    </head>
    <body>
        <div class="header">
            <img src="img/profile-man.png" alt=" Homem">
            <h1>Listagem de Pessoas</h1>
        </div>
        <div class="botao">
            <a href="./cadastro.php" id="submit"> Novo Cadastro</a>
        </div>
        <div>
            <label for="filtro">Pesquisa de pessoas:</label>
            <input type="text" id="filtro">
        </div>
        <div class="content_table" id="tabelaPessoa"></div>
        <?php
        session_start();
        if ($_SESSION['alert']) {
            echo $_SESSION['alert'];
        }
        unset($_SESSION['alert']);
        
        ?>   
    </body>
    </html>
    <script>
        let tabelaPessoa = document.getElementById('tabelaPessoa')
        let filtroName = document.getElementById('filtro')
        window.onload = function() {
            filtraNome();
        };
        filtroName.addEventListener("keyup", filtraNome)

        function filtraNome() {
            $.ajax({
                method: 'POST',
                url: 'pessoasFiltro.php',
                data: {
                    nome: filtroName.value, 
                } 
            })
            .done(function(data){
                tabelaPessoa.innerHTML = data;
            })
        }

    </script>