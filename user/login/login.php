<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <a href="../../index.php">
            <img src="../../images/Logo_point.png" alt="logo" height="60px">
        </a>
    </header>
   
    <div class="main">
        <img src="../../images/Logo_point.png" alt="" height="80px">
        <br><br>
        <h2>Login</h2>
        <br>
        <?php
            if(isset($_GET['error']) && $_GET['error'] == 1){
                echo '<p class="error">Usuário ou senha incorretos!</p>';
            }else if(isset($_GET['error']) && $_GET['error'] == 2){
                echo '<p class="error">Preencha todos os campos!</p>';
                
            }
        ?>
        <form action="../security/authentication.php" method="POST">
            <label for="email"><p>E-mail</p></label> 
            <input id="email" class="email" type="text" placeholder="Digite seu email" data-val="True" name="email" >
            <br><br>
            <label for="passwordClient"><p>Senha</p></label> 
            <input class="password" type="password" placeholder="Digite sua senha" id="passwordClient" name="password">
            <div class="mostrarSenha">
                <input type="checkbox" onclick="myFunction()"> <p>Mostrar senha</p>
            </div>
            <br>
            <div class="botao">
                <button class="entrar" type="submit">Entrar</button>
            </div>
        </form>
        <div class="botao">
            <a href="../../index.php"><button class="voltar" type="submit">Voltar</button></a>
        </div>      
        <br><br> 
        <div class="cadastro">
            <a href="../sign_up/cadastro.php"><p>Não tem conta? Cadastre-se</p></a>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("passwordClient");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

    </script>
</body>
</html>
