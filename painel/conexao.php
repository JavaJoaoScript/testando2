<?php


session_start();

// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "automacao";
$dbname = "granncar";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve um erro na conexão com o banco de dados
if ($conn->connect_error) {
  die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

/// Obtém as credenciais do formulário
$user = mysqli_real_escape_string($conn, $_POST["username"]);
$pass = mysqli_real_escape_string($conn, $_POST["password"]);

// Prepara a query com prepared statements
$sql = "SELECT * FROM usuarios WHERE username=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

// Se as credenciais forem válidas, armazena a sessão e redireciona para a página de administração
if ($result->num_rows == 1) {
  $_SESSION["username"] = $user;
  header("Location: /admin");
} else {
  // Caso contrário, exibe uma mensagem de erro
  echo "Usuário ou senha inválidos.";
}

// Fecha a conexão com o banco de dados
$conn->close();
