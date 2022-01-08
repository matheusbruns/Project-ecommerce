<?php 
    include "db/connection.php";
    session_start();

    if(session_status() == 2 && isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
        header('Location: tablesAdmin/tableProducts.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"><!--icone favicon-->
    <link rel="stylesheet" href="Principal/style.css">
    <link rel="stylesheet" href="Principal/responsivo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="images/Logo_point.png" alt="Logo">
            </a>
        </div>
        <div class="main_header">

            <?php
                if(isset($_SESSION['sessionId'])){
                    echo '<div class="header-message"> Olá, '.$_SESSION['name']. '!</div>';
                    echo $_SESSION['admin'];
                   
                }
            ?>

            <div class="popup" onclick="myFunctionPopup()">
                <p class="myAccount"><strong>Minha conta</strong></p>
                <div class="popuptext" id="myPopup">
                    <?php
                        if(!isset($_SESSION['sessionId'])){
                            echo "<a href='user/login/login.php'><p class='toEnter'>Entrar</p></a>";
                        }else{
                            echo"<a href='user/logoff/logout.php'><p class='exit'>Sair</p></a>";
                        }
                    ?>
                    
                </div>
            </div>
            <div class="cart">
                <a href="Carrinho/carrinho.php"><i class="fas fa-shopping-cart"></i></a>
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
                    <li><a href="Carrinho/carrinho.php"><i class="fas fa-shopping-cart"></i>Carrinho</a></li>
                    <?php
                        if(isset($_SESSION['sessionId'])){
                            echo'<li><a href="user/logoff/logout.php"><i class="fas fa-sign-out-alt"></i>Sair</a></li>';
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
    </header><!--Fim do cabeçalho-->

    <section class="main">
        <!--Slider banners-->
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/Banner1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="images/Banner2.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="images/Banner3.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="images/Banner4.jpg" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div style="text-align:center" class="botoes">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
            <span class="dot" onclick="currentSlide(4)"></span> 
            </div>
        <!--Slider banners-->

        <div class="botao_filtrar">
           <?php
                $sql = "SELECT * FROM categories";
                $stm_sql = $db_connection->prepare($sql);
                $stm_sql->execute();
                $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

                if(count($categories) > 0){
                    foreach($categories as $category){          
                        echo "<a href='index.php?idcategory=".$category['id_category']."'><button class='filtrar' ><img src='Cadastro de categoria/image/image".$category['image']."' alt='' height='95px'>
                        <p>".$category['name'] ."</p>
                        </button></a>";
                    }
                }
           ?>
        </div>

        <div class="produtos">
            <?php
            if(!isset($_GET['idcategory'])){
                $sql = "SELECT * FROM products";
                $stm_sql = $db_connection->prepare($sql);
                $stm_sql->execute();
                $products = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($products) > 0) {
                   foreach ($products as $product) {
                       echo"<div class='bg_produto'>";
                       echo"<a href='telaProduto/productScreen.php?id=".$product['category_id'] ."'>";
                       echo"<div class='imagem'> <img src='Cadastro de Produtos/imagem/image".$product['image']."' alt='".$product['name']."'> </div>";
                       echo"<div class='nome_produto'> <h2>".$product['name']."</h2> </div>";
                       echo"<div class='preco_produto'> <h2>R$ ".$product['value']."</h2> </div>";
                       echo"</a>";
                       echo"<div class='add_carrinho'>";
                        echo"<a href='Carrinho/insCarrinho.php?idProduct=".$product['category_id'] . '&idCategory='.$product['category_id_category']."'>
                            <button name'addToCart'>
                            <h2>Adicionar</h2>
                            <div class='imagem_cart'>
                            <img src='images/img_carrinho.png' alt='' height='30px'>
                            </div>
                            </button>
                            </a>";
                            echo"</div>";
                        echo"</div>";   
                   }
                }
            }else{
                $id_category = $_GET['idcategory'];
                $sql = "SELECT * FROM products WHERE category_id_category = :id_category";
                $stm_sql = $db_connection->prepare($sql);
                $stm_sql->bindParam('id_category',$id_category);
                $stm_sql->execute();
                $products = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                if (count($products) > 0) {
                    foreach ($products as $product) {
                        echo"<div class='bg_produto'>";
                        echo"<a href='telaProduto/productScreen.php?id=".$product['category_id'] ."'>";
                        echo"<div class='imagem'> <img src='Cadastro de Produtos/imagem/image".$product['image']."' alt='".$product['name']."'> </div>";
                        echo"<div class='nome_produto'> <h2>".$product['name']."</h2> </div>";
                        echo"<div class='preco_produto'> <h2>R$ ".$product['value']."</h2> </div>";
                        echo"</a>";
                        echo"<div class='add_carrinho'>";
                        echo"<a href='Carrinho/insCarrinho.php?idProduct=".$product['category_id'] . '&idCategory='.$product['category_id_category']."'>
                            <button name'addToCart'>
                            <h2>Adicionar</h2>
                            <div class='imagem_cart'>
                            <img src='images/img_carrinho.png' alt='' height='30px'>
                            </div>
                            </button>
                            </a>";
                            echo"</div>";
                         echo"</div>";   
                    }
                 }
            }
           ?>
        </div><!--produtos-->

        <div class="card_curiosities">
            <h2 class="title">Curiosidades</h2>            
            <div class="flex">
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <h2></h2>
                            <img src="https://i.ytimg.com/vi/J2lWG24rFUE/mqdefault.jpg" alt="" height="173px" width="100%">
                        </div>
                        <div class="flip-box-back">
                            <h2>Whiskey</h2>
                            <p>É uma bebida alcoólica destilada de cereais, muitas vezes incluindo malte, que foi envelhecida em barris. O teor alcoólico de um whisky vai de um mínimo legal de 40%, e apesar de não ter limíte máximo, o maior teor comum a ser encontrado é de 63,5%.</p>
                        </div>
                    </div>
                </div>
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <h2></h2>
                            <img src="https://www.casamelhor.com/wp-content/uploads/2021/07/banner-para-vodka-1-750x450.jpg" alt="" height="172px" width="100%">
                        </div>
                        <div class="flip-box-back">
                            <h2>Vodka</h2>
                            <p>É uma popular bebida destilada, incolor, quase sem sabor e com um teor alcoólico entre 35 e 60%. A vodca é a bebida nacional da Polónia e da Rússia, O nome vodka é o diminutivo de água em várias línguas eslavas.</p>
                        </div>
                    </div>
                </div>
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <h2></h2>
                            <img src="https://st.depositphotos.com/1011976/3541/i/600/depositphotos_35411925-stock-photo-wine-with-barrel-and-hay.jpg" alt="" height="173px" width="100%">
                            
                        </div>
                        <div class="flip-box-back">
                            <h2>Vinho</h2>
                            <p>Vinho é, genericamente, uma bebida alcoólica produzida por fermentação do sumo de uva. Na União Europeia, o vinho é legalmente definido como o produto obtido exclusivamente por fermentação parcial ou total de uvas frescas, inteiras ou esmagadas, ou de mostos.</p>
                        </div>
                    </div>
                </div>
            </div>    
        </div><!--Card curiosidades-->

        <footer>
            <div class="mainFooter">
                <div class="social">
                    <h2>Siga-nos</h2>
                    <a href="#"><i class="fab fa-instagram" id="insta"></i></a>
                    <a href="#"><i class="fab fa-facebook-square" id="face"></i></a>
                </div>
                <div class="location">
                    <h2>Localização: </h2>
                    <p>Estamos localizados na Rua Senador Felipe Schmidt, 308 - Centro <br>Joinville - SC</p>
                </div>
                <div class="team">
                    <h2>Time: </h2>
                    <p>Matheus Rosa Bruns</p>
                    <p>Carlos Eduardo Nass</p>
                    <p>João Maia</p>
                    <p>Matheus Bittencourt</p>
                </div>
            </div>
        </footer> <!--Footer-->
    </section><!--main-->

    <script>
        /* JS para o slider */

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }

        /* header */
        function myFunctionPopup() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>

</body>
</html>