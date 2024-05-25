<?php
require('../Controller/conexao.php'); // Importa o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"]; // Obtém o CPF do parâmetro POST

    // Função para deletar o registro no banco de dados
    function excluirRegistro($conexao, $cpf) {
        $sql = "DELETE FROM usuario WHERE cpf = :cpf"; // Consulta SQL para deletar usuário pelo CPF
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':cpf', $cpf); // Liga o parâmetro :cpf ao valor do CPF
        return $stmt->execute(); // Executa a consulta e retorna verdadeiro ou falso
    }

    // Verifica o resultado da exclusão
    if (excluirRegistro($conexao, $cpf)) {
        // Se a exclusão foi bem-sucedida, exibe um alerta e redireciona para cadastro.php
        echo "<script>alert('Conta excluída com sucesso!'); window.location.href='../View/html/nav.php';</script>";
    } else {
        // Se houve um erro ao excluir o registro, exibe um alerta com a mensagem de erro
        echo "<script>alert('Erro ao excluir a conta.');</script>";
    }
}
?>