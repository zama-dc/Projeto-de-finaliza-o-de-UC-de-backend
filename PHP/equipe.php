<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"  lang="pt-br">
        <title>SITE</title>                
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=emoticon" />
        <link rel="stylesheet" type="text/css" href="../CSS/style.css"><!-- css externo -->
    </head>
<body><!-- todas tags estruturais -->

    <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light mt-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../img/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav"><!-- ms-auto=empurra p direita a nav -->
   
       <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="termos_e_condicoes.php">Termos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="equipe.php">Equipe</a>
        </li>        
        </ul>



      
    </div>
  </div>
</nav>
</section>

<!-- 
<form action="../PHP/processa_recado.php" method="POST" class="container mt-5">
<div class="row justify-content-center"> 
    <div class="col-md-6 d-flex flex-column align-items-center">
         <div id="card-preview" style="width: 400px; height: 450px; border: 5px solid black; display: flex; flex-direction: column; background-color: pink;">

<div style="display: flex; align-items: center; background: white; padding: 10px; border-bottom: 5px solid black; gap: 10px;">
     <div style="background: black; color: #FFD700; padding: 4px; display: flex; align-items: center; justify-content: center;">
        <span class="material-symbols-outlined">
emoticon
</span>
     </div> 
     <span style="font-weight: bold; font-size: 1.2rem; color: black !important;">Para:</span> 
      <input type="text" name="destinatario" placeholder="Digite o nome" required style="border: none; outline: none; font-weight: bold; font-size: 1.2rem; width: 100%; background: transparent;">
       <i class="fas fa-envelope"></i> 
    </div>

<div style="flex-grow: 1; padding: 20px; display: flex;"> 
    <textarea name="conteudo" id="mensagem" placeholder="Escreva sua mensagem aqui..." required style="width: 100%; height: 100%; background: transparent; border: none; outline: none; font-size: 2.2rem; font-weight: bold; line-height: 1.1; resize: none; color: #000;"></textarea>
 </div>

 


</div> 
</div>

<div class="mt-4 text-center">
     <p class="small fw-bold">CHOOSE A COLOR:</p>
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
</form> -->





<br><br><br><br><br><br><br><br><br>
<div class="container mt-5" style="margin-bottom: 90px;">
    <div class="row align-items-center">
        
        <div class="col-md-6">
            <div class="container-texto" style="">
                <h1 class="fw-bold" style="font-size: 56px; text-transform: uppercase; letter-spacing: 1px; line-height: 0.9;">
                    Conheça a <br> <span style="color: #6e6e6e; font-weight: bold;">equipe</span>
                </h1>
                <hr style="width: 30%; border: 3px solid black; opacity: 1; margin: 20px 0;">
                <p style="font-size: 1.2rem; line-height: 1.5; max-width: 400px;">
                    Como estudante de TDS, desenvolvi este projeto para praticar PHP e MySQL. Criei esta releitura do The Unsent Project para aplicar conceitos de banco de dados e lógica de programação, desenvolvendo um mural funcional com sistema de busca por destinatários.
                </p>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
            <div id="card-preview"
                style="
                    width: 380px;
                    height: 480px;
                    border: 5px solid black;
                    display: flex;
                    flex-direction: column;
                    background-color: white;
                    box-shadow: 20px 20px 0px black; 
                    transform: translate(50px, -80px);
                ">

                <div style="
                    flex-grow: 1;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    overflow: hidden;
                    background: #f0f0f0;
                ">
                    <img
                        src="../img/eu2.png"
                        alt="Foto da Elisama"
                        style="
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                        "
                    >
                </div>

                <div style="
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    background: white;
                    padding: 15px;
                    border-top: 5px solid black;
                ">
                    <div style="
                        background: black;
                        color: #008080;
                        padding: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    ">
                        <i class="fa-solid fa-compass" style="font-size: 1.2rem;"></i>
                    </div>

                    <span style="
                        font-weight: 900;
                        font-size: 1.4rem;
                        text-transform: uppercase;
                    ">
                        Elisama(Zama)
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>














<footer class="bg-dark text-light py-5" id="footer">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-4 col-md-6">
                <h5 class="mb-4 text-uppercase fw-bold"></h5> <p class="mb-4">

                </p>
                <div class="contact-mini">
                    <p class="small mb-1"><i class="fas fa-envelope me-2"></i> contact@example.com</p>
                    <p class="small"><i class="fas fa-map-marker-alt me-2"></i> Porto Alegre, Brasil</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <h5 class="mb-4">Institucional</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="equipe.php" target="_blank" class="footer-link text-decoration-none text-light">Equipe</a></li>
                    <li class="mb-2"><a href="termos_e_condicoes.php" target="_blank" class="footer-link text-decoration-none text-light">Termos e condições</a></li>

                </ul>
            </div>


            <div class="col-lg-4 col-md-6">
                <h5 class="mb-4">Nos Siga nas Redes Sociais</h5>
                <!-- <p class="mb-4">Fique por dentro de tudo o que acontece no mundo literário e acompanhe nossa jornada.</p> -->
                <div class="social-links d-flex gap-4">
                    <a href="https://www.instagram.com" target="_blank" class="btn btn-danger btn-sm rounded-circle fs-5"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com" target="_blank" class="btn btn-primary btn-sm rounded-circle fs-5"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.twitter.com" target="_blank" class="btn btn-secondary btn-sm rounded-circle fs-5"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-12">
                <hr class="mb-4">
                <div class="text-center">
                    <p class="mb-0">&copy; 2026. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

        <!-- SETA QUE VOLTA PARA CIMA -->
       <div class="fixed-button">
        <i class="fas fa-arrow-up"></i>
      </div>

<!-- ÍCARO - LIBRAS -->
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




    <!-- script sempre vai no corpo -->

     </script>
     <script src="../js/scrollToTopButton.js"></script>
     <script src="../js/cadastroo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>