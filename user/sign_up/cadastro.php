<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="shortcut icon" href="../../images/favicon.png" type="image/x-icon"><!--icone favicon-->
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>

    <header>
        <a href="../../index.php">   
            <img src="../../images/Logo_point.png" alt="logo" height="60px">
        </a>
    </header>
   
    <div class="main">
        <img src="/images/Logo_point.png" alt="" height="80px">
        <br><br>
        <h2>Cadastro</h2>
        <br>
        <?php
            if(isset($_GET['error'])){
                echo '<p class="error">Email já cadastrado!</p>';
            }
        ?>
        <form action="insUser.php" method="post">
            <label for="name"><p>Nome</p></label>
            <input required id="name" class="name" type="text" placeholder="Digite seu nome" data-val="True" name="name">
            <br><br>
            <label for="email"> <p>E-mail</p></label>
            <input name="email" required id="email" class="email" type="text" placeholder="Digite seu email" data-val="True" name="email">
            <br><br>
            <label for="myInput"><p>Senha</p></label> 
            <input name="password"  required class="password" type="password" placeholder="Digite sua senha" id="myInput">
            <br><br>
            <label for="myInput1"><p>Confirmar senha</p></label> 
            <input  class="password" type="password" placeholder="Confirme sua senha" id="myInput1">
            <div class="mostrarSenha">
                <input type="checkbox" onclick="myFunction()"> <p>Mostrar senha</p>
            </div>
            <br><br>
            <div class="botao">
                <button class="cadastrar" type="submit">Cadastrar</button>
            </div>   
        </form>
        <div class="botao">
            <a href="../login/login.php"><button class="voltar">Voltar</button></a>
        </div>
    </div>


    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("myInput1");
            if (x.type === "password" && y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
    
</body>
</html>