<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o usuário está logado
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: ../HTML/cadastro.html"); // Redireciona após o sucesso
            exit;
    }

    $id_usuario   = $_SESSION['id_usuario'];
    $destinatario = $_POST['destinatario'] ?? '';
    $mensagem     = $_POST['conteudo'] ?? ''; // O nome no formulário é 'conteudo'
    $cor          = $_POST['cor'] ?? 'pink';

    if (!empty($destinatario) && !empty($mensagem)) {
        // Prepara a inserção
        $stmt = $conn->prepare("INSERT INTO recado (destinatario, mensagem, cor, id_usuario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $destinatario, $mensagem, $cor, $id_usuario);

        if ($stmt->execute()) {
            header("Location: vitrine.php"); // Redireciona após o sucesso
            exit;
        } else {
            echo "Erro ao salvar: " . $stmt->error;
        }
    } else {
        echo "Preencha todos os campos!";
    }
}
?>