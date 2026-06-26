<?php

    require_once "config/connection.php";

    if(isset($_POST['registrar'])){
        //CAPTURAR DADOS DO FORMULÁRIO
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        

     try{
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, telefone) VALUES (:nome, :email, :telefone)");
        
        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":telefone" => $telefone
        ]);

        header("Location: index.php?sucesso=true");
        exit;

    } catch (PDOException $e) {

        echo "Infelizmente ocorreu um erro ao salvar: " . $e->getMessage(); 
    }

    }

