<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - categoria</title>
    <link rel="shortcut icon" href="../../images/favicon.png" type="image/x-icon"><!--icone favicon-->
    <link rel="stylesheet" href="categoria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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

    <div class="main_category">
        <div class="registration_category">
            <h2>Cadastro de Categoria</h2>
        </div>
        <form action="insCategory.php" method="post" enctype="multipart/form-data">
            <div class="center_category">
                <div class="name_category">
                    <p>Nome da Categoria:</p>
                    <input type="text" name="nameCategory" required>
                </div>
                <div class="input_img">
                    <i class="fas fa-file-upload"></i>
                    <div class="file_selection">
                        <label for='arquivo'>Selecionar um arquivo &#187;</label>
                        <input name="imageCategory" type="file" id="arquivo" onchange="return validarArquivo()" required>  
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
            if(arquivoInput.value == ""){
                alert("Selecione um arquivo'")
            }
        }

        function myFunction() {
          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
        }
    
    </script>
</body>
</html>