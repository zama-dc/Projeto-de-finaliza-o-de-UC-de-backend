<?php
//Erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$version = time();

// conexão
include 'conexao.php';

// =======================
// PESQUISA
// =======================
$pesquisa = '';/* deixo vazio p o usuario pesquisar */

if (isset($_GET['pesquisa']) && trim($_GET['pesquisa']) !== '') {
    $pesquisa = trim($_GET['pesquisa']);

    $sql = "SELECT *
            FROM recado
            WHERE destinatario LIKE ?
            ORDER BY id_recado DESC";

    $stmt = $conn->prepare($sql);
    $like = "%$pesquisa%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $sql = "SELECT *
            FROM recado
            ORDER BY id_recado DESC";
    $resultado = $conn->query($sql);
}


if (!$resultado) {
    die("Erro na consulta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SITE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="../CSS/style.css">
</head>


<body>

<!-- NAVBAR -->
<section id="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light mt-3">
<div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

<div class="collapse navbar-collapse" id="navbarNav">

    <!-- LINKS À ESQUERDA -->
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
                    <li><a class="dropdown-item" href="perfil.php">Editar perfil</a></li>
                    <li><hr class="dropdown-divider"></li>       
                    <li><a class="dropdown-item text-danger" href="excluir_conta.php">Excluir Conta</a></li>             
                    <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                </ul>
            </li>

        <?php else: ?>

            <li class="nav-item me-2">
                <a class="btn btn-dark" href="criar_mensagem.php" style="background-color: black; color: white !important; ">
                    Criar recado
                </a>
            </li>

            <li class="nav-item">
                <a class="btn btn-dark" href="../HTML/logar.html" style="background-color: black; color: white !important;">
                    Entrar
                </a>
            </li>

        <?php endif; ?>

    </ul>

</div>
</div>
</nav>
</section>


<!-- TÍTULO -->
<h1 class="text-center pt-5 fw-bold">Uma coleção de mensagens não enviadas</h1>
<p class="text-center"><?php echo $resultado->num_rows; ?> posts encontrados</p>

<!-- SEARCH -->
<form method="GET" class="search-box">
    <input
        type="text"
        name="pesquisa"
        class="search-input"
        placeholder="Pesquise por alguém"
        value="<?php echo htmlspecialchars($pesquisa); ?>"
    >
    <button type="submit" class="search-btn">
        <i class="fas fa-search"></i>
    </button>
</form>

<!-- CARDS -->
<div class="container mt-5 mb-5" style="margin-bottom: 20px;">
<div class="row g-4 justify-content-center">

<?php if ($resultado->num_rows > 0): ?>
<?php $temApenasUm = ($resultado->num_rows === 1); ?>

<?php while ($row = $resultado->fetch_assoc()): ?>

<div class="<?php echo $temApenasUm ? 'col-12 col-lg-8' : 'col-12 col-md-6 col-lg-4'; ?> d-flex justify-content-start">

<a href="detalhes_recado.php?id=<?php echo $row['id_recado']; ?>" style="text-decoration:none; color:inherit; width:100%;">

<div style="
    max-width: <?php echo $temApenasUm ? '320px' : '380px'; ?>;
    width: 100%;
    height: 400px;
    border: 5px solid black;
    display: flex;
    flex-direction: column;
    background-color: <?php echo $row['cor']; ?>;
">

    <div style="display:flex; align-items:center; background:white; padding:8px; border-bottom:5px solid black; gap:10px;">
        <div style="background:black; color:#FFD700; padding:2px;">
            <span class="material-symbols-outlined">emoticon</span>
        </div>
        <strong>Para:</strong>
        <span style="flex-grow:1;"><?php echo htmlspecialchars($row['destinatario']); ?></span>
        <i class="fas fa-envelope"></i>
    </div>

    <div style="flex-grow:1; padding:20px; overflow: hidden;">
        <p style="font-size:1.8rem; font-weight:bold;">
            <?php echo htmlspecialchars($row['mensagem']); ?>
        </p>
    </div>

</div>
</a>
</div>

<?php endwhile; ?>
<?php else: ?>
<p class="text-center">Nenhum resultado encontrado.</p>
<?php endif; ?>

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

