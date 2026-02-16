<?php
session_start();      
session_unset();      // limpa todas as variáveis da sessão
session_destroy();    

header("Location: vitrine.php"); // redireciona para a tela de login
exit;
