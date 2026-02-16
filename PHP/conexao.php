<?php
/* ÓTIMO SE O TRABALHO É LOCAL,MAS SE EU QUISER PASSAR P ALGUEM OU USAR EM OUTRO SERVIDOR N FUNCIONARA */
$servername="localhost";
$username="root";
$password="";
$dbname="para_segunda";

/* antigo */
// CONEXÃO
/* $conn = new mysqli($servername, $username, $password, $dbname); */

// VERIFICA CONEXÃO
/* if($conn->connect_error){
    die("Falha na conexão. Causa: " . $conn->connect_error);
} *//* else{
    echo "Conectado com sucesso!<br>";
} */



// CONEXÃO
$conn = new mysqli($servername, $username, $password, $dbname);

// VERIFICA CONEXÃO
if($conn->connect_error){
    die("Falha na conexão. Causa: " . $conn->connect_error);
}/* else{
    echo "Conectado com sucesso!<br>";
} */


    $sql="create database if not exists $dbname";
    if($conn->query($sql) === true){
        $conn->select_db($dbname);
    }/* else{
        die("Erro ao criar/acessar o BD: " . $conn->error);    
    } */

    $conn->set_charset("utf8mb4");
    /* charset -> importante p n bugar acentos e mojis */
     

    $sqlusuario = "CREATE TABLE IF NOT EXISTS usuario(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40) NOT NULL,
    email VARCHAR(80) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
    )";    

    $conn->query($sqlusuario);

    $sqlrecado = "CREATE TABLE IF NOT EXISTS recado(
        id_recado INT AUTO_INCREMENT PRIMARY KEY,
        destinatario VARCHAR(22) NOT NULL,
        cor VARCHAR(20) DEFAULT '#FFC0CB',
        mensagem VARCHAR(100) NOT NULL,
        data_postagem TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        id_usuario INT NOT NULL,
        FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE
    )";
    $conn->query($sqlrecado);

/* $stmt->close();
$conn->close(); */ /* VER ISSO AQUI DEPOIS */ 
$conn->set_charset("utf8mb4");

 ?> 