<?php

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BD_PROJETOSOFTWARE";

$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Obter os valores do formulário
$email = $_POST['email'];
$password = $_POST['senha'];

// Consulta SQL para verificar se o email e a senha estão corretos
$sql = "SELECT * FROM USUARIO WHERE email='$email' AND senha='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido

    // Salva o ID do usuário em uma sessão
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $_SESSION['nome'] = $nome;
    echo "
					<script type=\"text/javascript\">
						alert(\"Bem vindo {$nome}\");
					</script>
				";

    header("refresh: 1; url=../View/html/nav_logado.php");
    exit();
    

   
} else {
    echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../View/html/logintela.php'>
					<script type=\"text/javascript\">
						alert(\"Email ou senha incorretos!\");
					</script>
				";
}

$_SESSION['nome'] = $nome;


$conn->close();
?>