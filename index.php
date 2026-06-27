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
                <?php if(!empty($usuarios)): ?>
                    <?php foreach($usuarios as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['telefone']; ?></td>
                            <td>
                            <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="actions/deletar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum usuário cadastrado até o momento.</p>
    <?php endif; ?>
</body>
</html>