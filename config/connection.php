<?php

    $host = "localhost";
    $dbname = "cadastro";
    $username = "root";
    $password = "";

    try{
        // Tentativa de conexão
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Apresenta o Erro
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 

    catch (PDOException $e) {

        // Se o código acima der erro o sistema vai capturar a mensagem e mostrar abaixo.
        die("Erro crítico de conexão: " . $e->getMessagem());
    }

