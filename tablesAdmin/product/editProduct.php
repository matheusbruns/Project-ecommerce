<?php 
    include_once "../../db/connection.php";

    $id = $_GET['id'];

    if(isset($id)){
        $product = $db_connection->exec("SELECT * FROM products WHERE category_id = $id");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Produto</title>
    <link rel="shortcut icon" href="../../images//favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../Cadastro de Produtos/insProduct/cadastroProduto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
</head>

<body>  
    <header>
        <div class="logo">
            <img src="../../images/Logo_point.png" alt="Logo">
        </div>
        <div class="popup" onclick="myFunction()">
            <i class="fas fa-ellipsis-v"></i>
            <div class="popuptext" id="myPopup">
                <a href=""><p class="exit">Sair</p></a>
            </div>
        </div>
    </header> 

    <div class="main_product">
        <div class="registration_product">
            <h2>Cadastro de Produto</h2>
        </div>
        <form action="insProduct.php" method="POST" enctype="multipart/form-data">
            <div class="center_product">
                <div class="input_product">
                    <div class="name_product">
                        <label for="nome"><strong><h2 style="text-align: center;">Produto</h2></strong></label>
                        <input type="text" name="name" id="nome" required placeholder="Nome:" value="<?php echo $product['name']?>">
                    </div>
                    <br>
                    <div>
                        <label for="categories"><strong>Categoria</strong></label>
                        <select name="categories">
                            <?php
                                $sql = "SELECT * FROM categories";

                                $stm_sql = $db_connection->prepare($sql);
                                $stm_sql->execute();
        
                                $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

                                foreach($categories as $category){
                                    echo "<option value='".$category['id_category']."'>".$category['name']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="description_product">
                        <label for="descricao"><strong>Descrição:</strong></label>
                        <br>
                        <textarea rows="2" id="descricao" name="desc" value="<?php echo $product['description'];?>"></textarea>
                    </div>
                    <br>
                    <div class="value_product">
                        <label for="valor"><strong>Valor do Produto:</strong></label>
                        <br>
                        <input value="<?php echo $product['value'];?>" type="number" name="value-product" id="valor" required placeholder="R$ " min="0" value="0" step=".01">
                    </div>
                </div>           
                
                <div class="input_img">
                    <i class="fas fa-file-upload"></i>
                    <div class="file_selection">
                        <label for='arquivo'>Selecionar um arquivo &#187;</label>
                        <input name="image" type="file" id="arquivo" onchange="return validarArquivo()">  
                    </div>            
                </div>  
            </div>
            <div class="registrationButton">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>


    <script>
        function validarArquivo(){        
            var arquivoInput = document.getElementById('arquivo');
            var caminhoArquivo = arquivoInput.value;
            var extensoesPermitidas = /(.jpg|.jpeg|.png|.gif)$/i;
            if(!extensoesPermitidas.exec(caminhoArquivo)){
                alert('Por favor envie um arquivo que tenha as extensões .jpeg/.jpg/.png/');
                arquivoInput.value = '';
                return false;
            }else{
                if (arquivoInput.files && arquivoInput.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(arquivoInput.files[0]);
                    console.log(arquivoInput.files[0].size / 1024 / 1024);
                    console.log(arquivoInput.files[0].size);
                if (arquivoInput.files[0].size > 2097152) { 
                        alert("Tamanho do arquivo deve ser 2 MB!");
                        return false;
                    }
                }
            }
        }

        function myFunction() {
          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
        }
    </script>
    
</body>
</html>