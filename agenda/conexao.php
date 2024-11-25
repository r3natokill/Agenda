<?php
// Configurações de conexão
$host = 'localhost';     // Nome do host (normalmente 'localhost')
$dbname = 'agenda';      // Nome do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = '';   // Senha do banco de dados

// Conexão usando mysqli
$conn = new mysqli($host, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "";
}
?>
