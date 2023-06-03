<?php
     // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estagiophp";

    try{
        $conn = new PDO("mysql:host=$servername; dbname=estagiophp", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connectado com sucesso!";
    }catch(PDOExeception $e) {
        echo "Erro na connexao! " .$e->getMessage();
    }
?> 