<?php 

    include_once ('../db/connection.php');
    include_once ("../user/security/validate.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon"> <!--icone favicon-->
    <link rel="stylesheet" href="carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../images/Logo_point.png" alt="Logo">
            </a>

        </div>
        <div class="main_header">
            <div class="popup" onclick="myFunction()">
                <p class="myAccount"><strong>Minha conta</strong></p>
                <div class="popuptext" id="myPopup">
                    <?php
                        if(!isset($_SESSION['sessionId'])){
                            echo "<a href='user/login/login.php'><p class='toEnter'>Entrar</p></a>";
                        }
                    ?>
                    <a href="user/logoff/logout.php"><p class="exit">Sair</p></a>
                </div>
            </div>
        </div>

         <!--Responsive Navbar-->
        <div class="wrapper" id="wrapper">
            <input type="checkbox" id="btn" hidden>
            <label for="btn" class="menu-btn">
            <i class="fas fa-bars"></i>
            <i class="fas fa-times"></i>
            </label>
            <nav id="sidebar">
                <div class="title">
                  Barra de navegação
                </div>
                <ul class="list-items">
                <?php
                        if(isset($_SESSION['sessionId'])){
                            echo'<li><a href="#">Olá, '.$_SESSION['name']. '</a></li>';
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['admin' == 1])) {
                            echo'<li><a href="/tabelaProduto/admin.html"><i class="fas fa-user"></i>Administrador</a></li>';
                        }
                    ?>
                    <?php
                        if(!isset($_SESSION['sessionId'])){
                            echo "<li><a href='user/login/login.php'><i class='fas fa-user'></i>Entrar</a></li>";
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['sessionId'])){
                            echo "<li><a href='../user/logoff/logout.php'><p class='exit'>Sair</p></a></li>";
                        }
                    ?>
                    <div class="icons">
                        <a href="https://www.linkedin.com/in/matheus-rosa-bruns-111536208/"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.linkedin.com/in/carlos-eduardo-nass-66bba91b4/"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.linkedin.com/in/jo%C3%A3o-guilherme-maia-/"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.linkedin.com/in/matheus-bittencourt-306a86172/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </ul>
            </nav>
        </div><!--Responsive Navbar-->
    </header>

    <div class="cart">
        <h2>Carrinho de compras</h2>
    </div>

    <?php
        $sql = "SELECT * FROM products AS p 
        JOIN users_has_products AS c
        ON p.category_id = c.products_category_id
        WHERE users_iduser = '".$_SESSION['iduser']."'";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();

        $result = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $item)
        {
            echo'<div class="tableProducts">';
                echo'<table>';
                    echo'<thead>
                            <td></td>
                            <td>Produto</td>
                            <td>Preço</td>
                            <td>Remover</td>
                        </thead>';
                    echo'<tbody>';
                        echo'<tr>';
                            echo'<td><img src="../Cadastro de Produtos/imagem/image'.$item['image'].'" alt="Seu produto"></td>';
                            echo'<td>'.$item['name'].'</td>';
                            echo'<td>R$ '. $item['value'].'</td>';
                            echo'<td><a href="deleteCarrinho.php?idProduct='.$item['category_id'].'"> <i class="fas fa-trash"></i></td>';
                        echo'</tr>';
                    echo'</tbody>';
                echo'</table>';
            echo'</div>';
        }
    
    ?>
    

    <div class="checkout">
        <div class="keep_buying">
            <a href="../index.php"><button >Continuar Comprando</button></a>
        </div>
        <?php
        if(count($result) > 0){
            echo '<div class="checkout_buy">
                <a href="deleteAll.php"><button>Finalizar compra</button></a>
            </div>';
        }else{
            echo '<div class="gif"> 
                <img src="../images/jhon travolta.gif"> <br><small> meio vazio por aqui...</small>
            </div>';
        }
        ?>
    </div>


    <script>
        function myFunction() {
          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
        }
    </script>
</body>
</html>