<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <?php
    require ('../../Controller/conexao.php');

    if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Função para listar todos os registros do banco de dados
    function listarRegistros($conexao, $id) {
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $stmt = $conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // Listar registros
        $registros = listarRegistros($conexao, $id);
        foreach ($registros as $registro) {
            if ($registro['id'] == $id) {
                $aux = true;
            }
        }
}
    ?>

<h1>Editar Perfil</h1>
    <?php if (isset($aux)) : ?>
        <form action="../../Model/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $registro['nome']; ?>" required>
            <br>
            <label>CPF:</label>
            <input type="text" id="cpf" placeholder="000.000.000-00" maxlength="14" oninput="maskcpf()" name="cpf" value="<?php echo $registro['cpf']; ?>" required>
            <br>
            <label>Email:</label>
            <input type="text" name="sexo" value="<?php echo $registro['email']; ?>" required>
            <br>
            <label>Senha:</label>
            <input type="text" name="endereco" value="<?php echo $registro['senha']; ?>" required>
            <br>
            <input type="submit" value="Alterar">
        </form>
    <?php else : ?>
        <p>Usuario não encontrado.</p>
    <?php endif; ?>
</body>
</html>