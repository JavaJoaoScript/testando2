<?php
// Verifica se o id do registro a ser editado foi passado via GET
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit();
}

// Conecta ao banco de dados
$conn = mysqli_connect('localhost', 'root', 'automacao', 'granncar');

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
  die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
  // Recebe os dados do formulário
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $preco = mysqli_real_escape_string($conn, $_POST['preco']);
  $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
  $descricao_completa = mysqli_real_escape_string($conn, $_POST['descricao_completa']);
  $imagem = mysqli_real_escape_string($conn, $_POST['imagem']);

  // Atualiza o registro no banco de dados
  $sql = "UPDATE carros SET nome='$nome', preco='$preco', descricao='$descricao', descricao_completa='$descricao_completa', imagem='$imagem' WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
    exit();
  } else {
    echo 'Erro ao atualizar o registro: ' . mysqli_error($conn);
  }
}

// Seleciona o registro a ser editado
$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM carros WHERE id='$id'";
$result = mysqli_query($conn, $sql);

// Verifica se o registro foi encontrado
if (mysqli_num_rows($result) == 0) {
  header('Location: listar.php');
  exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar registro</title>
<style><style>
 form {
  max-width: 500px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-family: Arial, sans-serif;
  font-size: 16px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-bottom: 20px;
  font-size: 1em;
}

input[type="submit"] {
  background-color: #8B0000;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1.2em;
  text-transform: uppercase;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #8B0000;
}

textarea {
  height: 150px;
}

/* Personalize as cores de acordo com a identidade visual da empresa */
label {
  color: #333;
}

input[type="text"],
textarea {
  background-color: #f5f5f5;
}

input[type="submit"] {
  background-color: #8B0000;
}

input[type="submit"]:hover {
  background-color: #8B0000;
}
 
</style>
</head>
<!DOCTYPE html>
<html>
<head>
  <title>Editar registro</title>
</head>
<body>
  <h1>Editar registro</h1>
  <form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
      <label>Nome:</label>
      <input type="text" name="nome" value="<?php echo $row['nome']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Preço:</label>
      <input type="text" name="preco" value="<?php echo $row['preco']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Descrição:</label>
      <textarea name="descricao" class="form-control"><?php echo $row['descricao']; ?></textarea>
    </div>
    <div class="form-group">
      <label>Descrição completa:</label>
      <textarea name="descricao_completa" class="form-control"><?php echo $row['descricao_completa']; ?></textarea>
    </div>
    <div class="form-group">
      <label>Imagem:</label>
      <textarea name='imagem' class="form-control"><?php echo $row['imagem']; ?></textarea>
    </div>
    <input type="submit" name="submit" value="Salvar" class="btn btn-primary">
  </form>
</body>
</html>
