<?php
require ('../Controller/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["senha"])) {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email= $_POST["email"];
        $senha = $_POST["senha"];

        // Função para Atualizar o registro no banco de dados
        function atualizarRegistro($conexao, $nome, $cpf, $email, $senha) {
            $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha WHERE cpf = :cpf";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cpf', $cpf);
            return $stmt->execute();
        }

        if (atualizarRegistro($conexao, $nome, $cpf, $email, $senha)) {
            echo "
            <script type=\"text/javascript\">
                alert(\"Informações alteradas com sucesso!\");
                window.location.href = \"../View/html/perfil.php\";
            </script>";
        } else {
            echo "
            <script type=\"text/javascript\">
                alert(\"Erro ao alterar informações\");
                window.location.href = \"../View/html/perfil.php\";
            </script>";
        }
    } else {
        echo "Campos obrigatórios não foram preenchidos.";
    }
}
?>