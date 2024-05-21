<?php
require ('../Controller/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
  

    // Função para inserir um novo registro no banco de dados
    function inserirRegistro($conexao, $nome,$cpf,$email,$senha) {
        $sql = "INSERT INTO USUARIO (nome, cpf, email, senha) VALUES (:nome, :cpf, :email, :senha)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
if (inserirRegistro($conexao, $nome,$cpf,$email,$senha)) {
    echo "
    <script type=\"text/javascript\">
        alert(\"Registrado com sucesso!.\");
    </script>";

header("refresh: 1; url=nav.php");
exit();
header("Location: nav.php");

die();
} else {
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=conexao.php'>
    <script type=\"text/javascript\">
        alert(\"Erro ao registrar.\");
    </script>
";
}
?>