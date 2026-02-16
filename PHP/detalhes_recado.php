<?php
include 'conexao.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

//busca o recado específico e o usuário
$sql = "SELECT recado.*, usuario.nome, recado.data_postagem 
        FROM recado 
        INNER JOIN usuario ON recado.id_usuario = usuario.id_usuario 
        WHERE id_recado = $id";

$resultado = $conn->query($sql);
$row = $resultado->fetch_assoc();

// 'H:i' adiciona Hora e Minuto ao formato
$dataEHora = date('d/m/Y \à\s H:i', strtotime($row['data_postagem']));

if (!$row) { die("Recado não encontrado."); }

$corFundo = $row['cor'];
$corTexto = ($corFundo == '#000000' || $corFundo == 'black') ? 'white' : 'black';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Recado</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=emoticon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    
    <style>
        .view-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px 20px;
            background-color: #fff;
        }

        /* O card grande sem o footer fake */
        .card-large {
            width: 100%;
            max-width: 550px; /* Largura levemente maior para destaque */
            border: 5px solid black;
            background-color: <?php echo $corFundo; ?>;
            display: flex;
            flex-direction: column;
            box-shadow: 15px 15px 0px black;
        }

        /* Cabeçalho do Card */
        .card-header-detalhe {
            display: flex; 
            align-items: center; 
            background: white; 
            padding: 15px; 
            border-bottom: 5px solid black; 
            gap: 12px;
        }

        /* Seção de Informações FORA do card */
        .info-section {
            width: 100%;
            max-width: 550px; /* Mesma largura do card para alinhar */
            margin-top: 40px; /* Espaço entre o card e o texto */
            text-align: left;
            font-family: 'Arial', sans-serif;
            color: black;
        }

        .info-section h3 {
            margin: 0; 
            font-size: 28px; 
            font-weight: 900;
            text-transform: lowercase; /* Estilo Unsent Project */
        }

        .info-section p {
            margin: 5px 0;
            font-size: 1.1rem;
        }

        .info-section hr {
            border: 0;
            border-top: 2px solid #eee;
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="view-container">
    
    <div class="card-large">
        <div class="card-header-detalhe">
            <div style="background: black; color: #FFD700; padding: 4px; display: flex; align-items: center; justify-content: center;">
                <span class="material-symbols-outlined">emoticon</span>
            </div> 
            <span style="font-weight: bold; font-size: 1.4rem; color: black; flex-grow: 1;">
                To: <?php echo htmlspecialchars($row['destinatario']); ?>
            </span>
            <i class="fas fa-envelope" style="color: black; font-size: 1.2rem;"></i> 
        </div>

        <div style="padding: 40px; min-height: 350px; display: flex; align-items: flex-start;">
            <p style="font-size: 3rem; font-weight: bold; color: <?php echo $corTexto; ?>; line-height: 1.1; margin: 0; word-break: break-word;">
                <?php echo htmlspecialchars($row['mensagem']); ?>
            </p>
        </div>
    </div>

    <div class="info-section">
        <h3><?php echo htmlspecialchars($row['destinatario']); ?></h3>

        <p style="color: #666; font-size: 1.0rem; margin-top: 5px; padding-bottom: 10px">
        Publicado dia <?php echo $dataEHora; ?>
    </p>

        <p><strong>Cor:</strong> <?php echo $corFundo; ?></p>
        

        <hr>
        
        <p style="font-size: 1.2rem; line-height: 1.4;">
            <?php echo htmlspecialchars($row['mensagem']); ?>
        </p>
    </div>

</div>


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
