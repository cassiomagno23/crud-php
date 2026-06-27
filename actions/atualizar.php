<?php

    require_once "../classes/Database.php";
    require_once "../classes/Usuario.php";

    if(isset($_POST['id'])){
        
        $database = new Database();
        $db = $database->getConnection();
    
        $usuario = new Usuario($db);

        $usuario->id = $_POST['id'];
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->telefone = $_POST['telefone'];

        if($usuario->atualizar()){

            header("Location: ../index.php?atualizado=true");
            exit();

        }else{

            echo "Erro ao atualizar usuário.";
        }
    }else {
            // Se alguém tentar acessar esse arquivo direto pelo navegador, manda de volta
            header("Location: ../index.php");
            exit();
    }

