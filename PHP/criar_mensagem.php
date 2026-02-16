

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"  lang="pt-br">
        <title>SITE - Criar Mensagem</title>                
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=emoticon" />
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>
<body>

<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light mt-3">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- ESQUERDA -->
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" target="_blank" href="termos_e_condicoes.php">Termos</a></li>    
                    <li class="nav-item"><a class="nav-link" target="_blank" href="equipe.php">Equipe</a></li>
                </ul>

                <!-- DIREITA -->
                <ul class="navbar-nav ms-auto align-items-center">

                    <?php if (isset($_SESSION['id_usuario'])): ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center fw-bold" href="#" data-bs-toggle="dropdown">
                                Olá, <?php echo explode(' ', $_SESSION['nome_usuario'])[0]; ?>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="criar_mensagem.php">Criar recado</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="excluir_conta.php">Excluir Conta</a></li>
                                <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                            </ul>
                        </li>

                    <?php else: ?>

<!--                         <li class="nav-item">
                            <a class="btn btn-dark" href="../HTML/logar.html"style="background-color: black; color: white !important;">
                                Entrar
                            </a>
                        </li> -->

                    <?php endif; ?>

                </ul>

            </div>
        </div>
    </nav>
</section>


    <form action="processa_recado.php" method="POST" class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-6 d-flex flex-column align-items-center">
                <div id="card-preview" style="width: 400px; height: 450px; border: 5px solid black; display: flex; flex-direction: column; background-color: pink;">
                    
                    <div style="display: flex; align-items: center; background: white; padding: 10px; border-bottom: 5px solid black; gap: 10px;">
                        <div style="background: black; color: #FFD700; padding: 4px; display: flex; align-items: center; justify-content: center;">
                            <span class="material-symbols-outlined">emoticon</span>
                        </div> 
                        <span style="font-weight: bold; font-size: 1.2rem; color: black;">To:</span> 
                        <input type="text" name="destinatario" placeholder="Digite o nome" required style="border: none; outline: none; font-weight: bold; font-size: 1.2rem; width: 100%; background: transparent;">
                        <i class="fas fa-envelope"></i> 
                    </div>

                    <div style="flex-grow: 1; padding: 20px; display: flex;"> 
                        <textarea name="conteudo" placeholder="Escreva sua mensagem aqui..." required style="width: 100%; height: 100%; background: transparent; border: none; outline: none; font-size: 2.2rem; font-weight: bold; line-height: 1.1; resize: none; color: #000;"></textarea>
                    </div>
                </div> 

                <div class="mt-4 text-center">
                    <p class="small fw-bold">ESCOLHA UMA COR:</p>
                    <div class="d-flex gap-2 justify-content-center"> 
                        <input type="hidden" name="cor" id="input-color" value="pink"> 
                        
                        <div onclick="changeColor('pink')" style="width:30px; height:30px; border:2px solid black; background:pink; cursor:pointer; border-radius:50%;"></div>
                        <div onclick="changeColor('#a2d1ee')" style="width:30px; height:30px; border:2px solid black; background:#a2d1ee; cursor:pointer; border-radius:50%;"></div> 
                        <div onclick="changeColor('#fdf44a')" style="width:30px; height:30px; border:2px solid black; background:#fdf44a; cursor:pointer; border-radius:50%;"></div>
                        <div onclick="changeColor('#000000')" style="width:30px; height:30px; border:2px solid black; background:#000000; cursor:pointer; border-radius:50%;"></div>
                        <div onclick="changeColor('#E35336')" style="width:30px; height:30px; border:2px solid black; background: #E35336; cursor:pointer; border-radius:50%;"></div>
                        <div onclick="changeColor('#E6E6FA')" style="width:30px; height:30px; border:2px solid black; background: #E6E6FA; cursor:pointer; border-radius:50%;"></div>
                        <div onclick="changeColor('#0047AB')" style="width:30px; height:30px; border:2px solid black; background: #0047AB; cursor:pointer; border-radius:50%;"></div>
                        <div onclick="changeColor('#C2B280')" style="width:30px; height:30px; border:2px solid black; background: #C2B280; cursor:pointer; border-radius:50%;"></div>
                    </div> 
                </div>

                <button type="submit" class="btn btn-dark mt-4 px-3 fw-bold" style="border-radius: 0; border: 3px solid black; text-transform: uppercase; width: 405px;">Enviar</button>
            </div>
        </div>
    </form>




    <script>
        function changeColor(color) {
            const cardPreview = document.getElementById('card-preview');
            const inputColor = document.getElementById('input-color');
            const textArea = cardPreview.querySelector('textarea');

            cardPreview.style.backgroundColor = color;
            inputColor.value = color; 

            if(color === '#000000' || color === '#0047AB') {
                textArea.style.color = 'white';
            } else {
                textArea.style.color = 'black';
            }
        }
    </script>

        <!-- SETA QUE VOLTA PARA CIMA -->
        <div class="fixed-button">
          <i class="fas fa-arrow-up"></i>
        </div>


<!-- VLibras -->
<div vw class="enabled">
  <div vw-access-button class="active"></div>
  <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
  </div>
</div>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
  new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>

<script src="../js/scrollToTopButton.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
