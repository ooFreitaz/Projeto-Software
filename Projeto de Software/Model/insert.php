<?php
require ('../Controller/conexao.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    function inserirRegistro($conexao, $nome, $cpf, $email, $senha) {
        $sql = "INSERT INTO usuario (nome, cpf, email, senha) VALUES (:nome, :cpf, :email, :senha)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        return $conexao->lastInsertId(); // Retorna o ID do usuário inserido
    }

    $userId = inserirRegistro($conexao, $nome, $cpf, $email, $senha);
    if ($userId) {
        $_SESSION['id'] = $userId;
        $_SESSION['nome'] = $nome;

        echo "
        <script type=\"text/javascript\">
            alert(\"Registrado com sucesso!.\");
        </script>";

        header("refresh: 1; url=../View/html/nav_logado.php");
        exit();
    } else {
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../View/html/cadastro.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao registrar.\");
        </script>
        ";
    }
}
?>