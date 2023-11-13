<?php
    // Configurações do banco de dados
    $servername = "dev.pedro.com";
    $username = "root";
    $password = "";
    $dbname = "db_cc19";

    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
?>