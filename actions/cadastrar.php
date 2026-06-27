<?php

    require_once "../classes/Database.php";
    require_once "../classes/Usuario.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $database = new Database();
        $db = $database->getConnection();

        $usuario = new Usuario($db);

        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->telefone = $_POST['telefone'];

        try{
            if($usuario->cadastrar());
            header("Location: ../index.php?sucesso=true");
            exit();
        }catch(PDOException $e){
            echo "Erro ao cadastroar usuário: " -> $e->getMessage();
        }

    }
