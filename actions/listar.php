<?php

    require_once "config/connection.php";

    try{
        $stmt_listar = $conn->prepare("SELECT id, nome, email, telefone FROM usuarios ORDER BY id ASC");
        $stmt_listar->execute();

        $usuarios = $stmt_listar->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOExecute $e){
        $usuarios = [];

        echo "Erro ao listar contados: " . $e->getMesage();
    }
    