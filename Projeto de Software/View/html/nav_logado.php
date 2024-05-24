<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja Bem Vindo!</title>
    <link rel="stylesheet" href="../css/nav_logado.css">
</head>
<body>
    <?php include '../../Model/funcoes.php' ?>
    <a href="perfil.php">Perfil</a>
    <?php SalvaNome();
    SalvaEmail(); ?>
</body>
</html>