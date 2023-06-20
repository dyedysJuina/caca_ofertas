<?php
$servername = "clubedapublicidade.com.br"; // Endereço do servidor MySQL
$username = "horusp54_dyedys"; // Nome de usuário do MySQL
$password = "RO1624DU*"; // Senha do MySQL
$dbname = "horusp54_cacaofertas"; // Nome do banco de dados MySQL

// Cria uma conexão MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
?>

