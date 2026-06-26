<?php
    require_once "actions/buscar_usuario.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.8/css/bootstrap.min.css" integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Editar Usuário</title>
</head>
<body>

    <h2>EDITAR INFORMAÇÕES DO USUÁRIO</h2>
    
    <a href="index.php" class="btn btn-dark">Início</a>
    <br><br>

    <form action="actions/atualizar.php" method="POST">
        
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>" required><br><br>

        <input type="submit" name="atualizar" value="Salvar Alterações">
    </form>

</body>
</html>