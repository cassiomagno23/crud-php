<?php
include_once "config/connection.php";

// Só processa se o formulário do editar.php tiver sido enviado
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

   try {

        $query = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
        $stmt_atualizar = $conn->prepare($query);

        $atualizou = $stmt_atualizar->execute([
            ":id" => $id,
            ":nome" => $nome,
            ":email" => $email,
            ":telefone" => $telefone,
        ]);

        if ($atualizou) {
            // Sucesso! Volta para a página principal
            header("Location: index.php?atualizado=true");
            exit;
        } else {
            echo "Erro ao atualizar o usuário.";
        }
   }catch(PDOException){
        echo "Infelizmente ocorreu um erro ao salvar as alterações: " . $e->getMessage();
   }
} else {
    // Se alguém tentar acessar esse arquivo direto pelo navegador, joga de volta pro index
    header("Location: index.php");
    exit;
}