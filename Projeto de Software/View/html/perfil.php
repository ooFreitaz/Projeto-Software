<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="../css/_perfil.css">
</head>
<body>
<body>
<?php

session_start(); 

if(isset($_SESSION['cpf'])) {
    $cpf = $_SESSION['cpf'];
} 
?>

        <?php


    require ('../../Controller/conexao.php');

    function listarRegistros($conexao)
        {
            if(isset($_SESSION['cpf'])) {
                $cpf = $_SESSION['cpf'];
            } 
            else {
            
            }

        $sql = "SELECT * FROM usuario WHERE cpf='$cpf'";
        $stmt = $conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $registros = listarRegistros($conexao);
        $registros = listarRegistros($conexao, $cpf);
        foreach ($registros as $registro) {
            if ($registro['cpf'] == $cpf) {
                $aux = true;
            }
        }

?>
    <?php if (isset($aux)) : ?>

        <form action="../../Model/update.php" method="post" id="dados">
        
            <label>CPF:</label>
            <input type="text" name="cpf" id="cpf" maxlength="14" oninput="maskcpf()"  value="<?php echo $registro['cpf']; ?>" required readonly>
            <br>
            
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $registro['nome']; ?>" required>
            <br>

            <label>Email: </label>
            <input type="text" name="email" value="<?php echo $registro['email']; ?>" required>
            <br>

            <label>Senha:</label>
            <input type="text" name="senha" value="<?php echo $registro['senha']; ?>" required>
            <br>

            <button class="button" type="submit">Alterar</button>

            
        </form>

        <button class="button" onclick="confirmarDelecao()">Deletar Conta</button>


        <!--Esse form de baixo nao precisa formatar pq ele é invisivel -->
        <form id="formDeletarConta" action="../../Model/delete.php" method="POST" id="invisivel">
            <input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
            <input type="hidden" name="id" value="1">
        </form>
        
</form>
    <?php else : ?>
        <p>Usuario não encontrado.</p>
    <?php endif; ?>
    


    <script src="../js/funcoes.js"></script>
</body>
</html>