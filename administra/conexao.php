<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "loja";

// Cria a conexão
$mysqli = new mysqli($host, $username, $password, $database);

// Verifica a conexão
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

echo "Conexão bem-sucedida";

// Fecha a conexão quando terminar de usar
?>