<?php
session_start();
$version = time();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Pegando os dados (usando o atributo 'name' do HTML)
    $nome  = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['pwd'] ?? '';

    if (empty($nome) || empty($email) || empty($senha)) {
        echo "<script>alert('Preencha todos os campos!'); window.history.back();</script>";
        exit();
    }

    // Verifica se o e-mail já existe
    $checkEmail = $conn->prepare("SELECT id_usuario FROM usuario WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Este e-mail já está cadastrado!'); window.history.back();</script>";
        exit();
    }
    $checkEmail->close();

    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    // CORREÇÃO: Tabela 'usuario' (singular) conforme seu arquivo conexao.php
    $stmt = $conn->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha_criptografada);

    if($stmt->execute()){
        $_SESSION['id_usuario'] = $stmt->insert_id;
        $_SESSION['nome_usuario'] = $nome;

        echo "<script>alert('Cadastrado com sucesso!'); window.location.href='criar_mensagem.php';</script>";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>