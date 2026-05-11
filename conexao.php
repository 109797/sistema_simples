<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'sistema_simples';

$conn = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conn) {
    die('Erro de conexão: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
