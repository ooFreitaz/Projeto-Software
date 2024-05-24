<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
<body>
<?php

session_start(); 

if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} 

?>

    <div id="fundo"> 
        <div id="fundobranco">
        <?php

if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {

}
    require ('../../Controller/conexao.php');

    function listarRegistros($conexao)
        {
            if(isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
            } 
            else {
            
            }

        $sql = "SELECT * FROM usuario WHERE email='$email'";
        $stmt = $conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $registros = listarRegistros($conexao);
        $registros = listarRegistros($conexao, $email);
        foreach ($registros as $registro) {
            if ($registro['email'] == $email) {
                $aux = true;
            }
        }

?>
    <?php if (isset($aux)) : ?>
        <form action="update.php" method="post">

            <label>CPF:</label>
            <input type="text" name="cpf" id="data" maxlength="14" oninput="formatarCPF()"  value="<?php echo $registro['cpf']; ?>" required>
            <br>
            <div></div>
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $registro['nome']; ?>" required>
            <br>
            <div></div>
            <label>Email: </label>
            <input type="text" name="email" value="<?php echo $registro['email']; ?>" required>
            <br>
            <div></div>
            <label>Senha:</label>
            <input type="text" name="senha" value="<?php echo $registro['senha']; ?>" required>
            <br>
            <div></div>
            <input type="submit" id="" value="Alterar">
        </form>
    <?php else : ?>
        <p>Usuario não encontrado.</p>
    <?php endif; ?>
    </div>
        </div>

</body>
</html>