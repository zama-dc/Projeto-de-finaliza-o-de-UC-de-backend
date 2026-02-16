<?php
session_start(); //inicia a sessão e salva quem logou
$version = time();
include 'conexao.php';

/* $servername="localhost";
$username="root";
$password="";
$dbname="teste1"; */

// CONEXÃO
/* $conn = new mysqli($servername, $username, $password, $dbname); */

// VERIFICA CONEXÃO
/* if($conn->connect_error){
    die("Falha na conexão. Causa: " . $conn->connect_error);
}else{ */
    /* echo "Conectado com sucesso!<br>"; */
/* } */

// =====================
// SELECT
// =====================
$email_logar = $_POST['email_logar'] ?? '';
$senha_logar = $_POST['pwd_logar'] ?? '';

if (empty($email_logar) || empty($senha_logar)) {
    echo "<script>alert('Preencha todos os campos!'); window.history.back();</script>";
    exit();
}

//busca o usuário pelo email
$stmt = $conn->prepare("SELECT id_usuario, nome, email, senha FROM usuario WHERE email = ?");
$stmt->bind_param("s", $email_logar);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    // 3. Verifica a senha criptografada
    if (password_verify($senha_logar, $user['senha'])) {
        
        // salvo os dados na sessão
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['nome_usuario'] = $user['nome'];
        
        //vai p a vitrine
        header("Location: criar_mensagem.php"); 
        exit();
    } else {
        echo "<script>alert('Senha incorreta!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado!'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>