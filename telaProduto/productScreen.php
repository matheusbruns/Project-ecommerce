<?php
    include_once("../db/connection.php");
    
    $id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon"> <!--icone favicon-->
    <link rel="stylesheet" href="product_screen.css">
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
                <p class="myAccount">Acessar <br> <strong>Minha conta</strong></p>
                <div class="popuptext" id="myPopup">
                    <?php
                        if(!isset($_SESSION['sessionId'])){
                            echo "<a href='../user/login/login.php'><p class='toEnter'>Entrar</p></a>";
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['sessionId'])){
                            echo "<a href='user/logoff/logout.php'><p class='exit'>Sair</p></a>'";
                        }
                    ?>
                    
                </div>
            </div>
            <div class="cart">
                <a href="../Carrinho/carrinho.php"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </header>
    
    <div class="comeBack">
        <a href="../index.php"><i class="fas fa-chevron-left"></i> Voltar</a>
    </div>
    <div class="main_productScreen">
        <?php      
        $sql = "SELECT * FROM products WHERE category_id=$id";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();
        $products = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($products) > 0) {
            foreach ($products as $product) {
            echo'<div class="productImage">
                    <img src="../Cadastro de Produtos/imagem/image'.$product['image'].'" alt="'.$product['name'].'">
                </div>';
            echo'<div class="right_product">';
                    echo'<div class="productName"><h2>'.$product["name"].'</h2></div>';
                echo'<div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>';
                echo'<div class="productPrice"> <h2>R$ '.$product["value"].'</h2> </div>';
                echo'<div class="addToCart">
                    <a href="../Carrinho/insCarrinho.php?idProduct='.$product['category_id'] .'&idCategory='.$product["category_id_category"].'"><button name="addToCart">Adicionar ao <i class="fas fa-shopping-cart"></i> </button></a>
                    </div>';
            echo'</div>';
            echo'<div class="productDescription"> <p>'.$product["description"].'</p> </div>';
            echo'<div class="addToCart2">
            <a href="../Carrinho/insCarrinho.php?idProduct='.$product['category_id'] .'&idCategory='.$product["category_id_category"].'"><button name="addToCart">Adicionar ao <i class="fas fa-shopping-cart"></i></button></a>
            </div>';
            }
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