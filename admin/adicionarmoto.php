<?php
// Verifica se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $descricao_completa = $_POST['descricao_completa'];
    $imagem = $_POST['imagem'];

    // Conexão com o banco de dados
    $host = 'localhost';
    $user = 'root';
    $password = 'automacao';
    $dbname = 'granncar';
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Verifica se a conexão foi estabelecida com sucesso
    if (!$conn) {
        die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
    }

    // Query para inserir um novo registro na tabela de carros
    $sql = "INSERT INTO motos (nome, preco, descricao, descricao_completa, imagem) VALUES ('$nome', '$preco', '$descricao', '$descricao_completa', '$imagem')";
    
    // Executa a query
    if (mysqli_query($conn, $sql)) {
        // Exibe uma mensagem de sucesso
        echo "Moto adicionado com sucesso.";
        header('Location: index.php');
        exit;
    } else {
        // Exibe uma mensagem de erro
        echo "Erro ao adicionar a moto: " . mysqli_error($conn);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adicionar MOTO</title>
    <style>
        /* Estilo para o formulário */
form {
    margin: 20px auto;
    max-width: 600px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

/* Estilo para os labels */
label {
    margin: 10px 0;
    width: 100%;
}

/* Estilo para os inputs e textareas */
input[type="text"],
textarea {
    padding: 5px;
    margin: 5px 0;
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Estilo para o botão */
button[type="submit"] {
    padding: 10px 20px;
    margin: 10px 0;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Estilo para o h1 */
h1 {
    text-align: center;
}

    </style>
</head>
<body>
    <h1>Adicionar Carro</h1>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea>

        <label for="descricao_completa">Descrição Completa:</label>
        <textarea name="descricao_completa" required></textarea>

        <label for="imagem">Imagem:</label>
        <input type="text" name="imagem" required>

        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
