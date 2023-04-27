<?php

// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = 'automacao';
$database = 'granncar';

// Conecta ao banco de dados
$conexao = mysqli_connect($host, $user, $password, $database);

// Verifica se ocorreu algum erro na conexão
if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao banco de dados: " . mysqli_connect_error();
  exit();
}

// Verifica se o ID foi passado como parâmetro na URL
if (isset($_GET['id'])) {
  // Armazena o ID em uma variável
  $id = $_GET['id'];

  // Monta a query de exclusão
  $query = "DELETE FROM motos WHERE id = '$id'";

  // Executa a query
  if (mysqli_query($conexao, $query)) {
    // Redireciona o usuário para a página de listagem de registros
    header('Location: index.php');
    exit();
  } else {
    // Se houver algum erro na exclusão, exibe uma mensagem de erro
    echo "Erro ao excluir o registro: " . mysqli_error($conexao);
  }
  
} else {
  // Se o ID não foi passado como parâmetro, redireciona o usuário para a página inicial
  header('Location: index.php');
  exit();
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);

?>
