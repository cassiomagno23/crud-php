<?php

    require_once "actions/listar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.8/css/bootstrap.min.css" integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <title>CRUD</title>
</head>
<body>
    <h2>CADASTRO DE USUÁRIO</h2>
    <form action="actions/cadastrar.php" method="POST">
            <input type="text" name="nome" id="" placeholder="Digite seu nome" required><br><br>
            <input type="email" name="email" id="" placeholder="Digite seu email" required><br><br>
            <input type="text" name="telefone" id="" placeholder="Digite seu telefone" required><br><br>
            <input type="submit"  class="btn btn-success" name="registrar" value="Cadastrar">
    </form>

    <?php if(count($usuarios) > 0): ?>
        <table>
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                        <td><?= $usuario['telefone'] ?></td>
                        <td id="botoes" style="display: flex; gap: 10px;">
                            <form action="editar.php" method="GET">
                                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </form>
                            <form action="actions/deletar.php" method="POST">
                                <input type="hidden" name="id" value="<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja ecluir este usuário?')">
                                <input type="submit" class="btn btn-danger" value="Deletar"  onclick="return confirm('Tem certeza que deseja ecluir este usuário?')">
                            </form>                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum usuário cadastrado até o momento.</p>
    <?php endif; ?>
</body>
</html>