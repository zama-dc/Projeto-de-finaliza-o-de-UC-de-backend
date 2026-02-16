<?php
session_start();
include 'conexao.php';

// se não estiver logado, volto para o login
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$mensagem_sucesso = "";

// ATUALIZO O NOME
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['novo_nome'])) {
    $novo_nome = $conn->real_escape_string($_POST['novo_nome']);
    
    $sql_update = "UPDATE usuario SET nome = '$novo_nome' WHERE id_usuario = $id_usuario";
    
    if ($conn->query($sql_update)) {
        // Atualiza a sessão para o novo nome aparecer na Navbar imediatamente
        $_SESSION['nome_usuario'] = $novo_nome;
        $mensagem_sucesso = "Nome atualizado com sucesso!";
    }
}

// Busca os dados atuais do usuário
$sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
$res = $conn->query($sql);
$user = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil - Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        .perfil-container {
            max-width: 500px;
            margin: 100px auto;
            border: 5px solid black;
            padding: 30px;
            box-shadow: 15px 15px 0px black;
            background: white;
        }
        .btn-black {
            background: black;
            color: white;
            border-radius: 0;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
        }
        .btn-black:hover { background: #333; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="perfil-container">
        <h2 class="fw-bold mb-4">Editar Perfil</h2>

        <?php if($mensagem_sucesso): ?>
            <div class="alert alert-success border-2 border-dark rounded-0"><?php echo $mensagem_sucesso; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Seu Nome Atual:</label>
                <input type="text" name="novo_nome" class="form-control border-3 border-dark rounded-0" 
                       value="<?php echo htmlspecialchars($user['nome']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">E-mail (não pode ser alterado):</label>
                <input type="text" class="form-control border-3 border-dark rounded-0 bg-light" 
                       value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="vitrine.php" class="text-dark fw-bold text-decoration-none"><i class="fas fa-arrow-left"></i> Voltar</a>
                <button type="submit" class="btn-black">Salvar Alterações</button>
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
