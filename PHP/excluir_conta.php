<?php
session_start();
include 'conexao.php';

// Segurança: Se não estiver logado, não pode excluir nada
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Lógica do DELETE (O "D" do seu CRUD)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmar_exclusao'])) {
    
    // 1. Deleta os recados do usuário primeiro (para evitar erro de chave estrangeira)
    $sql_recados = "DELETE FROM recado WHERE id_usuario = $id_usuario";
    $conn->query($sql_recados);
    
    // 2. Deleta o usuário
    $sql_usuario = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
    
    if ($conn->query($sql_usuario)) {
        // 3. Destrói a sessão e manda para a vitrine
        session_destroy();
        echo "<script>alert('Sua conta foi excluída permanentemente.'); window.location.href='vitrine.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        .delete-container {
            max-width: 500px;
            margin: 100px auto;
            border: 5px solid #ff4d4d; /* Vermelho para alerta */
            padding: 30px;
            box-shadow: 15px 15px 0px black;
            background: white;
            text-align: center;
        }
        .btn-danger-custom {
            background: #ff4d4d;
            color: white;
            border: 3px solid black;
            border-radius: 0;
            font-weight: bold;
            padding: 10px 20px;
        }
        .btn-danger-custom:hover { background: #cc0000; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="delete-container">
        <h2 class="fw-bold mb-3">VOCÊ TEM CERTEZA?</h2>
        <p class="mb-4">Ao excluir sua conta, todos os seus recados serão apagados permanentemente. Esta ação não pode ser desfeita.</p>

        <form method="POST">
            <div class="d-flex justify-content-around align-items-center mt-4">
                <a href="perfil.php" class="text-dark fw-bold text-decoration-none">Cancelar</a>
                <button type="submit" name="confirmar_exclusao" class="btn-danger-custom">SIM, EXCLUIR MINHA CONTA</button>
            </div>
        </form>
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
