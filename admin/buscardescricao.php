<?php
// Conectando ao banco de dados
$db_host = "localhost";
$db_user = "root";
$db_pass = "automacao";
$db_name = "granncar";
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verificando se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificando se o parâmetro "id" foi enviado via GET
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Buscando o agendamento no banco de dados
  $sql = "SELECT * FROM agendamentos WHERE id = $id";
  $result = $conn->query($sql);
  
  // Verificando se a consulta retornou resultados
  if ($result->num_rows > 0) {
    // Retornando a descrição do agendamento como um JSON
    $row = $result->fetch_assoc();
    $descricao = $row["descricao"];
    echo json_encode(array("descricao" => $descricao));
  } else {
    // Retornando um erro caso o agendamento não seja encontrado
    echo json_encode(array("erro" => "Agendamento não encontrado."));
  }
} else {
  // Retornando um erro caso o parâmetro "id" não seja enviado
  echo json_encode(array("erro" => "Parâmetro 'id' não foi enviado."));
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
