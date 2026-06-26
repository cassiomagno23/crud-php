<?php

    include_once "config/connection.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        
        try{

            $stmt_deletar = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
            $executou = $stmt_deletar->execute([
                ":id" => $id
            ]);

            if($executou){
                header("Location: index.php");
                exit;
            } else {
                echo "Erro ao deletar o usuário";
            }

        }catch(PDOException $e){
            
            die("Erro ao deletar um cadastro: " . $e->getMessage());

        }

        header("Location: index.php");
        exit;

    }
    