<?php
// Define as credenciais de conexão com o banco de dados
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


$hostname = 'localhost';
$username = 'root';
$password = 'automacao';
$database = 'granncar';

// Cria uma conexão com o banco de dados
$conn = mysqli_connect($hostname, $username, $password, $database);

// Verifica se houve erro na conexão
if (!$conn) {
    die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores dos campos do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];

    // Prepara uma consulta SQL INSERT para inserir os valores do formulário na tabela agendamentos
    $sql = "INSERT INTO agendamentos (nome, email, telefone, data, descricao) VALUES ('$nome', '$email', '$telefone', '$data', '$descricao')";

    // Executa a consulta SQL
    if (mysqli_query($conn, $sql)) {

        $_SESSION['mensagem'] = 'Agendamento feito com sucesso, te aguardamos na data combinada!';
        // Redireciona para a página inicial
        header('Location: index.php');
        // Exibe uma mensagem de sucesso
        exit;
    } else {
        // Exibe uma mensagem de erro
        echo 'Erro ao criar agendamento: ' . mysqli_error($conn);
    }
    
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
