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



// Buscando os agendamentos na tabela "agendamentos"
$sql = "SELECT * FROM agendamentos";
$result = $conn->query($sql);

// Verificando se a consulta retornou resultados
if ($result->num_rows > 0) {
  // Exibindo os agendamentos em uma tabela
  echo '<div class="table-responsive">';
echo '<table class="table table-striped table-bordered table-hover">';
echo '<thead class="thead-dark">';
echo '<tr><th>id</th><th>nome</th><th>email</th><th>telefone</th><th>descricao</th><th>data</th></tr>';
echo '</thead>';
echo '<tbody>';

while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row["id"] . '</td>';
  echo '<td>' . $row["nome"] . '</td>';
  echo '<td>' . $row["email"] . '</td>';
  echo '<td>' . $row["telefone"] . '</td>';
  echo '<td>' . $row["descricao"] . '</td>';
  echo '<td>' . $row["data"] . '</td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';

}

if (mysqli_num_rows($result) == 0) {
  echo 'Nenhum agendamento encontrado.';
}


// Fechando a conexão com o banco de dados
$conn->close();
?>
