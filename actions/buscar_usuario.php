<?php
include_once "config/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try{

        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt_editar = $conn->prepare($query);
        $stmt_editar->execute([":id" => $id]); 
        $usuario = $stmt_editar->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        header("Location: index.php");
        exit;
    }

    }catch(PDOException $e){
        die("Erro ao buscar usuário: " . $e->getMessage());
    }
} else {

    header("Location: index.php");
    exit;
}
?>