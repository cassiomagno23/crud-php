<?php

    require_once "../classes/Database.php";
    require_once "../classes/Usuario.php";

    if(isset($_GET['id'])){

        $database = new Database();
        $db = $database->getConnection();

        $usuario = new Usuario($db);

        $usuario->id = $_GET['id'];

        if ($usuario->deletar()) {
            // Se der certo, volta para a página principal
            header("Location: ../index.php?deletado=true");
            exit();
        } else {
            echo "Erro ao tentar deletar o usuário.";
        }

    }else {
    // Se tentarem acessar o arquivo direto sem passar um ID
    header("Location: ../index.php");
    exit();
    }